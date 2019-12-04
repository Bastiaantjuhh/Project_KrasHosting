<?php
class LoginKlant implements Login{
    private $username;
    private $password;

    public function doLogin($username, $password) {
        global $mysql;

        $password2 = hash("sha1", $password);

        $this->username = $username;
        $this->password = $password2;

        $queryLogin = $mysql->query("SELECT email,wachtwoord FROM login_klanten WHERE email = '". $username ."' AND wachtwoord = '". $password2 ."'");
        
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
       $mysql->query("UPDATE login_klanten SET wachtwoord_counter = wachtwoord_counter + 1 WHERE  email = '". $username ."'");

       echo $this->suspendedAccount($username);
    }

    public function correctLogin($username) {
        if ($this->suspendedCheck($username) === false) {
            $this->resetIncorrectPassCount($username);

            $_SESSION["logged-in"]  = true;
            $_SESSION["isadmin"]    = false;
            $_SESSION["user"]       = $username;
        } else {
            $this->mailAdmin($username);
            echo "<p>Account is geblokeerd. Contacteer beheerder a.u.b.</p>";
        }
    }

    public function suspendedAccount($username) {
        global $mysql;

        $querySusspend = $mysql->query("SELECT email,wachtwoord_counter FROM login_klanten WHERE email = '". $username ."' AND wachtwoord_counter = 3");

        if ($querySusspend->num_rows > 0) { 
            $mysql->query("UPDATE login_klanten SET suspended = true WHERE  email = '". $username ."'");
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
                    <input type=\"password\" name=\"password\" placeholder=\"Wachtwoord\">
                    <input type=\"submit\" value=\"Login\">
                </form>";

        return $page;
    }

    public function mailAdmin($username) {
        $bericht = 'Het account "'. $username .'" is geblokeerd omdat deze te vaak foutieve login pogingen heeft gedaan.';
        mail($username, "Account geblokeerd", $bericht, "From: me@bastiaandehart.com");
    }
}
?>