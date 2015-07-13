<?php
class Rejestracja extends Model{
    public function rejestracjaUser($params = array())
    {
        $sth = $this->db->prepare('INSERT INTO user (login, password)
          VALUES (:login, :password )');

        $sth->bindParam(':login', $params['login'], PDO::PARAM_STR);
        $sth->bindParam(':password', $params['password'], PDO::PARAM_STR);
        $sth->execute();
    }

}