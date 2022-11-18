<?php
include("databaza/register.php");
include_once("databaza/accessDatabazy.php");


if ($_REQUEST['REGISTER']) {
    $register = new register($_POST['username'], $_POST['password'], $_POST['repeatPassword'], $_POST['email']);
    $error = $register->sparsujVstup();
    if (empty($error)) {
        $error = $register->porovnajExistujucich($accessDatabazy);
        if (empty($error)) {
            $register->vlozUzivatela($accessDatabazy);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="javascript/javascript.js"></script>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="css/css.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="pozadieRegister" class="backgroundDefaultFullscreen">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3 text-center col-centered">
                    <a href="index.php" class="btn btn-primary w-100" role="button">Naspäť na hlavnú stránku</a>
                </div>
            </div>
        </div>
        <form method="post" enctype="application/x-www-form-urlencoded">
            <div class="center-page">
                <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputUsername" name="username" required minlength="6">
                </div>
                <div class="mb-1">
                    <label for="passwordStrength" class="form-label">Password</label>
                    <input type="password" onkeydown="jsSilaHeslaBarUpdate()" id="passwordStrength" class="form-control" name="password" required minlength="6">
                </div>
                <div id = "barSila" style="width: 80%; height: 30px"></div>
                <div class="mb-1">
                    <label for="repeatPassword" class="form-label" >Repeat password</label>
                    <input type="password"  class="form-control" id="repeatPassword" name="repeatPassword" required minlength="6">
                </div>
                <div class="mb-1">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="email@gmail.com" name="email">
                </div>
                <input type="submit" value="REGISTER" class="btn btn-primary" name="REGISTER">
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