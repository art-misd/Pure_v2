<?php
// Retrieve the JSON data sent in the request body
$json_data = file_get_contents('php://input');

// Check if JSON data is received
if(!empty($json_data)) {
    // Decode the JSON data into a PHP associative array
    $data = json_decode($json_data, true);

    // Define the file path where you want to save the data
    $file_path = '/etc/raat.conf';

    // Encode the data back to JSON format
    $json_encoded_data = json_encode($data, JSON_PRETTY_PRINT);

    // Save the JSON data to a file
    file_put_contents($file_path, $json_encoded_data);

    // Optionally, you can also append data to an existing file
    // file_put_contents($file_path, $json_encoded_data, FILE_APPEND);

    // Check if the data is successfully saved or not
    if(file_exists($file_path)) {
        echo "Data saved to file successfully.";
    } else {
        echo "Failed to save data to file.";
    }
} else {
    echo "No JSON data received.";
}
?>
