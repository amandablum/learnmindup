<?php
/**
 * Customer refunded order email
 *
 * @author   WooThemes
 * @package  WooCommerce/Templates/Emails
 * @version  2.4.0
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
                                          <p><?php
                        if ( $partial_refund ) {
                            printf( __( "Hi there. Your order on %s has been partially refunded.", 'woocommerce' ), get_option( 'blogname' ) );
                        }
                        else {
                            printf( __( "Hi there. Your order on %s has been refunded.", 'woocommerce' ), get_option( 'blogname' ) );
                        }
                    ?></p>
                    
                    <?php do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text ); ?>
                    
                    <h2><?php printf( __( 'Order #%s', 'woocommerce' ), $order->get_order_number() ); ?></h2>
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
<?php echo $order->email_order_items_table( true, false, true ); ?>
<table class="content" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td class="content_cell order_total order_total_right" align="center" valign="top">
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
                      <p><strong>
                        <?php
                            if ( $totals = $order->get_order_item_totals() ) {
                                foreach ( $totals as $total ) {
                                    echo $total['label']; echo ' '; echo $total['value']; echo '<br/>';
                                }
                            }
                        ?>
                      </strong></p>
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
      </td><!-- /.content_cell:order_total_right -->
    </tr>
  </tbody>
</table><!-- /.content -->
<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text ); ?>
<?php do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text ); ?>
<table class="content" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td class="content_cell product_row" align="center" valign="top">
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
                    <?php do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text ); ?>
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
<?php do_action( 'woocommerce_email_footer' ); ?>
