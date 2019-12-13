<?php
class Nieuws {
    public function getNieuws($isAdmin) {
        global $mysql; 

        $query = $mysql->query("SELECT id, datum, titel, auteur, content FROM news");

        $content = "<table class='table-nieuws'>";

        while($row = $query->fetch_assoc()) {
            $content .= "<tr>";
            $content .= "<td class='td-datum' style='width: 100px;'>";
            $content .= htmlspecialchars($row['datum']);
            $content .="</td>";
            $content .= "<td class='td-titel'>";
            $content .= htmlspecialchars($row['titel']);
            $content .="</td>";
            $content .= "<td class='td-auteur'>";
            $content .= htmlspecialchars($row['auteur']);
            $content .="</td>";

            if($isAdmin === false) {
                $content .= "<td class='td-content'>";
                $content .= htmlspecialchars($row['content']);
                $content .="</td>";
            }

            if($isAdmin === true) {
                $content .= "<td>";
                $content .= "<div class='btn-group' role='group'><a class='btn btn-primary btn-sm' role='button' href='nieuws_bewerken.php?id=". $row['id'] ."'>wijzigen</a>";
                $content .= "<a class='btn btn-danger btn-sm' role='button'  href='nieuws_verwijderen.php?id=". $row['id'] ."'>verwijderen</a></div>";
                $content .="</td>";
            }
            
            $content .= "</tr>";  
        };

        $content .= "</table>";

        return $content;
    }

    public function verwijderenNieuws($id) {
        global $mysql;
        $result = $mysql->query("DELETE FROM news WHERE id = '{$id}'");
    }

    public function toevoegenNieuwsForm() {
        $content = '<form action="" method="POST">';
        $content .= '<div class="form-group"><label for="datum">Datum:</label><input value='. date("d-m-Y") .' type="text" class="form-control" id="datum" name="datum" placeholder="Datum" disabled></div>';
        $content .= '<div class="form-group"><label for="titel">Titel:</label><input type="text" class="form-control" id="titel" name="titel" placeholder="Titel"></div>';
        $content .= '<div class="form-group"><label for="auteur">Auteur:</label><input type="text" class="form-control" id="auteur" name="auteur" value="'. $_SESSION["u_realname"] .'" placeholder="Auteur" disabled></div>';
        $content .= '<div class="form-group"><label for="content">Content:</label><textarea type="text" class="form-control" id="content" rows="6" name="content" placeholder="Content"></textarea></div>';
        $content .= '<button type="submit" class="btn btn-primary">Opslaan</button></form>';

        return $content;
    }

    public function toevoegenNieuws($datum, $title, $auteur, $content) {
        global $mysql;
        $mysql->query("INSERT INTO news (datum, titel, auteur, content) VALUES ('{$datum}', '{$title}', '{$auteur}', '{$content}')");
    }

    public function updateNieuwsForm($id) {
        global $mysql; 

        $query = $mysql->query("SELECT id, datum, titel, auteur, content FROM news WHERE id = {$id}");

        $content = '<form action="" method="POST">';

        while($row = $query->fetch_assoc()) {
            
            $content .= '<div class="form-group"><label for="datum">Datum:</label><input type="text" class="form-control" id="datum" name="datum" value="'. htmlspecialchars($row['datum']) .'" placeholder="Datum"></div>';
            $content .= '<div class="form-group"><label for="titel">Titel:</label><input type="text" class="form-control" id="titel" name="titel" value="'. htmlspecialchars($row['titel']) .'" placeholder="Titel"></div>';
            $content .= '<div class="form-group"><label for="auteur">Auteur:</label><input type="text" class="form-control" id="auteur" name="auteur" value="'. htmlspecialchars($row['auteur']) .'" placeholder="Auteur"></div>';
            $content .= '<div class="form-group"><label for="content">Content:</label><textarea type="text" class="form-control" id="content" rows="6" name="content" placeholder="Content">'. htmlspecialchars($row['content']) .'</textarea></div>';
        };

        $content .= '<button type="submit" class="btn btn-primary">Opslaan</button></form>';

        return $content;
    }

    public function updateNieuws($nieuwsID, $datum, $titel, $auteur, $content) {
        global $mysql;
        $mysql->query("UPDATE news SET datum = '{$datum}', titel = '{$titel}', auteur = '{$auteur}', content = '{$content}' WHERE id = {$nieuwsID}");

        return "<p>Nieuws is bewerkt</p>";
    }
}

?>