<?php
/**
 * Customer new account email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
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
                    <p><?php printf( __( "Thanks for creating an account on %s. Your username is <span class='amount'>%s</span>.", 'woocommerce' ), esc_html( $blogname ), esc_html( $user_login ) ); ?></p>
                    
                    <?php if ( get_option( 'woocommerce_registration_generate_password' ) == 'yes' && $password_generated ) : ?>
                    
                        <p><?php printf( __( "Your password has been automatically generated: <span class='amount'>%s</span>", 'woocommerce' ), esc_html( $user_pass ) ); ?></p>
                    
                    <?php endif; ?>
                    
                    <p><?php printf( __( 'You can access your account area to view your orders and change your password.', 'woocommerce' ) ); ?></p>
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
                            <td class="font_default"><a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>"><span><?php printf( __( 'My Account', 'woocommerce' ) ); ?></span></a></td>
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
