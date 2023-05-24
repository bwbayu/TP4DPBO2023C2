<?php
include_once("config/connection.php");
include_once("models/Member.model.php");
include_once("models/Group.model.php");
include_once("views/Member.view.php");
include_once("views/formMember.view.php");

class MemberController
{
    private $member;
    private $group;

    function __construct()
    {
        $this->member = new Member(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
        $this->group = new Group(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    }

    public function index()
    {
        $this->member->open();
        $this->member->getMemberFull();

        $data = array();
        while ($row = $this->member->getResult()) {
            array_push($data, $row);
        }
        $this->member->close();
        // var_dump($data); // Add this line to check the value of $data
        $view = new MemberView();
        $view->render($data);
    }

    public function delete($id)
    {
        $this->member->open();
        $this->member->deleteMember($id);
        $this->member->close();
        header("location:index.php");
    }

    public function add($data) //ngirim bentukannya $_post
    {
        $this->member->open();
        $this->member->addMember($data);
        $this->member->close();
        header("location:index.php");
    }

    public function formAdd() //nampilin form add
    {
        $this->group->open();
        $this->group->getGroup();
        // ambil data buat option select group di form member
        $data = array();
        while ($row = $this->group->getResult()) {
            array_push($data, $row);
        }
        $this->group->close();
        // var_dump($data);
        $view = new FormMemberView();
        $view->render($data);
    }

    public function update($id, $data)
    {
        // var_dump($data);
        $this->member->open();
        $this->member->updateMember($id, $data);
        $this->member->close();
        header("location:index.php");
    }

    public function formUpdate($id) //nampilin form update
    {
        $this->group->open();
        $this->group->getGroup();
        // ambil data buat option select group di form member
        $dataGroup = array();
        while ($row = $this->group->getResult()) {
            array_push($dataGroup, $row);
        }
        $this->group->close();

        // ambil data member 
        $this->member->open();
        $this->member->getMemberById($id);
        $dataMember = array();
        while ($temp = $this->member->getResult()) {
            array_push($dataMember, $temp);
        }
        $this->member->close();
        // var_dump($dataMember);

        // var_dump($dataGroup);
        $view = new FormMemberView();
        $view->render1($dataGroup, $dataMember);
    }
}
