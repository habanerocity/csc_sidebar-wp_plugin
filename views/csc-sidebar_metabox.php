<?php
$user_facebook_link = get_post_meta( $post->ID, 'csc_sidebar_user_facebook_link', true);
$user_instagram_link = get_post_meta( $post->ID, 'csc_sidebar_user_instagram_link', true);
$user_tiktok_link = get_post_meta( $post->ID, 'csc_sidebar_user_tiktok_link', true);
?>
<table class="form-table csc-sidebar-metabox"> 
    <input type="hidden" name="csc_sidebar_nonce" value="<?php echo wp_create_nonce( "csc_sidebar_nonce" ); ?>">
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
</table>