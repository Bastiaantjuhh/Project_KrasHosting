<?php
class CRM {
    private $klantid;
    private $pakketid;

    public function Klanten() {
        global $mysql;

        $query      = $mysql->query("SELECT id, voornaam, achternaam FROM login_klanten WHERE archief = 0");
        $content   = "<table>";
    
        while($x = mysqli_fetch_assoc($query)) {
    
        $content .= "<tr>";
        $content .= "<td>" . htmlspecialchars($x["voornaam"]) ."</td>";
        $content .= "<td>" . htmlspecialchars($x["achternaam"]) ."</td>";
        $content .= "<td><a role='button' class='btn btn-primary btn-sm' href='klanten_details.php?id=". htmlspecialchars($x["id"])."'>Details</a></td>";
        $content .= "</tr>";
        }
    
        $content .= "</table>";

        return $content;

    }

    public function klantDetails($klantID) {
        global $mysql;

        $query     = $mysql->query("SELECT id, voornaam, achternaam, email, address, huisnummer, postcode, woonplaats FROM login_klanten WHERE id = ".$klantID."");
        $content   = "<table>";
    
        while($x = mysqli_fetch_assoc($query)) {
    
            $content .= "<tr>";
                $content .= "<td>Voornaam: </td>";
                $content .= "<td>" . htmlspecialchars($x["voornaam"]) ."</td>";
            $content .= "</tr>";
            $content .= "<tr>";
                $content .= "<td>Achternaam: </td>";
                $content .= "<td>" . htmlspecialchars($x["achternaam"]) ."</td>";
            $content .= "</tr>";
            $content .= "<tr>";
                $content .= "<td>Mail: </td>";
                $content .= "<td>" . htmlspecialchars($x["email"]) ."</td>";
            $content .= "</tr>";
            $content .= "<tr>";
                $content .= "<td>Address: </td>";
                $content .= "<td>" . htmlspecialchars($x["address"]) ."</td>";
            $content .= "</tr>";
            $content .= "<tr>";
                $content .= "<td>Huisnummer: </td>";
                $content .= "<td>" . htmlspecialchars($x["huisnummer"]) ."</td>";
            $content .= "</tr>";
            $content .= "<tr>";
                $content .= "<td>Postcode: </td>";
                $content .= "<td>" . htmlspecialchars($x["postcode"]) ."</td>";
            $content .= "</tr>";
            $content .= "<tr>";
                $content .= "<td>Woonplaats: </td>";
                $content .= "<td>" . htmlspecialchars($x["woonplaats"]) ."</td>";
            $content .= "</tr>";
            $content .= "<tr>";
                $content .= "<td></td>";
                $content .= "<td><a role='button' class='btn btn-danger btn-sm' href='klanten_naar_archief.php?id=". htmlspecialchars($x["id"])."'>Archieveer</a></td>";
            $content .= "</tr>";
        }
    
        $content .= "</table>";

        return $content;

    }

    public function klantDiensten($klantID) {
        global $mysql;

        $query = $mysql->query("SELECT id_klant, id_pakket FROM crm_klant_bestellingen WHERE id_klant = ".$klantID."");
        $content = "<ul>";

        while($x = mysqli_fetch_assoc($query)) {

            $idPakketLoad = $x["id_pakket"];
            $query2 = $mysql->query("SELECT id, naam FROM pakketten WHERE id = '{$idPakketLoad}'");

            while($y = mysqli_fetch_assoc($query2)) { $content .= "<li>". $y["naam"] ."</li>"; }  
        }

        $content .= "</ul>";
        return $content;
    }

    // TODO: Afmaken met e.v.t. rechten
    public function klantNaarArchief($klantID) {
        global $mysql;

        $mysql->query("UPDATE login_klanten SET archief = 1 WHERE  id = '". $klantID ."'");
    }

    // TODO
    public function klantBewerkenForm($klantID) {
        global $mysql;
    }

    // TODO
    public function klantBewerken($klantID) {
        global $mysql;
    }

    public function nieuweKlantForm() {
        $content = '<form action="" method="POST">';
        $content .= '<div class="form-group"><label for="voornaam">Voornaam</label><input type="text" class="form-control" name="voornaam" id="voornaam" placeholder="Voornaam"></div>';
        $content .= '<div class="form-group"><label for="achternaam">Achternaam</label><input type="text" class="form-control" name="achternaam" id="achternaam" placeholder="Achternaam"></div>';
        $content .= '<div class="form-group"><label for="email">E-mail</label><input type="email" class="form-control" name="email" id="email" placeholder="E-mail"></div>';
        $content .= '<div class="form-group"><label for="wachtwoord">Wachtwoord</label><input type="password" class="form-control" name="wachtwoord" id="wachtwoord" placeholder="Wachtwoord"></div>';
        $content .= '<div class="form-group"><label for="address">Address</label><input type="text" class="form-control" name="address" id="address" placeholder="Address"></div>';
        $content .= '<div class="form-group"><label for="postcode">Postcode</label><input type="text" class="form-control" name="postcode" id="postcode" placeholder="Postcode"></div>';
        $content .= '<div class="form-group"><label for="nummer">Huisnummer</label><input type="text" class="form-control" name="nummer" id="nummer" placeholder="Huisnummer"></div>';
        $content .= '<div class="form-group"><label for="plaats">Plaats</label><input type="text" class="form-control" name="plaats" id="plaats" placeholder="Plaats"></div>';
        $content .= '<button type="submit" class="btn btn-primary">Toevoegen</button></form>';
        
        return $content;
    }
    /*	
voornaam, achternaam, email, wachtwoord, address, huisnummer, postcode, woonplaats

*/
    // echo $medewerkerBeheer->nieuweKlant($_POST["voornaam"], $_POST["achternaam"], $_POST["email"], hash("sha1", $_POST["wachtwoord"]), $_POST["address"], $_POST["postcode"], $_POST["nummer"], $_POST["plaats"]);
    public function nieuweKlant($naam, $achternaam, $email, $wachtwoord, $address, $huisnummer, $postcode, $woonplaats) {
        global $mysql;

        $mysql->query("INSERT INTO login_klanten (voornaam, achternaam, email, wachtwoord, address, huisnummer, postcode, woonplaats) VALUES ('{$naam}', '{$achternaam}', '{$email}', '{$wachtwoord}', '{$address}', '{$huisnummer}', '{$postcode}', '{$woonplaats}')");
    }
}