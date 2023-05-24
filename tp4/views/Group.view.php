<?php

class GroupView
{
    public function render($data)
    {
        $dataGroup = null;

        $no = 0; // Initialize the $no variable outside the loop

        foreach ($data as $val) {
            $dataGroup .=
                '<tr>
            <th scope="row">' . ++$no . '</th>
            <td>' . $val['NAMA_GROUP'] . '</td>
            <td>' . $val['NAMA_AGENSI'] . '</td>
            <td style="font-size: 22px;">
            <a href="formGroup.php?id=' . $val['ID_GROUP'] . '"><button type="button" class="btn btn-success text-white">Update</button></a>
            <a href="group.php?hapus=' . $val['ID_GROUP'] . '"><button type="button" class="btn btn-danger">Delete</button></a>
            </td>
            </tr>';
        }
        $header = "<tr>
            <th> No </th>
            <th> Nama Group </th>
            <th> Nama Agensi </th>
            <th> Action </th>
            </tr>";

        $view = new Template("templates/index.html");

        $view->replace("DATA_HEADER", $header);
        $view->replace("DATA_LINK", "formGroup.php");
        $view->replace("DATA_TITLE", "Group");
        $view->replace("DATA_TABLE", $dataGroup);
        $view->write();
    }
}
