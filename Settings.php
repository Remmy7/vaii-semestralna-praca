<?php session_start();
include_once ("databaza/accessDatabazy.php");
include_once ("databaza/updateUser.php");
include_once ("databaza/login.php");

if (!isset($_SESSION['user_USERNAME'])) {
    header("Location:Register.php");
    die;
}

$updateUser = new updateUser();
$error = "";
if ($_REQUEST['ZMENAMAILU']) {
    if($updateUser->kontrolaUnikatnosti($accessDatabazy,$_POST['mail'])){
        $error = $updateUser->zmenaEmailu($accessDatabazy);
    } else {
        $error = "Email už existuje!";
    }
}

if ($_REQUEST['DELETEUSER']) {
    $updateUser->deleteUser($accessDatabazy,$_SESSION['user_USERNAME']);
}
if ($_REQUEST['LOGOUT']) {
    $logout = new updateUser();
    $logout->logout();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="css/css.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="pozadieSettings" class="backgroundDefaultFullscreen">
    <div class="container">
        <div class="row">
            <div class="col-6 col-xl-3 col-centered">
                <a href="index.php" class="btn btn-primary w-100" role="button">Naspäť na hlavnú stránku</a>
            </div>
        </div>
    </div>
    <form method="post" enctype="application/x-www-form-urlencoded">
        <div class="center-page">
            <div class="mb-5">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="mail" name="mail">
            </div>
            <input type="submit" value="ZMENA EMAILU" class="btn btn-primary" name="ZMENAMAILU" id = "ZMENAMAILU">
            <input type="submit" value="VYMAŽ POUŽÍVATEĽA" class="btn btn-primary" name="DELETEUSER">
            <input type="submit" value="LOGOUT" name="LOGOUT" class="btn btn-primary">
            <div class="mb-1" style="font-style: oblique; font-size: 30px" >
            <?php echo $error; ?>
            </div>
        </div>
    <footer class="row fixed-bottom" >
        <p>Author: Tibor Michalov <a href="mailto:michalov1@stud.uniza.sk">michalov1@stud.uniza.sk</a></p>
        <!--<p><a href="mailto:michalov1@stud.uniza.sk">michalov1@stud.uniza.sk</a></p>-->
    </footer>
</div>

</body>
</html>