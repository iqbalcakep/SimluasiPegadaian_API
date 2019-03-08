<?php
 
require APPPATH . '/libraries/REST_Controller.php';
header("Access-Control-Allow-Origin: *"); 
class FleksiSekaliBayar extends REST_Controller {
    function __construct($config = 'rest') {
        parent::__construct($config);
    }


    function index_post() {
        $this->load->model('sekalibayar_model');
        $up = $this->post('up');
        $tenor = $this->post('tenor');
        $sm=$this->sekalibayar_model->getSewaModal($up,$tenor);
        $adm=$this->sekalibayar_model->getAdministrasi($tenor);
        $totsm = $up*($sm/100);
        $totadm = $up*($adm/100);
        $totalbayar = $up+$totadm+$totsm;

        $this->response(array(
            "pinjaman"=>$up,
            "sewaModal"=>$totsm,
            "biayaAdmin" => $totadm,
            "prsModal"=>$sm,
            "prsAdmin"=>$adm,
            "angsuran"=>round($totalbayar),
            "tenor"=>$tenor,
        ), 200);
    }

    
}