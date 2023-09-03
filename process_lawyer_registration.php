<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define a function to sanitize user input
    function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Retrieve form data and sanitize it
    $name = sanitizeInput($_POST["name"]);
    $address = sanitizeInput($_POST["address"]);
    $registrationNumber = sanitizeInput($_POST["registration_number"]);
    $phone = sanitizeInput($_POST["phone"]);
    $specialty = sanitizeInput($_POST["specialty"]);
    $fee = sanitizeInput($_POST["fee"]);

    // Handle file upload (photo)
    $targetDir = "uploads/"; // Directory to store uploaded files
    $targetFile = $targetDir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is a valid image
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check if the file already exists
    if (file_exists($targetFile)) {
        $uploadOk = 0;
    }

    // Check file size (you can adjust this)
    if ($_FILES["photo"]["size"] > 500000) {
        $uploadOk = 0;
    }

    // Allow only JPG format (you can add more formats)
    if ($imageFileType != "jpg") {
        $uploadOk = 0;
    }

    // If all checks pass, move the file to the target directory
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, your file was not uploaded. Please make sure it's a valid JPG image with a size less than 500KB.";
    }

    // Now you can process and store the other form data (e.g., in a database)
    // Replace this part with your database handling code

    // Example: Store data in a text file (not recommended for production)
    $data = "Name: $name\nAddress: $address\nRegistration Number: $registrationNumber\nPhone: $phone\nSpecialty: $specialty\nFee: $fee\n";
    file_put_contents("lawyer_data.txt", $data, FILE_APPEND);

    // Redirect to a thank you page or display a success message
    header("Location: thank_you.html");
} else {
    // Redirect to an error page or display an error message
    echo "Error: Invalid request.";
}
?>
