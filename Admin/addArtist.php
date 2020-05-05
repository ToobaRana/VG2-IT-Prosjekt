<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "Prosjekt");

if (isset($_POST["submit"])){

// Her er spørringen for at man kan sette inn informasjon i de ulike kolonnene //    

$sql= sprintf("INSERT INTO Artist(FirstName,LastName, Gender, Birthdate, Picture) 
               VALUES ('%s', '%s', '%s', '%s', '%s')", 

             $tilkobling->real_escape_string($_POST["txtFirstName"]),
             $tilkobling->real_escape_string($_POST["txtLastName"]),
             $tilkobling->real_escape_string($_POST["txtGender"]),
             $tilkobling->real_escape_string($_POST["txtBirthdate"]),
             $tilkobling->real_escape_string($_POST["txtPicture"])
             );

 $tilkobling->query($sql);
    }
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title> Add Artist</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../CSS/addArtist.css" />

    </head>

    <body>
        
        <form action="" method="post">
            <label for="txtFirstName">Firstname:  </label>
            <input type="text" name="txtFirstName" id="txtFirstName" /> <br /> <br /> 

            <label for="txtLastName">Lastname: </label>
            <input type="text" name="txtLastName" id="txtLastName" /> <br /> <br />

            <label for="txtGender">Gender: </label>
            <input type="text" name="txtGender" id="txtGender" /> <br /> <br />

            <label for="txtBirthdate">Birthdate: </label>
            <input type="text" name="txtBirthdate" id="txtBirthdate" /> <br /> <br />

            <label for="txtPicture">Picture: </label>
            <input type="text" name="txtPicture" id="txtPicture" /> <br /> <br />


            <button type="submit" name="submit"> Add artist</button>
            
        </form>


    </body>

    </html>