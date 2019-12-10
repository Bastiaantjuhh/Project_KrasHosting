<?php
class Beheer {
    public function Medewerkers() {
        global $mysql;

        $query     = $mysql->query("SELECT id, voornaam, achternaam FROM crm_medewerker_login");
        $content   = "<table>";
    
        while($x = mysqli_fetch_assoc($query)) {
            $content .= "<tr>";
            $content .= "<td>" . htmlspecialchars($x["voornaam"]) ."</td>";
            $content .= "<td>" . htmlspecialchars($x["achternaam"]) ."</td>";
            $content .= "<td><a role='button' class='btn btn-primary btn-sm' href='medewerker_beheer_details.php?id=". htmlspecialchars($x["id"])."'>Details</a></td>";
            $content .= "<td><a role='button' class='btn btn-danger btn-sm' href='medewerker_verwijderen.php?id=". htmlspecialchars($x["id"])."'>Verwijderen</a></td>";
            $content .= "</tr>";
        }
    
        $content .= "</table>";

        return $content;
    }

    public function Medewerker($medewerkerID) {
        global $mysql;

        $query     = $mysql->query("SELECT id, voornaam, achternaam, email FROM crm_medewerker_login WHERE id = ". $medewerkerID ."");
        $content   = '<table>';
    
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

    public function medewerkerNieuw($naam, $achternaam, $email, $wachtwoord) {
        global $mysql;

        $mysql->query("INSERT INTO crm_medewerker_login (voornaam, achternaam, email, wachtwoord) VALUES ('{$naam}', '{$achternaam}', '{$email}', '{$wachtwoord}')");
    }

    public function medewerkerNieuwForm() {
        $content = '<form action="" method="POST">';
        $content .= '<div class="form-group"><label for="voornaam">Voornaam</label><input type="text" class="form-control" name="voornaam" id="voornaam" placeholder="Voornaam"></div>';
        $content .= '<div class="form-group"><label for="achternaam">Achternaam</label><input type="text" class="form-control" name="achternaam" id="achternaam" placeholder="Achternaam"></div>';
        $content .= '<div class="form-group"><label for="email">E-mail</label><input type="email" class="form-control" name="email" id="email" placeholder="E-mail"></div>';
        $content .= '<div class="form-group"><label for="wachtwoord">Wachtwoord</label><input type="password" class="form-control" name="wachtwoord" id="wachtwoord" placeholder="Wachtwoord"></div>';
        $content .= '<button type="submit" class="btn btn-primary">Toevoegen</button></form>';
        
        return $content;
    }

    public function medewerkerVerwijderen($id) {
        global $mysql;
        $mysql->query("DELETE FROM crm_medewerker_login WHERE id = {$id}");
    }
}