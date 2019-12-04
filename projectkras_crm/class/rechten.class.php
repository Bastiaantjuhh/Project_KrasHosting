<?php
class Rechten {

    /*
    DB:
        r_lezen         boolean
        r_scrijven      boolean
        r_verwijderen   boolean
        r_bewerken      boolean
        r_admin         boolean

    Bool:
        0   False
        1   True
    */

    public function getRechten($recht, $medewerkerID) {
        global $mysql;
        $query = $mysql->query("SELECT {$recht} FROM crm_medewerker_login WHERE id = {$medewerkerID}");
        while($x = mysqli_fetch_assoc($query)) { return htmlspecialchars($x["{$recht}"]); }
    }

    public function setRechten($recht, $medewerkerID, $boolean) {
        global $mysql;
        $mysql->query("UPDATE crm_medewerker_login SET {$recht} = '{$boolean}' WHERE id = {$medewerkerID}");
    }

    public function getRechtenLijst($medewerkerID) {
        $items = "<table>";

        // Lezen spreekt voor zich, zit er voor zekerheid wel in. 
        // Reden hiervoro is dat mocht een user disabled moeten worden
        // of iets dergelijks het wel mogenlijk is om dat te regelen.

        // $items .= "<tr><td>Lezen: </td>";
        // if ($this->getRechten("r_lezen", $medewerkerID) === "1") {
        //     $items .= '<td><select id="l" name="r_lezen"><option selected="selected" value="1">Ja</option><option value="0">Nee</option></select></td>';
        // } else {
        //     $items .= '<td><select id="l" name="r_lezen"><option value="1">Ja</option><option selected="selected" value="0">Nee</option></select></td>';
        // }

        // Scrijven wordt niet gebruikt op dit moment daarom disabled

        // $items .= "</tr><tr><td>Scrijven: </td>";
        // if ($this->getRechten("r_scrijven", $medewerkerID) === "1") {
        //    $items .= '<td><select id="s" name="r_scrijven"><option selected="selected" value="1">Ja</option><option value="0">Nee</option></select></td>';
        //} else {
        //    $items .= '<td><select id="s" name="r_scrijven"><option value="1">Ja</option><option selected="selected" value="0">Nee</option></select></td>';
        //}

        $items .= "</tr><tr><td>Verwijderen: </td>";
        if ($this->getRechten("r_verwijderen", $medewerkerID) === "1") {
            $items .= '<td><select id="v" name="r_verwijderen"><option selected="selected" value="1">Ja</option><option value="0">Nee</option></select></td>';
        } else {
            $items .= '<td><select id="v" name="r_verwijderen"><option value="1">Ja</option><option selected="selected" value="0">Nee</option></select></td>';
        }

        $items .= "</tr><tr><td>Bewerken: </td>";
        if ($this->getRechten("r_bewerken", $medewerkerID) === "1") {
            $items .= '<td><select id="b" name="r_bewerken"><option selected="selected" value="1">Ja</option><option value="0">Nee</option></select></td>';
        } else {
            $items .= '<td><select id="b" name="r_bewerken"><option value="1">Ja</option><option selected="selected" value="0">Nee</option></select></td>';
        }

        $items .= "</tr><tr><td>Administrator: </td>";
        if ($this->getRechten("r_admin", $medewerkerID) === "1") {
            $items .= '<td><select id="a" name="r_admin"><option selected="selected" value="1">Ja</option><option value="0">Nee</option></select></td>';
        } else {
            $items .= '<td><select id="a" name="r_admin"><option value="1">Ja</option><option selected="selected" value="0">Nee</option></select></td>';
        }

        $items .= "</tr></table>";

        return $items;
    }
}
?>