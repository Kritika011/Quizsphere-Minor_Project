<?php
echo json_encode(['reply' => $response]);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function chatGPT($message)
{
    $api_key = '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';
    $url = 'https://api.openai.com/v1/chat/completions';

    $data = [
        'model' => 'gpt-4',
        'messages' => [
            ['role' => 'user', 'content' => $message]
        ],
        'max_tokens' => 150
    ];

    $jsonData = json_encode($data);
    if ($jsonData === false) {
        echo 'Error in JSON encoding: ' . json_last_error_msg();
        exit;
    }
    $headers = [
        'Authorization: Bearer ' . $api_key,
        'Content-Type: application/json'
    ];

    // Initialize cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Execute cURL request
    $response = curl_exec($ch);

    // Check for cURL errors
    if ($response === false) {
        echo 'Curl error: ' . curl_error($ch);
        curl_close($ch);
        return 'Error: Unable to retrieve response.';
    }

    // Get HTTP status code
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Check if the response status is 200 (OK)
    if ($http_status !== 200) {
        echo "HTTP Error: $http_status";
        return 'Error: Unable to retrieve response.';
    }

    // Decode JSON response
    $result = json_decode($response, true);

    // Check if decoding was successful and result is as expected
    if (isset($result['choices'][0]['message']['content'])) {
        return $result['choices'][0]['message']['content'];
    } else {
        // Output raw response for debugging
        echo 'Response decoding error or unexpected response format: ' . print_r($result, true);
        return 'Error: Unable to retrieve response.';
    }
}

// Test the function
$message = "Hello, ChatGPT!";
$response = chatGPT($message);
echo "ChatGPT: " . $response;
?>
<?php
header("Content-Type: application/json");
$input = json_decode(file_get_contents("php://input"), true);
$user_message = $input['message'];
$response = chatGPT($user_message);


?>