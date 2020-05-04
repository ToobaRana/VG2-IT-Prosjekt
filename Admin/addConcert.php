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
        <link rel="stylesheet" type="text/css" media="screen" "stilarkfil.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>  
           body {
            font-size: 20px;
            }

            header {
                margin-top: 1000px;
            }

            h1 {
                color: #762DDD;
                margin: 10px;
            }


            form {
                margin: 40px;
                color:black;  
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


            #txtVenue {
                margin-left: 65px;
            }

            #txtConcertDate {
                margin-left: 10px;
            }

        </style>

    </head>

    <body>

    <?php include ("../Public/nav.php") ?>
    <?php include ("adminMenu.php") ?>    



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


    </body>

    </html>