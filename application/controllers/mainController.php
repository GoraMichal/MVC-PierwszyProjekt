<?php

class mainController
{
    public $request;
    public $view;
    public $layout;
    public $userStorage;

    public function __construct()
    {
        $this->request = new Request();
        $this->view = new View();

        $this->layout = new Layout();
        $this->userStorage = new UserStorage();

        // OR - ||
        // AND - &&
        // Bez $this->request->getParam('action') sa zle przekierowania

        if (!$this->userStorage->isAuthenticate() && $this->request->getParam('action') !== 'login' && $this->request->getParam('action') !== 'rejestracja') {
            header('Location: ' . Url::getUrl('user', 'login'));
        }



    }
}