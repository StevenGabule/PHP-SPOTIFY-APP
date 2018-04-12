<?php 
include 'include/config.php';

if (!isset($_SESSION['userloggedIn'])) {
    header("Location: register.php");
}
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to spotify</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background: white !important;
            color:#fff;            
        }
    </style>
</head>
<body>
    <div id="mainContainer">
        <div id="topContainer">
            <div id="navBarContainer">
                <nav class="navBar">
                    <a href="index.php"><img src="assets/images/icons/logo.png" alt=""></a>
                    <div class="group">
                        <div class="navItem"><a href="search.php" class="navItemLink">Search</a></div>
                    </div>
                    <div class="group">
                        <div class="navItem"><a href="browse.php" class="navItemLink">Browse</a></div>
                        <div class="navItem"><a href="music.php" class="navItemLink">Your music</a></div>
                        <div class="navItem"><a href="profile.php" class="navItemLink">John Paul Lim Gabule</a></div>
                    </div>
                </nav>
            </div>
        </div>
        <div id="nowPlayingBarContainer">
            <div id="nowPlayingBar">
                <div id="nowPlayingLeft">
                    <div class="content">
                        <span class="albumLink">
                            <img src="assets/images/bg/bg.jpg" class="img-fluid albumArtWork" alt="">
                        </span>
                        <div class="trackInfo">
                            <span class="trackName">
                                <span>Happy Birthday!</span>
                            </span>
                            <span class="artistName">
                                <span>John Paul Lim Gabule</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="nowPlayingCenter">
                    <div class="content playerControls">
                        <div class="buttons">
                            <button class="controlButton shuffle" title="Shuffle Button">
                                <img src="assets/images/icons/shuffle.png" alt="Shuffle">
                            </button>
                            <button class="controlButton previous" title="previous Button">
                                <img src="assets/images/icons/previous.png" alt="previous">
                            </button>
                            <button class="controlButton play" title="play Button">
                                <img src="assets/images/icons/play.png" alt="play">
                            </button>
                            <button class="controlButton pause" title="pause Button" style="display: none;">
                                <img src="assets/images/icons/pause.png" alt="pause">
                            </button>
                            <button class="controlButton next" title="next Button">
                                <img src="assets/images/icons/next.png" alt="next">
                            </button>
                            <button class="controlButton repeat" title="repeat Button">
                                <img src="assets/images/icons/repeat.png" alt="repeat">
                            </button>
                        </div><!-- end of buttons -->
                        <div class="playbackBar">
                            <span class="progressTime current">0.00</span>
                                <div class="progressBar">
                                    <div class="progressBarBg">
                                        <div class="progress"></div>
                                    </div>
                                </div>
                            <span class="progressTime remaining">0.00</span>
                        </div>
                    </div><!-- end of content playControls -->
                </div><!-- end of nowPlayingCenter -->
                <div id="nowPlayingRight">
                    <div class="volumeBar">
                        <button class="controlButton volume" title="Volume Button">
                            <img src="assets/images/icons/volume.png" alt="Volume Button">
                        </button>
                        <div class="progressBar">
                            <div class="progressBarBg">
                                <div class="progress"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</body>
</html>