<?php
include_once("models/Template.model.php");
include_once("models/DB.model.php");
include_once("controllers/Member.controller.php");

$member = new MemberController();
$member->index();

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        $member->delete($id);
    }
}
