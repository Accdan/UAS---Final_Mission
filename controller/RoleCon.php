<?php
require_once './model/role.php';

class RoleCon {
    private $rolecons;

    public function __construct() {
        $this->rolecons = new roled(); // Pastikan nama kelas sesuai dengan file model
    }

    public function listRole() {
        $roles = $this->rolecons->getAllRole(); // Mengakses metode dari model Role
        include 'view/admin/addrole/list.php';
    }

    public function addRole() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? null;
            $description = $_POST['description'] ?? null;
            // $create_at = $_POST['create_at'] ?? null;
            $status = $_POST['status'] ?? null;

            // Simpan data
            $this->rolecons->createRole($name, $description, $status);

            // Redirect ke halaman daftar role
            header("Location: index.php?modul=role&fitur=list");
            exit;
        } else {
            // Jika bukan POST, tampilkan form input
            include 'view/admin/addrole/input.php';
        }
    }

    public function delete($id) {
        $this->rolecons->deleteRole($id);
        header("Location: index.php?modul=role&fitur=list");
        exit;
    }

    public function edit($id) {
        $roles = $this->rolecons->getRoleById($id);
        include 'view/admin/addrole/update.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $name = $_POST['name'] ?? null;
            $description = $_POST['description'] ?? null;
            $status = $_POST['status'] ?? null;


            $this->rolecons->updateRole($id, $name, $description, $status);
            header("Location: index.php?modul=role&fitur=list");
            exit;
        }
    }
}
?>
