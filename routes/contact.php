<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/global.css" />
    <link rel="stylesheet" href="../styles/contact.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body class="contact" style="overflow: hidden">
    <?php include '../header.php' ?>
    <h1>Contact Us</h1>
    <main class="container-contact">
        <article class="contact-info">
            <div class="left-contact">
                <h2>Contact Information</h2>
                <p>Fill up the form and our Team will get back to you within 24 hours</p>
                <div class="icons">
                    <div>
                        <div class="icon">
                            <img width="16" src="../assets/phone.svg" alt="telefon" />
                            <p>(+48) 323 212 432</p>
                        </div>
                        <div class="icon" style="margin-top: 2em">
                            <img width="16" src="../assets/mail.svg" alt="mail" />
                            <p>contact@gmail.com</p>
                        </div>
                        <div class="icon" style="margin-top: 2em">
                            <img width="16" src="../assets/location.svg" alt="mail" />
                            <p>Burger Av. 101 ST.</p>
                        </div>
                    </div>
                    <div class="links">
                        <a href="https://github.com/S4vyss" target="_blank">
                            <img src="../assets/github.svg" width="26" alt="link" />
                        </a>
                        <a href="#">
                            <img src="../assets/twitter.svg" width="26" alt="link" />
                        </a>
                        <a href="#">
                            <img src="../assets/linked.svg" width="24" alt="link" />
                        </a>
                        <a href="#">
                            <img src="../assets/fb.svg" width="16" alt="link" />
                        </a>
                    </div>
                </div>
                <div class="small-circle">

                </div>
                <div class="big-circle">

                </div>
            </div>
        </article>
        <form class="form-contact" action="contact.php" method="post">
            <div class="field">
                <div class="input-div">
                    <label id="name" for="name" class="form__label">Name</label>
                    <input autocomplete="off" type="text" class="form__field" name="name" id='input-name' required />
                </div>
                <div class="input-div">
                    <label id="surname" for="surname" class="form__label">Surname</label>
                    <input autocomplete="off" id="input-surname" type="text" class="form__field" name="surname" required />
                </div>
            </div>
            <div class="field-email">
                <div class="input-div">
                    <label id="email" for="email" class="form__label">Email</label>
                    <input autocomplete="off" type="text" class="form__field" name="email" id='email' required />
                </div>
            </div>
            <div class="field-email">
                <div class="input-text">
                    <label id="message" for="message" class="form__label">Message</label>
                    <textarea autocomplete="off" class="form__field" name="message" id='message' required></textarea>
                </div>
            </div>
            <div class="submit">
                <input class="submit-btn" type="submit" value="Send Message" />
            </div>
        </form>
        <?php
            $top = 30;
            echo "
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
        ?>
    </main>
    <?php
        if (isset($_POST['name'])) {
            $name = $_POST['name']." ".$_POST['surname'];
            $description = $_POST['message'];
            $email = $_POST['email'];

            $connection = mysqli_connect('127.0.0.1', 'root', '', 'serwis') or die;
            $query = "INSERT INTO contact VALUES (NULL, '$name', '$description', '$email')";
            $request = mysqli_query($connection, $query);

            if ($request) {
                echo "<script>
                         alert('Wiadomość wysłana');
                         window.location.href = 'http://localhost:8080/serwis-komputerowy/index.php';
                      </script>";
            }
            $connection->close();
        }
    ?>
</body>
</html>
