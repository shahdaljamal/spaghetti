<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Directory where files will be uploaded
    $uploadDir = 'uploads/';
    
    // Create the directory if it does not exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Handle file upload
    $uploadFile = $uploadDir . basename($_FILES['file']['name']);
    
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        // Check file type and size (optional)
        $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
        $maxFileSize = 5 * 1024 * 1024; // 5 MB
        
        if (in_array($_FILES['file']['type'], $allowedTypes) && $_FILES['file']['size'] <= $maxFileSize) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
                echo "File successfully uploaded: " . htmlspecialchars(basename($_FILES['file']['name']));
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file type or size.";
        }
    } else {
        echo "No file uploaded or error occurred.";
    }
    
    // Handle form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $menu = htmlspecialchars($_POST['menu']);
    $order = htmlspecialchars($_POST['order']);
    
    // Process and save this data to a database or file
    // For demonstration, we will display it
    echo "<h2>Order Submitted</h2>";
    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Selected Item: $menu</p>";
    echo "<p>Order Details: $order</p>";
}
?>
