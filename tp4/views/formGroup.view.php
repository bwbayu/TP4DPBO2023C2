<?php

class FormGroupView
{
    public function render() //ADD DATA
    {
        // render form
        $dataForm = null;
        $dataForm = '<label for="nama_group">Nama Group:</label>
            <input type="text" id="nama_group" name="nama_group" required>

            <label for="nama_agensi">Nama Agensi:</label>
            <input type="text" id="nama_agensi" name="nama_agensi" required>
            
            <button type="submit" class="btn btn-info text-white" name="btn-submit" id="btn-submit">Submit</button>';



        $view = new Template("templates/form.html");
        $view->replace("DATA_LINK", "formGroup.php");
        $view->replace("DATA_TITLE", "Group");
        $view->replace("DATA_JENIS", "Add");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }

    public function render1($dataGroup)
    {
        // render form
        $dataForm = null;
        $dataForm = '<label for="nama_group">Nama Group:</label>
            <input type="hidden" name="id" value="' . $dataGroup[0]['ID_GROUP'] . '" >
            <input type="text" id="nama_group" name="nama_group" value="' . $dataGroup[0]['NAMA_GROUP'] . '" required>
            
            <label for="nama_agensi">Nama Agensi:</label>
            <input type="text" id="nama_agensi" name="nama_agensi" value="' . $dataGroup[0]['NAMA_AGENSI'] . '" required>
            
            <button type="submit" class="btn btn-info text-white" name="btn-update" id="btn-submit">Submit</button>';

        $view = new Template("templates/form.html");
        $view->replace("DATA_LINK", "formGroup.php");
        $view->replace("DATA_TITLE", "Group");
        $view->replace("DATA_JENIS", "Update");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }
}
