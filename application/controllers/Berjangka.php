<?php
 
require APPPATH . '/libraries/REST_Controller.php';
header("Access-Control-Allow-Origin: *"); 
class Berjangka extends REST_Controller {
    function __construct($config = 'rest') {
        parent::__construct($config);
    }


    function index_post() {
        $this->load->model('sekalibayar_model');
        $up = $this->post('up');
        $tenor = $this->post('tenor');
        $pola = $this->post('pola');
        $sm=$this->sekalibayar_model->getSewaModal($up,$pola);
        $adm=$this->sekalibayar_model->getAdministrasi($tenor);
        $totsm = $up*($sm/100);
        $totadm = $up*($adm/100);
        $bagi = $tenor/$pola;
        $angsuran = ($up+$totsm)/$bagi;
        $totalbayar = $up+$totadm+$totsm;

        $this->response(array(
            "pinjaman"=>$up,
            "sewaModal"=>$totsm,
            "biayaAdmin" => $totadm,
            "prsModal"=>$sm,
            "prsAdmin"=>$adm,
            "angsuran"=>$angsuran,
            "pola"=>$pola,
            "total"=>round($totalbayar),
            "tenor"=>$tenor,
        ), 200);
    }

    
}