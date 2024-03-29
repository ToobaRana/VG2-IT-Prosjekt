<?php

//lager en kobling opp mot databasen //

$tilkobling=mysqli_connect ("localhost", "root", "root", "Prosjekt");


//Hente ut bildene til alle artistene //

$sql = sprintf ("SELECT artistID, Picture 
                 FROM Artist" ,
$tilkobling->real_escape_string($_GET["id"])
);
$datasett = $tilkobling->query($sql);
?>


<!DOCTYPE html>
<html>



<!-- Hoveddelen-->

<head>
    <title> All artists</title>
    <meta charset="utf-8" />
    <link rel>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/artists.css" /> 
</head>



<body>

    <header>
            <?php include ("nav.php") ?>
    </header>

    <section>
        <br><br> <!-- satte inn br-taggen for at dropdownmenyen til album ikke skulle dekke overskriften -->
        <h1>All Artists</h1>
    </section>
    

    <div id="artistSection">
        <?php  while ($rad =mysqli_fetch_array($datasett)) { 
            $id = $rad["artistID"] ?>

            <div id="artistPhoto">

                <!-- Her referer jeg til php siden som kommer til å føre meg direkte til akkurat den artisten som trykkes på -->        
                    <a href="singleArtist.php?id=<?php echo $id?>">
                        <img src="<?php echo $rad["Picture"]; ?>" 
                        alt="<?php echo $rad["FirstName"] ?><?php echo $rad["LastName"] ?> " />
                    </a>
            </div>        

        <?php }?>
    </div>

    <?php include ("infoFooter.php") ?>


</body>

</html>