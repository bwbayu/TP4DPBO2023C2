<?php

class FormMemberView
{
    public function render($data) //ADD DATA
    {
        // var_dump($data);
        // buat option untuk select
        $dataOption = '<option value="">Pilih Group</option>';
        foreach ($data as $temp) {
            $dataOption .= '<option value="' . $temp['ID_GROUP'] . '">' . $temp['NAMA_GROUP'] . '</option>';
        }
        // render form
        $dataForm = null;
        $dataForm = '<label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="id_group">ID Group:</label>
            <select id="id_group" name="id_group" required>' . $dataOption .
            '</select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
            
            <label for="join_date">Join Date:</label>
            <input type="date" id="join_date" name="join_date" required>
            
            <button type="submit" class="btn btn-info text-white" name="btn-submit" id="btn-submit">Submit</button>';



        $view = new Template("templates/form.html");
        $view->replace("DATA_LINK", "form.php");
        $view->replace("DATA_TITLE", "Member");
        $view->replace("DATA_JENIS", "Add");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }

    public function render1($dataGroup, $dataMember)
    {
        // buat option untuk select
        $dataOption = null;
        foreach ($dataGroup as $temp) {
            if ($temp['ID_GROUP'] == $dataMember[0]['ID_GROUP']) {
                $dataOption .= '<option value="' . $temp['ID_GROUP'] . '" selected>' . $temp['NAMA_GROUP'] . '</option>';
            } else {
                $dataOption .= '<option value="' . $temp['ID_GROUP'] . '">' . $temp['NAMA_GROUP'] . '</option>';
            }
        }

        // render form
        $dataForm = null;
        $dataForm = '<label for="nama">Nama:</label>
            <input type="hidden" name="id" value="' . $dataMember[0]['ID'] . '" >
            <input type="text" id="nama" name="nama" value="' . $dataMember[0]['NAME'] . '" required>

            <label for="id_group">ID Group:</label>
            <select id="id_group" name="id_group" required>' . $dataOption .
            '</select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="' . $dataMember[0]['EMAIL'] . '" required>
            
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone"  value="' . $dataMember[0]['PHONE'] . '" required>
            
            <label for="join_date">Join Date:</label>
            <input type="date" id="join_date" name="join_date"  value="' . $dataMember[0]['JOIN_DATE'] . '" required>
            
            <button type="submit" class="btn btn-info text-white" name="btn-update" id="btn-submit">Submit</button>';

        $view = new Template("templates/form.html");
        $view->replace("DATA_LINK", "form.php");
        $view->replace("DATA_TITLE", "Member");
        $view->replace("DATA_JENIS", "Update");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }
}
