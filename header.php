<div class="nav">
    <h2><a href="http://localhost:8080/serwis-komputerowy/index.php">Serwis KSMG</a></h2>
    <div class="menu">
        <?php
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
            for ($i = 0; $i < count($specificRoute); $i++) {
                if ($specificRoute[$i] !== $currentRoute) {
                    echo "<a href='http://localhost:8080{$specificRoute[$i]}'>{$specificName[$i]}</a>";
                }
            }
        ?>
    </div>
</div>