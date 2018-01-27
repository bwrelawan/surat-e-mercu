<?php 
	class Tampilsurat_model extends CI_Model
	{
		# Query menampilkan Data KP Status = 'Waiting'
		function tampil_datakp_waiting()
		{
			$sql = "SELECT a.id_surat,a.tanggal_diajukan, a.nim,b.nama_mahasiswa,a.prodi FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Menunggu' AND a.jenis_surat ='Kerja Praktek' ORDER BY id_surat DESC";
			$query = $this->db->query($sql);

			return $query->result(); 
		}
		# Query menampilkan Data KP Status = 'Proses'
		function tampil_datakp_proses(){
			$sql = "SELECT a.tanggal_diajukan, a.nim,b.nama_mahasiswa,b.email,a.prodi FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Proses' AND a.jenis_surat ='Kerja Praktek' ORDER BY id_surat DESC";
			$query = $this->db->query($sql);

			return $query->result(); 
		}
		# Query menampilkan Data KP Status = 'Selesai'
		function tampil_datakp_finish(){
			$sql = "SELECT a.tanggal_selesai, a.nim,b.nama_mahasiswa,b.email,a.prodi FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Selesai' AND a.jenis_surat ='Kerja Praktek' ORDER BY id_surat DESC";
			$query = $this->db->query($sql);

			return $query->result(); 
		}
		# Query menampilkan Data TA Status = 'Waiting'
		function tampil_datata_waiting(){
			$sql = "SELECT a.tanggal_diajukan, a.nim,b.nama_mahasiswa,a.prodi FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Menunggu' AND a.jenis_surat ='Tugas Akhir' ORDER BY id_surat DESC";
			$query = $this->db->query($sql);

			return $query->result(); 
		}
		# Query menampilkan Data TA Status = 'Proses'
		function tampil_datata_proses(){
			$sql = "SELECT a.tanggal_diajukan, a.nim,b.nama_mahasiswa,b.email,a.prodi FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Proses' AND a.jenis_surat ='Tugas Akhir' ORDER BY id_surat DESC";
			$query = $this->db->query($sql);

			return $query->result(); 
		}
		# Query menampilkan Data TA Status = 'Selesai'
		function tampil_datata_finish(){
			$sql = "SELECT a.tanggal_selesai, a.nim,b.nama_mahasiswa,b.email,a.prodi FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Selesai' AND a.jenis_surat ='Tugas Akhir' ORDER BY id_surat DESC";
			$query = $this->db->query($sql);

			return $query->result(); 
		}

		# Query Select data suratKP berdasarkan nim
		function SelectSurat($id_surat)
		{
			$this->db->select('*');
			$this->db->from('surat');
			$this->db->where('id_surat',$id_surat);
			$query= $this->db->get();

			return $query->row();
		}


	}
 ?>