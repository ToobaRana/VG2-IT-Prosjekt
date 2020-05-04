<?php

//lager en kobling opp mot databasen //

$tilkobling=mysqli_connect ("localhost", "root", "root", "Prosjekt");

// Hente ut albumene som er Top 10, som er i rekkefølgen sortert av IsTop kolonnen og det mulig å bare få opp 10 albummer//

$sql = sprintf ("SELECT * 
                 FROM Album 
                 ORDER BY IsTop 
                 DESC LIMIT 10;" ,
$tilkobling->real_escape_string($_GET["id"])
);
$datasett = $tilkobling->query($sql);
?>


<!DOCTYPE html>
<html>



<!-- Hoveddelen-->

<head>
    <title>Top 10 Albums</title>
    <meta charset="utf-8" />
    <link rel>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/albums.css" /> 
</head>


<body>

    <header>
        <nav>
            <?php include ("nav.php") ?>
        </nav>

    </header>

    

    <section>
        <br><br> <!-- satte inn br-taggen for at dropdownmenyen til album ikke skulle dekke overskriften -->
        <h1>Top 10 Albums</h1>
    </section>


    <?php  while ($rad =mysqli_fetch_array($datasett)) { 
        $id = $rad["albumID"] ?>

<!-- Her referer jeg til php siden som kommer til å føre meg direkte til akkurat det albummet som trykkes på -->
        <a href="singleAlbum.php?id=<?php echo $id?>">
                        <img src="<?php echo $rad["AlbumCover"]; ?>" 
                        alt="<?php echo $rad["AlbumName"] ?> " />
        </a>

    <?php }?>



</body>

</html>

