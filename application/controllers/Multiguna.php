<?php
 
require APPPATH . '/libraries/REST_Controller.php';
header("Access-Control-Allow-Origin: *"); 
 
class Multiguna extends REST_Controller {
    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_post() {
        $this->load->model('Multiguna_model');
        $up = $this->post('up');
        $tenor = $this->post('tenor');
        $dataPinjaman=$this->Multiguna_model->getSewaModal($up,$tenor);

        $sewaModal=($up*$dataPinjaman[0]->sm_multi)/100;
        $biayaAdmin = ($dataPinjaman[0]->biaya_admin/100)*$up;
        $angReal = ($up / $tenor)+$sewaModal;
        $angPokok = $up / $tenor;

        // $this->response($new, 200);
        $this->response(array(
            "pinjaman"=>$up,
            "sewaModal"=>$sewaModal,
            "angsuranPokok"=>$angPokok,
            "biayaAdmin" => $biayaAdmin,
            "prsModal"=>$dataPinjaman[0]->sm_multi,
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