<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "Prosjekt");

if (isset($_POST["submit"])){
    
// Her er spørringen for at man kan sette inn informasjon i de ulike kolonnene // 

$sql= sprintf("INSERT INTO Concert(ConcertName,Venue, ConcertDate, VenuePic) 
               VALUES ('%s', '%s', '%s', '%s' )", 
               
             $tilkobling->real_escape_string($_POST["txtConcertName"]),
             $tilkobling->real_escape_string($_POST["txtVenue"]),
             $tilkobling->real_escape_string($_POST["txtConcertDate"]),
             $tilkobling->real_escape_string($_POST["txtVenuePic"])
             );

 $tilkobling->query($sql);
    }
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title> Add Concert</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../CSS/addConcert.css" />

    </head>

    <body>


    <header>
        <?php include ("../Public/nav.php") ?>
    </header>

    <section>
        <?php include ("adminMenu.php") ?>    
    </section>


    <h1>Add a concert</h1>


        <form action="" method="post">
            <label for="txtConcertName">Concert Name:  </label>
            <input type="text" name="txtConcertName" id="txtConcertName" /> <br /> <br /> 

            <label for="txtVenue">Venue: </label>
            <input type="text" name="txtVenue" id="txtVenue" /> <br /> <br />

            <label for="txtConcertDate">Concert Date: </label>
            <input type="text" name="txtConcertDate" id="txtConcertDate" /> <br /> <br />

            <label for="txtVenuePic">Venue Picture: </label>
            <input type="text" name="txtVenuePic" id="txtVenuePic" /> <br /> <br />



            <button type="submit" name="submit"> Add concert</button>
            
        </form>


        <?php include ("../Public/infoFooter.php") ?>


    </body>

    </html>