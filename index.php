<?php
header('Content-Type: application/json');

# Includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';

# Imports the Google Cloud client library
use Google\Cloud\Speech\SpeechClient;

# Return array
$return = [];
$fileNameGoogleKey = "your_file_name";

# File name and full path
$fileName = date("YmdHis") . substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 3);
$fileFullPath = __DIR__ . "/resources/$fileName.flac";

# Get JSON received with parameters
try {
    $params = json_decode(file_get_contents('php://input'));
} catch(Exception $e) {
    $return['error_message'][] = $e->getMessage();
}

# Save file to folder
try {
    file_put_contents($fileFullPath, base64_decode($params->audio->content));
} catch(Exception $e) {
    $return['error_message'][] = $e->getMessage();
}

# Instantiates a client
try {
    $speech = new SpeechClient([
        'keyFilePath' => __DIR__ . "/keys/$fileNameGoogleKey.json",
        'languageCode' => 'pt-BR',
    ]);
} catch(Exception $e) {
    $return['error_message'][] = $e->getMessage();
}

# The audio file's encoding and sample rate
$options = [
    'encoding' => 'FLAC',
    'sampleRateHertz' => 44100,
];

# Detects speech in the audio file
try {
    $results = $speech->recognize(fopen($fileFullPath, 'r'), $options);
} catch(Exception $e) {
    $return['error_message'][] = $e->getMessage();
}

# Get transcripted message
try {
    foreach ($results as $result) {
        $return['transcripted_message'] = $result->alternatives()[0]['transcript'];
    }
} catch(Exception $e) {
    $return['error_message'] = $e->getMessage();
}

# Return JSON
echo json_encode($return);
