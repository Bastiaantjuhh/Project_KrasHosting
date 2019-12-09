<?php
class Login {
    private $username;
    private $password;

    public function doLogin($username, $password) {
        global $mysql;

        $password2 = hash("sha1", $password);

        $this->username = $username;
        $this->password = $password2;

        $queryLogin = $mysql->query("SELECT id, email, wachtwoord FROM crm_medewerker_login WHERE email = '". $username ."' AND wachtwoord = '". $password2 ."'");
        
        if ($queryLogin->num_rows > 0) {
            $this->correctLogin($username);
            return true;
        } else {
            return false;
        }     
    }

    private function correctLogin($username) {
        // Wordt gebruikt om te kijken of gebruiker ingelogd zit
        $_SESSION["logged-in"]  = true;

        // Wordt gebruikt voor aanmaken van de "USERID" session
        $_SESSION["username"]   = $username;

        // Wordt gebruikt voor het controlleren van rechten doormiddel van backend vallidatie
        $_SESSION["userid"] = $this->getUID(); 
        
        // Wordt gebruikt voor het weergeven van de naam
    }

    public function showLogin() {
        $content = '<form action="" method="POST" class="form-signin">';
        $content .= '<h1 class="h3 mb-3 font-weight-normal">KrasHosting CRM</h1>';
        $content .= '<label for="email" class="sr-only">Email</label>';
        $content .= '<input name="email" type="email" id="email" class="form-control" placeholder="Email" required autofocus>';
        $content .= '<label for="wachtwoord" class="sr-only">Wachtwoord</label>';
        $content .= '<input name="wachtwoord" type="password" id="wachtwoord" class="form-control" placeholder="Wachtwoord" required>';
        $content .= '<button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>';
        $content .= '<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>';
        $content .= '</form>';

        return $content;
    }

    public function getUID() {
        global $mysql;
        $email = $_SESSION["username"];
        $query = $mysql->query("SELECT id FROM crm_medewerker_login WHERE email = '{$email}'");
        while($x = mysqli_fetch_assoc($query)) { 
        return htmlspecialchars($x["id"]); 
        }
    }

    private function getRechten($recht, $email) {
        global $mysql;
        $query = $mysql->query("SELECT {$recht} FROM crm_medewerker_login WHERE email = '{$email}'");
        while($x = mysqli_fetch_assoc($query)) { return htmlspecialchars($x["{$recht}"]); }
    }
}
?>