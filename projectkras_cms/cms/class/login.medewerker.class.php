<?php
class LoginMedewerker implements Login{
    private $username;
    private $password;

    public function doLogin($username, $password) {
        global $mysql;

        $password2 = hash("sha1", $password);

        $this->username = $username;
        $this->password = $password2;

        $queryLogin = $mysql->query("SELECT email,wachtwoord FROM login_medewerkers WHERE email = '{$username}' AND wachtwoord = '{$password2}'");
        
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
        $mysql->query("UPDATE login_medewerkers SET wachtwoord_counter = 0 WHERE email = '". $username ."'");
    }

    public function incorrectLogin($username) {
        if ($this->suspendedCheck($username) === false) {
            global $mysql;
            $mysql->query("UPDATE login_medewerkers SET wachtwoord_counter = (wachtwoord_counter + 1) WHERE email = '". $username ."'");
        } else {
            echo "<div class='alert alert-danger'>Account is geblokeerd. Contacteer beheerder a.u.b.</div>";
        }
    }

    public function correctLogin($username) {
        if ($this->suspendedCheck($username) === false) {

            $this->resetIncorrectPassCount($username);

            // Wordt gebruikt om te kijken of gebruiker ingelogd zit
            $_SESSION["logged-in"]  = true;

            // Omdat klanten ook een "soort van" login hebben is er een extra sessie aanwezig om te kijken of het we; een medewerker is
            $_SESSION["medewerker"] = true;

            // Wordt gebruikt voor aanmaken van de "USERID" session
            $_SESSION["username"]   = $username;
            // Wordt gebruikt voor het controlleren van rechten doormiddel van backend vallidatie
            $_SESSION["u_realname"] = $this->getRealName(); 
        } else {
            echo "<div class='alert alert-danger'>Account is geblokeerd. Contacteer beheerder a.u.b.</div>";
        }
    }

    public function suspendedCheck($username) {
        global $mysql;

        $querySusspend = $mysql->query("SELECT email,wachtwoord_counter FROM login_medewerkers WHERE email = '". $username ."' AND wachtwoord_counter = 3");

        if ($querySusspend->num_rows > 0) { 
            return true;
        } else {
            return false;
        }
    }

    public function getRealName() {
        global $mysql;
        $email = $_SESSION["username"];
        $query = $mysql->query("SELECT email,voornaam,achternaam FROM login_medewerkers WHERE email = '{$email}'");
        while($x = mysqli_fetch_assoc($query)) { 
        return htmlspecialchars($x["voornaam"]) . " " . htmlspecialchars($x["achternaam"]); 
        }
    }


    public function showLogin() {
        $content = '<form action="" method="POST" class="form-signin">';
        $content .= '<h1 class="h3 mb-3 font-weight-normal">KrasHosting CMS</h1>';
        $content .= '<label for="email" class="sr-only">Email</label>';
        $content .= '<input name="email" type="email" id="email" class="form-control" placeholder="Email" required autofocus>';
        $content .= '<label for="wachtwoord" class="sr-only">Wachtwoord</label>';
        $content .= '<input name="wachtwoord" type="password" id="wachtwoord" class="form-control" placeholder="Wachtwoord" required>';
        $content .= '<button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>';
        $content .= '<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>';
        $content .= '</form>';

        return $content;
    }
}
?>