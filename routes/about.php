<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/global.css" />
    <link rel="stylesheet" href="../styles/about.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php include '../components/header.php' ?>

    <h1>Our Team</h1>
    <main>
        <?php
            $connection = mysqli_connect('127.0.0.1', 'root', '', 'serwis') or die;
            $query = "SELECT * FROM management";
            $request = mysqli_query($connection, $query);
            $top = 30;

            if ($request->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($request)) {
                    echo "
                        <ul class='member'>
                            <li class='li-member'>
                                <p class='name'>{$row['name']}<br><span class='position'>{$row['position']}</span></p>
                                <div class='image'>
                                    <img src={$row['url']} alt='zdjęcie' />
                                </div>
                            </li>
                        </ul>
                        <div style='position: absolute; z-index: -2; left: 15%; top: {$top}%; transform: rotate(-45deg)'>
                            <div class='yellow2 blob2'></div>
                            <div class='red2 blob2'></div>
                            <div class='green2 blob2'></div>
                        </div>
                        <div style='position: absolute; z-index: -2; right: 15%; top: {$top}%; transform: rotate(45deg)'>
                            <div class='yellow2 blob2'></div>
                            <div class='red2 blob2'></div>
                            <div class='green2 blob2'></div>
                        </div>
                    ";
                    $top = $top + 30;
                }
                $request->free_result();
            }
            $connection->close();
        ?>
    </main>
</body>
</html>
