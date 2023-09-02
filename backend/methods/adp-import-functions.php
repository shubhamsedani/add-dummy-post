<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Check if user form is submitted and start the import process
if (isset($_POST['adp_submit']) && !empty($_POST['blog_number'])) {
    // Check if user is logged in, if yes, then only add new posts
    function adp_login_function()
    {
        if (is_user_logged_in() == true) {
            try {
                // Sanitize and escape input
                $number_of_post = intval(sanitize_text_field($_POST['blog_number']));

                // Generate dummy content and title
                abstract class adp_lorem
                {
                    public static function title($nparagraphs)
                    {
                        // ... (existing code for generating titles)
                    }

                    public static function para($nparagraphs)
                    {
                        // ... (existing code for generating paragraphs)
                    }

                    // ... (existing code for utility functions)
                }

                // Add new dummy posts to the WordPress posts
                if (is_numeric($number_of_post) && $number_of_post < 51) {
                    $blog_data = array();

                    for ($i = 0; $i < $number_of_post; $i++) {
                        $title = adp_lorem::title(1);
                        $para = adp_lorem::para(5);

                        if (!empty($title)) {
                            // Sanitize and escape post title
                            $blog_args['post_title'] = sanitize_text_field($title);
                        }

                        if (!empty($para)) {
                            // Sanitize and escape post content
                            $blog_args['post_content'] = wp_kses_post($para);
                            $blog_args['post_status'] = 'publish';
                            $blog_args['post_author'] = '1';
                        }

                        try {
                            $post_id = wp_insert_post($blog_args);
                        } catch (\Throwable $th) {
                            _e('There is a problem while inserting the posts', 'adp');
                        }
                    }
                } else {
                    // Handle the case when the number is greater than or equal to 51
                    // $_SESSION['bigger_number'] = "The number is bigger than 50!";
                }
            } catch (\Throwable $th) {
                _e('There is a problem in the input of data', 'adp');
            }
        }
    }

    add_action('init', 'adp_login_function');
}
