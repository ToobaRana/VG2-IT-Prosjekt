<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "Prosjekt");

// Hente ut disse kolonnene fra tabellen Artist //

    $sql="SELECT artistID, FirstName,LastName, Gender, Birthdate, Picture 
          FROM Artist";

    $datasett = $tilkobling->query($sql);
    

if (isset($_GET["deleteID"]))
{
// Slette artisten som blir trykket på //    
    $sql=sprintf("DELETE FROM Artist 
                  WHERE artistID=%s",
                  
                $tilkobling->real_escape_string($_GET["deleteID"])
                );
    $tilkobling->query($sql);
    
    
}

?>

    <!DOCTYPE html>
    <html>
    <!--Hoveddelen-->

    <head>
        <title> Update & delete</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../CSS/adminArtist.css" />
    </head>


    <body>

        <header>
            <?php include ("../Public/nav.php") ?>
        </header>    

        <section> 
            <?php include ("adminMenu.php") ?> 
        </section>
          



        <h1>Edit or add an artist</h1>


        <table>
            <tr id="sinlgeBorder">
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Birthdate</th>
                <th>Picture</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>


    
            <?php while($rad =mysqli_fetch_array($datasett)) { ?>

            <tr>
                <td>
                    <?php echo $rad["artistID"]; ?>
                </td>
                <td>
                    <?php echo $rad["FirstName"]; ?> <?php echo $rad["LastName"]; ?>
                </td>
                
                <td>
                    <?php echo $rad["Gender"]; ?>
                </td>
                <td>
                    <?php echo $rad["Birthdate"]; ?>
                </td>
                <td>
                    <?php echo $rad["Picture"]; ?>
                </td>

                <td><a href="?deleteID=<?php echo $rad["artistID"]; ?>"> Delete </a></td>
                <td><a href="updateArtist.php?updateID=<?php echo $rad["artistID"]; ?>"> Update </a></td>
            </tr>

            </tr>

            <?php } ?>
        </table>

        <hr>

        <?php include ("addArtist.php") ?> 
        <?php include ("../Public/infoFooter.php") ?>


    </body>

    </html>
