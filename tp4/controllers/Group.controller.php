<?php
include_once("config/connection.php");
include_once("models/Group.model.php");
include_once("views/Group.view.php");
include_once("views/formGroup.view.php");

class GroupController
{
    private $group;

    function __construct()
    {
        $this->group = new Group(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    }

    public function index()
    {
        $this->group->open();
        $this->group->getGroup();

        $data = array();
        while ($row = $this->group->getResult()) {
            array_push($data, $row);
        }
        $this->group->close();
        // var_dump($data); // Add this line to check the value of $data
        $view = new GroupView();
        $view->render($data);
    }

    public function delete($id)
    {
        $this->group->open();
        $this->group->deleteGroup($id);
        $this->group->close();
        header("location:group.php");
    }

    public function add($data)
    {
        $this->group->open();
        $this->group->addGroup($data);
        $this->group->close();
        header("location:group.php");
    }

    public function formAdd() //nampilin form add
    {
        $view = new FormGroupView();
        $view->render();
    }

    public function update($id, $data)
    {
        $this->group->open();
        $this->group->updateGroup($id, $data);
        $this->group->close();
        header("location:group.php");
    }

    public function formUpdate($id) //nampilin form update
    {
        $this->group->open();
        $this->group->getGroupById($id);
        // ambil data buat option select group di form member
        $dataGroup = array();
        while ($row = $this->group->getResult()) {
            array_push($dataGroup, $row);
        }
        $this->group->close();

        // var_dump($dataGroup);
        $view = new FormGroupView();
        $view->render1($dataGroup);
    }
}
