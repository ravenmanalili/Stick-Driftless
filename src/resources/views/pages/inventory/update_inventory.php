<?php
include('../../db_connection.php');

// Initialize response
$response = [
    'success' => false,
    'message' => 'Unknown error'
];

// Check if required fields are set
if (
    isset($_POST['gamepad_id']) && 
    isset($_POST['updateControllerName']) && 
    isset($_POST['updateControllerPlatform']) && 
    isset($_POST['updateControllerPrice'])
) {
    $gamepad_id = mysqli_real_escape_string($connection, $_POST['gamepad_id']);
    $name = mysqli_real_escape_string($connection, $_POST['updateControllerName']);
    $platform = mysqli_real_escape_string($connection, $_POST['updateControllerPlatform']);
    $price = mysqli_real_escape_string($connection, $_POST['updateControllerPrice']);

    // Prepare the update query
    $query = "UPDATE gamepad 
              SET gamepad_name = '$name', 
                  platform = '$platform', 
                  price = '$price' 
              WHERE gamepad_id = '$gamepad_id'";

    // Execute the query
    if (mysqli_query($connection, $query)) {
        $response['success'] = true;
        $response['message'] = 'Gamepad updated successfully';
    } else {
        $response['message'] = 'Failed to update gamepad: ' . mysqli_error($connection);
    }
} else {
    $response['message'] = 'Missing required fields';
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);

mysqli_close($connection);