<?php    
class Mgrafik extends CI_model
{ 


   public function getUnit()
  {
  	$sql = "SELECT b.nama_unit AS nama_unit, count(a.id_undangan) as jumlah from undangan as a left join as b on b.id=a.id_unit group by a.id_undangan order by nama_unit";
  }
}