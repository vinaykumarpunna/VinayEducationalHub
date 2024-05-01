<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded
    if (isset($_FILES["document"])) {
        $uploadDir = "uploads/"; // Specify the directory where you want to save uploaded documents
        $uploadFile = $uploadDir . basename($_FILES["document"]["name"]);

        // Check if the file is a valid document (you can customize this)
        $fileType = pathinfo($uploadFile, PATHINFO_EXTENSION);
        $allowedExtensions = array("pdf", "doc", "docx", "txt", "mp4", "jpg"); // Define allowed document extensions

        if (in_array($fileType, $allowedExtensions)) {
            if (move_uploaded_file($_FILES["document"]["tmp_name"], $uploadFile)) {
                echo "The document has been uploaded successfully.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, only PDF, DOC, DOCX, and TXT files are allowed.";
        }
    } else {
        echo "Please select a document to upload.";
    }
}
?>
