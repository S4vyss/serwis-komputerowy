<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/global.css" />
    <link rel="stylesheet" href="styles/oferty.css" />
    <link rel="stylesheet" href="styles/suppliers.css" />
    <link rel="stylesheet" href="styles/services.css" />
    <link rel="stylesheet" href="styles/reviews.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php include './components/header.php' ?>
    <div class="hero">
        <div class="hero-text">
            <h1>Najlepszy Serwis Komputerowy</h1>
            <p>Sprawdź naszą ofertę</p>
            <div class="buttons">
                <?php
                    if (isset($_SESSION['isLogged'])) {
                        if ($_SESSION['isLogged']) {
                            echo '<a href="#" onclick="logged();" class="button primary">Get Started <span>&gt;</span></a>';
                        }
                    } else {
                        echo '<a href="http://localhost:8080/serwis-komputerowy/routes/login.php" class="button primary">Get Started <span>&gt;</span></a>';
                    }
                ?>
            </div>
        </div>
        <div class="blob-cont">
            <div class="yellow blob"></div>
            <div class="red blob"></div>
            <div class="green blob"></div>
        </div>
    </div>
    <?php include './components/oferty.html' ?>
    <br><br>
    <?php include './components/suppliers.php' ?>
    <br><br>
    <?php include './components/services.php' ?>
    <br><br>
    <?php include './components/reviews.php' ?>
    <svg>
        <filter id='noiseFilter'>
            <feTurbulence
                type='fractalNoise'
                baseFrequency='0.6'
                stitchTiles='stitch'/>
            <feColorMatrix in="colorNoise" type="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 1 0" />
            <feComposite operator="in" in2="SourceGraphic" result="monoNoise"/>
            <feBlend in="SourceGraphic" in2="monoNoise" mode="screen" />
        </filter>
    </svg>
    <div style="position: absolute; z-index: -2; left: 15%; top: 30%; transform: rotate(-45deg)">
        <div class="yellow2 blob2"></div>
        <div class="red2 blob2"></div>
        <div class="green2 blob2"></div>
    </div>

    <script>
        function logged() {
            return alert("You are logged already");
        }
    </script>
</body>
</html>
