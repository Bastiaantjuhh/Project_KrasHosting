<?php
class Pakketten {
    public function getPakketten($isAdmin) {
        global $mysql;

        $query      = "SELECT * FROM pakketten";
        $result     = $mysql->query($query);
        $content    = "<table>";

        while($row = $result->fetch_assoc()) {
            $content .= "<tr>";
            //$content .= "<td>";
            //$content .= htmlspecialchars($row['id']) ;
            //$content .="</td>";
            $content .= "<td height='50px'>";
            $content .= htmlspecialchars($row['naam']) ;
            $content .="</td>";
            $content .= "<td>";
            $content .= htmlspecialchars($row['prijs']) ;
            $content .="</td>";
            $content .= "<td>";
            $content .= htmlspecialchars($row['inhoud']);
            $content .="</td>";

            if($isAdmin === true) {
                $content .= "<td>";
                $content .= "<div class='btn-group' role='group'><a class='btn btn-primary btn-sm' role='button' href='pakketten_bewerken.php?id=". $row['id'] ."'>wijzigen</a>";
                $content .= "<a class='btn btn-danger btn-sm' role='button'  href='pakketten_verwijderen.php?id=". $row['id'] ."'>verwijderen</a></div>";
                $content .="</td>";
            }

            $content .= "</tr>";
            
        }

        $content .= "</table>";

        return $content;
    }

    // Verwacht nog nodig te hebben...
    /*
    public function getPakket($pakketID) {
        global $mysql;
    }
    */

    public function toevoegenPakket($naam, $prijs, $inhoud) {
        global $mysql;

        $mysql->query("INSERT INTO pakketten (naam, prijs, inhoud) VALUES ('{$naam}', '{$prijs}', '{$prijs}')");

        return "<p>Pakket is toegevoegd</p>";
    }

    public function toevoegenPakketForm() {
        $content = '<form action="" method="POST">';
        $content .= '<div class="form-group"><label for="naam">Naam:</label><input type="text" class="form-control" id="naam" name="naam" placeholder="Naam"></div>';
        $content .= '<div class="form-group"><label for="prijs">Prijs:</label><input type="text" class="form-control" id="prijs" name="prijs" placeholder="Prijs"></div>';
        $content .= '<div class="form-group"><label for="inhoud">Inhoud:</label><input type="text" class="form-control" id="inhoud" name="inhoud" placeholder="Inhoud"></div>';
        $content .= '<button type="submit" class="btn btn-primary">Opslaan</button></form>';

        return $content;
    }

    public function updatePakket($pakketID, $naam, $prijs, $inhoud) {
        global $mysql;
        $mysql->query("UPDATE pakketten SET naam = '{$naam}', prijs = '{$prijs}', inhoud = '{$inhoud}' WHERE id = {$pakketID}");
    }

    public function updatePakketForm($id) {
        global $mysql;

        $result = $mysql->query("SELECT * FROM pakketten WHERE id = '{$id}'");
        $row    = $result->fetch_assoc();

        $content = '<form action="" method="POST">';
        $content .= '<div class="form-group"><label for="naam">Naam:</label><input type="text" class="form-control" id="naam" name="naam" value="'. $row["naam"] .'" placeholder="Naam"></div>';
        $content .= '<div class="form-group"><label for="prijs">Prijs:</label><input type="text" class="form-control" id="prijs" name="prijs" value="'. $row["prijs"] .'" placeholder="Prijs"></div>';
        $content .= '<div class="form-group"><label for="inhoud">Inhoud:</label><input type="text" class="form-control" id="inhoud" name="inhoud" value="'. $row['inhoud'] .'" placeholder="Inhoud"></div>';
        $content .= '<button type="submit" class="btn btn-primary">Opslaan</button></form>';
        
        return $content;
    }

    public function verwijderenPakket($pakketID) {
        global $mysql;

        $mysql->query("DELETE FROM pakketten WHERE id = {$pakketID}");
    }
}
?>