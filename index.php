<?php
ini_set('display_errors', 1);
// echo "<pre>";
// var_dump($_SERVER);
// echo "/pre"

// functie file wegschrijven
// functie file ophalen
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Welcome to XAMPP</title>

    <meta name="description" content="XAMPP is an easy to install Apache distribution containing MariaDB, PHP and Perl." />
    <meta name="keywords" content="xampp, apache, php, perl, mariadb, open source distribution" />

    <link href="stylsheets/normalize.css" rel="stylesheet" type="text/css" />

    <!-- <link href="../dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" /> -->
    <link href="..//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>

</head>

<body>
    <form method="post">
        <h1>Naam:</h1>
        <input type="text" name="name" id="name">

        <h1>Bericht:</h1>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>

        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $file = "guests.js";
        $currentContents = file_get_contents($file);

        $prettyJsonString = json_encode($_POST, JSON_PRETTY_PRINT);

        $currentContents .= $prettyJsonString . "\n";

        file_put_contents($file, $currentContents);

        // echo "<pre>";
        // var_dump($currentContents);
        // echo "</pre>";
    }
    ?>
  <?php
$file2 = file_get_contents("guests.js");

// Probeer de JSON-gegevens te decoderen
$jsonData = json_decode($file2, true);

if ($jsonData !== null) {
    // Zet de gegevens om naar een geformatteerde JSON-string
    $prettyJson = json_encode($jsonData, JSON_PRETTY_PRINT);

    // Geef de geformatteerde JSON-gegevens weer
    echo "<pre>";
    echo $prettyJson;
    echo "</pre>";
} else {
    echo "Fout bij het decoderen van de JSON-gegevens.";
}
?>

</body>


</html>