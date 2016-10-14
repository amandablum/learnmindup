<?php
/**
 * Email Styles
 *
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Load colours
$base            = get_option( 'woocommerce_email_base_color' );
$bg              = get_option( 'woocommerce_email_background_color' );
$body            = get_option( 'woocommerce_email_body_background_color' );
$text            = get_option( 'woocommerce_email_text_color' );

// Image Assets
$theme_path = get_stylesheet_directory_uri().'/woocommerce/emails/images/';
$default_background = '';
// Check jumbotron background
if ( $img = get_option( 'woocommerce_email_header_image' ) ) {
	$default_background = esc_url( $img );
}

?>
/**
 * Commerce
 * notification-emails.com
 * Last Modified: 01/02/2016
**/
/* Reset */
body { Margin: 0; padding: 0; min-width: 100%; }
a, #outlook a { display: inline-block; }
a, a span { text-decoration: none; }
img { line-height: 1; outline: none; border: 0; text-decoration: none; -ms-interpolation-mode: bicubic; mso-line-height-rule: exactly; }
table { border-spacing: 0; mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
td { padding: 0; }
/* Email preview text */
.email_summary { display:none; font-size:1px; line-height:1px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; }
/* Typography */
.font_default, h1, h2, h3, h4, h5, h6, p, a { font-family: Helvetica, Arial, sans-serif; }
small { font-size: 100%; }
ul { list-style: none; padding-left: 0; Margin-bottom: 0; }
li { line-height: 23px; }
.font_default, p, li { font-size: 16px; }
p { line-height: 23px; Margin-top: 16px; Margin-bottom: 24px; }
h1, h2, h3, h4, h5, h6 { Margin-left: 0; Margin-right: 0; Margin-top: 16px; Margin-bottom: 8px; padding: 0; }
h1 {
	font-size: 32px;
	line-height: 40px;
	font-weight: bold;
	text-transform: uppercase;
	letter-spacing: 4px;
}
h1 small {
	font-size: 18px;
	line-height: 1;
	font-weight: normal;
}
h2 {
	font-size: 16px;
	line-height: 24px;
	font-weight: bold;
	text-transform: uppercase;
	letter-spacing: 2px;
}
h2 small {
	font-size: 12px;
	line-height: 1;
	font-weight: normal;
}
h2 span { text-decoration: line-through; }
h2 .amount { text-decoration: none; }
h2 ins { text-decoration: none; }
h3 {
	font-size: 22px;
	line-height: 30px;
	font-weight: normal;
}
h3 small {
	font-size: 14px;
	line-height: 1;
	font-weight: normal;
}
h4 {
	font-size: 19px;
	line-height: 28px;
	font-weight: normal;
}
h5 {
	font-size: 14px;
	line-height: 20px;
	font-weight: bold;
	text-transform: uppercase;
	letter-spacing: 1px;
}
h5 small {
	font-size: 10px;
	line-height: 18px;
	font-weight: bold;
	text-transform: uppercase;
	letter-spacing: 2px;
}
h6 {
	font-size: 30px;
	line-height: 34px;
	font-weight: bold;
}
h6 small {
	font-size: 16px;
	line-height: 1;
	font-weight: normal;
}
.primary_btn td,
.secondary_btn td {
	font-size: 19px;
	line-height: 28px;
	mso-line-height-rule: exactly;
}
.primary_btn a,
.secondary_btn a {
	font-weight: bold;
}
/* Grid */
.row, .col-1, .col-13, .col-2, .col-3 {
	display: inline-block;
	width: 100%;
	vertical-align: top;
	text-align: center;
}
.col-1 { max-width: 200px; }
.col-2 { max-width: 300px; }
.col-13 { max-width: 400px; }
.col-3, .row { max-width: 600px; }
.row { margin: 0 auto; }
.column {
	width: 100%;
	vertical-align: top;
}
.column_cell {
	padding: 32px 16px;
	text-align: center;
	vertical-align: top;
}
.col-bottom-0 .column_cell { padding-bottom: 0; }
.col-top-0 .column_cell { padding-top: 0; }
/* Content Blocks */
.header_cell, .jumbotron_cell, .content_cell, .footer_cell {
	font-size: 0 !important;
	text-align: center;
}
/* Header */
.header_cell img {
	max-width: 144px;
	height: auto;
}
/* Footer */
.footer_cell { border-top: 1px solid; }
.footer_cell p { Margin: 16px 0; }
.footer_cell .column_cell { padding: 16px; }
/* Jumbotron */
.jumbotron_image {
	background-repeat: no-repeat;
	background-position: 50% 0;
	background-size: 100% auto;
}
/* Content */
.billing_information {
	padding-top: 16px;
	padding-bottom: 8px;
}
.billing_information .column_cell {
	padding-top: 0;
	padding-bottom: 0;
}
/* Buttons */
.primary_btn,
.secondary_btn {
	clear: both;
	margin: 0 auto;
}
.primary_btn td,
.secondary_btn td {
	text-align: center;
	vertical-align: middle;
	padding: 10px 32px;
	-webkit-border-radius: 60px;
	border-radius: 60px;
}
.primary_btn a,
.primary_btn span,
.secondary_btn a,
.secondary_btn span {
	text-align: center;
	display: block;
}
/* Icon Holder + Rules */
.icon_holder, .hruler {
	width: 62px;
	margin-left: auto;
	margin-right: auto;
	clear: both;
}
.icon_holder { width: 48px; }
.hspace, .hruler_cell {
	font-size: 0;
	height: 8px;
	overflow: hidden;
}
.hruler_cell {
	height: 4px;
	line-height: 4px;
}
.icon_cell {
  font-size: 0;
  line-height: 1;
  -webkit-border-radius: 80px;
  border-radius: 80px;
  padding: 8px;
  height: 48px;
  border: 2px solid;
}
/* Product Row */
.product_row { padding: 24px 0; }
.product_row .column_cell { padding: 8px 16px; }
.image_thumb img {
	-webkit-border-radius: 4px;
	border-radius: 4px;
}
.product_row .col-13 .column_cell { text-align: left; }
.jumbotron_cell .col-13 .column_cell { text-align: center; }
.content .product_row, .content .order_total { border-top: 1px solid; }
.product_row h6 { Margin-top: 0; }
.product_row p {
	Margin-top: 8px;
	Margin-bottom: 8px;
}
.order_total_right .column_cell { text-align: right; }
.order_total p { Margin: 8px 0; }
.order_total h2 { Margin: 8px 0; }
/* Responsive Images */
.image_responsive img {
	width: 100%;
	height: auto;
	max-width: 264px;
}
.image_responsive_2 {
	padding-top: 0;
	padding-bottom: 0;
}
.image_responsive_2 img {
	width: 100%;
	height: auto;
	max-width: 568px;
}
.image_responsive_3 img {
	width: 100%;
	height: auto;
	max-width: 368px;
}
/* Colors */
body,
.email_body,
.header_cell,
.content_cell,
.footer_cell {
	background-color: <?php echo esc_attr( $body ); ?>; 
}
.jumbotron_cell {
	background-color: <?php echo esc_attr( $bg ); ?>;
}
.primary_btn td,
.icon_primary .icon_cell,
.hruler_primary .hruler_cell {
	background-color: <?php echo esc_attr( $base ); ?>;
}
.hruler_secondary .hruler_cell, 
.content_cell .secondary_btn td {
	background-color: #828688;
}
.jumbotron_cell .secondary_btn td,
.jumbotron_cell .hruler_secondary .hruler_cell {
	background-color: #ffffff;
}
.billing_information, .order_total {
	background-color: #fafaf7;
}
.jumbotron_cell,
.jumbotron_cell a,
.jumbotron_cell h1,
.jumbotron_cell h2,
.jumbotron_cell h3,
.jumbotron_cell h4,
.jumbotron_cell .column_cell,
.jumbotron_cell .stat_label {
	color: #30393d;
}
.primary_btn a,
.primary_btn span,
.content_cell .primary_btn a,
.content_cell .primary_btn span,
.content_cell .secondary_btn a,
.content_cell .secondary_btn span {
	color: #ffffff;
}
.content_cell h1,
.content_cell h2,
.content_cell h3,
.content_cell h4,
.content_cell h4 a,
.content_cell .stat_label,
.content_cell h2 span {
	color: #4e5558;
}
.header_cell .column_cell,
.content_cell .column_cell {
	color: <?php echo esc_attr( $text ); ?>;
}
h5,
h6,
.jumbotron_cell .secondary_btn a,
.jumbotron_cell .secondary_btn span,
.content_cell a,
.content_cell a span,
.header_cell a,
.header_cell a span,
.amount, .content_cell h2 .amount {
	color: <?php echo esc_attr( $base ); ?>;
}
.footer_cell .column_cell, .footer_cell a, .footer_cell a span, .content h4 span, .content h3 span {
	color: #afb0b1;
}
.jumbotron_cell .icon_secondary .icon_cell {
	border-color: #828688;
}
.icon_primary .icon_cell {
	border-color: <?php echo esc_attr( $base ); ?>;
}
.content_cell .icon_secondary .icon_cell, .footer_cell, .content .product_row, .content .order_total {
	border-color: #e8e7e3;
}
/* Responsive */
@media screen {
  h1, h2, h3, h4, h5, h6, p, a, .font_default {
	  font-family: "Lato", Helvetica, Arial, sans-serif !important;
  }
  .primary_btn td, .secondary_btn td {
	  padding: 0 !important;
  }
  .primary_btn a, .secondary_btn a {
	  font-size: 18px !important;
	  line-height: 26px !important;
	  padding: 9px 32px !important;
  }
}
@media screen and (min-width: 631px) and (max-width: 769px) {
.col-1, .col-2 {
	float: left !important;
}
.col-1 {
	width: 200px !important;
}
.col-2 {
	width: 300px !important;
}
}
@media screen and (max-width: 630px) {
  .jumbotron_cell {
	  background-size: cover !important;
  }
  .row, .col-1, .col-13, .col-2, .col-3 {
	  max-width: 100% !important;
  }
}