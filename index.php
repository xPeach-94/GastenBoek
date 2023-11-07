<?php
ini_set('display_errors', 1);

// functie file wegschrijven
// functie file ophalen
// functie verwijderen

$messageArr = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $message = $_POST["message"];

    if (!empty($name) && !empty($message)) {
        writeFile($name, $message);
    } else {
        echo "Please enter both name and message.";
    }
}

// echo "<pre>";
// var_dump(file_get_contents("guests.txt"));
// echo "</pre>";

class Message
{
    private $name;
    private $message;

    public function __construct($name, $message)
    {
        $this->setName($name);
        $this->setMessage($message);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}

function writeFile($name, $message)
{
    $jsonCurrentMessages = file_get_contents('guests.txt');
    $currentMessageArray = json_decode($jsonCurrentMessages, true);

    $newMessage = new Message($name, $message);
    $messages[] = $newMessage;

    $messageArray = array();

    foreach ($messages as $msg) {
        $messageArray[] = array(
            'name' => $msg->getName(),
            'message' => $msg->getMessage()
        );
    }

    $newArr = array_merge($currentMessageArray, $messageArray);

    $jsonMessages = json_encode($newArr, JSON_PRETTY_PRINT);

    file_put_contents('guests.txt', $jsonMessages);

    // echo "<pre>";
    // var_dump($currentMessageArray, $messageArray);
    // echo "</pre>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Gastenboek</title>

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
</body>


</html>