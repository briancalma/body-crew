<?php
App::uses('PushPandaAppController', 'PushPanda.Controller');
/**
 * Pages Controller
 */
class PagesController extends PushPandaAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	# public $scaffold;
    
    public function index()
    {
        // echo "Hello World!";
        // exit();
        
        $this->layout = 'Pages/main_layout';
    }
    
}
