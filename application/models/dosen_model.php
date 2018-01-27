<?php 
   class Dosen_Model extends CI_Model {
	
      public function GetDataDosen(){
        $data =$this->db->query("SELECT * FROM dosen");
        return $data->result_array();
      }
      
      public function GetWhereDosen($where=""){
        $res=$this->db->query("SELECT * FROM dosen ".$where);
        return $res->result_array();
      }

      public function UpdateDataDosen($tableName,$data_update,$where){
        $res=$this->db->update($tableName,$data_update,$where);
        return $res;
      }
}
