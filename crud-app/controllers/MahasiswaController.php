<?php
require_once 'models/Mahasiswa.php';

class MahasiswaController {
    private $model;

    public function __construct() {
        $this->model = new Mahasiswa();
    }

    public function index() {
        $mahasiswa = $this->model->all();
        include 'views/mahasiswa/index.php';
    }

    public function create() {
        include 'views/mahasiswa/create.php';
    }

    public function store() {
        $this->model->store($_POST);
        header('Location: index.php');
    }

    public function edit($id) {
        $data = $this->model->find($id);
        include 'views/mahasiswa/edit.php';
    }

    public function update($id) {
        $this->model->update($id, $_POST);
        header('Location: index.php');
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php');
    }
}
