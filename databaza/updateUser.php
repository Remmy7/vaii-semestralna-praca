<?php
include_once "accessDatabazy.php";
class updateUser
{

    public string $chybnaHlaska = "";

    public function kontrolaUnikatnosti($accessDatabazy, $vstup): bool
    {
        $select = $accessDatabazy->prepare("SELECT * from users where user_EMAIL = ?");
        $select->bind_param('s', $vstup);
        $select->execute();
        $select->store_result();
        if($select->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }
    function logout() {
        session_start();
        if (session_destroy()) {
            header("location:index.php");
            exit;
        }
    }

    public function zmenaEmailu($accessDatabazy) :string{
        $mailParsing = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
        if (!preg_match ($mailParsing, $_POST['mail'])) {
            $this->chybnaHlaska = "Email nie je v platnom formáte.";
        } else {
            $select = $accessDatabazy->prepare("UPDATE users set user_EMAIL = ? where user_USERNAME = ?");
            $select->bind_param('ss', $_POST['mail'], $_SESSION['user_USERNAME']);
            $select->execute();
            $this->chybnaHlaska = "Úspešne zmenený email.";
        }
        return  $this->chybnaHlaska;
    }

    public function deleteUser ($accessDatabazy, $vstup) {
        $delete = $accessDatabazy->prepare("DELETE from users where user_USERNAME = ?");
        $delete->bind_param('s',$vstup );
        $delete->execute();
        unset($_SESSION);
        session_destroy();
        header('Location: index.php');
    }
}