<?php
$user_occupation = get_post_meta( $post->ID, 'csc_sidebar_user_occupation', true);
$user_location = get_post_meta( $post->ID, 'csc_sidebar_user_location', true);
$user_website = get_post_meta( $post->ID, 'csc_sidebar_user_website_link', true);
$user_facebook_link = get_post_meta( $post->ID, 'csc_sidebar_user_facebook_link', true);
$user_instagram_link = get_post_meta( $post->ID, 'csc_sidebar_user_instagram_link', true);
$user_tiktok_link = get_post_meta( $post->ID, 'csc_sidebar_user_tiktok_link', true);
$user_linkedin_link = get_post_meta( $post->ID, 'csc_sidebar_user_linkedin_link', true);
$user_github_link = get_post_meta( $post->ID, 'csc_sidebar_user_github_link', true);
$user_paypal_link = get_post_meta( $post->ID, 'csc_sidebar_user_paypal_link', true);
?>
<table class="form-table csc-sidebar-metabox"> 
    <input type="hidden" name="csc_sidebar_nonce" value="<?php echo wp_create_nonce( "csc_sidebar_nonce" ); ?>">
    <tr>
        <th>
            <label for="csc_sidebar_user_occupation"><?php esc_html_e( 'User Occupation', 'csc-sidebar' ); ?></label>
        </th>
        <td>
            <input 
                type="text" 
                name="csc_sidebar_user_occupation" 
                id="csc_sidebar_user_occupation" 
                class="regular-text user_occupation"
                value="<?php echo( isset ( $user_occupation ) ) ? esc_html( $user_occupation ) : ''; ?>"
            >
        </td>
    </tr>
    <tr>
        <th>
            <label for="csc_sidebar_user_location"><?php esc_html_e( 'User Location', 'csc-sidebar' ); ?></label>
        </th>
        <td>
            <input 
                type="text" 
                name="csc_sidebar_user_location" 
                id="csc_sidebar_user_location" 
                class="regular-text user_location"
                value="<?php echo( isset ( $user_location ) ) ? esc_html( $user_location ) : ''; ?>"
            >
        </td>
    </tr>
    <tr>
        <th>
            <label for="csc_sidebar_user_website_link"><?php esc_html_e( 'User website url', 'csc-sidebar' ); ?></label>
        </th>
        <td>
            <input 
                type="text" 
                name="csc_sidebar_user_website_link" 
                id="csc_sidebar_user_website_link" 
                class="regular-text user_website"
                value="<?php echo( isset ( $user_website ) ) ? esc_html( $user_website ) : ''; ?>"
            >
        </td>
    </tr>
    <tr>
        <th>
            <label for="csc_sidebar_user_facebook_link"><?php esc_html_e( 'User Facebook link', 'csc-sidebar' ); ?></label>
        </th>
        <td>
            <input 
                type="text" 
                name="csc_sidebar_user_facebook_link" 
                id="csc_sidebar_user_facebook_link" 
                class="regular-text user_facebook_link"
                value="<?php echo( isset ( $user_facebook_link ) ) ? esc_url( $user_facebook_link ) : ''; ?>"
            >
        </td>
    </tr>
    <tr>
        <th>
            <label for="csc_sidebar_user_instagram_link"><?php esc_html_e( 'User Instagram Link', 'csc-sidebar' ); ?></label>
        </th>
        <td>
            <input 
                type="text" 
                name="csc_sidebar_user_instagram_link" 
                id="csc_sidebar_user_instagram_link" 
                class="regular-text user_instagram_link"
                value="<?php echo( isset ( $user_instagram_link ) ) ? esc_url( $user_instagram_link ) : ''; ?>"
            >
        </td>
    </tr>
    <tr>
        <th>
            <label for="csc_sidebar_user_tiktok_link"><?php esc_html_e( 'User Tiktok Link', 'csc-sidebar' ); ?></label>
        </th>
        <td>
            <input 
                type="url" 
                name="csc_sidebar_user_tiktok_link" 
                id="csc_sidebar_user_tiktok_link" 
                class="regular-text user-url"
                value="<?php echo( isset ( $user_tiktok_link ) ) ? esc_url( $user_tiktok_link ) : ''; ?>"
            >
        </td>
    </tr> 
    <tr>
        <th>
            <label for="csc_sidebar_user_linkedin_link"><?php esc_html_e( 'User LinkedIn Link', 'csc-sidebar' ); ?></label>
        </th>
        <td>
            <input 
                type="url" 
                name="csc_sidebar_user_linkedin_link" 
                id="csc_sidebar_user_linkedin_link" 
                class="regular-text user-url"
                value="<?php echo( isset ( $user_linkedin_link ) ) ? esc_url( $user_linkedin_link ) : ''; ?>"
            >
        </td>
    </tr> 
    <tr>
        <th>
            <label for="csc_sidebar_user_github_link"><?php esc_html_e( 'User Github Link', 'csc-sidebar' ); ?></label>
        </th>
        <td>
            <input 
                type="url" 
                name="csc_sidebar_user_github_link" 
                id="csc_sidebar_user_github_link" 
                class="regular-text user-url"
                value="<?php echo( isset ( $user_github_link ) ) ? esc_url( $user_github_link ) : ''; ?>"
            >
        </td>
    </tr> 
    <tr>
        <th>
            <label for="csc_sidebar_user_paypal_link"><?php esc_html_e( 'User Paypal Link', 'csc-sidebar' ); ?></label>
        </th>
        <td>
            <input 
                type="url" 
                name="csc_sidebar_user_paypal_link" 
                id="csc_sidebar_user_paypal_link" 
                class="regular-text user-url"
                value="<?php echo( isset ( $user_paypal_link ) ) ? esc_url( $user_paypal_link ) : ''; ?>"
            >
        </td>
    </tr> 
</table>