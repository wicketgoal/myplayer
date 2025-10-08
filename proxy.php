<?php
if (!isset($_GET['url'])) {
    http_response_code(400);
    echo "Missing URL parameter.";
    exit;
}

$url = $_GET['url'];
if (!preg_match('/^https?:\/\/.*\.(m3u8|ts)(\?.*)?$/', $url)) {
    http_response_code(403);
    echo "Invalid or restricted file type.";
    exit;
}

$opts = [
    "http" => [
        "header" => "User-Agent: Mozilla/5.0\r\n"
    ]
];
$context = stream_context_create($opts);

$stream = @fopen($url, 'r', false, $context);
if (!$stream) {
    http_response_code(502);
    echo "Failed to load stream.";
    exit;
}

header("Content-Type: application/vnd.apple.mpegurl");
header("Access-Control-Allow-Origin: *");

fpassthru($stream);
fclose($stream);
?>
