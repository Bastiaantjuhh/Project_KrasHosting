<?php
class Login {
    private $username;
    private $password;

    public function doLogin($username, $password) {
        global $mysql;

        $password2 = hash("sha1", $password);

        $this->username = $username;
        $this->password = $password2;

        $queryLogin = $mysql->query("SELECT email, wachtwoord FROM crm_medewerker_login WHERE email = '". $username ."' AND wachtwoord = '". $password2 ."'");
        
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
        
        $mysql->query("UPDATE crm_medewerker_login SET wachtwoord_counter = 0 WHERE  email = '". $username ."'");
    }

    public function incorrectLogin($username) {
       global $mysql;
       $mysql->query("UPDATE crm_medewerker_login SET wachtwoord_counter = wachtwoord_counter + 1 WHERE  email = '". $username ."'");

       echo $this->suspendedAccount($username);
    }

    public function correctLogin($username) {
        if ($this->suspendedCheck($username) === false) {
            $this->resetIncorrectPassCount($username);

            $_SESSION["logged-in"]  = true;
            $_SESSION["isadmin"]    = true;
            $_SESSION["user"]       = $username;
        } else {
            
            echo "<p>Account is geblokeerd. Contacteer beheerder a.u.b.</p>";
        }
    }

    public function suspendedAccount($username) {
        global $mysql;

        $querySusspend = $mysql->query("SELECT email, wachtwoord_counter FROM crm_medewerker_login WHERE email = '". $username ."' AND wachtwoord_counter = 3");

        if ($querySusspend->num_rows > 0) { 
            $mysql->query("UPDATE crm_medewerker_login SET suspended = true WHERE  email = '". $username ."'");
        }
    }

    public function suspendedCheck($username) {
        global $mysql;

        $querySusspend = $mysql->query("SELECT email, wachtwoord_counter FROM crm_medewerker_login WHERE email = '". $username ."' AND wachtwoord_counter = 3");

        if ($querySusspend->num_rows > 0) { 
            return true;
        } else {
            return false;
        }
    }


    public function showLogin() {

        $page = '<form aclass="form-signin" action="" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Inloggen</h1>
        <label for="email" class="sr-only">Email address</label>
                    <input type="email" class="form-control"  name="email" placeholder="E-mail address\">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" class="form-control"  name="password" placeholder="Wachtwoord">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
                </form>';

        return $page;
    }
}
?>