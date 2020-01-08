<?php
    $hideChatButton = false;
    $url = $iframe_url . '&getSupportButtonScripts=true';
    function get_data($url) {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    if ( is_callable('curl_init') ) {
        $returned_content = get_data($url);
    } else {
        $returned_content = file_get_contents($url);
    }

    $s = strpos($returned_content, 'SnapABug_Button');
    if ( $s !== false ) { $hideChatButton = true; print $returned_content; }
?>