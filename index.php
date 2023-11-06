<?php
ini_set('display_errors', 1);
// echo "<pre>";
// var_dump($_SERVER);
// echo "/pre"

// functie file wegschrijven
// functie file ophalen

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $file = "js/guests.js";
    //     $currentContents = file_get_contents($file);

    //     $prettyJsonString = json_encode($_POST, JSON_PRETTY_PRINT);

    //     $currentContents .= $prettyJsonString . "\n";

    //     file_put_contents($file, $currentContents);  
    //     }
        

        // echo "<pre>";
        // var_dump($currentContents);
        // echo "</pre>";
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
                            <input class="form-control form-control-lg" type="text" name="name" value="{name}" placeholder="Naam:">
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control form-control-lg" name="message">{message}</textarea>
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
                        <h3>Het laatst geplaatste bericht</h3>
                        <div class="message-box">
                            <h4>Dominick</h4>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi perspiciatis magni hic aperiam animi cum sunt amet eveniet 
                                quidem a, reprehenderit dolorem cumque dicta! Molestiae aperiam rem vitae nam possimus a unde adipisci quo aut optio. 
                                Aut libero blanditiis, omnis aperiam nobis expedita voluptatibus officiis, facilis, eum impedit tenetur laboriosam. 
                                Facilis est voluptatibus commodi a eum exercitationem et. Excepturi aperiam dolore dolorum illo unde maxime harum. Saepe, 
                                consequatur provident sint repellendus eaque voluptatum error praesentium soluta tempora cum eum dicta earum magnam ut 
                                vel amet fugit laudantium doloribus vitae nihil veritatis sapiente? Commodi minima voluptatem ad voluptas consectetur 
                                aliquam numquam iste blanditiis! Illum consequuntur animi nulla, accusamus neque tenetur nostrum, ipsam commodi amet 
                                placeat earum temporibus ab magnam dolore in sint officia necessitatibus magni iure! Quam perferendis facilis fuga 
                                suscipit! Optio adipisci veritatis animi nemo provident molestias voluptas perferendis voluptatem vero, deserunt alias 
                                ipsum blanditiis culpa eligendi consectetur. Itaque, modi. Unde voluptatum placeat at sed asperiores?
                            </p>
                            <img src="images/delete.png" alt="delete">
                        </div>
                    </div>
                    <div class="older-messages">
                        <h3>Oudere berichten</h3>
                        <div class="flex">
                            <div class="message-box">
                                <h4>Sabrina</h4>
                                <p>
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint ad at suscipit distinctio, nesciunt molestiae excepturi? 
                                    Distinctio tempore tenetur doloremque cupiditate qui itaque sint, facere placeat possimus vero mollitia ipsa natus 
                                    excepturi officiis eligendi tempora incidunt enim eius in earum vitae architecto provident! Harum, obcaecati atque. 
                                    Cumque dolorum architecto soluta impedit magni deserunt facere minus laboriosam labore pariatur! Suscipit nulla 
                                    excepturi deserunt quidem natus voluptates animi quo deleniti qui alias necessitatibus totam non tenetur temporibus 
                                    eaque tempora ad minus atque nobis dignissimos nostrum dicta, perferendis ducimus sapiente.
                                </p>
                                <img src="images/delete.png" alt="delete">
                            </div>
                            <div class="message-box">
                                <h4>Mohammed</h4>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias optio quas voluptatem eligendi delectus iure sit! 
                                    Expedita minus, quia aut vitae facilis minima eos? Earum veniam minima placeat, voluptas nisi tempore blanditiis fugit 
                                    sint modi voluptatem repudiandae illo minus nobis ullam deserunt libero recusandae, alias id molestias. Unde iusto 
                                    recusandae eos, expedita animi exercitationem quibusdam laboriosam placeat quidem cupiditate quia sunt odit dignissimos, 
                                    obcaecati, minus repudiandae odio. Illo, dicta. Nihil quibusdam, magnam libero a itaque dolore praesentium modi 
                                    soluta sapiente, debitis autem ad blanditiis nostrum quasi velit architecto delectus? Accusamus vitae qui vero nisi 
                                    tempore aliquid, nostrum incidunt voluptatibus, corrupti deleniti quidem quis asperiores facere ipsam molestiae minus 
                                    iusto natus tenetur amet laborum harum modi minima! Fugiat praesentium error libero culpa fuga? Quo magni quaerat 
                                    eligendi quae ratione ea.
                                </p>
                                <img src="images/delete.png" alt="delete">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>