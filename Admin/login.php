

<!--php-kode starter-->
<?php

/*Sjekker om submit-knappen er trykket*/
if (isset($_POST['submit'])) { 
    
    
    /*Lager en tilkobling til databasen*/
    $tilkobling=mysqli_connect ("localhost","root","root", "Prosjekt");

     /*Henter brukernavnet og passord fra databasen basert på brukernavnet som er skrevet inn*/

    $sql=sprintf("SELECT * FROM Admin WHERE username= '%s'",
            $tilkobling->real_escape_string($_POST["user"])
                );
     $datasett=$tilkobling->query($sql); 

   /* Henter datasettet */
    if ($rad =mysqli_fetch_array($datasett)) { 
        /*Sjekker om passord matcher det i databasen*/
        if ($_POST["pass"]==$rad["password"])
        
        /*Hvis det stemmer skjer dette*/
        { header("Location: AdminArtist.php"); } 
        
        /*Hvis det ikke stemmer skjer dette*/
        else { echo "Wrong username or password"; } 
    }
}
/*PHP-kode slutter*/
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="../CSS/login.css" >
    </head>

    <body>


        <header>
            <?php include ("../Public/nav.php") ?>
        </header>


        <section>
            <br><br> <!-- satte inn br-taggen for at dropdownmenyen til album ikke skulle dekke overskriften -->
        </section>

        <main>
            
            <div id="loginBox">
                <form action="" method="post">
                <h2>Login</h2>
                    <img src="../Images/username.jpg" alt="" width="40">

                    <input id="name" name="user" placeholder="Username" type="text">
                    <br>

                    <img src="../Images/password.jpg" alt="" width="40">

                    <input id="password" name="pass" placeholder="Password" type="password">

                    <button name="submit" type="submit">Login</button>

                    <button id="signUp" type="button" onclick="location.href='addAdmin.php'">Don't have an account? Sign up</button>

                    

                    <span><?php echo $error; ?></span>
                </form>
            </div>

        </main>

        <?php include ("../Public/infoFooter.php") ?>

    </body>
</html>
