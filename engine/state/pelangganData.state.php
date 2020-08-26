<?php 

class pelangganData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getDataPelanggan($requestData)
    {
        $columns = array(0 => 'nama', 1 => 'alamat', 2 => 'no_hp', 3 => 'last_visit');
        $this -> st -> query("SELECT * FROM tbl_pelanggan ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length'].";");
        return $this -> st -> queryAll();
    }

    public function cekJumlahPelanggan($page)
    {
        $totalPage = 10;
        if($page === 1){
            $startPage = 0;
        }else{
            $startPage = $totalPage * $page - 10;
        }
        $this -> st -> query("SELECT id FROM tbl_pelanggan LIMIT $startPage, $totalPage");
        return $this -> st -> numRow();
    }

    public function getJlhPelanggan()
    {
        $this -> st -> query("SELECT id FROM tbl_pelanggan;");
        return $this -> st -> numRow();
    }

    public function tambahPelanggan($idPelanggan, $nama, $alamat, $hp, $email, $visit)
    {
        $query = "INSERT INTO tbl_pelanggan VALUES(null, '$idPelanggan','$nama','$alamat','$hp','$email','$visit');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function getNamaHandphone($nama, $hp)
    {
        $this -> st -> query("SELECT id FROM tbl_pelanggan WHERE nama='$nama' AND no_hp='$hp';");
        return $this -> st -> numRow();
    }

    public function totalTransaksi($idPelanggan)
    {
        $this -> st -> query("SELECT id FROM tbl_pesanan WHERE pelanggan='$idPelanggan';");
        return $this -> st -> numRow();
    }

    public function cariPelanggan($nama)
    {
        $this -> st -> query("SELECT * FROM tbl_pelanggan WHERE (nama LIKE '%$nama%' OR no_hp LIKE '%$nama%');");
        return $this -> st -> queryAll();
    }

    public function hapusPelanggan($kdPelanggan)
    {
        $query = "DELETE FROM tbl_pelanggan WHERE id_pelanggan='$kdPelanggan';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function getDetailPelanggan($kdPelanggan)
    {
        $this -> st -> query("SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$kdPelanggan';");
        return $this -> st -> querySingle();
    }

}