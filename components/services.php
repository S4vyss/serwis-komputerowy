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

    $i = 0;

    if ($request->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($request)) {
            if (isset($_SESSION['isLogged'])) {
                if ($_SESSION['isLogged']) {
                    $textService = "Send an application for that service";
                    $form = "<form action='queries/application-query.php' method='post'>
                                  <input type='hidden' name='title' value='" . htmlspecialchars($row['title']) . "'>
                                  <input class='submit-service-btn' type='submit' name='submit_button' value='Send Application' />
                             </form>";
                }
            }
            echo "
                        <tr id='contentHigher$i' class='content' onclick='toggleContent($i)'>
                          <td id='title$i' class='title'>{$row['title']}</td>
                          <td id='price$i' class='price'>Od {$row['price']} zł</td>
                        </tr>
                        <tr id='content$i' class='hidden content-hidden'>
                            <td class='service-text'>{$textService}</td>
                            <td class='submit-service'>{$form}</td>
                        </tr>
                    ";
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