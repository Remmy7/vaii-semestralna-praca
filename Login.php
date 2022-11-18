<?php
include_once("databaza/login.php");
include_once("databaza/accessDatabazy.php");
if ($_REQUEST['LOGIN']) {
    $login =  new login();
    $error =  $login->parseLogin($_POST['inputUsername'],$_POST['inputPassword']);
    if($error == ""){
        $login->userLogin($accessDatabazy);
        $error = $login->kontrolaHesla($accessDatabazy);
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="css/css.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="pozadieLogin" class="backgroundDefaultFullscreen">
        <div class="container">
            <div class="row">
                <div class="col-12 col-6 col-md-3 text-center col-centered">
                    <a href="index.php" class="btn btn-primary w-100" role="button">Naspäť na hlavnú stránku</a>
                </div>
            </div>
        </div>
        <form method="post" enctype="application/x-www-form-urlencoded">
            <div class="center-page">
            <div class="mb-5">
                <label for="inputUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputUsername" name="inputUsername" required>
            </div>
            <div class="mb-1">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
            </div>
            <input type="submit" value="LOGIN" name="LOGIN" class="btn btn-primary">
            <a href="Register.php" class="btn btn-primary" role="button">Do you not have account yet? Click here.</a>
            <div class="mb-1" style="font-style: oblique; font-size: 30px" >
                <?php echo $error; ?>
            </div>
            </div>
        </form>
        <footer class="row fixed-bottom" >
            <p>Author: Tibor Michalov <a href="mailto:michalov1@stud.uniza.sk">michalov1@stud.uniza.sk</a></p>
            <!--<p><a href="mailto:michalov1@stud.uniza.sk">michalov1@stud.uniza.sk</a></p>-->
        </footer>
    </div>

</body>
</html>