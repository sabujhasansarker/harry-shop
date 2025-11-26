<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop');
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

/**
 * Hook: woocommerce_shop_loop_header.
 *
 * @since 8.6.0
 *
 * @hooked woocommerce_product_taxonomy_archive_header - 10
 */
do_action('woocommerce_shop_loop_header');
global $wc_essential;

?>

<div class="shop__top mb-50">

	<?php

	if (isset($wc_essential)) {
		$wishlist_items = $wc_essential->get_wishlist_items();
		echo $wc_essential->wishlist_count();
		if (is_array($wishlist_items)) {
			foreach ($wishlist_items as $product_id) {
				$product = wc_get_product($product_id);
				echo $product->get_name() . '<br>';
			}
		}
	}
	?>
	<div class="row align-items-center">
		<div class="col-lg-6 col-md-5">
			<div class="shop__result">
				<?php woocommerce_result_count() ?>
			</div>
		</div>
		<div class="col-lg-6 col-md-7">
			<div class="shop__sort d-flex flex-wrap justify-content-md-end align-items-center">
				<div class="shop__sort-item">
					<div class="shop__sort-tab tp-tab">
						<nav>
							<div class="nav nav-tabs" id="nav-tab" role="tablist">
								<button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true">
									<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M19.65 6.868V2.782C19.65 1.513 19.074 1 17.643 1H14.007C12.576 1 12 1.513 12 2.782V6.859C12 8.137 12.576 8.641 14.007 8.641H17.643C19.074 8.65 19.65 8.137 19.65 6.868Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M19.65 17.643V14.007C19.65 12.576 19.074 12 17.643 12H14.007C12.576 12 12 12.576 12 14.007V17.643C12 19.074 12.576 19.65 14.007 19.65H17.643C19.074 19.65 19.65 19.074 19.65 17.643Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M8.65 6.868V2.782C8.65 1.513 8.074 1 6.643 1H3.007C1.576 1 1 1.513 1 2.782V6.859C1 8.137 1.576 8.641 3.007 8.641H6.643C8.074 8.65 8.65 8.137 8.65 6.868Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M8.65 17.643V14.007C8.65 12.576 8.074 12 6.643 12H3.007C1.576 12 1 12.576 1 14.007V17.643C1 19.074 1.576 19.65 3.007 19.65H6.643C8.074 19.65 8.65 19.074 8.65 17.643Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</button>
								<button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false">
									<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 1H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M1 8H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M1 15H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</button>
							</div>
						</nav>
					</div>
				</div>
				<div class="shop__sort-item">
					<div class="shop__sort-select">
						<?php woocommerce_catalog_ordering() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if (woocommerce_product_loop()) {
?>
	<div class="shop__main">
		<div class="row">
			<div class="col-lg-3">
				<div class="shop__sidebar on-left">
					<?php dynamic_sidebar('product-sidebar') ?>
				</div>
			</div>
			<div class="col-lg-9 order-first order-lg-last">
				<div class="shop__tab-content mb-40">
					<div class="tab-content" id="shop_tab_content">
						<div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
							<!-- shop grid -->
							<?php

							/**
							 * Hook: woocommerce_before_shop_loop.
							 *
							 * @hooked woocommerce_output_all_notices - 10
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action('woocommerce_before_shop_loop');

							woocommerce_product_loop_start();

							if (wc_get_loop_prop('total')) {
								while (have_posts()) {
									the_post();

									/**
									 * Hook: woocommerce_shop_loop.
									 */
									do_action('woocommerce_shop_loop');

									wc_get_template_part('content', 'product');
								}
							}

							woocommerce_product_loop_end();

							/**
							 * Hook: woocommerce_after_shop_loop.
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action('woocommerce_after_shop_loop');
							?>
						</div>
						<div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
							<div class="product__list-wrapper mb-30">
								<div class="row">
									<?php
									if (wc_get_loop_prop('total')) {
										while (have_posts()) {
											the_post();

											/**
											 * Hook: woocommerce_shop_loop.
											 */
											do_action('woocommerce_shop_loop');

											harry_product_list();
										}
									}
									/**
									 * Hook: woocommerce_after_shop_loop.
									 *
									 * @hooked woocommerce_pagination - 10
									 */
									do_action('woocommerce_after_shop_loop');
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action('woocommerce_no_products_found');
}
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');

get_footer('shop');
