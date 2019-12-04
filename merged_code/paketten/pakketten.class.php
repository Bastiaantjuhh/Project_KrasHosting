<?php
class Pakketten {
    public function getPakketten() {
        global $mysql;

        $query      = "SELECT * FROM pakketten";
        $result     = $mysql->query($query);
        $content    = "<table>";

        while($row = $result->fetch_assoc()) {
            $content .= "<tr>";
            $content .= "<td>";
            $content .= htmlspecialchars($row['id']) ;
            $content .="</td>";
            $content .= "<td height='50px'>";
            $content .= htmlspecialchars($row['naam']) ;
            $content .="</td>";
            $content .= "<td>";
            $content .= htmlspecialchars($row['prijs']) ;
            $content .="</td>";
            $content .= "<td>";
            $content .= htmlspecialchars($row['inhoud']);
            $content .="</td>";
            $content .= "<td>";
            $content .= "<a href=p_update.php?id=". $row['id'] .">wijzigen</a>";
            $content .= "<td>";
            $content .= "<td>";
            $content .= "<a href=p_delete.php?id=". $row['id'] .">verwijderen</a>";
            $content .="</td>";
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

        $mysql->query("INSERT INTO pakketten (naam, prijs, inhoud) VALUES '{$naam}', '{$prijs}', '{$prijs}'");
    }

    public function toevoegenPakketForm() {
        $content = '<form action="p_toevogenQuery.php" method="post">';
        $content .= '<input name="naam" placeholder="Naam" type="text">';
        $content .= '<input name="prijs" placeholder="Prijs" type="text">';
        $content .= '<input  name="inhoud" placeholder="inhoud" type="text">';
        $content .= '<input type="submit" name="submit" value="submit">';
        $content .= '</form>';

        return $content;
    }

    // TODO: toevoegen & wekend krijge
    //
    // SQL QUERY: "UPDATE `pakketten` SET `id`=[value-1],`naam`=[value-2],`prijs`=[value-3],`inhoud`=[value-4] WHERE 1"
    public function updatePakket($pakketID, $naam, $prijs, $inhoud) {
        global $mysql;
        $mysql->query("UPDATE pakketten SET naam = '{$naam}', prijs = '{$prijs}', inhoud = '{$inhoud}' WHERE id = {$pakketID}");
    }

    public function updatePakketForm($id) {
        global $mysql;

        $result = $mysql->query("SELECT * FROM pakketten WHERE id = '{$id}'");
        $row    = $result->fetch_assoc();

        $content = '<form method="POST" action="">';
        $content .= '<input hidden name="id"  type="hidden" value="'. $id .'">';
        $content .= '<input name="naam" type="text" value="'. $row["naam"] .'" placeholder="naam">';
        $content .= '<input name="prijs" type="text" value="'. $row["prijs"] .'" placeholder="prijs">';
        $content .= '<input name="inhoud" type="text" value="'. $row['inhoud'] .'" placeholder="inhoud">';
        $content .= '<input name="bewaren"  type="submit" value="bewaren">';
        $content .= '</form>';

        return $content;
    }

    public function verwijderenPakket($pakketID) {
        global $mysql;

        $mysql->query("DELETE FROM pakketten WHERE id = {$pakketID}");
    }
}
?>