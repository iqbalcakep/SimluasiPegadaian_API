<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multiguna_model extends CI_Model {

	public function getSewaModal($pinjaman,$tenor)
	{
		$query = "SELECT multiguna.`min_multi`,multiguna.`max_multi`,multiguna.`sm_multi`,administrasi.`biaya_admin`,administrasi.`bulan` 
        FROM multiguna JOIN administrasi ON multiguna.`id_admin` = administrasi.`id_admin`WHERE multiguna.`min_multi`<= '$pinjaman' 
        AND multiguna.`max_multi`>='$pinjaman' AND administrasi.`bulan` = '$tenor'";

		return $this->db->query($query)->result();
	}
}

/* End of file Reguler_model.php */
/* Location: ./application/models/Reguler_model.php */