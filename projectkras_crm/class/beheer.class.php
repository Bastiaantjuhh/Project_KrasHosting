<?php
class Beheer {
    public function getAlleMedewerkers() {
        global $mysql;

        $query     = $mysql->query("SELECT id, voornaam, achternaam FROM crm_medewerker_login");
        $content   = "<table>";
    
        while($x = mysqli_fetch_assoc($query)) {
            $content .= "<tr>";
            $content .= "<td>" . htmlspecialchars($x["voornaam"]) ."</td>";
            $content .= "<td>" . htmlspecialchars($x["achternaam"]) ."</td>";
            $content .= "<td><a role='button' class='btn btn-primary btn-sm' href='medewerker_beheer_details.php?id=". htmlspecialchars($x["id"])."'>Details</a></td>";
            $content .= "</tr>";
        }
    
        $content .= "</table>";

        return $content;
    }

    public function getMedewerker($medewerkerID) {
        global $mysql;

        $query     = $mysql->query("SELECT id, voornaam, achternaam, email FROM crm_medewerker_login WHERE id = ".$medewerkerID."");
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
            $content .= "<td>E-mail: </td>";
            $content .= "<td>" . htmlspecialchars($x["email"]) ."</td>";
            $content .= "</tr>";
        }
    
        $content .= "</table>";

        return $content;
    }

    public function nieuweMedewerker($naam, $achternaam, $email, $wachtwoord) {
        global $mysql;

        //return "INSERT INTO crm_medewerker_login (voornaam, achternaam, email, wachtwoord) VALUES ('{$naam}', '{$achternaam}', '{$email}', '{$wachtwoord}')";

        $mysql->query("INSERT INTO crm_medewerker_login (voornaam, achternaam, email, wachtwoord) VALUES ('{$naam}', '{$achternaam}', '{$email}', '{$wachtwoord}')");
    }

    public function nieuweMedewerkerForm() {

        $content = '<form action="" method="POST">';
        $content .= '<input type="text" name="naam" placeholder="Voornaam">';
        $content .= '<input type="text" name="achternaam" placeholder="Achternaam">';
        $content .= '<input type="text" name="email" placeholder="E-mail">';
        $content .= '<input type="password" name="wachtwoord" placeholder="Wachtwoord">';
        $content .= '<input type="submit">';
        $content .= '</form>';

        return $content;
    }
}