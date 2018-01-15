<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if (!current_user_can('update_plugins')) {
	wp_die(__('You are not allowed to update plugins on this blog.', 'seo-booster'));
}

global $wpdb,	$seobooster_fs;

$foftable  = $wpdb->prefix . "sb2_404";
$bltable   = $wpdb->prefix . "sb2_bl";


?>
<div class="wrap">
	<?php

	global $seobooster_fs;

	// todo
$kws_google						= $wpdb->get_var("SELECT count(*) as kws FROM {$wpdb->prefix}sb2_kw WHERE `kw` NOT LIKE '#' AND `engine` LIKE '%google%';");
$kws_not_google				= $wpdb->get_var("SELECT count(*) as kws FROM {$wpdb->prefix}sb2_kw WHERE `kw` NOT LIKE '#' AND `engine` NOT LIKE '%google%' AND `engine` NOT LIKE 'Internal Search'");

$kws_total						= $kws_google + $kws_not_google;
$traffic_google				= $wpdb->get_var("SELECT sum(visits) FROM {$wpdb->prefix}sb2_kw WHERE `engine` LIKE '%google.%';");
$traffic_not_google		= $wpdb->get_var("SELECT sum(visits) FROM {$wpdb->prefix}sb2_kw WHERE `engine` NOT LIKE '%google.%';");
$traffic_total				= $traffic_google + $traffic_not_google;
$lps_google						= $wpdb->get_var("SELECT count(DISTINCT(lp)) FROM {$wpdb->prefix}sb2_kw WHERE `engine` LIKE '%google.%';");
$lps_not_google				= $wpdb->get_var("SELECT count(DISTINCT(lp)) FROM {$wpdb->prefix}sb2_kw WHERE `engine` NOT LIKE '%google.%';");


$over90daysold = $wpdb->get_var("SELECT COUNT(*) AS cnt FROM {$wpdb->prefix}sb2_kw pm WHERE lastvisit < DATE_SUB(NOW(), INTERVAL 90 DAY)");

?>
<div id="welcome-panel" class="welcome-panel clearfix clear">
	<div id="inner-welcome">
		<div style="float:right;">
			<a href="https://cleverplugins.com/" target="_blank"><img src='<?php echo plugin_dir_url(__FILE__); ?>images/cleverpluginslogo.png' height="27" width="150" alt="Visit cleverplugins.com"></a>
		</div>
		<div class="welcome-panel-content">

			<img src="<?php echo plugin_dir_url(__FILE__); ?>images/seoboosterlogo.png" alt="SEO Booster - WordPress plugin" height="35" width="150" class="sblogo"><div class="sbversion">v.<?php echo SEOBOOSTER_VERSION; ?></div>
			<h1><?php _e('Save hours of painstaking SEO analysis', 'seo-booster'); ?></h1>
			<p class="lead"><?php _e('Uncluttered view of what content brings traffic.', 'seo-booster'); ?></p>
			<p class="lead"><?php _e("Overview that regular analytics software won't give you.", 'seo-booster'); ?></p>
			<p class="lead"><?php _e('Overview of where you should work on SEO to improve traffic.', 'seo-booster'); ?></p>
			<?php
			include 'inc/search_engines.php';
			if ($sengine) {
				$secount = count($sengine);
				?>
				<p class="lead"><?php printf( esc_html__( 'Tracking visitors from %1$s search engines.', 'seo-booster'), '<span>'. number_format_i18n($secount).'</span>' ); ?></p>
				<?php
			}
			?>
			<div class="welcome-panel-column">
				<h3><?php _e('Explore the plugin', 'seo-booster');?></h3>
				<ul>
					<li><a href="<?php echo admin_url('admin.php?page=sb2_settings'); ?>" class="welcome-icon welcome-widgets-menus"><?php _e('The Settings', 'seo-booster');?></a></li>
					<li><a href="<?php echo admin_url('admin.php?page=sb2_keywords'); ?>" class="welcome-icon welcome-widgets-menus"><?php _e('Keyword Details', 'seo-booster');?></a></li>
					<li><a href="<?php echo admin_url('admin.php?page=sb2_backlinks'); ?>" class="welcome-icon welcome-widgets-menus"><?php _e('Backlink Details', 'seo-booster');?></a></li>
					<li><a href="<?php echo admin_url('admin.php?page=sb2_crawled'); ?>" class="welcome-icon welcome-widgets-menus"><?php _e('Crawled Pages', 'seo-booster');?></a></li>
					<li><a href="<?php echo admin_url('admin.php?page=sb2_404s'); ?>" class="welcome-icon welcome-widgets-menus"><?php _e('404 Errors', 'seo-booster');?></a></li>
					<li><a href="<?php echo admin_url('admin.php?page=sb2_forgotten'); ?>" class="welcome-icon welcome-widgets-menus"><?php _e('Forgotten Pages', 'seo-booster');?></a></li>
					<li><a href="<?php echo admin_url('admin.php?page=sb2_log'); ?>" class="welcome-icon welcome-widgets-menus"><?php _e('The Log', 'seo-booster');?></a></li>
				</ul>
			</div><!-- .welcome-panel-column -->
			<div class="welcome-panel-column">
				<h3><?php _e('First Steps', 'seo-booster');?></h3>
				<ul>
					<li><?php printf('<a href="%s" target="_blank" class="welcome-icon welcome-learn-more">' . __('Knowledge Base', 'seo-booster') . '</a>', 'http://cleverplugins.helpscoutdocs.com/');?></li>
					<li><?php printf('<a href="admin.php?page=sb2_settings" class="welcome-icon welcome-widgets-menus">' . __('Check the Settings', 'seo-booster') . '</a>', admin_url('admin.php?page=sb2_settings'));?></li>
					<li><?php printf('<a href="%s" class="welcome-icon welcome-widgets-menus">' . __('Add the widgets', 'seo-booster') . '</a>', admin_url('widgets.php'));?> </li>
					<li><a href="<?php echo admin_url('admin.php?page=sb2_log'); ?>" class="welcome-icon welcome-widgets-menus"><?php _e('View the log', 'seo-booster');?></a></li>
				</ul>
			</div><!-- .welcome-panel-column -->
		</div><!-- .welcome-panel-content -->
	</div><!--#inner-welcome-->
