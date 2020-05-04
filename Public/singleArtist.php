<?php

//lager en kobling opp mot databasen //

    $tilkobling=mysqli_connect ("localhost","root","root", "Prosjekt");

    // Dette er siden som skal vise info om bare én artist//

    $sql = sprintf ("SELECT FirstName, LastName, Birthdate, Picture, ConcertName, Venue, ConcertDate
                    FROM Artist, Concert, Artist_has_Concert
                    WHERE Artist.ArtistId= Artist_has_Concert.Artist_artistID
                    AND Concert.concertID= Artist_has_Concert.Concert_concertID 
                    AND artistID= %s",
                    $tilkobling->real_escape_string($_GET["id"])
                    );
    $datasett = $tilkobling->query($sql);
    ?>


<!DOCTYPE html>
<html>



<!-- seksjon for metainfo -->

<head>
    <meta charset="utf-8" />
    <link rel>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/singleArtist.css" /> 
</head>




<body>

    <header>
        <nav>
            <?php include ("nav.php") ?>
        </nav>
    </header>


    <section>
        <br><br> <!-- satte inn br-taggen for at dropdownmenyen til album ikke skulle dekke overskriften -->
    </section>

   
    <?php if ($rad =mysqli_fetch_array($datasett)) { ?>
        <h1><?php echo $rad["FirstName"]; ?> <?php echo $rad["LastName"]; ?> </h1> 
        
       
            <img src="<?php echo $rad["Picture"]; ?>" width = "400" 
                alt = "<?php echo $rad["FirstName"]; ?>" />
        
        <p><strong> Birthdate:</strong> <?php echo $rad["Birthdate"]; ?></p>

        <p><strong> Concert:</strong> <?php echo $rad["ConcertName"]; ?></p>
        <p><strong> Venue:</strong> <?php echo $rad["Venue"]; ?></p>
       <p><strong> Date:</strong> <?php echo $rad["ConcertDate"]; ?></p> 
      
    
       
    <!-- Hvis dette ikke skjer -->   
    <?php } else { ?>
        <p>Not found</p>
    <?php } ?>
    
    
   


</body>

</html>


