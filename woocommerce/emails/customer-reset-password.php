<?php
/**
 * Customer Reset Password email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.0.0
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
                      <p><?php _e( 'Someone requested that the password be reset for the following account:', 'woocommerce' ); ?></p>
                      <p><span class="amount"><?php echo $user_login ; ?></span></p>
                      <p><?php _e( 'If this was a mistake, just ignore this email and nothing will happen.', 'woocommerce' ); ?></p>
                      <p><?php _e( 'To reset your password, visit the following address:', 'woocommerce' ); ?></p>
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
                            <td class="font_default"><a href="<?php echo esc_url( add_query_arg( array( 'key' => $reset_key, 'login' => rawurlencode( $user_login ) ), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) ) ); ?>"><span><?php _e( 'Reset Password', 'woocommerce' ); ?></span></a></td>
                          </tr>
                        </tbody>
                      </table><!-- end .primary_btn -->
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
<?php do_action( 'woocommerce_email_footer' ); ?>
