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
        $query = $mysql->query("SELECT id, {$recht} FROM crm_medewerker_login WHERE id = {$medewerkerID}");
        while($x = mysqli_fetch_assoc($query)) { 
           return htmlspecialchars($x["{$recht}"]);
         }
    }

    public function setRechten($recht, $medewerkerID, $boolean) {
        global $mysql;
        $mysql->query("UPDATE crm_medewerker_login SET {$recht} = '{$boolean}' WHERE id = {$medewerkerID}");
    }

    public function getRechtenLijst($medewerkerID) {
        // Lezen spreekt voor zich, zit er voor zekerheid wel in. Reden hiervoor is dat mocht een 
        // user disabled moeten worden of iets dergelijks het wel mogenlijk is om dat te regelen.
        // Scrijven wordt niet gebruikt op dit moment daarom disabled

        /*
        $items .= "<tr><td>Lezen: </td>";
        if ($this->getRechten("r_lezen", $medewerkerID) === "1") {
            $items .= '<td><select id="l" name="r_lezen"><option selected="selected" value="1">Ja</option><option value="0">Nee</option></select></td>';
        } else {
            $items .= '<td><select id="l" name="r_lezen"><option value="1">Ja</option><option selected="selected" value="0">Nee</option></select></td>';
        }
        $items .= "</tr><tr><td>Scrijven: </td>";
        if ($this->getRechten("r_scrijven", $medewerkerID) === "1") {
            $items .= '<td><select id="s" name="r_scrijven"><option selected="selected" value="1">Ja</option><option value="0">Nee</option></select></td>';
        } else {
            $items .= '<td><select id="s" name="r_scrijven"><option value="1">Ja</option><option selected="selected" value="0">Nee</option></select></td>';
        }
        */
/*
<div class="form-group"><label for="exampleFormControlSelect1">Example select</label>
<select name="r_verwijderen" class="form-control" id="exampleFormControlSelect1">
<option selected="selected" value="1">Ja</option><option value="0">Nee</option>
</select></div>

<td><select id="v" name="r_verwijderen"></td>*/
/*
        <option selected="selected" value="1">Ja</option><option value="0">Nee</option>
*/
        $items = '<form method="POST" action="">';
        
        $items .= '<div class="form-group"><label for="v">Verwijderen</label><select name="r_verwijderen" class="form-control" id="exampleFormControlSelect1">';
        if ($this->getRechten("r_verwijderen", $medewerkerID) === "1") {
            $items .= '<option name="" selected="selected" value="1">Ja</option><option value="0">Nee</option>';
        } else {
            $items .= '<option value="1">Ja</option><option selected="selected" value="0">Nee</option>';
        }
        $items .= '</select></div>';

        $items .= '<div class="form-group"><label for="b">Bewerken</label><select name="r_bewerken" class="form-control" id="exampleFormControlSelect1">';
        if ($this->getRechten("r_bewerken", $medewerkerID) === "1") {
            $items .= '<option selected="selected" value="1">Ja</option><option value="0">Nee</option>';
        } else {
            $items .= '<option value="1">Ja</option><option selected="selected" value="0">Nee</option>';
        }
        $items .= '</select></div>';

        $items .= '<div class="form-group"><label for="a">Administrator</label><select name="r_admin" class="form-control" id="exampleFormControlSelect1">';
        if ($this->getRechten("r_admin", $medewerkerID) === "1") {
            $items .= '<option selected="selected" value="1">Ja</option><option value="0">Nee</option>';
        } else {
            $items .= '<option value="1">Ja</option><option selected="selected" value="0">Nee</option>';
        }
        $items .= '</select></div>';
        $items .= '<button type="submit" class="btn btn-primary btn-sm">Opslaan</button></form>';
        $items .= '</form>';

        return $items;
    }
}
?>