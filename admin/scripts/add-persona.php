<?php
include_once '../helpers/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $organization = $_POST['organization'];
    $description = $_POST['description'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $temp_image = $_FILES['image']['tmp_name'];
        $upload_dir = "../../uploads/client-persona/";
        $target_image = $upload_dir . basename($image);

        if (move_uploaded_file($temp_image, $target_image)) {

            $MySqlCommand = "SELECT MAX(id) FROM personas";
            $Result = mysqli_query($conn, $MySqlCommand);
            $MaxID = mysqli_fetch_array($Result);
            $UserID = $MaxID['0'];
            $UserID = $UserID + 1;
            $Status = 1;

            $sql = "INSERT INTO personas (id, name, organization, message, image, status) VALUES ('$UserID', '$name', '$organization', '$description', '$image', '$Status')";
            if ($conn->query($sql) === TRUE) {
                echo "New member added successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "No image uploaded.";
    }
}

$conn->close();
