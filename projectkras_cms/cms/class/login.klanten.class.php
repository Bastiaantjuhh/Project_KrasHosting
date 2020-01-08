<?php
class LoginKlant implements Login {
    private $username;
    private $password;

    public function doLogin($username, $password) {
        global $mysql;

        $password2 = hash("sha1", $password);

        $this->username = $username;
        $this->password = $password2;

        $q = "SELECT email,wachtwoord FROM login_klanten WHERE email = '{$username}' AND wachtwoord = '{$password2}'";

        $queryLogin = $mysql->query($q);
        
        if ($queryLogin->num_rows > 0) {
            $this->correctLogin($username);
            return true;
        } else {
            $this->incorrectLogin($username);
            return false;
        } 
    }

    public function resetIncorrectPassCount($username) {
        global $mysql;
        $mysql->query("UPDATE login_klanten SET wachtwoord_counter = 0 WHERE  email = '". $username ."'");
    }

    public function incorrectLogin($username) {
        global $mysql;
        $mysql->query("UPDATE login_klanten SET wachtwoord_counter = (wachtwoord_counter + 1) WHERE email = '". $username ."'");
    }

    public function correctLogin($username) {
        if ($this->suspendedCheck($username) === false) {

            $this->resetIncorrectPassCount($username);

            // Wordt gebruikt om te kijken of gebruiker ingelogd zit
            $_SESSION["logged-in"]  = true;

            // Wordt gebruikt voor aanmaken van de "USERID" session
            $_SESSION["username"]   = $username;

            // Is Klant?
            $_SESSION["klant"]      = true;
        } else {
            echo "<div class='alert alert-danger'>Account is geblokeerd. Contacteer beheerder a.u.b.</div>";
        }
    }

    public function suspendedCheck($username) {
        global $mysql;

        $querySusspend = $mysql->query("SELECT email,wachtwoord_counter FROM login_klanten WHERE email = '". $username ."' AND wachtwoord_counter = 3");

        if ($querySusspend->num_rows > 0) { 
            return true;
        } else {
            return false;
        }
    }

    public function showLogin() {
        $page = "<form action=\"\" method=\"post\">
                    <input type=\"email\" name=\"email\" placeholder=\"E-mail address\">
                    <input type=\"password\" name=\"wachtwoord\" placeholder=\"Wachtwoord\">
                    <input type=\"submit\" value=\"Login\">
                </form>";

        return $page;
    }
}
?>