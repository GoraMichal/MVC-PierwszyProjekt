<?php

class UserStorage {

    public function __construct() {

    }
//do ustalenia zmiennej w sesji
    public function setUserData( $userData ) {
        $_SESSION['userData'] = $userData;
        $_SESSION['userData']['logged'] = true;
    }
//czy zalogowany czy nie
    public function isAuthenticate() {
        return ( isSet( $_SESSION['userData']['logged'] ) && $_SESSION['userData']['logged'] == true  ) ? true : false;
    }

    public function getUserData() {
        return ( isSet( $_SESSION['userData']['logged'] ) && $_SESSION['userData']['logged'] == true  ) ? $_SESSION : false;
    }

    public function logout() {
        unset( $_SESSION['userData'] );
    }
}