<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "Prosjekt"); 

// Hent ut id-en til artisten, fornavn og etternavn fra tabellen Artist//
    $sql = "SELECT artistID, FirstName, LastName 
            FROM Artist";
    
    $datasett = $tilkobling->query($sql);

if (isset($_POST["submit"])){
  
// Her er spørringen for at man kan sette inn informasjon i de ulike kolonnene //     

   $sql= sprintf("INSERT INTO Album(AlbumName, ReleaseDate, StudioAlbum, Price, AlbumCover, IsTop, artistID) 
                  VALUES ('%s', '%s','%s', '%s','%s', '%s', %s)", 
                  
   $tilkobling->real_escape_string($_POST["txtAlbumName"]),
   $tilkobling->real_escape_string($_POST["txtReleaseDate"]),
   $tilkobling->real_escape_string($_POST["txtStudioAlbum"]),
   $tilkobling->real_escape_string($_POST["txtPrice"]),
   $tilkobling->real_escape_string($_POST["txtAlbumCover"]),
   $tilkobling->real_escape_string($_POST["txtIsTop"]),
   $tilkobling->real_escape_string($_POST['1stArtist'])

   );

 $tilkobling->query($sql);
    }
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title> Add Album</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" "stilarkfil.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
         
         body {
            font-size: 20px;
            }


            form {
                margin: 40px;    
            }

            input {
                background-color:#d9c7f2;
                height: 25px;
            }

            button {
                color: black;
                background-color:#d9c7f2;
            }

            /* stylingen under er gjort for å få input boksene til å komme rett under hverandre */


            #txtReleaseDate {
                margin-left: 5px;
            }

            #txtPrice {
                margin-left: 70px;
            }

            #txtPicture {
                margin-left: 22px;

            }

            #txtIsTop{
                margin-left: 80px;

            }



        </style>

    </head>
    <!-- seksjon for hovedinnhold -->

    <body>

        <form method="post">
            <label for="txtAlbumName">Album Name:  </label>
            <input type="text" name="txtAlbumName" id="txtAlbumName" /> <br /> <br /> 

            <label for="txtReleaseDate">Release Date: </label>
            <input type="text" name="txtReleaseDate" id="txtReleaseDate" /> <br /> <br />

            <label for="txtStudioAlbum">Studio Album: </label>
            <input type="text" name="txtStudioAlbum" id="txtStudioAlbum" /> <br /> <br />

            <label for="txtPrice">Price: </label>
            <input type="text" name="txtPrice" id="txtPrice" /> <br /> <br />

            <label for="txtAlbumCover">Album Cover: </label>
            <input type="text" name="txtAlbumCover" id="txtAlbumCover" /> <br /> <br />

            <label for="txtIsTop">Top: </label>
            <input type="text" name="txtIsTop" id="txtIsTop" /> <br /> <br />

            <label for="1stArtist">Choose artist: </label>
            <select name="1stArtist" id="1stArtist">

            <?php while($rad = mysqli_fetch_array($datasett)) { ?>
            <option value="<?php echo $rad["artistID"]; ?>"><?php echo $rad["FirstName"]; ?> <?php echo $rad["LastName"]; ?> </option>
            <?php } ?>
            </select>
                <br> <br> <br>

            <button type="submit" name="submit"> Add album</button>
            
        </form>


    </body>

    </html>