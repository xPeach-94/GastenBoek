<?php
// ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $message = $_POST["message"];

    if (!empty($name) && !empty($message)) {
        writeFile($name, $message);
    } else {
        echo "Please enter both name and message.";
    }
}

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

    if (!empty($currentMessageArray)) {
        $newArr = array_merge($messageArray, $currentMessageArray);
    } else {
        $newArr = $messageArray;
    }

    $jsonMessages = json_encode($newArr, JSON_PRETTY_PRINT);

    file_put_contents('guests.txt', $jsonMessages);
}

function readFileJson()
{
    $messagesString = file_get_contents("guests.txt");
    $messageArr = json_decode($messagesString, true);

    return $messageArr;
}

function showMessage($index, $isName, $isMessage)
{
    $messageArr = readFileJson();
    $currentMessage = $messageArr[$index];
    if ($isName) {
        return $currentMessage["name"];
    } elseif ($isMessage) {
        return $currentMessage["message"];
    }
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

    <!-- This will load in the styling -->
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->

    <!-- The Favicon code -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- <link href="../dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" /> -->
    <link href="..//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>

</head>

<body>
    <div class="container">
        <header>
            <h1>gastenboek</h1>
        </header>
        <div class="divider"></div>
        <div class="main-content">
            <div class="message-form">
                <h2>Schrijf hier uw naam en bericht</h2>
                <form action="" method="POST">
                    <div class="form-group mt-3">
                        <input class="form-control form-control-lg" type="text" name="name" value="" placeholder="Naam:">
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control form-control-lg" name="message"></textarea>
                        <div class="form-text">
                            <h5>Het bericht mag maar maximaal 500 characters bevatten.</h5>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit" name="add">Toevoegen</button>
                </form>
            </div>
            <div class="divider"></div>
            <div class="message-grid">
                <div class="latest-message">
                    <h3>Meest recente bericht</h3>
                    <div class="message-box">

                        <h4><?= showMessage(0, true, false); ?></h4>
                        <p><?= showMessage(0, false, true);?></p>

                    </div>

                </div>
                <div>
                    <h3 style="margin-top: 50px">Oudere berichten</h3>
                    <div class="flex">
                        
                        <?php
                        $messageArr = readFileJson();

                        for ($i = 1; $i < count($messageArr); $i++) {
                            echo "<div class='message-box'>";

                            echo "<h4>";
                            echo showMessage($i, true, false);
                            echo "</h4>";

                            echo "<p>";
                            echo showMessage($i, false, true);
                            echo "</p>";

                            echo "</div>";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>