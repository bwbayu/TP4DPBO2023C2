<?php

class Member extends DB
{
    function getMemberFull()
    {
        $query = "SELECT * FROM members JOIN grup ON members.ID_GROUP=grup.ID_GROUP ORDER BY members.ID";
        return $this->execute($query);
    }

    function getMember()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMemberById($id)
    {
        $query = "SELECT * FROM members WHERE ID=$id;";
        return $this->execute($query);
    }

    function addMember($data)
    {
        $id_group = $data['id_group'];
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];

        $query = "INSERT INTO members VALUES('', '$id_group', '$nama', '$email', '$phone', '$join_date');";

        return $this->executeAffected($query);
    }

    function updateMember($id, $data)
    {
        $id_group = $data['id_group'];
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];

        $query = "UPDATE members SET ID_GROUP='$id_group', NAME='$nama', EMAIL='$email', PHONE='$phone', JOIN_DATE='$join_date' WHERE ID='$id';";

        return $this->executeAffected($query);
    }

    function deleteMember($id)
    {
        $query = "DELETE FROM members WHERE ID=$id";
        return $this->executeAffected($query);
    }
}
