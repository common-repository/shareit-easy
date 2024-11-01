<?php
add_action('admin_menu', 'shea_options_menu_link');

// Create menu link
function shea_options_menu_link()
{
    add_options_page(
        'ShareIt Easy Options',
        'ShareIt Easy',
        'manage_options',
        'shea-options',
        'shea_options_content'
    );
}

// Create Options Page Content
function shea_options_content()
{
    // Init Options Global
    global $shea_options;

    ob_start();
    ?>
    <div class="wrap">
        <h2><?php esc_html_e('ShareIt Easy Settings', 'shea_domain');?></h2>        

        <?php 
            $enable_all_share = false;        
            if(isset($shea_options['enable_all_share'])){
                $enable_all_share = $shea_options['enable_all_share'];
            }  
            
            $enable_facebook = false;
            if(isset($shea_options['enable_facebook'])){
                $enable_facebook = $shea_options['enable_facebook'];
            }
            
            $enable_twitter = false;
            if(isset($shea_options['enable_twitter'])){
                $enable_twitter = $shea_options['enable_twitter'];
            }
            
            $enable_linkedin = false;
            if(isset($shea_options['enable_linkedin'])){
                $enable_linkedin = $shea_options['enable_linkedin'];
            } 
                   
        ?>
        <form method="post" action="options.php">
            <?php settings_fields('shea_settings_group');?>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><lable for="shea_settings[enable_all_share]"><?php esc_html_e('Enable All Share Option','shea_domain');?></lable></th>
                        <td><input name="shea_settings[enable_all_share]" type="checkbox" id="shea_settings[enable_all_share]" value="1" <?php checked('1', $enable_all_share);?> ></td>
                    </tr>
                    <tr>
                        <td  colspan="2"></td>
                    </tr>
                    <tr>
                        <th scope="row"><lable for="shea_settings[enable_facebook]"><?php esc_html_e('Facebook show in post','shea_domain');?></lable></th>
                        <td><input name="shea_settings[enable_facebook]" type="checkbox" id="shea_settings[enable_facebook]" value="1" <?php checked('1', $enable_facebook);?> ></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="shea_settings[image_url]"><?php esc_html_e('Facebook Image','shea_domain');?></label></th>
                        <td>
                            <?php 
                                $image_url = isset($shea_options['image_url']) ? $shea_options['image_url'] : '';
                            ?>
                            <input type="hidden" id="shea_settings[image_url]" name="shea_settings[image_url]" value="<?php echo esc_attr($image_url); ?>" />
                            <input type="button" id="upload_image_button" class="button" value="<?php esc_html_e('Upload Image', 'shea_domain'); ?>" />
                            <input type="button" id="delete_image_button" class="button" value="<?php esc_html_e('Delete Image', 'shea_domain'); ?>" />
                            <br />
                            <?php esc_html_e('Note:-', 'shea_domain'); ?>
                            <br />
                            <?php esc_html_e('1. If no image is uploaded, then automatically display the front side or a fixed image.', 'shea_domain'); ?>
                            <br />
                            <?php esc_html_e('2. Please upload an image with dimensions of 30 x 30 pixels.', 'shea_domain'); ?>
                            <br /><br />
                            <img id="image-preview" src="<?php echo esc_attr($image_url); ?>" style="max-width: 80px; display: <?php echo $image_url ? 'inline-block' : 'none'; ?>" />
                        </td>
                    </tr> 
                    
                    <tr>
                        <th scope="row"><lable for="shea_settings[enable_twitter]"><?php esc_html_e('Twitter show in post','shea_domain');?></lable></th>
                        <td><input name="shea_settings[enable_twitter]" type="checkbox" id="shea_settings[enable_twitter]" value="1" <?php checked('1', $enable_twitter);?> ></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="shea_settings[twitter_image_url]"><?php esc_html_e('Twitter Image','shea_domain');?></label></th>
                        <td>
                            <?php 
                                $twitter_image_url = isset($shea_options['twitter_image_url']) ? $shea_options['twitter_image_url'] : '';
                            ?>
                            <input type="hidden" id="shea_settings[twitter_image_url]" name="shea_settings[twitter_image_url]" value="<?php echo esc_attr($twitter_image_url); ?>" />
                            <input type="button" id="tw_upload_image_button" class="button" value="<?php esc_html_e('Upload Image', 'shea_domain'); ?>" />
                            <input type="button" id="tw_delete_image_button" class="button" value="<?php esc_html_e('Delete Image', 'shea_domain'); ?>" />
                            <br />
                            <?php esc_html_e('Note:-', 'shea_domain'); ?>
                            <br />
                            <?php esc_html_e('1. If no image is uploaded, then automatically display the front side or a fixed image.', 'shea_domain'); ?>
                            <br />
                            <?php esc_html_e('2. Please upload an image with dimensions of 30 x 30 pixels.', 'shea_domain'); ?>
                            <br /><br />
                            <img id="tw-image-preview" src="<?php echo esc_attr($twitter_image_url); ?>" style="max-width: 80px; display: <?php echo $twitter_image_url ? 'inline-block' : 'none'; ?>" />
                        </td>
                    </tr> 

                    <tr>
                        <th scope="row"><lable for="shea_settings[enable_linkedin]"><?php esc_html_e('Linkedin show in post','shea_domain');?></lable></th>
                        <td><input name="shea_settings[enable_linkedin]" type="checkbox" id="shea_settings[enable_linkedin]" value="1" <?php checked('1', $enable_linkedin);?> ></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="shea_settings[linkedin_image_url]"><?php esc_html_e('Linkedin Image','shea_domain');?></label></th>
                        <td>
                            <?php 
                                $linkedin_image_url = isset($shea_options['linkedin_image_url']) ? $shea_options['linkedin_image_url'] : '';
                            ?>
                            <input type="hidden" id="shea_settings[linkedin_image_url]" name="shea_settings[linkedin_image_url]" value="<?php echo esc_attr($linkedin_image_url); ?>" />
                            <input type="button" id="ln_upload_image_button" class="button" value="<?php esc_html_e('Upload Image', 'shea_domain'); ?>" />
                            <input type="button" id="ln_delete_image_button" class="button" value="<?php esc_html_e('Delete Image', 'shea_domain'); ?>" />
                            <br />
                            <?php esc_html_e('Note:-', 'shea_domain'); ?>
                            <br />
                            <?php esc_html_e('1. If no image is uploaded, then automatically display the front side or a fixed image.', 'shea_domain'); ?>
                            <br />
                            <?php esc_html_e('2. Please upload an image with dimensions of 30 x 30 pixels.', 'shea_domain'); ?>
                            <br /><br />
                            <img id="ln-image-preview" src="<?php echo esc_attr($linkedin_image_url); ?>" style="max-width: 80px; display: <?php echo $linkedin_image_url ? 'inline-block' : 'none'; ?>" />
                        </td>
                    </tr>    

                </tbody>
            </table>
            <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_html_e('Save Changes','shea_domain'); ?>"></p>
        </form>
    </div>
    <script>
        jQuery(document).ready(function($){
            $('#upload_image_button').click(function(e) {
                e.preventDefault();
                var image = wp.media({
                    title: '<?php esc_html_e("Upload Image", "shea_domain"); ?>',
                    multiple: false,
                    library: {
                        type: ['image/jpeg', 'image/png'] // Filter to only allow jpeg and png files
                    }
                }).open().on('select', function (e) {
                    var uploaded_image = image.state().get('selection').first();
                    var image_url = uploaded_image.toJSON().url;
                    $('#shea_settings\\[image_url\\]').val(image_url);
                    $('#image-preview').attr('src', image_url).show();
                });
            });

            $('#delete_image_button').click(function(e) {
                e.preventDefault();
                $('#shea_settings\\[image_url\\]').val('');
                $('#image-preview').attr('src', '').hide();
            });

            $('#tw_upload_image_button').click(function(e) {
                e.preventDefault();
                var image = wp.media({
                    title: '<?php esc_html_e("Upload Image", "shea_domain"); ?>',
                    multiple: false,
                    library: {
                        type: ['image/jpeg', 'image/png'] // Filter to only allow jpeg and png files
                    }
                }).open().on('select', function (e) {
                    var uploaded_image = image.state().get('selection').first();
                    var twitter_image_url = uploaded_image.toJSON().url;
                    $('#shea_settings\\[twitter_image_url\\]').val(twitter_image_url);
                    $('#tw-image-preview').attr('src', twitter_image_url).show();
                });
            });

            $('#tw_delete_image_button').click(function(e) {
                e.preventDefault();
                $('#shea_settings\\[twitter_image_url\\]').val('');
                $('#tw-image-preview').attr('src', '').hide();
            });

            $('#ln_upload_image_button').click(function(e) {
                e.preventDefault();
                var image = wp.media({
                    title: '<?php esc_html_e("Upload Image", "shea_domain"); ?>',
                    multiple: false,
                    library: {
                        type: ['image/jpeg', 'image/png'] // Filter to only allow jpeg and png files
                    }
                }).open().on('select', function (e) {
                    var uploaded_image = image.state().get('selection').first();
                    var linkedin_image_url = uploaded_image.toJSON().url;
                    $('#shea_settings\\[linkedin_image_url\\]').val(linkedin_image_url);
                    $('#ln-image-preview').attr('src', linkedin_image_url).show();
                });
            });

            $('#ln_delete_image_button').click(function(e) {
                e.preventDefault();
                $('#shea_settings\\[linkedin_image_url\\]').val('');
                $('#ln-image-preview').attr('src', '').hide();
            });

        });
    </script>
    <?php
    echo ob_get_clean();
}

// Register Settings
add_action('admin_init', 'shea_settings_settings');
function shea_settings_settings()
{
    register_setting('shea_settings_group', 'shea_settings');
}

function shea_enqueue_media_uploader() {
    // Enqueue media scripts
    wp_enqueue_media();
}

add_action('admin_enqueue_scripts', 'shea_enqueue_media_uploader');

?>