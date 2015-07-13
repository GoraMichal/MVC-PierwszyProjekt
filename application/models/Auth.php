<?php

class Auth extends Model
{
    public function getData( $from, $limit )
    {
        $stmt = $this->db->prepare( 'SELECT * FROM user ORDER BY id DESC LIMIT '.$from.', '.$limit.' ');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function userCount()
    {
        $sth = $this->db->prepare( 'SELECT COUNT(*) AS count FROM user' );
        $sth->execute();
        $result = $sth->fetch();
        return $result[ 'count' ];
    }

    public function checkUser( $user )
    {
//        $user[ 'password' ] = md5( $user[ 'password' ] );

        $sth = $this->db->prepare( 'SELECT * FROM user WHERE login = :login AND password = :password' );
        $sth->bindParam( ':login', $user[ 'login' ] );
        $sth->bindParam( ':password', $user[ 'password' ] );
        $sth->execute();
        return $sth->fetch();
    }
}