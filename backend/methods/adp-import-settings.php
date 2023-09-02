<?php 
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

?>

<div class="adp-display-page">
    <div class="adp_customheader">
        <h2><?php _e('Add Dummy Blog Posts', 'adp'); ?></h2>
    </div>

    <form method='post' action =''>
        <div class="adp_wrapper">
            <div class='adp_userInputForm'>
                <div class="adp_get_number_of_post">
                    <label for="blog_number" class="blog_number_label"><?php _e('Enter the number of posts you want to add:', 'adp'); ?> </label>
                    <input type="number" class="blog_number" name="blog_number" max="50">
                </div>
                <div>
                    <input class="button-primary" type='submit' name='adp_submit' value='Add'>
                </div>
            </div>
        </div>
    </form>
</div>
