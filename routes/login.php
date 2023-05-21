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
    <?php include '../components/header.php' ?>
    <div style="margin-bottom: 4em; flex-direction: column; justify-content: center" class="hero">
        <div class="container login">
            <h2>Login</h2>
            <form method="POST" action="login.php">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <input type="submit" class="submit" value="Login">
            </form>
        </div>
    </div>
    <?php
        if (isset($_POST['email'])) {
            $_email = $_POST['email'];
            $_password = $_POST['password'];

            $connection = mysqli_connect('127.0.0.1', 'root', '', 'serwis') or die;
            $query = "SELECT * FROM user WHERE email=\"" . $_email . "\";";
            $request = mysqli_query($connection, $query);

            if ($request->num_rows > 0) {
                $row = mysqli_fetch_assoc($request);

                if (password_verify($_password, $row['password'])) {
                    $_SESSION['email'] = $_email;
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['isLogged'] = true;

                    echo "User logged";

                    header('location: ../index.php');
                }
                $request->free_result();
            }
            $connection->close();
        }
    ?>
</body>
</html>