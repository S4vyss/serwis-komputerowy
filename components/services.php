<h1>Our Services</h1>
<table class="table">
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

        if ($request->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($request)) {
                echo "
                        <tr class='content'>
                          <td class='title'>{$row['title']}</td>
                          <td class='price'>Od {$row['price']} zł</td>
                        </tr>
                    ";
            }
        }
        ?>
    </tbody>
</table>