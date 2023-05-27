<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['submit_button'])) {
            $title = $_POST['title'];
            $userId = $_SESSION['userId'];

            $connection = mysqli_connect('127.0.0.1', 'root', '', 'serwis') or die;
            $queryApplication = "INSERT INTO applications VALUES (NULL, '$title', '$userId')";
            mysqli_query($connection, $queryApplication);

            if ($queryApplication) {
                echo "<script>
                             window.location.href = '../index.php#suppliers';
                          </script>";
            }
        }
        $connection->close();
    }
?>
