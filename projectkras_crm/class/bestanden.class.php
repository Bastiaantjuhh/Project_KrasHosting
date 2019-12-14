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

        $content = "<ul>";

        // De "preg_match" is nodig vanwege een BUG met zogenoemde DOTFILES
        // BRON: https://stackoverflow.com/questions/8532569/exclude-hidden-files-from-scandir

        foreach(preg_grep('/^([^.])/' , scandir($map)) as $bestand) {
            $content .= '<li><a href="'. $map . "/" . $bestand .'">'. $bestand .'</a></li>';
        }

        $content .= "</ul>";

        if($content === "<ul></ul>") {
            return "<p>Klant heeft nog geen gegevens in ons systeem</p>";
        } else {
            return $content;  
        }
    }

    public function getMapStatus() {
        if(is_dir("data/klanten/" . $this->id)) {
            return true;
        } else {
            return false;
        }
    }

    
/*
    public function uploadForm() {

    }

    public function uploadVerwerken($id) {

    }
*/
}