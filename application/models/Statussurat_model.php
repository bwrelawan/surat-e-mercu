<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statussurat_model extends CI_Model {

	public function SuratKpToProses($id_surat,$nomorsuratkp)
	{
		$data = array (
			'status'   => 'Proses',
			'no_surat' => $nomorsuratkp
		);

		$this->db->where('id_surat',$id_surat);
		$this->db->limit(1);
		return $this->db->update('surat',$data);
	}

}

/* End of file Statussurat_model.php */
/* Location: ./application/models/Statussurat_model.php */