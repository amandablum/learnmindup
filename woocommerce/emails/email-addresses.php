<?php
/**
 * Email Addresses
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<table class="hruler hruler_primary" width="80" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td class="hspace">&nbsp;</td>
    </tr>
    <tr>
      <td class="hspace">&nbsp;</td>
    </tr>
    <tr>
      <td class="hspace">&nbsp;</td>
    </tr>
  </tbody>
</table><!-- end .hruler --> 
<h2><?php _e( 'Billing Address', 'woocommerce' ); ?></h2>
<p><?php echo $order->get_formatted_billing_address(); ?></p>
<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && ( $shipping = $order->get_formatted_shipping_address() ) ) : ?>
<table class="hruler hruler_primary" width="80" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td class="hspace">&nbsp;</td>
    </tr>
    <tr>
      <td class="hspace">&nbsp;</td>
    </tr>
    <tr>
      <td class="hspace">&nbsp;</td>
    </tr>
  </tbody>
</table><!-- end .hruler --> 
<h2><?php _e( 'Shipping Address', 'woocommerce' ); ?></h2>
<p><?php echo $shipping; ?></p>
<?php endif; ?>