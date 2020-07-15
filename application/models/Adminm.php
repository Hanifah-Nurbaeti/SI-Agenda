<?php

class Adminm extends CI_Model{

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //s

    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }

    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data)->result();
    }

    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }

    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

    public function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }

    function get_group_presensi(){
        return $this->db->query("
            SELECT *, MONTH(a.tanggal) as bulan, YEAR(a.tanggal) as tahun, COUNT(c.nisn) as jumlah
            FROM presensi a
            INNER JOIN siswa c ON a.nisn = c.nisn
            GROUP BY MONTH(a.tanggal), YEAR(a.tanggal)
        ")->result();
    }

    function select_group_presensi($bulan, $tahun){
        return $this->db->query("
            SELECT *, MONTH(a.tanggal) as bulan, YEAR(a.tanggal) as tahun
            FROM presensi a
            INNER JOIN siswa c ON a.nisn = c.nisn
            WHERE MONTH(a.tanggal) = '$bulan' AND YEAR(a.tanggal) = '$tahun'
        ")->result();
    }

    function get_all_unit(){
        return $this->db->query("
            SELECT *
            FROM unit a
            INNER JOIN divisi c ON a.id_divisi = c.id_divisi
        ")->result();
    }

    function get_all_pegawai(){
        $id_user = $this->session->userdata('id_user');
        return $this->db->query("
            SELECT *
            FROM pegawai a
            INNER JOIN unit c ON a.id_unit = c.id_unit
            INNER JOIN divisi d ON c.id_divisi = d.id_divisi
            INNER JOIN user e ON a.id_user = e.id_user
        ")->result();
    }
    function get_all_user(){
        $id_user = $this->session->userdata('id_user');
        return $this->db->query("
            SELECT *
            FROM user a
            INNER JOIN pegawai c ON a.id_pegawai = c.id_pegawai
        ")->result();
    }

    function get_all_undangan (){
        return $this->db->query("
            SELECT *
            FROM undangan a
            join user g on a.username = g.username
            join pegawai b on g.id_pegawai= b.id_pegawai
            JOIN unit c ON b.id_unit = c.id_unit
            JOIN divisi d ON c.id_divisi = d.id_divisi
            JOIN ruangan f ON a.id_ruangan = f.id_ruangan
            
            ")->result();
    }
    function get_all_agenda (){
        return $this->db->query("
            SELECT *
            FROM agenda_rapat a
            JOIN undangan b ON a.id_undangan = b.id_undangan
            JOIN pegawai c ON b.id_pegawai = c.id_pegawai
            JOIN unit d ON c.id_unit = d.id_unit
            JOIN divisi e ON d.id_divisi = e.id_divisi
            JOIN ruangan f ON a.id_ruangan = f.id_ruangan
            JOIN user g ON c.id_user = g.id_user

            ")->result();
    }
        function get_all_hasil (){
        return $this->db->query("
            SELECT *
            FROM hasil a
            JOIN agenda_rapat b ON a.id_agenda = b.id_agenda
            JOIN undangan c ON b.id_undangan = c.id_undangan
            JOIN pegawai d ON c.id_pegawai = d.id_pegawai
            JOIN unit e ON d.id_unit = e.id_unit
            JOIN divisi f ON e.id_divisi = f.id_divisi
            JOIN ruangan g ON b.id_ruangan = g.id_ruangan
            JOIN user h ON d.id_user = h.id_user

            ")->result();
    }
    function getList_presensi(){
        $query = $this->db->get('presensi');
        return $query->result();
    }
    function getList_jadwal(){
        $query = $this->db->get('jadwal');
        return $query->result();
    }

    function getList_kelas(){
        $query = $this->db->get('kelas');
        return $query->result();
    }
    function getList_matapelajaran(){
        $query = $this->db->get('mata_pelajaran');
        return $query->result();
    }
    function getList_siswa(){
        $query = $this->db->get('siswa');
        return $query->result();
    }
    // function get_laporan(){
    //     return $this->db->query("
    //       SELECT DISTINCT id_siswa,id_presensi, (SELECT COUNT(keterangan) FROM presensi WHERE (keterangan = 's')) AS s, (SELECT COUNT(keterangan) FROM presensi WHERE (keterangan = 'h')) AS h, (SELECT COUNT(keterangan) FROM presensi WHERE(keterangan = 'i')) AS i, (SELECT COUNT(keterangan) FROM presensi WHERE(keterangan = 'a')) AS a, (SELECT COUNT(keterangan) FROM presensi WHERE (keterangan = 's') OR (keterangan = 'h') OR (keterangan = 'i') OR (keterangan = 'a')) AS Total FROM presensi
    //     ")->result_array();
    // }

    function get_divisi()
    {
      return $this->db->query("
      SELECT * from divisi")->result_array();
    }

    function get_laporan($id_siswa)
    {
      $array = [];
      $wakwaw = $this->db->query("
      select count(*) as jml,keterangan from presensi where id_siswa = $id_siswa group by keterangan")->result_array();
      $h = $this->db->query("select count(*) as jml from presensi where id_siswa = $id_siswa AND keterangan='h'")->result_array();
      $s = $this->db->query("select count(*) as jml from presensi where id_siswa = $id_siswa AND keterangan='s'")->result_array();
      $i = $this->db->query("select count(*) as jml from presensi where id_siswa = $id_siswa AND keterangan='i'")->result_array();
      $a = $this->db->query("select count(*) as jml from presensi where id_siswa = $id_siswa AND keterangan='a'")->result_array();
      // return $wakwaw ;
      array_push($array,...$s,...$i,...$a,...$h);
      return $array;
    }

    function get_jadwal($id_kelas){
      $wakwaw = $this->db->query("
      select * from jadwal where id_kelas = $id_kelas")->result_array();
      $new = json_encode($wakwaw);
      echo $new;
    }

    function get_siswa_kelas($id_kelas){
      $wakwaw = $this->db->query("
      select * from siswa where id_kelas = $id_kelas")->result_array();
      $new = json_encode($wakwaw);
      echo $new;
    }

    function get_matpel($id_jadwal){
      $wakwaw = $this->db->query("
      select * from mata_pelajaran where id_jadwal = $id_jadwal")->result_array();
      $new = json_encode($wakwaw);
      echo $new;
    }

}
