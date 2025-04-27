<?php
require_once 'config/database.php';

class Mahasiswa {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function all() {
        $stmt = $this->db->query("SELECT * FROM mahasiswa");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM mahasiswa WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function store($data) {
        $stmt = $this->db->prepare("INSERT INTO mahasiswa (nama, nim) VALUES (?, ?)");
        return $stmt->execute([$data['nama'], $data['nim']]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE mahasiswa SET nama = ?, nim = ? WHERE id = ?");
        return $stmt->execute([$data['nama'], $data['nim'], $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM mahasiswa WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