</div><!-- .welcome-panel -->

		<?php
			if ((!$seobooster_fs->is_registered())
				&& (!$seobooster_fs->is_pending_activation())
			) {
				// Website is not registered, so...
				?>
				<div id="sbpoptin">
					<?php
					echo sprintf(__('Never miss an important update. Opt-in to our security and feature updates notifications, and non-sensitive diagnostic tracking. <a href="%s">Click here</a>', 'seo-booster'),
						$seobooster_fs->get_reconnect_url()
					);
					?>
				</div>
				<?php

			}

			if ( seobooster_fs()->is_not_paying() ) {
	include(SEOBOOSTER_PLUGINPATH.'inc/proonly.php');
}

		?>

<?php
/*
<p class="help"><?php _e("'Known' keywords are visits from search engines where the search keyword could be detected. 'Unknown' are when Google and other search engines do not tell which keyword was used.", 'seo-booster');?></p>
*/



$searchtrafficbyday = $wpdb->get_results("SELECT daday, sum(visits) as totalvisits FROM {$wpdb->prefix}sb2_kwdt WHERE daday > DATE_SUB(NOW(), INTERVAL 90 DAY) GROUP BY daday ORDER BY daday ASC");

if ($searchtrafficbyday) {
	?>
	<div id="sb2traffic" class="clearfix clear">
		<h3><?php _e('Visitors from Search Engines','seo-booster'); ?></h3>
		<div id="searchtrafficbydaychart"></div>
		<script type="text/javascript">
			google.charts.load('current', {packages: ['corechart']});
			google.charts.setOnLoadCallback(drawTrafficChart);
			function drawTrafficChart() {
				var data = google.visualization.arrayToDataTable([
					['Day','Visits'],
					<?php
					foreach ($searchtrafficbyday as $stbd) {
						echo "['" . $stbd->daday . "', " . $stbd->totalvisits . "],";
					}
					?>
					]);

				var options = {
					title: '<?php _e('Visitors from Search Engines','seo-booster'); ?>',
					curveType: 'function', // makes curved lines
					legend: { position: 'bottom' },
					backgroundColor : 'transparent',
					pointSize:7,
					titlePosition:'none',
					height:300,
					chartArea:{
						left:50,
						width:'100%'
					},
					series: [
					{
						color: '#0073aa',
						visibleInLegend: true
					}
					],
					lineWidth:4,
					trendlines: {
						0: {
							type: 'exponential',
							color: '#333',
							opacity: 1
						}
					}
				};
				var trafficchart = new google.visualization.LineChart(document.getElementById('searchtrafficbydaychart'));
				trafficchart.draw(data, options);
		} // function drawTrafficChart()

	</script>
</div><!-- #sb2traffic -->
<?php
	} // if ($searchtrafficbyday)
	?>

	<div id="sb2dashboard" class="clearfix clear">
		<div>
			<?php
			$totalkeywords      = $wpdb->get_var("SELECT count(*) FROM {$wpdb->prefix}sb2_kw;");
			$totalunknown       = $wpdb->get_var("SELECT count(*) FROM {$wpdb->prefix}sb2_kw WHERE kw IN ('#','');");
			$totalknown         = $wpdb->get_var("SELECT count(*) FROM {$wpdb->prefix}sb2_kw WHERE kw NOT IN ('#','');");
			$totalvisits        = $wpdb->get_var("SELECT SUM(visits) FROM {$wpdb->prefix}sb2_kw;");
			$totalknownvisits   = $wpdb->get_var("SELECT SUM(visits) FROM {$wpdb->prefix}sb2_kw WHERE kw<>'#' AND kw<>'';");
			$totalunknownvisits = $wpdb->get_var("SELECT SUM(visits) FROM {$wpdb->prefix}sb2_kw WHERE kw='#' OR kw='';");

			$topkeywords = $wpdb->get_results("SELECT kw,lp,visits FROM {$wpdb->prefix}sb2_kw WHERE ig='0' AND kw<>'Internal Search' AND kw<>'#' AND kw<>'' GROUP BY kw ORDER BY visits DESC limit 10;", ARRAY_A);

			if ($topkeywords) {
				?>
				<h2><?php _e('Top Keywords', 'seo-booster');?></h2>

				<table class="wp-list-table widefat">
					<thead>
						<tr>
							<th scope="col"><?php _e('Keyword', 'seo-booster');?></th>
							<th scope="col"><?php _e('Landing Page', 'seo-booster');?></th>
							<th scope="col"><?php _e('Visits', 'seo-booster');?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($topkeywords as $topkw) {
							echo "<tr><td>" . $topkw['kw'] . "</td><td><a href='" . $topkw['lp'] . "'>" . $topkw['lp'] . "</a></td><td>" . number_format_i18n($topkw['visits']) . "</td></tr>";
						}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th scope="col"><?php _e('Keyword', 'seo-booster');?></th>
							<th scope="col"><?php _e('Landing Page', 'seo-booster');?></th>
							<th scope="col"><?php _e('Visits', 'seo-booster');?></th>
						</tr>
					</tfoot>
				</table>
				<?php
} // if ($topkeywords)

