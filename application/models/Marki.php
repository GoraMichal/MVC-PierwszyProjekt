<?php

class Marki extends Model{
    public function getMarki()
    {
        $sth = $this->db->prepare('SELECT marki_id, marki_nazwa FROM marki');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function usunMarki($idMarki)
    {
        $sth = $this->db->prepare('DELETE FROM marki WHERE marki_id=:marki_id');
        $sth->bindParam(':marki_id' , $idMarki , PDO::PARAM_STR);
        $sth->execute();
    }
}


