<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];

    // Check if the "profileImage" file was uploaded
    if (isset($_FILES["profileImage"])) {
        $targetDirectory = "profile_images/"; // Define the directory where you want to save profile images
        $fileName = basename($_FILES["profileImage"]["name"]);
        $targetFilePath = $targetDirectory . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow only certain image file formats (e.g., jpg, jpeg, png)
        $allowedFormats = array("jpg", "jpeg", "png");
        
        if (in_array($fileType, $allowedFormats)) {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFilePath)) {
                // Save the profile data and file path in your database or process it as needed
                // Here, we are just printing the information for demonstration purposes
                echo "Profile updated successfully!";
                echo "<p>Name: $name</p>";
                echo "<p>Email: $email</p>";
                echo "<p>Mobile: $mobile</p>";
                echo "<p>Address: $address</p>";
                echo "<p>Profile Image Path: $targetFilePath</p>";
                
                // You should insert this data into your database or perform further actions as required
                
                // Redirect back to the dashboard page
                header("Location: dashboard.html");
                exit();
            } else {
                echo "Error uploading the profile image.";
            }
        } else {
            echo "Invalid file format. Please upload a valid image (jpg, jpeg, or png).";
        }
    } else {
        echo "Profile image not uploaded.";
    }
}
?>