$query = "SELECT engine, COUNT(*) as cnt, SUM(visits) as visits
FROM {$wpdb->prefix}sb2_kw
WHERE `ig`='0'
AND engine<>'Internal Search'
AND engine NOT LIKE '%google.%'
GROUP BY `engine`
ORDER BY `visits` DESC
LIMIT 25;";

$engines = $wpdb->get_results($query, ARRAY_A);
if ($engines) {
	?>
	<h2><?php _e('Top Search Engines', 'seo-booster');?></h2>
	<p class="help"><?php _e('Google not included.','seo-booster'); ?></p>
	<div id="searchengineschart"></div>

	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart','line']});
	</script>
	<script type="text/javascript">

		google.charts.setOnLoadCallback(drawPieChart);

		function drawPieChart() {
			var data = google.visualization.arrayToDataTable([
				['<?php _e('Day','seo-booster');?>', '<?php _e('Visitors','seo-booster'); ?>'],
				<?php
				foreach ($engines as $eng) {
					echo "['" . $eng['engine'] . "', " . $eng['cnt'] . "],";

				}
				?>
				]);
			var options = {
				backgroundColor : 'transparent',
				title: '<?php _e('Top Search Engines','seo-booster'); ?>',
				height: 330,
				legend: {
					position: 'right',
					textStyle: {
						// color: 'blue',
						fontSize: 16
					}
				},
				pieHole: 0.2,
				chartArea: {
					'top': 10,
					'width':'100%',
					'left':0,
					'height': 310,
					'backgroundColor': {
						'fill': 'transparent',
						'opacity': 50
					},
					'width':'100%'
				}
			};
			var chart = new google.visualization.PieChart(document.getElementById('searchengineschart'));
			chart.draw(data, options);
		}
	</script>
	<?php
} // if ($engines)
?>
<h2><?php _e('Backlink Stats', 'seo-booster');?></h2>
<p><?php _e('Details of the backlinks recorded.', 'seo-booster');?></p>
<?php
$totalbls               = $wpdb->get_var("SELECT count(*) FROM $bltable;");
$totalblsignore         = $wpdb->get_var("SELECT count(*) FROM $bltable WHERE ig='1';");
$totalblsverified       = $wpdb->get_var("SELECT count(*) FROM $bltable WHERE verified='1' AND ig<>'1';");
$totalblsvisits         = $wpdb->get_var("SELECT SUM(visits) FROM $bltable;");
$totalblsignorevisits   = $wpdb->get_var("SELECT SUM(visits) FROM $bltable WHERE ig='1';");
$totalblsverifiedvisits = $wpdb->get_var("SELECT SUM(visits) FROM $bltable WHERE verified='1' AND ig<>'1';");
?>
<table class="wp-list-table widefat">
	<tr><td><?php _e('Verified', 'seo-booster');?></td><td><?php echo number_format_i18n($totalblsverified); ?></td><td>(<?php echo number_format_i18n($totalblsverifiedvisits); ?> <?php _e('Visits', 'seo-booster');?>)</td></tr>
	<tr><td><?php _e('Ignored', 'seo-booster');?></td><td><?php echo number_format_i18n($totalblsignore); ?></td><td>(<?php echo number_format_i18n($totalblsignorevisits); ?> <?php _e('Visits', 'seo-booster');?>)</td></tr>
	<tr><td><?php _e('Total', 'seo-booster');?></td><td><?php echo number_format_i18n($totalbls); ?></td><td>(<?php echo number_format_i18n($totalblsvisits); ?> <?php _e('Visits', 'seo-booster');?>)</td></tr>

