
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarsurat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function validasimahasiswa($nim)
	{
		$query= $this->db->query(
							    "SELECT * FROM mahasiswa m JOIN surat s 
								ON m.id_surat=s.id_surat WHERE 
								m.nim='$nim' AND 
								(
								 (status !='Ambil' AND status!='Di Tolak') OR
								date(tanggal_diambil) >= CURDATE() - INTERVAL 1 DAY
								)"
								);

		return $query->num_rows();
	}	

	public function GetIdSuratToMahasiswa($nim)
	{
		$this->db->select('id_surat');
		$this->db->from('surat');
		$this->db->where('nim',$nim);
		$this->db->where('status','Menunggu');
		$query = $this->db->get();
		return $query->row();
	}

	

	public function daftarsuratTA()
	{
		
	}

	public function daftarsuratkp($data,$table)
	{
		return $this->db->insert($table,$data);
	}

	public function InsertMahasiswa($data)
	{
		return $this->db->insert('mahasiswa',$data);
	}

}

/* End of file Daftarsurat_model.php */
/* Location: ./application/models/Daftarsurat_model.php */