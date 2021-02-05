<?php
class BarangModel
{
    private $table = 'barang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBarangs()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getBarang($id = '')
    {
        $this->db->query("SELECT * FROM  " . $this->table . " WHERE no='" . $id . "'");
        return $this->db->single();
    }

    public function createBarang($data)
    {
        $query = "INSERT INTO " . $this->table . " 
        VALUES
        (0, :namabarang, :jumlah)";
        $this->db->query($query);
        $this->db->bind('namabarang', $data['namabarang']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteBarang($id = '')
    {
        $query = "DELETE FROM " . $this->table . " WHERE no=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateBarang($data)
    {
        $query = "UPDATE " . $this->table . " SET namabarang=:namabarang, jumlah=:jumlah WHERE no=:id";
        $this->db->query($query);
        $this->db->bind('namabarang', $data['namabarang']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
