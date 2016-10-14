<?php
/**
 * Email Footer
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
  <div class="email_body">
      <table class="footer" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td class="footer_cell product_row" align="center" valign="top">
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
                          <td class="column_cell font_default" align="center" valign="top"><?php echo wpautop( wp_kses_post( wptexturize( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) ) ) ); ?></td><!-- /.column_cell -->
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
            </td><!-- /.footer_cell -->
          </tr>
        </tbody>
      </table><!-- /.footer -->
  </div><!-- /.email_body -->
</body>
</html>
