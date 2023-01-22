<?php

// Real Estate Meta Data
function real_esatate_property_custom_meta_your_properties() {
    add_meta_box( 
    	'bn_meta', __( 'Properties Meta Feilds', 'real-esatate-property' ), 
    	'real_esatate_property_meta_callback_your_properties', 
    	'post', 
    	'normal',
    	'high'
    );
}

/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'real_esatate_property_custom_meta_your_properties');
}

function real_esatate_property_meta_callback_your_properties( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'real_esatate_property_meta_nonce_your_properties' );
    $bn_stored_meta = get_post_meta( $post->ID );
    $real_esatate_property_your_properties_count = get_post_meta( $post->ID, 'real_esatate_property_your_properties_count', true );
    ?>
    <div id="your_properties_meta">
        <table id="list">
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Properties Count', 'real-esatate-property' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="real_esatate_property_your_properties_count" id="real_esatate_property_your_properties_count" value="<?php echo esc_attr($real_esatate_property_your_properties_count); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}

/* Saves the custom meta input */
function real_esatate_property_meta_save_your_properties( $post_id ) {
    if (!isset($_POST['real_esatate_property_meta_nonce_your_properties']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['real_esatate_property_meta_nonce_your_properties']) ), basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save Package Amount
    if( isset( $_POST[ 'real_esatate_property_your_properties_count' ] ) ) {
        update_post_meta( $post_id, 'real_esatate_property_your_properties_count', strip_tags( wp_unslash( $_POST[ 'real_esatate_property_your_properties_count' ]) ) );
    }
}
add_action( 'save_post', 'real_esatate_property_meta_save_your_properties' );