/*global sbprotrack:true*/
/*jshint unused:false, eqnull:true */
jQuery( document ).ready( function( $ ) {
	// === skulle fikse tomme referrers
	if ( (document.referrer === false) || (sbprotrack.hasOwnProperty("ajax_url")) ) {
		//var myReferer = document.referrer;
		jQuery.ajax({
			url : sbprotrack.ajax_url,
			type : 'post',
			data : {
				action : 'fn_sbpro_add_visit',
				currurl : window.location.href,
				referer : document.referrer,
				ua : navigator.userAgent
			},
			success : function( response ) {
				//console.log('SEO Booster Response: '+response);
			}
		});
	}
});
/*
track:
<noscript><a href="http://example.com/logaholic/logaholictracker.php?conf=p1"><img src="http://example.com/logaholic/logaholictracker.php?conf=p1" alt="web stats" border="0" /></a> <a href="http://www.logaholic.com/">Web Analytics</a> by Logaholic</noscript>
*/