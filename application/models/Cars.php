<?php

class Cars extends Model{
    public function getSamochody($from, $limit)
    {
        $sth = $this->db->prepare('SELECT samochody.*, marki.marki_id FROM samochody LEFT JOIN marki ON samochody.marki_id = marki.marki_id ORDER BY samochody_id DESC LIMIT '.$from.', '.$limit.' ');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function usunSamochody($idAuta)
    {
        $sth = $this->db->prepare('DELETE FROM samochody WHERE samochody_id =:samochody_id');
        $sth->bindParam(':samochody_id' , $idAuta , PDO::PARAM_STR);
        $sth->execute();
    }

    public function viewSamochody()
    {
        $sth = $this->db->prepare('SELECT marki_id, marki_nazwa FROM marki');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function acceptAddSamochody($params = array())
    {
        $sth = $this->db->prepare('INSERT INTO samochody (marki_id , samochody_nazwa, samochody_opis, samochody_zdjecie)
          VALUES (:marka, :nazwa, :opis , :zdjecie)');

        $sth->bindParam(':nazwa', $params['nazwaAuta'], PDO::PARAM_STR);
        $sth->bindParam(':opis', $params['opisAuta'], PDO::PARAM_STR);
        $sth->bindParam(':marka', $params['nazwaMarki'], PDO::PARAM_STR);
        $sth->bindParam(':zdjecie', $params['zdjecie'], PDO::PARAM_STR);
        $sth->execute();

    }

    public function editSamochody($params = array())
    {
        $sth = $this->db->prepare('UPDATE samochody SET samochody_nazwa = :samochody_nazwa, samochody_opis = :opis, marki_id = :marki_id, samochody_zdjecie = :zdjecie
    WHERE samochody_id = :samochody_id');

        $sth->bindParam(':samochody_nazwa', $params['nazwaAuta'], PDO::PARAM_STR);
        $sth->bindParam(':opis', $params['opis'], PDO::PARAM_STR);
        $sth->bindParam(':marki_id', intval($params['marki']), PDO::PARAM_INT);
        $sth->bindParam(':samochody_id', $params['id'], PDO::PARAM_INT);
        $sth->bindParam(':zdjecie', $params['zdjecie'], PDO::PARAM_STR);
        $sth->execute();

    }

    public function getAuto($id)
    {
        $sth = $this->db->prepare('SELECT * FROM samochody WHERE samochody_id = :id ');
        $sth->bindParam(':id',$id, PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetch();
    }

    public function carCount()
    {
        $sth = $this->db->prepare( 'SELECT COUNT(*) AS count FROM samochody' );
        $sth->execute();
        $result = $sth->fetch();
        return $result[ 'count' ];
    }
}