<?php

add_action('admin_init', 'ozh_sampleoptions_init' );
function ozh_sampleoptions_init(){
    register_setting( 'ozh_sampleoptions_options', 'ozh_sample' );
}

// Draw the menu page itself
function ozh_sampleoptions_do_page() {
    ?>
    <div class="wrap">
        <h2>Ozh's Sample Options</h2>
        <form method="post" action="options.php">
            <?php settings_fields('ozh_sampleoptions_options'); ?>
            <?php $options = get_option('ozh_sample'); ?>
            <table class="form-table">
                <tr valign="top"><th scope="row">A Checkbox</th>
                    <td><input name="ozh_sample[option1]" type="checkbox" value="1" <?php checked('1', $options&#91;'option1'&#93;); ?> /></td>
                </tr>
                <tr valign="top"><th scope="row">Some text</th>
                    <td><input type="text" name="ozh_sample[sometext]" value="<?php echo $options&#91;'sometext'&#93;; ?>" /></td>
                </tr>
            </table>
            <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            </p>
        </form>
    </div>
    <?php  
}