<?php
include_once "accessDatabazy.php";
class login
{
    private string $username = "";

    private string $password = "";

    private string $cryptedPassword = "";

    public string $chybovaHlaska = "";

    function parseLogin($username, $password): string
    {
        $this->username = $username;
        $this->password = $password;
        if ($this->username == "") {
            $this->chybovaHlaska = "Nie je zadané meno.";
        }
        if ($this->password == "") {
            $this->chybovaHlaska = "Nie je zadané heslo.";
        }
        return $this->chybovaHlaska;
    }

    function userLogin($accessDatabazy) {
        $select = $accessDatabazy->prepare("SELECT user_PASSWORD FROM users where user_USERNAME = ?");
        $select->bind_param("s",$this->username);
        $select->execute();
        $select->store_result();
        $select->bind_result($this->cryptedPassword);
        $select->fetch();
    }
    function kontrolaHesla($accessDatabazy):string{
        $this->cryptedPassword = substr( $this->cryptedPassword, 0, 60 );
        if (password_verify($this->password,$this->cryptedPassword)) {
            session_start();
            $_SESSION['user_USERNAME'] = $this->username;
            header("location:../settings.php");
            $this->chybovaHlaska = "Úspešne prihlásený.";
        } else {
            $this->chybovaHlaska = "Zlé meno alebo heslo";
        }
        return $this->chybovaHlaska;
    }

}
