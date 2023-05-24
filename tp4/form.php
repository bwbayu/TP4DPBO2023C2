<?php
include_once("models/Template.model.php");
include_once("models/DB.model.php");
include_once("controllers/Member.controller.php");

$member = new MemberController();

if (isset($_POST['btn-submit'])) {
    $member->add($_POST);
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $member->formUpdate($id); // nampilin form update
    }
} else if (isset($_POST['btn-update'])) {
    $id = $_POST['id'];
    $member->update($id, $_POST);
} else {
    $member->formAdd(); //nampilin form
}
