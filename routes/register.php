<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/global.css" />
    <link rel="stylesheet" href="../styles/register.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php include '../header.php' ?>
    <div style="margin-bottom: 4em; flex-direction: column; justify-content: center" class="hero">
        <div class="container">
            <h2>Create User</h2>
            <form method="POST" action="register.php">
                <label for="username">Username:</label>
                <input type="text" name="username" required><br><br>

                <label for="email">Email:</label>
                <input type="email" name="email" required><br><br>

                <label for="password">Password:</label>
                <input type="password" name="password" required><br><br>

                <input type="submit" value="Create User">
            </form>
        </div>
    </div>
    <?php
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $connection = mysqli_connect('127.0.0.1', 'root', '', 'serwis');
            $query = "INSERT INTO user VALUES (NULL, '$username', '$email', '$password')";
            $request = mysqli_query($connection, $query);

            if ($request) {
                echo "<script>alert('Użytkownik zarejestrowany')</script>";
            }
        }
    ?>

</body>
</html>
