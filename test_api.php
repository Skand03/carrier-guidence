<?php
$apiKey = 'AIzaSyDJAfJpPDVNQwOdLFijSr5GgSAIlSsEuUQ';
$data = [
    "contents" => [[
        "parts" => [[
            "text" => "Hello"
        ]]
    ]]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=$apiKey");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo "CURL ERROR: " . curl_error($ch);
} else {
    $json = json_decode($response, true);
    if(isset($json['error'])) {
        echo "API ERROR: " . $json['error']['message'];
    } else {
        echo "SUCCESS: API Key is working fine. Output: " . $json['candidates'][0]['content']['parts'][0]['text'];
    }
}
curl_close($ch);
?>
