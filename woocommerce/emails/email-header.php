<?php
/**
 * Email Header
 *
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// Image Assets
$theme_path          = get_stylesheet_directory_uri().'/woocommerce/emails/images/';
$default_background  = $theme_path.'jumbotron_image.jpg';
$logo_image          = get_option( 'woocommerce_email_header_image' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="date=no">
<meta name="format-detection" content="address=no">
<meta name="format-detection" content="email=no">
<title><?php echo get_bloginfo( 'name', 'display' ); ?></title>
<link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic" rel="stylesheet" type="text/css">
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
  <div class="email_body">
      <table class="header" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td class="header_cell" align="center" valign="top">
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
                              <a href="<?php echo get_site_url(); ?>">
                              <?php if ( $logo_image ) : ?>
                                <img src="<?php echo $logo_image; ?>" width="144" height="" alt="<?php echo get_bloginfo( 'name', 'display' ); ?>"/>
                              <?php else : ?>
                                <span><strong><?php echo get_bloginfo( 'name', 'display' ); ?></strong></span>
                              <?php endif; ?>
                              </a>
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
            </td><!-- /.header_cell -->
          </tr>
        </tbody>
      </table><!-- /.header -->
      <table class="jumbotron" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td <?php if ( $default_background ) :?> class="jumbotron_cell jumbotron_image" background="<?php echo $default_background; ?>"<?php else :?> class="jumbotron_cell" <?php endif; ?> align="center" valign="top">
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
                            <h2><?php echo $email_heading; ?></h2>
                            <table class="icon_holder icon_primary" width="80" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tbody>
                                <tr>
                                  <td class="hspace">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td class="icon_cell"><img src="<?php echo $theme_path.'ic_shopping_basket_white_48dp_2x.png'; ?>" width="48" height="48" alt=""/></td>
                                </tr>
                                <tr>
                                  <td class="hspace">&nbsp;</td>
                                </tr>
                              </tbody>
                            </table><!-- /.icon_holder:icon_primary -->
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
            </td><!-- /.jumbotron_cell -->
          </tr>
        </tbody>
      </table><!-- /.jumbotron -->