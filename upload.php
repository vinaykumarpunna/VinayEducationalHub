<?php
session_start();

// Redirect to index.html if user tries to access upload.php directly
if (empty($_SERVER['HTTP_REFERER'])) {
    header("Location: index.html");
    exit();
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded
    if (isset($_FILES["document"])) {
        $uploadDir = "uploads/"; // Specify the directory where you want to save uploaded documents
        $uploadFile = $uploadDir . basename($_FILES["document"]["name"]);

        // Check if the file is a valid document (you can customize this)
        $fileExtension = pathinfo($uploadFile, PATHINFO_EXTENSION);
        $allowedExtensions = array("pdf", "doc", "docx", "txt", "mp4", "jpg", "jpeg"); // Define allowed document extensions

        if (in_array(strtolower($fileExtension), $allowedExtensions)) {
            if (move_uploaded_file($_FILES["document"]["tmp_name"], $uploadFile)) {
                $_SESSION['upload_message'] = "The document has been uploaded successfully.";
            } else {
                $_SESSION['upload_message'] = "Sorry, there was an error uploading your file.";
            }
        } else {
            $_SESSION['upload_message'] = "Sorry, only PDF, DOC, DOCX, and TXT files are allowed.";
        }
    } else {
        $_SESSION['upload_message'] = "Please select a document to upload.";
    }

    // Redirect to upload.php to display the message
    header("Location: upload.php");
    exit();
}

// Clear the upload message after displaying it
$uploadMessage = isset($_SESSION['upload_message']) ? $_SESSION['upload_message'] : "";
unset($_SESSION['upload_message']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Status</title>
</head>
<body>
    <h1>Upload Status</h1>
    <?php if (!empty($uploadMessage)) : ?>
        <p><?php echo $uploadMessage; ?></p>
    <?php endif; ?>
    <p><a href="careers.html">Back to Careers</a></p>
</body>
</html>
