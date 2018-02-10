<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statussurat_model extends CI_Model {

	// SURAT KP
	public function StatusKpSuratMahasiswa($nim)
	{
		$this->db->select("*");
		$this->db->from('surat');
		$this->db->join('user','user.nim=surat.nim');
		$this->db->where('surat.nim',$nim);
		$this->db->where('jenis_surat','Kerja Praktek');
		$query = $this->db->get();

		return $query->result();
	}

	public function SuratKpToTolak($id_surat)
	{
		$data = array(
			'status'=>'Di Tolak',
		);

		$this->db->where('id_surat',$id_surat);
		$this->db->where('jenis_surat','Kerja Praktek');
		$this->db->limit(1);
		return $this->db->update('surat',$data);
	}

	public function SuratKpToProses($id_surat,$nomorsuratkp)
	{
		$data = array (
			'status'   => 'Proses',
			'no_surat' => $nomorsuratkp
		);

		$this->db->where('id_surat',$id_surat);
		$this->db->where('jenis_surat','Kerja Praktek');
		$this->db->limit(1);
		return $this->db->update('surat',$data);
	}

	public function SuratKpToFinish($id_surat)
	{
		$data = array(
			'status'=>'Selesai',
			'tanggal_selesai'=>date('Y-m-d')	
		);

		$this->db->where('id_surat',$id_surat);
		$this->db->where('jenis_surat','Kerja Praktek');
		$this->db->limit(1);
		return $this->db->update('surat',$data);
	}

	public function SuratKpToTake($id_surat)
	{
	    $data = array(
			'status'=>'Ambil',
			'tanggal_diambil'=>date('Y-m-d')	
		);

		$this->db->where('id_surat',$id_surat);
		$this->db->where('jenis_surat','Kerja Praktek');
		$this->db->limit(1);
		return $this->db->update('surat',$data);
	}

	public function JumlahSuratKpWaiting()
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->where('status','Menunggu');
		$this->db->where('jenis_surat','Kerja Praktek');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function JumlahSuratKpProses()
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->where('status','Proses');
		$this->db->where('jenis_surat','Kerja Praktek');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function JumlahSuratKpFinish()
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->where('status','Selesai');
		$this->db->where('jenis_surat','Kerja Praktek');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function JumlahSuratKpTake()
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->where('status','Ambil');
		$this->db->where('jenis_surat','Kerja Praktek');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function JumlahSuratKpTolak()
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->where('status','Di Tolak');
		$this->db->where('jenis_surat','Kerja Praktek');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function HapusDataKP($start_date,$end_date)
	{
		
		$query = $this->db->query("DELETE FROM surat WHERE tanggal_diambil BETWEEN '$start_date' AND '$end_date'");
		
	}

	// SURAT TA
	public function StatusTASuratMahasiswa($nim)
	{
		$this->db->select("*");
		$this->db->from('surat');
		$this->db->join('user','user.nim=surat.nim');
		$this->db->where('surat.nim',$nim);
		$this->db->where('jenis_surat','Tugas Akhir');
		$query = $this->db->get();

		return $query->result();
	}

	public function SuratTAToTolak($id_surat)
	{
		$data = array(
			'status'=>'Di Tolak',
		);

		$this->db->where('id_surat',$id_surat);
		$this->db->where('jenis_surat','Tugas Akhir');
		$this->db->limit(1);
		return $this->db->update('surat',$data);
	}

	public function SuratTAToProses($id_surat)
	{
		$data = array(
			'status'=>'Selesai'	
		);

		$this->db->where('id_surat',$id_surat);
		$this->db->limit(1);
		return $this->db->update('surat',$data);
	}

	public function SuratTAToFinish($id_surat)
	{
		$data = array(
			'status'=>'Selesai'	
		);

		$this->db->where('id_surat',$id_surat);
		$this->db->limit(1);
		return $this->db->update('surat',$data);
	}

	public function SuratTAToTake($id_surat)
	{
		$data = array(
			'status'=>'Selesai'	
		);

		$this->db->where('id_surat',$id_surat);
		$this->db->limit(1);
		return $this->db->update('surat',$data);
	}

	public function JumlahSuratTAWaiting()
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->where('status','Menunggu');
		$this->db->where('jenis_surat','Tugas Akhir');
		$query = $this->db->get();
		return $query->num_rows();	
	}

	

	public function JumlahSuratTAProses()
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->where('status','Proses');
		$this->db->where('jenis_surat','Tugas Akhir');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function JumlahSuratTAFinish()
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->where('status','Selesai');
		$this->db->where('jenis_surat','Tugas Akhir');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function JumlahSuratTATake()
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->where('status','Ambil');
		$this->db->where('jenis_surat','Tugas Akhir');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function JumlahSuratTATolak()
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->where('status','Di Tolak');
		$this->db->where('jenis_surat','Tugas Akhir');
		$query = $this->db->get();
		return $query->num_rows();
	}


}

/* End of file Statussurat_model.php */
/* Location: ./application/models/Statussurat_model.php */