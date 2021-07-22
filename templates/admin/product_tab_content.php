<?php

// include only file
if (!defined('ABSPATH')) {
  die('Do not open this file directly.');
}


global $post;

// Note the 'id' attribute needs to match the 'target' parameter set above
?><div id='wphostbill_service_options' class='panel woocommerce_options_panel'><?php

  ?><div class='options_group'><?php

    woocommerce_wp_checkbox( array(
      'id' 			=> '_allow_personal_message',
      'label' 		=> __( 'Allow personal message', 'woocommerce' ),
      'desc_tip' 		=> true,
      'description'	=> __( 'Allow the custom to add a personalised message on the product page.', 'woocommerce' ),
    ) );

    woocommerce_wp_text_input( array(
      'id'				=> '_valid_for_days',
      'label'				=> __( 'Gift card validity (in days)', 'woocommerce' ),
      'desc_tip'			=> 'true',
      'description'		=> __( 'Enter the number of days the gift card is valid for.', 'woocommerce' ),
      'type' 				=> 'number',
      'custom_attributes'	=> array(
        'min'	=> '1',
        'step'	=> '1',
      ),
    ) );

    $redeemable_stores = (array) get_post_meta( $post->ID, '_redeem_in_stores', true );
    ?><p class='form-field _redeem_in_stores'>
      <label for='_redeem_in_stores'><?php _e( 'Redeemable in stores', 'woocommerce' ); ?></label>
      <select name='_redeem_in_stores[]' class='wc-enhanced-select' multiple='multiple' style='width: 80%;'>
        <option <?php selected( in_array( 'AL', $redeemable_stores ) ); ?> value='AL'>Alabama</option>
        <option <?php selected( in_array( 'NY', $redeemable_stores ) ); ?> value='NY'>New York</option>
        <option <?php selected( in_array( 'TX', $redeemable_stores ) ); ?> value='TX'>Texas</option>
        <option <?php selected( in_array( 'WY', $redeemable_stores ) ); ?> value='WY'>Wyoming</option>
      </select>
      <img class='help_tip' data-tip="<?php _e( 'Select the stores where this gift card is redeemable.', 'woocommerce' ); ?>" src='<?php echo esc_url( WC()->plugin_url() ); ?>/assets/images/help.png' height='16' width='16'>
    </p>

  </div>

</div>