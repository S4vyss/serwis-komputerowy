<h1>Our Services</h1>
<table id="table" class="table">
    <thead>
        <tr>
            <th style="text-align: left; padding-left: 1rem">Service</th>
            <th style="text-align: left; padding-left: 1rem">Price</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $connection = mysqli_connect('127.0.0.1', 'root', '', 'serwis') or die;
        $query = "SELECT * FROM services";
        $request = mysqli_query($connection, $query);

        $textService = "You need to be logged to create an application";
        $form = null;

        if (isset($_SESSION['isLogged'])) {
            if ($_SESSION['isLogged']) {
                $textService = "Send an application for that service";
                $form = "<td class='submit-service'>
                                <form action='index.php#table' method='post'>
                                    <input class='submit-service-btn' type='submit' name='submit_button' value='Send Application' />
                                </form>
                            </td>";
            }
        }

        $i = 0;

        if ($request->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($request)) {
                echo "
                        <tr id='contentHigher$i' class='content' onclick='toggleContent($i)'>
                          <td id='title$i' class='title'>{$row['title']}</td>
                          <td id='price$i' class='price'>Od {$row['price']} zł</td>
                        </tr>
                        <tr id='content$i' class='hidden content-hidden'>
                            <td class='service-text'>{$textService}</td>
                            <td>{$form}</td>
                        </tr>
                    ";
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['submit_button'])) {
                        $title = $row['title'];
                        $userId = $_SESSION['userId'];

                        $queryApplication = "INSERT INTO applications VALUES (NULL, '$title', '$userId')";
                        mysqli_query($connection, $queryApplication);
                    }
                }
                $i++;
            }
        }
        $connection->close();
        ?>
    </tbody>
</table>
<script>
    function toggleContent(index) {
        console.log(index);
        var content = document.getElementById("content" + index);
        const title = document.getElementById('title' + index);
        const contentHigher = document.getElementById('contentHigher' + index);
        const price = document.getElementById('price' + index);

        content.classList.toggle("hidden");
        if (content.classList.contains("hidden")) {
            content.style.height = 0;
            contentHigher.style.background = "transparent";
            price.style.color = "black";
        } else {
            content.style.height = content.scrollHeight + "px";
            contentHigher.style.background = "#EEFBFF";
            price.style.color = "var(--light-blue)";
        }
        title.classList.toggle("rotate");
    }
</script>