<?php
    session_start();
    if (isset($_POST['comment'])) {
        $rating = $_POST['rating3'];
        $comment = $_POST['comment'];
        $userId = $_SESSION['userId'];

        $connection = mysqli_connect('127.0.0.1', 'root', '', 'serwis') or die;
        $query5 = "INSERT INTO `reviews` VALUES (NULL, '$userId', '$comment', '$rating')";
        $request = mysqli_query($connection, $query5);

        if ($request) {
            echo "<script>
                             window.location.href = '../index.php#review';
                          </script>";
        }
        $connection->close();
    }
?>
