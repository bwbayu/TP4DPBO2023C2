<?php

class Group extends DB
{
    function getGroup()
    {
        $query = "SELECT * FROM grup";
        return $this->execute($query);
    }

    function getGroupById($id)
    {
        $query = "SELECT * FROM grup WHERE ID_GROUP='$id'";
        return $this->execute($query);
    }

    function addGroup($data)
    {
        $nama_grup = $data['nama_group'];
        $nama_agensi = $data['nama_agensi'];

        $query = "INSERT INTO grup VALUES('', '$nama_grup', '$nama_agensi');";

        return $this->executeAffected($query);
    }

    function updateGroup($id, $data)
    {
        $nama_grup = $data['nama_group'];
        $nama_agensi = $data['nama_agensi'];

        $query = "UPDATE grup set NAMA_GROUP='$nama_grup', NAMA_AGENSI='$nama_agensi' where ID_GROUP='$id'";

        return $this->executeAffected($query);
    }

    function deleteGroup($id)
    {
        $query = "DELETE FROM grup WHERE ID_GROUP=$id";
        return $this->executeAffected($query);
    }
}
