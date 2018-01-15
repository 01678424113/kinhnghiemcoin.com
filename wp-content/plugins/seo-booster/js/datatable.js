/*
Separated code controlling datatables
*/
jQuery(document).ready(function($) {
	jQuery.extend( jQuery.fn.dataTableExt.oStdClasses, {
		"sWrapper": "dataTables_wrapper form-inline"
	} );

	/* Default class modification */
	jQuery.extend( jQuery.fn.dataTableExt.oStdClasses, {
		"sSortAsc": "header headerSortDown",
		"sSortDesc": "header headerSortUp",
		"sSortable": "header"
	} );

	/* API method to get paging information */
	jQuery.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings ) {
		return {
			"iStart":         oSettings._iDisplayStart,
			"iEnd":           oSettings.fnDisplayEnd(),
			"iLength":        oSettings._iDisplayLength,
			"iTotal":         oSettings.fnRecordsTotal(),
			"iFilteredTotal": oSettings.fnRecordsDisplay(),
			"iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
			"iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
		};
	};

	/* Bootstrap style pagination control */
	jQuery.extend( jQuery.fn.dataTableExt.oPagination, {
		"bootstrap": {
			"fnInit": function( oSettings, nPaging, fnDraw ) {
				var oLang = oSettings.oLanguage.oPaginate;
				var fnClickHandler = function ( e ) {
					e.preventDefault();
					if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
						fnDraw( oSettings );
					}
				};
				// jQuery(nPaging).addClass('pagination').append(
				// 	'<ul>'+
				// 	'<li class="prev disabled"><a href="#">&larr; '+interface_translations.sPrevious+'</a></li>'+
				// 	'<li class="next disabled"><a href="#">'+interface_translations.sNext+' &rarr; </a></li>'+
				// 	'</ul>'
				// 	);
				var els = jQuery('a', nPaging);
				jQuery(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
				jQuery(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
			},

			"fnUpdate": function ( oSettings, fnDraw ) {
				var iListLength = 5;
				var oPaging = oSettings.oInstance.fnPagingInfo();
				var an = oSettings.aanFeatures.p;
				var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

				if ( oPaging.iTotalPages < iListLength) {
					iStart = 1;
					iEnd = oPaging.iTotalPages;
				}
				else if ( oPaging.iPage <= iHalf ) {
					iStart = 1;
					iEnd = iListLength;
				} else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
					iStart = oPaging.iTotalPages - iListLength + 1;
					iEnd = oPaging.iTotalPages;
				} else {
					iStart = oPaging.iPage - iHalf + 1;
					iEnd = iStart + iListLength - 1;
				}

				for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
							// Remove the middle elements
							jQuery('li:gt(0)', an[i]).filter(':not(:last)').remove();

							// Add the new list items and their event handlers
							for ( j=iStart ; j<=iEnd ; j++ ) {
								sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
								jQuery('<li '+sClass+'><a href="#">'+j+'</a></li>')
								.insertBefore( $('li:last', an[i])[0] )
								.bind('click', function (e) {
									e.preventDefault();
									oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
									fnDraw( oSettings );
								} );
							}

							// Add / remove disabled classes from the static elements
							if ( oPaging.iPage === 0 ) {
								jQuery('li:first', an[i]).addClass('disabled');
							} else {
								jQuery('li:first', an[i]).removeClass('disabled');
							}

							if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
								jQuery('li:last', an[i]).addClass('disabled');
							} else {
								jQuery('li:last', an[i]).removeClass('disabled');
							}
						}
					}
				}
			} );


	var keywordsfilter = jQuery("input:radio[name ='showkws']:checked").val();

	var otable = jQuery('#datatable').DataTable({
		"pageLength": 10,
		"bSortCellsTop": true,
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bDestroy": true,
		"bJQueryUI": true,
		"ajax": {
			url: ajaxurl+'?action=fn_my_ajaxified_dataloader_ajax',
			"data": function ( d ) {
				return $.extend( {}, d, {
					"showkws": jQuery("input:radio[name ='showkws']:checked").val(),
					"hideinternal": jQuery("input:checkbox[name ='hideinternal']:checked").val()
				});
			}
		},
		"bDeferRender": true,
		"bPaginate": true,
		language: {
			sEmptyTable: interface_translations.sEmptyTable,
			processing:     "<div class='loading'>"+interface_translations.sProcessing+"</div>",
			search:        interface_translations.search,
			lengthMenu:    interface_translations.sLengthMenu,
			info:           interface_translations.sInfo,
				// infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
				// infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
				infoPostFix:    "",
				loadingRecords: interface_translations.sLoadingRecords,
				// zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
				// emptyTable:     "Aucune donnée disponible dans le tableau",
				paginate: {
					first:       interface_translations.first,
					previous:   interface_translations.sPrevious,
					next:      interface_translations.sNext,
					last:        interface_translations.last,
				}
			},
		});

	//trigger redraw
	jQuery("#hideinternal").click(function(event){
		otable.ajax.reload();
	});

	jQuery("#keywordsfilter input").click(function(event){
		otable.ajax.reload();
	});
});