<?php
class Registratie {
    public function showRegistratie() {

        $page = "<form action=\"\" method=\"post\">
                    <input type=\"text\" name=\"voornaam\" placeholder=\"Voornaam\">
                    <input type=\"text\" name=\"achternaam\" placeholder=\"Achternaam\">
                    <input type=\"email\" name=\"email\" placeholder=\"E-mail address\">
                    <input type=\"password\" name=\"password\" placeholder=\"Wachtwoord\">
                    <input type=\"password\" name=\"password_herhaling\" placeholder=\"Wachtwoord (herhaling)\">
                    <input type=\"text\" name=\"address\" placeholder=\"Address\">
                    <input type=\"text\" name=\"huisnummer\" placeholder=\"Huisnummer (met e.v.t. toevoeging)\">
                    <input type=\"text\" name=\"postcode\" placeholder=\"Postcode\">
                    <input type=\"text\" name=\"woonplaats\" placeholder=\"Woonplaats\">
                    <input type=\"submit\" value=\"Verzend registratie\">
                </form>";

        return $page;
    }

    public function checkMail($input)                               { return true; }
    public function checkTextOnly($input)                           { return true; }
    public function checkPassword($password, $passwordControlle)    { return true; }
    public function checkHuisnummer($input)                         { return true; }
    public function checkPostcode($input)                           { return true; }

    public function postRegistratie($voornaam, $achternaam, $email, $wachtwoord, $wachtwoordControlle, $address, $huisnummer, $postcode, $woonplaats) {
        
        if($this->checkTextOnly($voornaam) === true)                            { $voornaamCheck = true; }      else { $voornaamCheck = false; }
        if($this->checkTextOnly($achternaam) === true)                          { $achternaamCheck = true; }    else { $achternaamCheck = false; }
        if($this->checkMail($email) === true)                                   { $emailCheck = true; }         else { $emailCheck = false; }
        if($this->checkPassword($wachtwoord, $wachtwoordControlle) === true)    { $wachtwoordCheck = true; }    else { $wachtwoordCheck = false; }
        if($this->checkTextOnly($address) === true)                             { $addresssCheck = true; }      else { $addresssCheck = false; }
        if($this->checkHuisnummer($huisnummer) === true)                        { $huisnummerCheck = true; }    else { $huisnummerCheck = false; }
        if($this->checkPostcode($postcode) === true)                            { $postcodeCheck = true; }      else { $postcodeCheck = false; }
        if($this->checkTextOnly($woonplaats) === true)                          { $woonplaatsCheck = true; }    else { $woonplaatsCheck = false; }

        if($voornaamCheck === true && $achternaamCheck === true && $emailCheck === true && $wachtwoordCheck === true && $addresssCheck === true && $huisnummerCheck === true && $postcodeCheck === true && $woonplaatsCheck === true) {
            return true;
        } else {
            return false;
       }


    }
}
?>