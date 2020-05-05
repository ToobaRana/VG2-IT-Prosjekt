<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "Prosjekt");

    $sql=sprintf("SELECT *
                  FROM Album, Artist 
                  WHERE albumID= %s",

        $tilkobling->real_escape_string($_GET["updateID"])
);  

 $datasett=$tilkobling->query($sql);


if (isset($_POST["submit"]))
    
{
// Oppdater info fra tabellen Album hvor man kan endre det til det man vil //      
$sql=sprintf("UPDATE Album 
              SET AlbumName='%s', ReleaseDate='%s', StudioAlbum='%s', Price='%s', AlbumCover='%s', IsTop='%s', artistID=%s   
              WHERE albumID= %s",
              
            $tilkobling->real_escape_string($_POST["txtAlbumName"]),
            $tilkobling->real_escape_string($_POST["txtReleaseDate"]),
            $tilkobling->real_escape_string($_POST["txtStudioAlbum"]),
            $tilkobling->real_escape_string($_POST["txtPrice"]),
            $tilkobling->real_escape_string($_POST["txtAlbumCover"]),
            $tilkobling->real_escape_string($_POST["txtIsTop"]),
            $tilkobling->real_escape_string($_POST["1startistID"]),
            $tilkobling->real_escape_string($_GET["updateID"])
            );
    $tilkobling->query($sql);
header("Location:AdminAlbum.php");

}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title> Update</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../CSS/updateAlbum.css" />


    
    </head>


    <body>

        <header>
            <?php include ("../Public/nav.php") ?>
        </header>    

        <section> 
            <?php include ("adminMenu.php") ?> 
        </section>
          
        <h1>Update Album</h1>

        <form method="post">
            <?php if($rad=mysqli_fetch_array($datasett)) { ?>
            
            <label for="txtAlbumName">Album Name: </label>
            <input type="text" name="txtAlbumName" id="txtAlbumName" value="<?php echo $rad["AlbumName"]; ?>" />
            <br/> <br>
            
            <label for="txtReleaseDate">Release Date: </label>
            <input type="text" name="txtReleaseDate" id="txtReleaseDate" value="<?php echo $rad["ReleaseDate"]; ?>" />
            <br/> <br>
            
            <label for="txtStudioAlbum">Studio Album: </label>
            <input type="text" name="txtStudioAlbum" id="txtStudioAlbum" value="<?php echo $rad["StudioAlbum"]; ?>" /> 
            <br /> <br>
            
            <label for="txtPrice">Price: </label>
            <input type="text" name="txtPrice" id="txtPrice" value="<?php echo $rad["Price"]; ?>" /> 
            <br /> <br>

            <label for="txtAlbumCover">Album Cover: </label>
            <input type="text" name="txtAlbumCover" id="txtAlbumCover" value="<?php echo $rad["AlbumCover"]; ?>" /> 
            <br /> <br>

            <label for="txtIsTop">Top: </label>
            <input type="text" name="txtIsTop" id="txtIsTop" value="<?php echo $rad["IsTop"]; ?>" /> 
            <br /> <br>
            
            <label for="1startistID">Choose artist: </label>
            <select name="1startistID" id="1startistID">

            <?php while($rad = mysqli_fetch_array($datasett)) { ?>
            <option value="<?php echo $rad["artistID"]; ?>"><?php echo $rad["FirstName"]; ?> <?php echo $rad["LastName"]; ?> </option>
            <?php } ?>
            </select>
                <br> <br> <br>
            
            <button type="submit" name="submit"> Update album</button>
            <?php } ?>
        </form>


        <?php include ("../Public/infoFooter.php") ?>


    </body>

    </html>
