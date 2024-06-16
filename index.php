
<?php
function isUrlOpenable($url) {
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_NOBODY, true);  // We don't need the body
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);   // Timeout after 10 seconds

    // Execute the request
    curl_exec($ch);
    
    // Check if any error occurred
    if (curl_errno($ch)) {
        return false;
    }

    // Get the HTTP response status code
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close cURL resource
    curl_close($ch);

    // Check if the status code is 200 (OK)
    return $httpCode == 200;
}

$url = "www.hivclinicaljobaids.com";
if (isUrlOpenable($url)) {
    echo "URL is openable.----";
} else {
    echo "URL is not openable.----";
}
?>

