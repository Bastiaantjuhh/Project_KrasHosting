<?php
class Bestanden {
    public $id;

    public function getBestanden($id) {
        $this->id = $id;
        $map = "data/klanten/" . $id;

        if($this->getMapStatus() === false) {
            // Map aanmaken als die niet bestaat
            mkdir($map);
        }

        $content = "<table>";

        // De "preg_match" is nodig vanwege een BUG met zogenoemde DOTFILES
        // BRON: https://stackoverflow.com/questions/8532569/exclude-hidden-files-from-scandir

        foreach(preg_grep('/^([^.])/' , scandir($map)) as $bestand) {
            $content .= '<tr>';
            $content .= '<td><a href="'. $map . "/" . $bestand .'">'. $bestand .'</a></td>';
            $content .= '<td><a role="button" class="btn btn-danger btn-sm" href="klant_details_bestand_verwijderen.php?file='. $map . "/" . $bestand . '">Verwijder</a></td>';
            $content .= '</tr>';
        }

        $content .= "</table>";

        if($content === "<table></table>") {
            return "<p>Klant heeft nog geen gegevens in ons systeem</p>";
        } else {
            return $content;  
        }
    }

    private function getMapStatus() {
        if(is_dir("data/klanten/" . $this->id)) {
            return true;
        } else {
            return false;
        }
    }

    public function Verwijderen($bestand) {
        unlink($bestand);
    }

    public function uploadForm() {
        $content = '<form action="" method="POST" enctype="multipart/form-data">';
        $content .= '<input type="file" name="file" id="file">';
        $content .= '<input type="submit" value="Upload" name="submit">';
        $content .=  '</form>';

        return $content;
    }

    public function uploadVerwerken($uid) {
        $opslagPlaats = "data/klanten/" . $uid . "/";   
        $doelBestand = $opslagPlaats.$_FILES['file']['name'];

        move_uploaded_file($_FILES['file']['tmp_name'], $doelBestand);

    }

}