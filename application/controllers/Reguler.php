<?php
 
require APPPATH . '/libraries/REST_Controller.php';
 
class Reguler extends REST_Controller {
    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_post() {
        $this->load->model('Reguler_model');
        $up = $this->post('up');
        $tenor = $this->post('tenor');
        $new=$this->Reguler_model->getSewaModal($up,$tenor);

        $this->response($new, 200);

        // $this->response(array(
        //     "total"=>"nafiganteng",
        //     "total2" => 200
        // ), 200);
    }
}