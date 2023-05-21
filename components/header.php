<div class="nav">
    <h2><a href="http://localhost:8080/serwis-komputerowy/index.php">Serwis KSMG</a></h2>
    <div class="menu">
        <?php
            session_start();

            $currentRoute = $_SERVER['REQUEST_URI'];
            $specificRoute = [
                '/serwis-komputerowy/routes/about.php',
                '/serwis-komputerowy/routes/contact.php',
                '/serwis-komputerowy/routes/register.php',
                '/serwis-komputerowy/routes/login.php'
            ];
            $specificName = [
                'About us',
                'Contact us',
                'Register',
                'Login'
            ];

            if (isset($_SESSION['isLogged'])) {
                if ($_SESSION['isLogged']) {
                    $specificRoute = [
                        '/serwis-komputerowy/routes/about.php',
                        '/serwis-komputerowy/routes/contact.php',
                        '/serwis-komputerowy/routes/logout.php'
                    ];
                    $specificName = [
                        'About us',
                        'Contact us',
                        'Logout'
                    ];
                }
            }

            for ($i = 0; $i < count($specificRoute); $i++) {
                if ($specificRoute[$i] !== $currentRoute) {
                    echo "<a href='http://localhost:8080{$specificRoute[$i]}'>{$specificName[$i]}</a>";
                }
            }
        ?>
    </div>
</div>