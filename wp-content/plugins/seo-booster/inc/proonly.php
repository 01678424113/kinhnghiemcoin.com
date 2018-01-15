<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) exit;

global $current_user,$seobooster_fs;

	?>
	<section class="marketingbox" id="sbpmarketingbox">
		<h3 class="headline"><?php _e('SEO Booster PRO - All this and more!', 'seo-booster'); ?> &#8595;</h3>
		<?php
		//echo '<a href="' . seobooster_fs()->get_upgrade_url() . '" class="button button-primary">' .
		__('See prices and upgrade', 'seo-booster') . '</a>';
		?>
		<div class="innerbox">
			<div class="profeatures">
				<ul>
					<li><span></span><div><?php _e('Crawler visits - When and where search engine robots visit.','seo-booster'); ?></div></li>
					<li><span></span><div><?php _e('Get more details about links to your website.','seo-booster'); ?></div></li>

					<li><span></span><div><?php _e('Backlinks are verified regularly.','seo-booster'); ?></div></li>
					<li><span></span><div><?php _e('Optional - Keyword in title tag.','seo-booster'); ?></div></li>

					<li><span></span><div><?php _e('Export keywords, backlinks and 404 errors to .csv files.','seo-booster'); ?></div></li>
					<li><span></span><div><?php _e('You bribe your way out of seeing this message :-)','seo-booster'); ?></div></li>
					<li><span></span><div><?php _e('Get premium support.','seo-booster'); ?></div></li>
				</ul>
			</div>
			<div class="faq">
				<h3><?php _e('Mini FAQ','seo-booster'); ?></h3>
				<ul>
					<li><?php _e("You can cancel any time. But you propably won't :-)",'seo-booster'); ?></li>
					<li><?php _e('Upgrade or downgrade any time.','seo-booster'); ?></li>
					<li><?php _e('Different plans - monthly, yearly or lifetime.','seo-booster'); ?></li>
					<li><?php _e('Discounts for different plans when paid upfront.','seo-booster'); ?></li>
					<li><?php _e('We accept Visa, Mastercard, American Express and PayPal.','seo-booster'); ?></li>
				</ul>
				<?php echo '<a href="' . seobooster_fs()->get_upgrade_url() . '" class="button button-primary">' .
		__('See prices and upgrade', 'seo-booster') . '</a>'; ?>
			</div>
		</div>
	</section>