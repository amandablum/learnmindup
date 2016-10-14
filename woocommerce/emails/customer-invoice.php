<?php
/**
 * Customer invoice email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php do_action( 'woocommerce_email_header', $email_heading ); ?>
<table class="content" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td class="content_cell product_row" align="center" valign="top">
          <!--[if (gte mso 9)|(IE)]>
          <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align: top;">
            <tbody>
              <tr>
                <td width="600" align="center" valign="top">
          <![endif]-->
          <div class="row">
            <!--[if (gte mso 9)|(IE)]>
            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align: top;">
              <tbody>
                <tr>
                  <td width="600" align="center" valign="top">
            <![endif]-->
            <div class="col-3">
              <table class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                  <tr>
                    <td class="column_cell font_default" align="center" valign="top">
					<?php if ( $order->has_status( 'pending' ) ) : ?>
                      <p><?php printf( __( 'An order (#%s) has been created for you on %s. To pay for this order please use the following link:', 'woocommerce' ), $order->get_order_number(), get_bloginfo( 'name', 'display' ) ); ?></p>
                      <table class="hruler hruler_secondary" width="80" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tbody>
                          <tr>
                            <td class="hspace">&nbsp;</td>
                          </tr>
                          <tr>
                            <td class="hspace">&nbsp;</td>
                          </tr>
                        </tbody>
                      </table><!-- end .hruler:hruler_secondary -->
                      <table class="primary_btn" align="center" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td class="font_default"><a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>"><span><?php printf( __( 'Pay Now', 'woocommerce' ) ); ?></span></a></td>
                          </tr>
                        </tbody>
                      </table><!-- end .primary_btn -->
                    <?php endif; ?>
                    
					<?php do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text ); ?>
                    
                    <p><?php printf( '<time datetime="%s">%s</time>', date_i18n( 'c', strtotime( $order->order_date ) ), date_i18n( wc_date_format(), strtotime( $order->order_date ) ) ); ?></p>
                    </td><!-- /.column_cell -->
                  </tr>
                </tbody>
              </table><!-- /.column -->
            </div><!-- /.col-3 -->
            <!--[if (gte mso 9)|(IE)]>
                  </td>
                </tr>
              </tbody>
            </table>
            <![endif]-->
          </div><!-- /.row -->
          <!--[if (gte mso 9)|(IE)]>
                </td>
              </tr>
            </tbody>
          </table>
          <![endif]-->
      </td><!-- /.content_cell:product_row -->
    </tr>
  </tbody>
</table><!-- /.content -->
<?php
	switch ( $order->get_status() ) {
		case "completed" :
			echo $order->email_order_items_table( $order->is_download_permitted(), false, true );
		break;
		case "processing" :
			echo $order->email_order_items_table( $order->is_download_permitted(), true, true );
		break;
		default :
			echo $order->email_order_items_table( $order->is_download_permitted(), true, false );
		break;
	}
?>
<table class="content" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td class="content_cell order_total order_total_right" align="center" valign="top">
        <!--[if (gte mso 9)|(IE)]>
        <table width="600" align="center" cellpadding="0" cellspacing="0" border="0" style="vertical-align: top;">
          <tr>
            <td align="center" valign="top" width="600">
        <![endif]-->
        <div class="row">
          <!--[if (gte mso 9)|(IE)]>
          <table width="600" align="center" cellpadding="0" cellspacing="0" border="0" style="vertical-align: top;">
            <tr>
              <td align="center" valign="top" width="600">
          <![endif]-->
          <div class="col-3">
            <table width="100%" class="column" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="column_cell font_default">
                    <p>
					  <?php
                          if ( $totals = $order->get_order_item_totals() ) {
                              foreach ( $totals as $total ) {
                                  echo $total['label']; echo ' '; echo $total['value']; echo '<br/>';
                              }
                          }
                      ?>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div><!-- end .col-3 --> 
          <!--[if (gte mso 9)|(IE)]>
              </td>
            </tr>
          </table>
          <![endif]-->
          
        </div><!-- end .row --> 
        <!--[if (gte mso 9)|(IE)]>
            </td>
          </tr>
        </table>
        <![endif]-->
      </td>
    </tr>
  </tbody>
</table><!-- end .content -->
<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text ); ?>
<?php do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text ); ?>
<?php do_action( 'woocommerce_email_footer' ); ?>