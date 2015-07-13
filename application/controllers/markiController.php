<?php
class markiController extends mainController
{
    public function listAction()
    {
        $Marki = new Marki();
        $this->view->data = $Marki->getMarki();
        $this->view->display( 'pokazmarki' );  //http://mvc.pl/?controller=cars&action=list
    }

    public function usunMarkiAction()
    {
        $Marki = new Marki();
        $idMarki = $this->request->getParam('id');
        $Marki->usunMarki($idMarki);

        header('location: http://mvc.pl/?controller=marki&action=marka');
    }
}