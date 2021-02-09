<?php
add_action('wp_enqueue_scripts', function () {
  wp_deregister_script('jquery');

  wp_enqueue_style('theme-css', get_template_directory_uri() . "/build/css/app.css",  false, null);

  wp_enqueue_script('theme-js', get_template_directory_uri() . "/build/js/app.js", [], null);

  wp_localize_script( 'theme-js', 'settings', array(
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
  ) );
}, 100);