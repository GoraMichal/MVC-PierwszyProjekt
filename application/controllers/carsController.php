<?php
class carsController extends mainController
{
    public function listAction()
    {
        $Cars = new Cars();
        $page = $this->request->getParam( 'page', 1 );
        $limit = 10;
        $from = ( $page - 1 ) * $limit;

        $this->view->pagerConfig = array
        (
            'url' => Url::getUrl( 'cars', 'list', array
            (
                'page' => 'key_page'
            )),
            'count' => $Cars->carCount(),
            'pack' => $limit,
            'page' => $page
        );

        $this->view->data = $Cars->getSamochody( $from, $limit );

        $this->view->display( 'pokazauto' ); //otwieranie layoutu //http://mvc.pl/?controller=cars&action=list
    }

    public function usunSamochodyAction()
    {
        $Cars = new Cars();
        $idAuta = $this->request->getParam('id');
        $Cars->usunSamochody($idAuta);
        header('location: http://mvc.pl/?controller=cars&action=list');
    }

    public function addNewAutoAction()
    {
        $Cars = new Cars();
        $post = $this->request->getPost();
        if(isset($post['nazwaAuta']))
        {

            $image = $this->request->getFiles( 'zdjecie' );

            $config = Config::getInstance();
            $config = $config->getConfig();

            $plik = uniqid();


            if( $image[ 'error' ] == 0 )
            {
                $e = pathinfo( $image[ 'name' ] );
                $extension = $e[ 'extension' ];

                $img = WideImage::load( $image[ 'tmp_name' ] );
                $resized = $img->resize( 100, 100 );
                $resized->saveToFile( $config[ 'IMG_DIR' ].'small_'.$plik.'.'.$extension );

                move_uploaded_file( $image[ 'tmp_name' ], $config[ 'IMG_DIR' ] . $plik .'.'.$extension );


                $post['zdjecie'] = $plik.'.'.$extension;
            }

            $Cars->acceptAddSamochody($post);
            header('location: http://mvc.pl/?controller=cars&action=list');
        }

        $this->view->data = $Cars->viewSamochody();
        $this->view->display('dodajauto');

    }

    public function editAutoAction()
    {
        $Cars = new Cars();
        $id = $this->request->getParam('id');

        $this->view->data = $Cars ->viewSamochody();
        $this->view->auto = $Cars ->getAuto($id);
        $this->view->display( 'edytujauto' );
    }

    public function updateAutoAction()
    {
        $Cars = new Cars();
        $post = $this->request->getPost();
        if(isset($post['nazwaAuta']))
        {
            $image = $this->request->getFiles( 'zdjecie' );

            $config = Config::getInstance();
            $config = $config->getConfig();

            $plik = uniqid();;


            if( $image[ 'error' ] == 0 )
            {
                $e = pathinfo( $image[ 'name' ] );
                $extension = $e[ 'extension' ];

                $img = WideImage::load( $image[ 'tmp_name' ] );
                $resized = $img->resize( 100, 100 );
                $resized->saveToFile( $config[ 'IMG_DIR' ].'/small_'.$plik.'.'.$extension );

                move_uploaded_file( $image[ 'tmp_name' ], $config[ 'IMG_DIR' ] . $plik .'.'.$extension );


                $post['zdjecie'] = $plik.'.'.$extension;
            }

            $Cars->editSamochody($post);
        }
        header('location: http://mvc.pl/?controller=cars&action=list');
    }

    public function indexAction()
    {
        $model = new Cars();
        $page = $this->request->getParam( 'page', 1 );
        $limit = 10;
        $from = ( $page - 1 ) * $limit;

        $this->view->pagerConfig = array
        (
            'url' => Url::getUrl( 'cars', 'list', array
            (
                'page' => 'key_page'
            )),
            'count' => $model->carCount(),
            'pack' => $limit,
            'page' => $page
        );

        $this->view->data = $model->getSamochody( $from, $limit );

        $this->view->display( 'index' );
    }
}



