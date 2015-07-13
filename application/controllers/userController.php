<?php

class userController extends mainController
{
    public function loginAction()
    {
        $this->view->display( 'login' );
    }

    public function logoutAction()
    {
        $this->userStorage->logout();
        header( 'Location: ' . Url::getUrl( 'user', 'login' ) );
    }
//
    public function authAction()
    {
        $model = new Auth();
        $uStorage = $this->userStorage; //do wylogowywania

        $user = $model->checkUser( $this->request->getPost() );

        if( $user )
        {
            $storage = $uStorage->setUserData( $user ); //do wylogowywania
            header( 'Location: ' . Url::getUrl( 'user', 'index' ) );
        }
        else $this->view->display( 'login' );
    }

    public function indexAction()
    {
        $model = new Auth();
        $page = $this->request->getParam( 'page', 1 );
        $limit = 3;
        $from = ( $page - 1 ) * $limit;

        $this->view->pagerConfig = array
        (
            'url' => Url::getUrl( 'user', 'index', array
            (
                'page' => 'key_page'
            )),
            'count' => $model->userCount(),
            'pack' => $limit,
            'page' => $page
        );

        $this->view->data = $model->getData( $from, $limit );
        $this->view->display( 'use_index' );

        //header('location: http://mvc.pl/?controller=cars&action=list');
    }

    public function rejestracjaAction()
    {
        $Rejestracja = new Rejestracja();
        $post = $this->request->getPost();
        if(isset($post['login']))
                {
                    $Rejestracja->rejestracjaUser($post); //baza danych
                }
        $this->view->display('rejestracja'); //wyswietlanie templatki
    }
}