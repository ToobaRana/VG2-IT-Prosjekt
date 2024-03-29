<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "Prosjekt");


// Hente ut disse kolonnene fra tabellen Album //   

    $sql="SELECT albumID, AlbumName, ReleaseDate, StudioAlbum, Price, AlbumCover, IsTop, artistID  
          FROM Album";
    $datasett = $tilkobling->query($sql);

if (isset($_GET["deleteID"]))
{

// Slette album som blir trykket på //
    $sql=sprintf("DELETE FROM Album
                  WHERE albumID=%s",
                  
                $tilkobling->real_escape_string($_GET["deleteID"])
                );
    $tilkobling->query($sql);
    
    
}

?>



    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title> Update & delete</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../CSS/adminAlbum.css" />

    </head>
    
    <!-- Hoveddelen -->

    <body>

        <header>
            <?php include ("../Public/nav.php") ?>
        </header>    

        <section> 
            <?php include ("adminMenu.php") ?> 
        </section>

        <h1>Edit or add an album</h1>

        <table>
            <tr id="singleBorder">
                <th>ID</th>
                <th>Album Name</th>
                <th>Studio Album</th>
                <th>Price</th>
                <th>Album Cover</th>
                <th>IsTop</th>
                <th>ArtistID</th>
                <th>Delete</th>
                <th>Update</th>

            </tr>
            <?php while($rad =mysqli_fetch_array($datasett)) { ?>

            <tr>
                <td>
                    <?php echo $rad["albumID"]; ?>
                </td>
                <td>
                    <?php echo $rad["AlbumName"]; ?>
                </td>
                
                <td>
                    <?php echo $rad["StudioAlbum"]; ?>
                </td>
                <td>
                    <?php echo $rad["Price"]; ?>
                </td>
                <td>
                    <?php echo $rad["AlbumCover"]; ?>
                </td>
                <td>
                    <?php echo $rad["IsTop"]; ?>
                </td>

                <td>
                    <?php echo $rad["artistID"]; ?>
                </td>


                <td><a href="?deleteID=<?php echo $rad["albumID"]; ?>"> Delete </a></td>
                <td><a href="updateAlbum.php?updateID=<?php echo $rad["albumID"]; ?>"> Update </a></td>
            </tr>

            </tr>

            <?php } ?>
        </table>

        <hr>

        <?php include ("addAlbum.php") ?> 
        <?php include ("../Public/infoFooter.php") ?>


    </body>

    </html>