</table>
<p><?php _e('Verified means SEO Booster has verified the link, and if possible collected anchor text and other details. Ignored links are backlinks that do not have a link back or are filtered for other reasons.', 'seo-booster');?></p>
<?php
$query = "SELECT domain,
(SELECT COUNT(*) FROM $bltable O WHERE O.domain = M.domain ) AS totallinks,
(SELECT SUM(D.visits) FROM $bltable D WHERE D.domain = M.domain ) AS totalvisits
FROM $bltable M where ig='0' AND domain<>'' group by domain order by totalvisits desc limit 15;";

$samplelinks = $wpdb->get_results($query, ARRAY_A);

if ($samplelinks) {
	?>

	<h2><?php _e('Top Linking Domains', 'seo-booster');?></h2>

	<table class="wp-list-table widefat">
		<thead>
			<tr>
				<th scope="col"><?php _e('Domain', 'seo-booster');?></th>
				<th scope="col"><?php _e('Total Links', 'seo-booster');?></th>
				<th scope="col"><?php _e('Total Visits', 'seo-booster');?></th>
			</tr>
		</thead>
		<tbody>
			<?php

			foreach ($samplelinks as $sample) {
				echo "<tr><td>" . $sample['domain'] . "</td><td>" . $sample['totallinks'] . "</td><td>" . $sample['totalvisits'] . "</td></tr>";
			}

			?>
		</tbody>
		<tfoot>
			<tr>
				<th scope="col"><?php _e('Domain', 'seo-booster');?></th>
				<th scope="col"><?php _e('Total Links', 'seo-booster');?></th>
				<th scope="col"><?php _e('Total Visits', 'seo-booster');?></th>
			</tr>
		</tfoot>

	</table>
	<?php
} // if ($samplelinks)

?>

</div>

</div>


</div> <!-- .wrap -->



