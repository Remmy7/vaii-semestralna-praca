<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TyperacerTheGame</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="css/css.css" rel="stylesheet" type="text/css">

</head>
<body>
    <div id="pozadieHlavnaStranka" class="backgroundDefaultFullscreen">
        <div class="container overflow-hidden">
            <div class="row g-2">
                <div class="col-6 col-md-3 text-center">
                    <a href="Login.php" class="btn btn-primary w-100" role="button">Login</a>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <a href="Leaderboard.php" class="btn btn-primary w-100" role="button">Leaderboard</a>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <a href="Forums.php" class="btn btn-primary w-100" role="button">Forums</a>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <a href="Settings.php" class="btn btn-primary w-100" role="button">Settings</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-9 col-xl-5">
                    <p id="textMainPage">Lets play a game of typeracer!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div style="background-color: darkred; color: yellow; opacity: 0.9;">
                    <p id="textAreaForArticle">This text was made possible by skillshare. Get your 3 month free trial over at at skillshare.com/uniza. </p>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-9 col-xl-5">
                    <label for="textAreaForTyperacer"></label>
                    <textarea id="textAreaForTyperacer" rows="3" placeholder="Write what you see above over here!"></textarea>
                </div>
            </div>
        </div>
        <footer class="row fixed-bottom" >
            <p>Author: Tibor Michalov <a href="mailto:michalov1@stud.uniza.sk">michalov1@stud.uniza.sk</a></p>
            <!--<p><a href="mailto:michalov1@stud.uniza.sk">michalov1@stud.uniza.sk</a></p>-->
        </footer>

    </div>
</body>
</html>