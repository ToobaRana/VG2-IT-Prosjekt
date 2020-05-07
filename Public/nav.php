<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/nav.css" />
    <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>


<body id="menu">

    <header class="responsive">


        <div id="menuClosed">
            <a href="#menuOpen" id="open"><img src="../Images/open.png" alt=""> </a>
                <h2>MUSIC HUB</h2>
        </div>
        
        <nav id="menuOpen">


            <a href="#menuClosed" id="close"><img src="../Images/close.png" alt=""> </a>


            <ul id="main">
                <li><a href="../Public/home.php">HOME</a></li>

                <li class="dropDown">
                    <a href="" class="dropButton">ARTISTS &nabla;</a>
                    <div class="dropContent">
                        <a href="../Public/artists.php">All Artists</a>
                        <a href="../Public/female.php">Female Artists</a>
                        <a href="../Public/male.php">Male Artists</a>
                    </div>
                </li>


                <li class="dropDown">
                    <a href="" class="dropButton">ALBUMS &nabla;</a>
                    <div class="dropContent">
                        <a href="../Public/albums.php">All Albums</a>
                        <a href="../Public/topAlbums.php">Top 10 Albums</a>
                    </div>
                </li>


                <li class="dropDown">
                    <a href="" class="dropButton">CONCERTS &nabla;</a>
                    <div class="dropContent">
                        <a href="../Public/concerts.php">Concerts</a>
                    </div>
                </li>


                <li class="dropDown">
                    <a href="" class="dropButton">ADMIN &nabla;</a>
                    <div class="dropContent">
                        <a href="../Admin/login.php">Login</a>
                    </div>
                </li>


            </ul>
        </nav>
    </header>
    


</body>



</html>

