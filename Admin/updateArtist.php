<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "Prosjekt");

    $sql=sprintf("SELECT artistID, FirstName,LastName, Gender, Birthdate, Picture
                  FROM Artist 
                  WHERE artistID= %s",

        $tilkobling->real_escape_string($_GET["updateID"])
);

 $datasett=$tilkobling->query($sql);


if (isset($_POST["submit"]))
    
{

// Oppdater info fra tabellen Artist hvor man kan endre det til det man vil //    
$sql=sprintf("UPDATE Artist 
              SET FirstName='%s', LastName='%s', Gender='%s', Birthdate='%s', Picture='%s'  
              WHERE artistID= %s",

            $tilkobling->real_escape_string($_POST["txtFirstName"]),
            $tilkobling->real_escape_string($_POST["txtLastName"]),
            $tilkobling->real_escape_string($_POST["txtGender"]),
            $tilkobling->real_escape_string($_POST["txtBirthdate"]),
            $tilkobling->real_escape_string($_POST["txtPicture"]),
            $tilkobling->real_escape_string($_GET["updateID"])
            );
    $tilkobling->query($sql);
header("Location:AdminArtist.php");

}
?>
    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title> Update</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" "stilarkfil.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
             body {
            font-size: 20px;
            }

            header {
                margin-top: 55px;
            }

            form {
                margin: 40px; 
                color: black;   
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

            #txtLastName {
                margin-left: 3px;
            }


            #txtGender {
                margin-left: 30px;
            }

            #txtBirthdate {
                margin-left: 15px;
            }

            #txtPicture {
                margin-left: 32px;

            
            }
        </style>


    
    </head>
    <!-- seksjon for hovedinnhold -->


    <body>

        <header>
            <?php include ("../Public/nav.php") ?>
        </header>    

        <section> 
            <?php include ("adminMenu.php") ?> 
        </section>
          

        <form method="post">
            <?php if($rad=mysqli_fetch_array($datasett)) { ?>
            
            <label for="txtFirstName">First Name: </label>
            <input type="text" name="txtFirstName" id="txtFirstName" value="<?php echo $rad["FirstName"]; ?>" />
            <br/> <br>
            
            <label for="txtLastName">Last Name: </label>
            <input type="text" name="txtLastName" id="txtLastName" value="<?php echo $rad["LastName"]; ?>" />
            <br/> <br>
            
            <label for="txtGender">Gender: </label>
            <input type="text" name="txtGender" id="txtGender" value="<?php echo $rad["Gender"]; ?>" /> 
            <br /> <br>
            
            <label for="txtBirthdate">Birthdate: </label>
            <input type="text" name="txtBirthdate" id="txtBirthdate" value="<?php echo $rad["Birthdate"]; ?>" /> 
            <br /> <br>

            <label for="txtPicture">Picture: </label>
            <input type="text" name="txtPicture" id="txtPicture" value="<?php echo $rad["Picture"]; ?>" /> 
            <br /> <br>
            
            <button type="submit" name="submit"> Update artist</button>
            <?php } ?>
        </form>


    </body>

    </html>
