<?php
require_once './model/archieve.php';  // Memastikan model Archieved dimuat

class ArchieveCon {
    private $archievedModel;

    public function __construct() {
        $this->archievedModel = new Archieved();  // Membuat instance dari model Archieved
    }

    // Menampilkan daftar semua event, partner, dan berita dalam satu tampilan
    public function listAll() {
        // Mendapatkan semua data
        $evend = $this->archievedModel->getAllEvent();  // Mendapatkan semua event dari model
        $partnerd = $this->archievedModel->getAllPartner();  // Mendapatkan semua partner dari model
        $newd = $this->archievedModel->getAllNews();  // Mendapatkan semua berita dari model

        // Memasukkan data ke dalam tampilan
        // include '/final-mission/view/admin/archieve/index.php';
        include '/final-mission/view/admin/archive/list.php';
        // header('Location: index.php?modul=archieve&fitur=list');
  // Memanggil view untuk menampilkan semua daftar
    }
}

// Membuat instance dari controller dan memanggil method untuk menampilkan data
// $archieveController = new ArchieveCon();
// $archieveController->listAll();
?>
