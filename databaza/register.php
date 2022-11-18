<?php
include_once "accessDatabazy.php";
class register{

    // meno užívateľa
    public string $username = "";

    // heslo užívateľa
    public string $password = "";

    // druhé zadanie hesla užívateľa
    public string $repeatPassword = "";

    // email užívateľa
    public string $email = "";

    // ukladanie poslednej chybnej hlášky
    public string $chybnaHlaska = "";

    // kontrolný string pre platný vstup emailu
    private string $mailParsing =  "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";


    // konštruktor pre vkladanie do databázy
    public function __construct($username, $password, $repeatPassword, $email) {
        $this->username = $username;
        $this->password = $password;
        $this->repeatPassword = $repeatPassword;
        $this->email = $email;
    }

    // parsuje vstup
    // vracia string s chybnou hláškou.
    public function sparsujVstup():string
    {

        if (strlen($this->username) < 6) {
            $this->chybnaHlaska = "Meno je príliš krátke. Minimálna dĺžka mena je 6 znakov.";
        }

        if (strlen($this->password) < 6) {
            $this->chybnaHlaska = "Heslo je príliš krátke. Minimálna dĺžka hesla je 6 znakov.";
        }

        if ($this->password != $this->repeatPassword) {
            $this->chybnaHlaska = "Heslá nie sú zhodné.";
        }

        if ($this->email == "") {
            $this->chybnaHlaska = "Email je prázdny.";
        }

        if (!preg_match($this->mailParsing, $this->email)) {
            $this->chybnaHlaska = "Email nemá správny formát!";
        }
        return $this->chybnaHlaska;
    }

    // porovná vstupný request s existujúcou databázov užívateľov.
    // vracia string s chybnou hláškou.
    public function porovnajExistujucich($accessDatabazy):string {
        $porovnajExistujucich = "SELECT * FROM users WHERE user_USERNAME='$this->username' OR user_EMAIL='$this->email'";
        $vyplutySelect = $accessDatabazy->query($porovnajExistujucich);
        $zhoda = mysqli_fetch_assoc($vyplutySelect);
        if ($zhoda) {
            if ($zhoda['user_USERNAME'] === $this->username) {
                $this->chybnaHlaska = "Užívateľ už existuje";
            }

            if ($zhoda['user_EMAIL'] === $this->email) {
                $this->chybnaHlaska = "Email je už použítý.";
            }
        }
        return $this->chybnaHlaska;
    }

    public function vlozUzivatela($accessDatabazy):void {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        $vloz = $accessDatabazy->prepare("INSERT INTO users (user_USERNAME, user_PASSWORD, user_EMAIL) VALUES (?,?,?)");
        $vloz->bind_param('sss', $this->username, $this->password, $this->email);
        $vloz->execute();
        $_SESSION['user_USERNAME'] = $this->username;
        $vloz->close();
        $accessDatabazy->close();
    }
}