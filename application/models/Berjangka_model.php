<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sekalibayar_model extends CI_Model {

	public function getSewaModal($up,$pola)
	{
        if($up <= 10000000 ){
        $query ="select sm_fb from fleksi_berjangka where max_fb = '10000000' and pola_fb = $pola";
        }else if($up > 10000000 and $up <= 50000000){
        $query ="select sm_fb from fleksi_berjangka where min_fb = '10000001' and max_fb = '50000000' and pola_fb = $pola";
        }else if($up > 50000000 and $up <= 100000000){
        $query ="select sm_fb from fleksi_berjangka where min_fb ='50000001' and max_fb = '100000000' and pola_fb = $pola";
        }else if($up > 100000000){
        $query ="select sm_fb from fleksi_berjangka where min_fb ='100000001' and pola_fb = $pola";
        }
        $hasil = $this->db->query($query)->result();
        foreach($hasil as $data){
            return $data->sm_fb;
        }
    }
    
    public function getAdministrasi($pola){
        $q = $this->db->query("select biaya_admin from administrasi where bulan = $pola ")->result();
        foreach($q as $d){
            return $d->biaya_admin;
        }
    }
}

/* End of file Reguler_model.php */
/* Location: ./application/models/Reguler_model.php */