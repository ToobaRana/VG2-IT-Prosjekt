<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "Prosjekt");

if (isset($_POST["submit"])){

// Her er spørringen for at man kan sette inn informasjon i de ulike kolonnene //    

$sql= sprintf("INSERT INTO Admin(username, password) 
               VALUES ('%s', '%s')", 

             $tilkobling->real_escape_string($_POST["txtUsername"]),
             $tilkobling->real_escape_string($_POST["txtPassword"]),
             );

 $tilkobling->query($sql);
    }
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

  
<!DOCTYPE html>
<html>

    <head>
        <title>Sign up</title>
        <link rel="stylesheet" type="text/css" href="../CSS/login.css" >
    </head>

    <body>


        <header>
            <nav>
                <?php include ("../Public/nav.php") ?>
            </nav>
        </header>

        <main>
            
            <div id="loginBox">
                <form action="" method="post">
                <h2>Sign up</h2>
                    <img src="../Images/username.jpg" alt="" width="40">

                    <input id="txtUsername" name="txtUsername" placeholder="Username" type="text">
                    <br>

                    <img src="../Images/password.jpg" alt="" width="40">

                    <input id="txtPassword" name="txtPassword" placeholder="Password" type="password" width="100%">

                    <button name="submit" type="submit">Sign Up</button>

                    <button id="signUp" type="button" onclick="location.href='login.php'">Back to login</button>

                    

                    <span><?php echo $error; ?></span>
                </form>
            </div>
        </main>
    </body>
</html>