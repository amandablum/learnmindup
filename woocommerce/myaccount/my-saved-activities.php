<?php
/**
 * WooCommerce Memberships: "Welcome" section
 * Custom template added to the "Member Area"
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Renders the welcome section for the membership in the my account area.
 *
 * @param array $args {
 *		@type \WC_Memberships_User_Membership $user_membership user membership object
 *		@type int $user_id current user's ID
 * }
 */
?>

<h3>My Saved Activities</h3>

<?php do_action( 'wc_memberships_before_members_area', 'welcome' ); ?>

		<div class="user-favorite-list">
			<?php echo the_user_favorites_list( get_current_user_id(), null, true ); ?>
		</div>

<?php do_action( 'wc_memberships_after_members_area', 'welcome' );