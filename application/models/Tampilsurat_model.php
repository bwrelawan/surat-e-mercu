<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampilsurat_model extends CI_Model
{
		# Query menampilkan Data KP Status = 'Waiting'
		public function tampil_datakp_waiting()
		{
			$sql = "SELECT b.email,a.id_surat,a.tanggal_diajukan, a.nim,b.nama_mahasiswa,a.prodi FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Menunggu' AND a.jenis_surat ='Kerja Praktek' ORDER BY id_surat DESC";
			$query = $this->db->query($sql);

			return $query->result(); 
		}

		# Query menampilkan email user KP
		public function get_email_user_kp($id_surat)
		{
			$sql = "SELECT b.email,a.id_surat FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Menunggu' AND a.jenis_surat ='Kerja Praktek' AND a.id_surat='$id_surat' ";
			$query = $this->db->query($sql);

			return $query->row(); 
		}


		# Query menampilkan Data KP Status = 'Proses'
		public function tampil_datakp_proses(){
			$sql = "SELECT a.no_surat, a.id_surat,a.tanggal_diajukan, a.nim,b.nama_mahasiswa,a.prodi,b.email FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Proses' AND a.jenis_surat ='Kerja Praktek' ORDER BY id_surat DESC";
			$query = $this->db->query($sql);

			return $query->result(); 
		}
		# Query menampilkan Data KP Status = 'Selesai'
		public function tampil_datakp_finish(){
			$sql = "SELECT a.id_surat,a.no_surat,a.tanggal_selesai,a.nim,b.nama_mahasiswa,b.email,a.prodi FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Selesai' AND a.jenis_surat ='Kerja Praktek' ORDER BY id_surat DESC";
			$query = $this->db->query($sql);

			return $query->result(); 
		}
		# Query menampilkan Data KP Status = 'Ambil'
		public function tampil_datakp_ambil(){
			$sql = "SELECT a.id_surat,a.no_surat,a.id_surat,a.tanggal_diambil, a.nim,b.nama_mahasiswa,b.email,a.prodi FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Ambil' AND a.jenis_surat ='Kerja Praktek' ORDER BY id_surat DESC";
			$query = $this->db->query($sql);

			return $query->result(); 
		}

		# Query menampilkan Data KP Status = 'Tolak'
		public function tampil_datakp_tolak(){
			$sql = "SELECT a.tanggal_diajukan, b.email,a.nim,b.nama_mahasiswa,a.prodi FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Di Tolak' AND a.jenis_surat ='Kerja Praktek' ORDER BY id_surat DESC";
			$query = $this->db->query($sql);

			return $query->result(); 
		}

		# Query menampilkan Data TA Status = 'Waiting'
		public function tampil_datata_waiting(){
			$sql = "SELECT a.id_surat,a.tanggal_diajukan, a.nim,b.nama_mahasiswa,a.prodi FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Menunggu' AND a.jenis_surat ='Tugas Akhir' ORDER BY id_surat DESC";
			$query = $this->db->query($sql);

			return $query->result(); 
		}

		# Query menampilkan Data TA Status = 'Tolak'
		public function tampil_datata_tolak(){
			$sql = "SELECT a.tanggal_diajukan, a.nim,b.nama_mahasiswa,a.prodi FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Di Tolak' AND a.jenis_surat ='Tugas Akhir' ORDER BY id_surat DESC";
			$query = $this->db->query($sql);

			return $query->result(); 
		}


		# Query menampilkan email user TA
		public function get_email_user_ta($id_surat)
		{
			$sql = "SELECT b.email,a.id_surat FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Menunggu' AND a.jenis_surat ='Tugas Akhir' AND a.id_surat='$id_surat' ";
			$query = $this->db->query($sql);

			return $query->row(); 
		}


		# Query menampilkan Data TA Status = 'Proses'
		public function tampil_datata_proses(){
			$sql = "SELECT a.id_surat,a.tanggal_diajukan, a.nim,b.nama_mahasiswa,a.prodi,b.email,a.no_surat FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Proses' AND a.jenis_surat ='Tugas Akhir' ORDER BY id_surat DESC";
			$query = $this->db->query($sql);

			return $query->result(); 
		}
		# Query menampilkan Data TA Status = 'Selesai'
		public function tampil_datata_finish(){
			$sql = "SELECT a.tanggal_selesai, a.nim,b.nama_mahasiswa,b.email,a.prodi FROM surat a, user b WHERE a.nim = b.nim AND a.status ='Selesai' AND a.jenis_surat ='Tugas Akhir' ORDER BY id_surat DESC";
			$query = $this->db->query($sql);

			return $query->result(); 
		}

		# Query Select data suratKP berdasarkan nim
		public function SelectSurat($id_surat)
		{
			$this->db->select('*');
			$this->db->from('surat');
			$this->db->where('id_surat',$id_surat);
			$query= $this->db->get();

			return $query->row();
		}

		// tampilsuratKP
		public function printKP($id_surat)
		{
			$this->db->select('*');
			$this->db->from('surat');
			$this->db->join('user','user.nim =surat.nim');
			$this->db->join('dosen','dosen.nik =surat.nik');
			$this->db->where('id_surat',$id_surat);
			$this->db->where('surat.status !=','Menunggu');
			$this->db->where('surat.status !=','Di tolak');
			$query = $this->db->get();
			
			return $query->row_array();
		}

		public function detailKP($id_surat)
		{
			$this->db->select('*');
			$this->db->from('surat');
			$this->db->join('user','user.nim =surat.nim');
			$this->db->join('dosen','dosen.nik =surat.nik');
			$this->db->where('id_surat',$id_surat);
			$query = $this->db->get();
			
			return $query->row_array();
		}

		public function GetIdentitasMahasiswa($id_surat)
		{
			$this->db->select('*');
			$this->db->from('surat');
			$this->db->join('user','user.nim=surat.nim');
			$this->db->where('surat.id_surat',$id_surat);
			$this->db->limit(1);
			$query = $this->db->get();

			return $query->row();
		}

		public function PrintMahasiswaKP($id_surat)
		{
			
			$query = $this->db->query("SELECT m.nim,m.nama_mahasiswa,m.nohp FROM mahasiswa m JOIN surat s 
								ON m.id_surat=s.id_surat WHERE 
								m.id_surat='$id_surat' "
							);

			return $query->result_array();
		}
		public function detailTA($id_surat)
		{
			$this->db->select('*');
			$this->db->from('surat');
			$this->db->join('user','user.nim =surat.nim');
			$this->db->join('dosen','dosen.nik =surat.nik');
			$this->db->where('id_surat',$id_surat);
			$query = $this->db->get();
			
			return $query->row_array();
		}

}
