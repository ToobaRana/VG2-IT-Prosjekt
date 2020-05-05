<?php

//lager en kobling opp mot databasen //

    $tilkobling=mysqli_connect ("localhost","root","root", "Prosjekt");


// Dette er siden som skal vise info om bare et album //

    $sql = sprintf ("SELECT *
                     FROM Artist, Album 
                     WHERE Artist.artistID= Album.artistID 
                     AND albumID= %s",
                    $tilkobling->real_escape_string($_GET["id"])
                    );
    $datasett = $tilkobling->query($sql);
    ?>


<!DOCTYPE html>
<html>



<!-- Hovedelen -->

<head>
    <title>Album</title>
    <meta charset="utf-8" />
    <link rel>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/singleAlbum.css" /> 
</head>



<body>

    <header>
            <?php include ("../Public/nav.php") ?>
    </header>


    <section>
        <br><br> <!-- satte inn br-taggen for at dropdownmenyen til album ikke skulle dekke overskriften -->
    </section>


    <div id="album">
            <?php if ($rad =mysqli_fetch_array($datasett)) { ?>
                    <div id="albumPhoto">
                        <img src="<?php echo $rad["AlbumCover"]; ?>" width = "400" 
                            alt = "<?php echo $rad["AlbumName"]; ?>" />
                    </div>

                    <div id="albumInfo">
                            <h1><?php echo $rad["AlbumName"]; ?></h1> <br>
                            <strong>Artist:  </strong><?php echo $rad["FirstName"]; ?> <?php echo $rad["LastName"]; ?> <br>
                            <strong>Release Date:  </strong><?php echo $rad["ReleaseDate"]; ?> <br>
                            <strong>Studio Album :  </strong><?php echo  $rad["StudioAlbum"]; ?> <br>
                            <strong>Price:  </strong><?php echo  $rad["Price"]; ?> kr <br> <br>
                

                            <!-- Hvis dette ikke skjer -->               

                            <?php } else { ?>
                                <p>Not found</p>
                            <?php } ?>
                    </div>
    </div>   


    
    <?php include ("infoFooter.php") ?>

            
   


</body>

</html>