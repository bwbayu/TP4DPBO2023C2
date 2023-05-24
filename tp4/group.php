<?php
include_once("models/Template.model.php");
include_once("models/DB.model.php");
include_once("controllers/Group.controller.php");

$group = new GroupController();
$group->index();

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        $group->delete($id);
    }
}
