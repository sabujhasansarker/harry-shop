<?php

/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if (! defined('ABSPATH')) {
	exit;
}

if (! empty($breadcrumb)) {
?>
	<div class="breadcrumb__area breadcrumb__style-9 pt-13 pb-35 include-bg">
		<div class="breadcrumb__content p-relative z-index-1">
			<div class="breadcrumb__list has-icon mb-0">
				<?php
				foreach ($breadcrumb as $key => $crumb) {

					echo $before;

					if (! empty($crumb[1]) && sizeof($breadcrumb) !== $key + 1) {
				?>
						<span class="breadcrumb-icon">
							<svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1.8125 7.90625L3 6.9375V14C3 14.2708 3.09375 14.5 3.28125 14.6875C3.48958 14.8958 3.72917 15 4 15H7C7.27083 15 7.5 14.8958 7.6875 14.6875C7.89583 14.5 8 14.2708 8 14V10H10V14C10 14.2708 10.0938 14.5 10.2812 14.6875C10.4896 14.8958 10.7292 15 11 15H14C14.2708 15 14.5 14.8958 14.6875 14.6875C14.8958 14.5 15 14.2708 15 14V6.9375L16.1875 7.90625C16.2708 7.96875 16.375 8 16.5 8C16.6667 8 16.8021 7.9375 16.9062 7.8125C17.0938 7.54167 17.0625 7.30208 16.8125 7.09375L9.3125 1.09375C9.10417 0.947917 8.89583 0.947917 8.6875 1.09375L6 3.25V2C6 1.72917 5.89583 1.5 5.6875 1.3125C5.5 1.10417 5.27083 1 5 1C4.72917 1 4.48958 1.10417 4.28125 1.3125C4.09375 1.5 4 1.72917 4 2V4.84375L1.1875 7.09375C0.9375 7.30208 0.90625 7.54167 1.09375 7.8125C1.30208 8.0625 1.54167 8.09375 1.8125 7.90625ZM9 2.125L14 6.125V14H11V9H7V14H4V6.15625L9 2.125Z" fill="currentColor"></path>
							</svg>
						</span>
						<span><a href="<?php echo esc_url($crumb[1]) ?>"><?php echo esc_html($crumb[0]) ?></a></span>
					<?php
					} else {
					?>
						<span><?php echo esc_html($crumb[0]) ?></span>
					<?php
					}

					echo $after;

					if (sizeof($breadcrumb) !== $key + 1) {
					?>
						<span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
				<?php
					}
				}
				?>
			</div>
		</div>
	</div>
<?php
}
