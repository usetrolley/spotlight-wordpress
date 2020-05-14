<?php
// Add Scripts


function spotlight_add_scripts(){

    wp_enqueue_script('spotlight-main-script', plugins_url(). '/spotlight/js/main.js');

    $workspaceId = get_option("workspaceId");

    $js_object = array(
        'workspaceId' => $workspaceId
      );
      wp_localize_script('spotlight-main-script', 'scriptData', $js_object);

    // Add Main JS
    // wp_add_inline_script('spotlight_workspaceId', 'window.spotlightSettings.workspaceId = 1;');

}

add_action('wp_enqueue_scripts', 'spotlight_add_scripts');