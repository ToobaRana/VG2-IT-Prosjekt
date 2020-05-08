<?php

//lager en kobling opp mot databasen //

$tilkobling=mysqli_connect ("localhost", "root", "root", "Prosjekt");

// Her hentes det ut info om en concert, der man får vite om hvilken artist det er, hvor konserten er, når den er og et bilde av Venue //

$sql="SELECT FirstName, LastName, ConcertName, Venue, ConcertDate, VenuePic
      FROM Artist, Concert, Artist_has_Concert
      WHERE Artist.ArtistId = Artist_has_Concert.Artist_artistID 
      AND Concert.concertID = Artist_has_Concert.Concert_concertID";


$datasett = $tilkobling->query($sql);
?>



<!DOCTYPE html>
<html>

<!-- Hoveddelen-->

    <head>
        <title>Concerts</title>
        <meta charset="utf-8" />
        <link rel>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/concerts.css" /> 
    </head>

    <body>
        

        <header>
                <?php include ("../Public/nav.php") ?>
        </header>


        <section>
            <br><br> <!-- satte inn br-taggen for at dropdownmenyen til album ikke skulle dekke overskriften -->
            <h1>Concerts</h1>
        </section>
    
        <div id="concertArtist">

            <?php while ($rad =mysqli_fetch_array($datasett)) { ?>

                

                    <div id="picVenue">
                            <img src="<?php echo $rad["VenuePic"]; ?>" 
                            alt = "<?php echo $rad["Venue"]; ?>" />
                    </div>
                

                    <div id="concertInfo">
                        <h2><?php echo  $rad["ConcertName"]; ?></h2> 
                        <strong>Artist: </strong><?php echo $rad["FirstName"]; ?> <?php echo $rad["LastName"]; ?> <br> <br>
                        <strong>Venue: </strong><?php echo  $rad["Venue"]; ?> <br> <br>
                        <Strong>Concert Date: </Strong>
                        <?php echo  $rad["ConcertDate"]; ?> <br> <br>
                    </div>


            <?php } ?>
             
        </div>   


        <?php include ("infoFooter.php") ?>


    </body>

</html>
