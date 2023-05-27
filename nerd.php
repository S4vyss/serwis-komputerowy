<h1>Statystyki dla nerdów</h1>
<a href="index.php">
    Come Back
</a>
<br>
<?php
    $connection = new mysqli('127.0.0.1', 'root', '', 'serwis') or die;

    $queries = [
        "SELECT * FROM applications LIMIT 5;",
        "SELECT * FROM management WHERE position = 'CEO';",
        "SELECT * FROM reviews WHERE rating >= 4;",
        "SELECT * FROM services WHERE price <= 100;",
        "SELECT * FROM contact;",
        "SELECT * FROM user WHERE email = 'okuaaatak@gmail.com';",
        "SELECT * FROM user;",
        "SELECT * FROM applications WHERE needed_service = 'Sample';",
        "SELECT * FROM reviews WHERE rating > 3;",
        "SELECT * FROM supplier WHERE location = 'Stołeczna Warszawa';",
        "SELECT * FROM supplier WHERE phone = 233201232;",
        "SELECT * FROM services WHERE title = 'kolejny';"
    ];

    $resultSets = [];
    foreach ($queries as $query) {
        if ($result = $connection->query($query)) {
            $resultSets[] = $result;
        }
    }

    foreach ($resultSets as $index => $resultSet) {
        $explanation = getQueryExplanation($index + 1);
        echo "<h2>Query " . ($index + 1) . ": $explanation</h2>";
        echo "<br>";

        if ($resultSet->num_rows > 0) {
            while ($row = $resultSet->fetch_assoc()) {
                foreach ($row as $column => $value) {
                    echo $column . ': ' . $value . '<br>';
                }
                echo '<br>';
            }
        } else {
            echo "No results found.";
        }

        $resultSet->free();
    }

    $connection->close();

    function getQueryExplanation($queryNumber) {
        $explanations = [
            "Retrieve a limited number of applications.",
            "Retrieve management records for the position of CEO.",
            "Retrieve reviews with a rating of 4 or higher.",
            "Retrieve services with a price of 100 or lower.",
            "Retrieve contact records.",
            "Retrieve user based on email 'okuaaatak@gmail.com'.",
            "Retrieve all users.",
            "Retrieve applications with a needed service of 'Sample'.",
            "Retrieve reviews with a rating greater than 3.",
            "Retrieve suppliers located in 'Stołeczna Warszawa'.",
            "Retrieve suppliers with a phone number of 233201232.",
            "Retrieve services with the title 'kolejny'."
        ];

        if (isset($explanations[$queryNumber - 1])) {
            return $explanations[$queryNumber - 1];
        } else {
            return "Explanation not available.";
        }
    }
?>