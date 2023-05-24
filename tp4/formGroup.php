<?php
include_once("models/Template.model.php");
include_once("models/DB.model.php");
include_once("controllers/Group.controller.php");

$group = new GroupController();

if (isset($_POST['btn-submit'])) {
    $group->add($_POST);
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $group->formUpdate($id); // nampilin form update
    }
} else if (isset($_POST['btn-update'])) {
    $id = $_POST['id'];
    $group->update($id, $_POST);
} else {
    $group->formAdd(); //nampilin form
}
