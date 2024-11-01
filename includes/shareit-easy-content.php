<?php
add_filter('the_content', 'shea_add_footer');
function shea_add_footer($content)
{
    global $shea_options;

    $enable_all_share = false;
    if(isset($shea_options['enable_all_share']))
    {
        $enable_all_share = $shea_options['enable_all_share'];
    }

    $enable_facebook = false;
    if(isset($shea_options['enable_facebook']))
    {
        $enable_facebook = $shea_options['enable_facebook'];
    }

    if (is_array($shea_options) && isset($shea_options['image_url'])) {
        $image_url = $shea_options['image_url'];
    } else {
        $image_url = '';
    }

    $enable_twitter = false;
    if(isset($shea_options['enable_twitter']))
    {
        $enable_twitter = $shea_options['enable_twitter'];
    }

    if (is_array($shea_options) && isset($shea_options['twitter_image_url'])) {
        $twitter_image_url = $shea_options['twitter_image_url'];
    } else {
        $twitter_image_url = '';
    }

    $enable_linkedin = false;
    if(isset($shea_options['enable_linkedin']))
    {
        $enable_linkedin = $shea_options['enable_linkedin'];
    }

    if (is_array($shea_options) && isset($shea_options['linkedin_image_url'])) {
        $linkedin_image_url = $shea_options['linkedin_image_url'];
    } else {
        $linkedin_image_url = '';
    }

    if($enable_all_share)
    {
        // Get current page's URL 
        $sl_url = urlencode(get_permalink());
    
        // Get current page title - replace space by %20
        $sl_title = str_replace(' ', '%20', get_the_title());
        // Construct social sharing URLs
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$sl_title.'&url='.$sl_url;
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$sl_url;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$sl_url.'&title='.$sl_title;


        $footer_output = '';
        $footer_output .= '<div class="share_footer_content">';
        $footer_output .= '<span class="share_text">Share This Post: </span>';
        if(is_single() && $enable_facebook)
        {
            if($image_url != '') {
                $fbsrc = $image_url;
            } else{ 
                $fbsrc = SHEA_PLUGIN_ICON.'fb.svg';
            }
            $footer_output .= '<span class="sfc-facebook">';
            $footer_output .= '<a target="_blank" href="'.$facebookURL.'"><img class="sc-icon" width="30px" height="30px" src="'.$fbsrc.'" /></a>';
            $footer_output .= '</span>';
                     
        }
        if(is_single() && $enable_twitter)
        {
            if($twitter_image_url != '') {
                $twsrc = $twitter_image_url;
            } else{ 
                $twsrc = SHEA_PLUGIN_ICON.'tw.svg';
            }
            $footer_output .= '<span class="sfc-twitter">';
            $footer_output .= '<a target="_blank" href="'.$twitterURL.'"><img class="sc-icon" width="30px" height="30px" src="'.$twsrc.'" /></a>'; 
            $footer_output .= '</span>';       
        }
        if(is_single() && $enable_linkedin)
        {
            if($linkedin_image_url != '') {
                $insrc = $linkedin_image_url;
            } else{ 
                $insrc = SHEA_PLUGIN_ICON.'ln.svg';
            }
            $footer_output .= '<span class="sfc-linkedin">';
            $footer_output .= '<a target="_blank" href="'.$linkedInURL.'"><img class="sc-icon" width="30px" height="30px" src="'.$insrc.'" /></a>'; 
            $footer_output .= '</span>';            
        }
        $footer_output .= '</div>';

        return $content . $footer_output;
    }
    return $content;
}
?>