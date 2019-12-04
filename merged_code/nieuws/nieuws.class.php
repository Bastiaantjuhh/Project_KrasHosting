<?php
class Nieuws {

    public function getNieuws() {
        global $mysql; 

        $query = $mysql->query("SELECT id, datum, titel, auteur, content FROM news");

        $content = "<table>";

        while($row = $query->fetch_assoc()) {
            $content .= "<tr>";
            $content .= "<td>";
            $content .="</td>";
            $content .= "<td>";
            $content .= htmlspecialchars($row['datum']);
            $content .="</td>";
            $content .= "<td>";
            $content .= htmlspecialchars($row['titel']);
            $content .="</td>";
            $content .= "<td>";
            $content .= htmlspecialchars($row['auteur']);
            $content .="</td>";
            $content .= "<td>";
            $content .= htmlspecialchars($row['content']);
            $content .="</td>";
            $content .= "<td>";
            $content .= "<a href=Medewerker_bewerken.php?id=". $row['id'] .">wijzigen</a>";
            $content .= "<td>";
            $content .= "<td>";
            $content .= "<a href=news_delete.php?id=". $row['id'] .">verwijderen</a>";
            $content .="</td>";
            $content .= "<br>";
            $content .= "</tr>";  
        };

        $content .= "</table>";

        return $content;
    }

    public function verwijderNiuws($id) {
        global $mysql;
        $result = $mysql->query("DELETE FROM news WHERE id = '{$id}'");
    }

    public function toevoegenNieuwsForm() {
        $content = '<form action="" method="POST">';
        $content .= '<input name="datum" type="text" value="00/00/00">';
        $content .= '<input name="titel" type="text" value="titel">';
        $content .= '<input name="autuer" type="text" value="Autuer">';
        $content .= '<input name="content" type="text" value="content">';
        $content .= '<input type="submit" name="submit" value="submit">';
        $content .= '</form>';

        return $content;
    }

    public function toevoegenNieuws($datum, $title, $auteur, $content) {
        global $mysql;
        $mysql->query("INSERT INTO news (datum, titel, auteur, content) VALUES ('{$datum}', '{$title}', '{$auteur}', '{$content}')");
    }

    public function updateNieuwsForm($uid, $nieuwsID) {
        global $mysql;

        $result = $mysql->query("SELECT * FROM news WHERE id = '{$nieuwsID}'");
        $row    = $result->fetch_assoc();

        $content = '<form method="POST" action="">';
        $content .= '<input hidden name="idmedewerkers"  type="hidden" value="'. $uid .'">';
        $content .= '<input name="datum" type="text" value="'. $row["datum"] .'" placeholder="datum">';
        $content .= '<input name="titel" type="text" value="'. $row["titel"] .'" placeholder="titel">';
        $content .= '<input name="auteur" type="text" value="'. $row['auteur'] .'" placeholder="auteur">';
        $content .= '<input name="content" type="text" value="'. $row['content'] .'" placeholder="content">';
        $content .= '<input name="bewaren"  type="submit" value="bewaren">';
        $content .= '</form>';

        return $content;
    }

    public function updateNieuws($nieuwsID, $datum, $titel, $auteur, $content) {
        global $mysql;
        $mysql->query("UPDATE news SET datum = '{$datum}', titel = '{$titel}', auteur = '{$auteur}', content = '{$content}' WHERE id = {$nieuwsID}");
    }
}

?>