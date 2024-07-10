<?php
require '../helpers/config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $author = $_POST['author'];
    $tags = $_POST['tags'];
    $read_time = $_POST['read_time'];
    $content = $_POST['content'];

    if (isset($_FILES['blog_pic']) && $_FILES['blog_pic']['error'] === UPLOAD_ERR_OK) {


        $path = $_FILES['blog_pic']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $image = 'blog_' . time() . '.' . $ext;
        $temp_image = $_FILES['blog_pic']['tmp_name'];
        $upload_dir = "../../uploads/blogs/";
        $target_image = $upload_dir . basename($image);

        if (move_uploaded_file($temp_image, $target_image)) {
            $MySqlCommand = "SELECT MAX(id) FROM blogs";
            $Result = mysqli_query($conn, $MySqlCommand);
            $MaxID = mysqli_fetch_array($Result);
            $UserID = $MaxID['0'];
            $UserID = $UserID + 1;
            $published = 1;

            $accesstoken = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!*()$";
            $accesstoken = str_shuffle($accesstoken);
            $accesstoken = substr($accesstoken, 0, 32);

            $date = date("Y-m-d H:i:s");

            $sql = "INSERT INTO blogs (id, title, image, tags, read_time, summary, content, created_at, updated_at, author, published, accesstoken ) VALUES ($UserID, '$title', '$image', '$tags', '$read_time', '$summary', '$content','$date', '$date', '$author', '$published', '$accesstoken')";
            if ($conn->query($sql) === TRUE) {
                echo 'New member added successfully. <a href="../add-blog.php"> Add another Blog</a>';
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
