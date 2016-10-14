<?php
/**
 * Email Order Items
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.1.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

foreach ( $items as $item_id => $item ) :
	$_product     = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
	$item_meta    = new WC_Order_Item_Meta( $item, $_product );

	if ( apply_filters( 'woocommerce_order_item_visible', true, $item ) ) { ?>
        <table class="content  <?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>" width="100%" border="0" cellspacing="0" cellpadding="0">
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
                        <td width="200" align="center" valign="top">
                  <![endif]-->
                  <div class="col-1">
                    <table class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td class="column_cell font_default image_thumb" align="center" valign="top"><?php echo apply_filters( 'woocommerce_order_item_thumbnail', '<img src="' . ( $_product->get_image_id() ? current( wp_get_attachment_image_src( $_product->get_image_id(), 'thumbnail') ) : wc_placeholder_img_src() ) .'" alt="' . esc_attr__( 'Product Image', 'woocommerce' ) . '" height="" width="168"  />', $item ); ?></td><!-- /.column_cell:image_thumb -->
                        </tr>
                      </tbody>
                    </table><!-- /.column -->
                  </div><!-- /.col-1 -->
                  <!--[if (gte mso 9)|(IE)]>
                      </td>
                      <td width="400" align="center" valign="top">
                  <![endif]-->
                  <div class="col-13">
                    <table class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td class="column_cell font_default" align="center" valign="top">
                            <h4><span><?php echo apply_filters( 'woocommerce_email_order_item_quantity', $item['qty'], $item ); ?>×</span> <strong><?php echo apply_filters( 'woocommerce_order_item_name', $item['name'], $item, false ); ?></strong></h4>
                            <h6><?php echo $order->get_formatted_line_subtotal( $item ); ?></h6>
                            <?php if ( $show_sku && $item_meta->meta && $show_download_links  ) : ?>
                            <p>
                            <?php
                            
								  // SKU
								  if ( $show_sku && is_object( $_product ) && $_product->get_sku() ) {
									  echo ' (#' . $_product->get_sku() . ')<br/>';
								  }
								  
								  // allow other plugins to add additional product information here
								  do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order );
								  
								  // Variation
								  if ( ! empty( $item_meta->meta ) ) {
									  echo '<br/><small>' . nl2br( $item_meta->display( true, true, '_', "\n" ) ) . '</small>';
								  }
								  
								  // File URLs
								  if ( $show_download_links ) {
									  $order->display_item_downloads( $item );
								  }
				  
								  // allow other plugins to add additional product information here
								  do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $order );
            
                            ?>
                            </p>
                            <?php endif; ?>
                            <?php if ( $show_purchase_note && is_object( $_product ) && ( $purchase_note = get_post_meta( $_product->id, '_purchase_note', true ) ) ) : ?>  
                                <p><?php echo wpautop( do_shortcode( wp_kses_post( $purchase_note ) ) ); ?></p>
                            <?php endif; ?>
                          </td><!-- /.column_cell -->
                        </tr>
                      </tbody>
                    </table><!-- /.column -->
                  </div><!-- /.col-13 -->
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
		<?php } ?>
<?php endforeach; ?>