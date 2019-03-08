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
        $dataPinjaman=$this->Reguler_model->getSewaModal($up,$tenor);

        $sewaModal=($up*$dataPinjaman[0]->sm_reg)/100;
        $biayaAdmin = ($dataPinjaman[0]->biaya_admin/100)*$up;
        $angReal = ($up / $tenor)+$sewaModal;
        $angPokok = $up / $tenor;

        // $this->response($new, 200);
        $this->response(array(
            "pinjaman"=>$up,
            "sewaModal"=>$sewaModal,
            "angsuranPokok"=>$angPokok,
            "biayaAdmin" => $biayaAdmin,
            "prsModal"=>$dataPinjaman[0]->sm_reg,
            "prsAdmin"=>$dataPinjaman[0]->biaya_admin,
            "angsuran"=>round($angReal),
            "tenor"=>$tenor,
        ), 200);
    }
    function index_get() {
        // $this->response($new, 200);
        $this->response(array(
            "status"=>"nafi ganteng"
        ), 200);
    }
}