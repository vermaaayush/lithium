<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the raw POST data
    $rawPostData = file_get_contents('php://input');

    // Decode the JSON data into a PHP associative array
    $postDataArray = json_decode($rawPostData, true);

    // Extract the specific fields
    $id = $postDataArray['id'] ?? '';
    $url = $postDataArray['url'] ?? '';
    $status = $postDataArray['status'] ?? '';
    $price = $postDataArray['price'] ?? '';
    $btcPaid = $postDataArray['btcPaid'] ?? '';
    $btcDue = $postDataArray['btcDue'] ?? '';
    $userId = $_GET['user_id'] ?? '';
    // Create a new array with the extracted fields
    $extractedData = [
        'id' => $id,
        'url' => $url,
        'status' => $status,
        'price' => $price,
        'btcPaid' => $btcPaid,
        'btcDue' => $btcDue,
        'userId'=>$userId,
    ];


$queryString = http_build_query($extractedData);
$baseUrl = 'https://admin.lithium-crypto.com/ipn';
$redirectUrl = $baseUrl . '?' . $queryString;

header('Location: ' . $redirectUrl);

} else {
    // Print an error message if the request method is not POST
    echo "Error: Only POST requests are allowed.";
}
?>


