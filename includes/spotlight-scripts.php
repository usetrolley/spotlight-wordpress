<?php
// Add Scripts


function spotlight_add_scripts(){

    // Add Main JS
    wp_enqueue_script('spotlight-main-script', plugins_url('/../js/main.js',__FILE__));

    $workspaceId = get_option("workspaceId");

    $js_object = array(
        'workspaceId' => $workspaceId
      );
      wp_localize_script('spotlight-main-script', 'scriptData', $js_object);
}

add_action('wp_enqueue_scripts', 'spotlight_add_scripts');