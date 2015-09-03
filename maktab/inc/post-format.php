<?php

add_theme_support('post-formats', array('aside', 'video', 'audio', 'gallery', 'image', 'quote', 'status', 'link'));

$ott_image = array(

        array( "name" => __('Upload images', 'framework'),
                        "desc" => __('Select the images that should be upload to this gallery', 'framework'),
                        "id" => "gallery_image_ids",
                        "type" => 'gallery'
                ),
        array( "name" => __('Image height', 'framework'),
                        "desc" => __('Slider height', 'framework'),
                        "id" => "format_image_height",
                        "type" => 'text'
                )
);

$ott_audio = array(
        array( "name" => __('MP3 File URL','framework'),
                        "desc" => __('The URL to the .mp3 audio file','framework'),
                        "id" => "format_audio_mp3",
                        "type" => "text",
                        'std' => ''
                ),
        array( "name" => __('Embeded Code','framework'),
                        "desc" => __('The embed code','framework'),
                        "id" => "format_audio_embed",
                        "type" => "textarea",
                        'std' => ''
        )
);

$ott_video = array(
        array( "name" => __('M4V File URL','framework'),
                        "desc" => __('The URL to the .m4v video file','framework'),
                        "id" => "format_video_m4v",
                        "type" => "text",
                        'std' => ''
                ),
        array( "name" => __('Video Thumbnail Image','framework'),
                        "desc" => __('The preivew image.','framework'),
                        "id" => "format_video_thumb",
                        "type" => "text",
                        'std' => ''
                ),
        array( "name" => __('Embeded Code','framework'),
                        "desc" => __('If you\'re not using self hosted video then you can include embeded code here.','framework'),
                        "id" => "format_video_embed",
                        "type" => "textarea",
                        'std' => ''
        )	
);

$ott_quote = array(
        array( "name" => __('The Quote','framework'),
                        "desc" => __('Write your quote in this field.','framework'),
                        "id" => "format_quote_text",
                        "type" => "textarea",
                        'std' => ''
        ),
        array( "name" => __('The Author','framework'),
                        "desc" => __('Write your author name of this.','framework'),
                        "id" => "format_quote_author",
                        "type" => "text",
                        'std' => ''
        )
);

$ott_link = array(
        array( "name" => __('The URL','framework'),
                        "desc" => __('Insert the URL you wish to link to.','framework'),
                        "id" => "format_link_url",
                        "type" => "text",
                        'std' => ''
        )	
);

$ott_status = array(
        array( "name" => __('The URL','framework'),
                        "desc" => __('Insert the status URL.','framework'),
                        "id" => "format_status_url",
                        "type" => "text",
                        'std' => ''
        )	
);


/* ================================================================================== */
/*      Add Metabox
/* ================================================================================== */

add_action('admin_init', 'ott_post_format_add_box');
if (!function_exists('ott_post_format_add_box')) {
    function ott_post_format_add_box() { 
        global $ott_quote, $ott_image, $ott_link, $ott_audio, $ott_video, $ott_status;
        add_meta_box('ott-format-quote', __('Quote Settings', 'otouch'), 'post_format_metabox', 'post', 'normal', 'high', $ott_quote);
        add_meta_box('ott-format-gallery', __('Gallery Settings', 'otouch'), 'post_format_metabox', 'post', 'normal', 'high', $ott_image);
        add_meta_box('ott-format-link', __('Link Settings', 'otouch'), 'post_format_metabox', 'post', 'normal', 'high', $ott_link);
        add_meta_box('ott-format-audio', __('Audio Settings', 'otouch'), 'post_format_metabox', 'post', 'normal', 'high', $ott_audio);
        add_meta_box('ott-format-video', __('Video Settings', 'otouch'), 'post_format_metabox', 'post', 'normal', 'high', $ott_video);
        add_meta_box('ott-format-status', __('Status Settings', 'otouch'), 'post_format_metabox', 'post', 'normal', 'high', $ott_status);
    }
}


/* ================================================================================== */
/*      Callback function to show fields in meta box
/* ================================================================================== */
if (!function_exists('post_format_metabox')) {
    function post_format_metabox($post, $metabox) {
        global $post; ?>
	<input type="hidden" name="otouch_postformat_box_nonce" value="<?php echo wp_create_nonce(basename(__FILE__));?>" />
        <table class="form-table ott-metaboxes">
            <tbody>
                    <?php	                              
                    foreach ($metabox['args'] as $settings) {
                        $options = get_post_meta($post->ID, $settings['id'], true);
                        
                        $settings['value'] = !empty($options) ? $options : (isset($settings['std']) ? $settings['std'] : '');
                        call_user_func('settings_'.$settings['type'], $settings);	
                    }
                    ?>
            </tbody>
        </table><?php
    }
}


/* ================================================================================== */
/*      Save post data
/* ================================================================================== */

add_action('save_post', 'postformat_save_postdata');
if (!function_exists('postformat_save_postdata')) {
    function postformat_save_postdata($post_id) {
            global $ott_image, $ott_audio, $ott_video, $ott_quote, $ott_link, $ott_status;

            // verify nonce
            if (!isset($_POST['otouch_postformat_box_nonce']) || !wp_verify_nonce($_POST['otouch_postformat_box_nonce'], basename(__FILE__))) {
                    return $post_id;
            }

            // check autosave
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                    return $post_id;
            }

            // check permissions
            if (!current_user_can('edit_post', $post_id)) {
                    return $post_id;
            }

            $metaboxes = array_merge($ott_link, $ott_quote, $ott_audio, $ott_image, $ott_video, $ott_status);
            foreach ($metaboxes as $metabox) {
                    $value = ( isset($_POST[$metabox['id']]) ) ? $_POST[$metabox['id']] : false; 
                    update_post_meta($post_id, $metabox['id'], stripslashes(htmlspecialchars($value)));
            }
    }
}
?>