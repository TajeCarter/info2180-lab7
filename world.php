<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';

$country = $_GET['country'];
$all = $_GET['all'];
$format = $_POST['format'];

// $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// $stmt = $conn->query("SELECT * FROM countries");
// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($all == "true")
{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $stmt = $conn->query("SELECT * FROM countries");
}
else{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}
while ($results = $stmt->fetchAll(PDO::FETCH_ASSOC)){
    if ($FORMAT == "xml") {
        header("Content-type: text/xml");
        print "<?xml version='1.0' encoding='UTF-8'?>";
        print "<countrydata>";
        print "<country>";
        print "<name>" . $row['name'] . "</name>";
        print "<ruler>" . $row['head_of_state'] . "</ruler>";
        print "</country>";
        print "</countrydata>";
    } else { 
        echo '<ul>';
        foreach ($results as $row) {
          echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
        }
        echo '</ul>';
    }
}
?>
