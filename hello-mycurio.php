<?php
/**
 * Hello MyCurio Plugin is the sample WordPress plugin for beginners.
 * Take this as a base plugin and modify it as per your need.
 *
 * @wordpress-plugin
 * Plugin Name: Hello MyCurio
 * Description: Hello MyCurio Plugin is the sample WordPress plugin for beginner.
 * Contributors: MyCurio
 * Author: MyCurio
 * Version: 1.0
 * Text Domain: hello-mycurio
 * Plugin URI: https://mycurio.info/
 * Author URI: https://mycurio.info/
 */

/**
 * Register a custom menu page.
 */
function mycurio_my_custom_menu_page(){
    add_menu_page( 
        __( 'Hello MyCurio', 'hello-mycurio' ),
        'Hello Mycurio',
        'manage_options',
        'mycurio',
        'mycurio_custom_menu_page',
        plugins_url( 'hello-mycurio/images/icon.png' ),
        6
    ); 
}
add_action( 'admin_menu', 'mycurio_my_custom_menu_page' );

/**
 * Settings page.
 */
function mycurio_custom_menu_page()
{
?>
<div class="wrap">
	<h1>Hello MyCurio Plugin</h1>
    <?php settings_errors(); ?>
	<form method="post" action="options.php">
        <?php
        settings_fields("hello_mycurio_settings");
        do_settings_sections("hello-mycurio");
        submit_button("Save Settings");
        ?>
    </form>
</div> 
<?php
}

/**
 * Add a settings.
 */
function hello_mycurio_settings() {
	add_settings_section("hello_mycurio_settings", "", null, "hello-mycurio");
	add_settings_field("hello-mycurio-text", "Add some text", "hello_mycurio_options", "hello-mycurio", "hello_mycurio_settings");
	register_setting("hello_mycurio_settings", "hello-mycurio-text");
}
add_action("admin_init", "hello_mycurio_settings");

/**
 * Set a options.
 */
function hello_mycurio_options() {
?>
    <div>
        <input type="text" name="hello-mycurio-text" value="<?php echo esc_attr(get_option('hello-mycurio-text')); ?>" />
    </div>
<?php
}