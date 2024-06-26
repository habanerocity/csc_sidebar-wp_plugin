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
                value="<?php echo( isset ( $user_facebook_link ) ) ? esc_html( $user_facebook_link ) : ''; ?>"
            >
        </td>
    </tr>
    <tr>
        <th>
            <label for="csc_sidebar_company"><?php esc_html_e( 'User company', 'csc-sidebar' ); ?></label>
        </th>
        <td>
            <input 
                type="text" 
                name="csc_sidebar_company" 
                id="csc_sidebar_company" 
                class="regular-text company"
                value="<?php echo( isset ( $company ) ) ? esc_html( $company ) : ''; ?>"
            >
        </td>
    </tr>
    <tr>
        <th>
            <label for="csc_sidebar_user_url"><?php esc_html_e( 'User URL', 'csc-sidebar' ); ?></label>
        </th>
        <td>
            <input 
                type="url" 
                name="csc_sidebar_user_url" 
                id="csc_sidebar_user_url" 
                class="regular-text user-url"
                value="<?php echo( isset ( $user_url ) ) ? esc_url( $user_url ) : ''; ?>"
            >
        </td>
    </tr> 
</table>