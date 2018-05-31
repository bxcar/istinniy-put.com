<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>

<?php
/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form();
    return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?> class="row">

    <?php
    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    do_action('woocommerce_before_single_product_summary');
    ?>

    <div class="summary entry-summary flypage-info col-md-8 col-sm-8 col-xs-12">

        <?php
        /**
         * woocommerce_single_product_summary hook.
         *
         * @hooked woocommerce_template_single_title - 5
         * @hooked woocommerce_template_single_rating - 10
         * @hooked woocommerce_template_single_price - 10
         * @hooked woocommerce_template_single_excerpt - 20
         * @hooked woocommerce_template_single_add_to_cart - 30
         * @hooked woocommerce_template_single_meta - 40
         * @hooked woocommerce_template_single_sharing - 50
         * @hooked WC_Structured_Data::generate_product_data() - 60
         */
        do_action('woocommerce_single_product_summary');
        ?>

    </div><!-- .summary -->

    <?php
    /**
     * woocommerce_after_single_product_summary hook.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    do_action('woocommerce_after_single_product_summary');
    ?>

</div><!-- #product-<?php the_ID(); ?> -->
<div class="modal-common-gl">
    <a class="drivelink" style="display: none" target="_blank" href="<?=get_field('drivelink'); ?>">Скачать аудио</a>
    <script>
        var drivelink = jQuery('.drivelink')[0].outerHTML;
        jQuery(".drivelinkwrap").append(drivelink);
        jQuery(".modal-common-gl .drivelink").remove();
        jQuery(".drivelink").css("display", "inline");
    </script>
    <?php
    $user = wp_get_current_user();
    if (get_field('chapters')) {
        foreach (get_field('chapters') as $item) {
            if ($item['pay'] == 'pay'
                && !in_array( 'premium_user', (array) $user->roles )
                && !in_array( 'administrator', (array) $user->roles )
                && !in_array( 'editor', (array) $user->roles )) { ?>
                <div class="modal-content-gl modal-content-gl-scroll <?= $item['number']; ?>">
                    <h2 style="margin-bottom: 0; font-size: 26px;">Для просмотра данной главы <a target="_blank" style="text-decoration: underline; color: #5555ff;" href="https://istinniy-put.com/subscription-pay/">приобрести подписку</a></h2>
                </div>
            <?php } else { ?>
                <div class="modal-content-gl modal-content-gl-scroll <?= $item['number']; ?>">
                    <h2><?= $item['title']; ?></h2>
                    <div class="content"><?= $item['text']; ?></div>
                </div>
            <?php } ?>
        <?php }
    } ?>
    <?php if (get_field('chapters')) {
        foreach (get_field('chapters') as $item) {
            if ($item['pay'] == 'pay'
                && !in_array( 'premium_user', (array) $user->roles )
                && !in_array( 'administrator', (array) $user->roles )
                && !in_array( 'editor', (array) $user->roles )) { ?>
                <div class="modal-content-gl modal-content-gl-button <?= $item['number']; ?>">
                    <h2 style="margin-bottom: 0; font-size: 26px;">Для просмотра данной главы <a target="_blank" style="text-decoration: underline; color: #5555ff;" href="https://istinniy-put.com/subscription-pay/">приобрести подписку</a></h2>
                    <span class="close-button">&times;</span>
                </div>
            <?php } else { ?>
                <div class="modal-content-gl modal-content-gl-button <?= $item['number']; ?>">
                    <h2><?= $item['title']; ?></h2>
                    <div style="visibility: hidden;" class="content"><?= $item['text']; ?></div>
                    <span class="close-button">&times;</span>
                </div>
            <?php } ?>
        <?php }
    } ?>
</div>

<?php do_action('woocommerce_after_single_product'); ?>
