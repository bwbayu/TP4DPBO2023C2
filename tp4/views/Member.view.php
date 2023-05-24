<?php

class MemberView
{
    public function render($data)
    {
        $dataMember = null;

        $no = 0; // Initialize the $no variable outside the loop

        foreach ($data as $val) {
            $dataMember .=
                '<tr>
                <th scope="row">' . ++$no . '</th>
                <td>' . $val['NAME'] . '</td>
                <td>' . $val['NAMA_GROUP'] . '</td>
                <td>' . $val['NAMA_AGENSI'] . '</td>
                <td>' . $val['EMAIL'] . '</td>
                <td>' . $val['PHONE'] . '</td>
                <td>' . $val['JOIN_DATE'] . '</td>
                <td style="font-size: 22px;"><a href="#" title="coba"></a>
                <a href="form.php?id=' . $val['ID'] . '"><button type="button" class="btn btn-success text-white">Update</button></a>
                <a href="index.php?hapus=' . $val['ID'] . '"><button type="button" class="btn btn-danger">Delete</button></a>
                </td>
                </tr>';
        }
        $header = "<tr>
        <th> No </th>
                <th> Nama </th>
                <th> Nama Group </th>
                <th> Nama Agensi </th>
                <th> Email </th>
                <th> Phone </th>
                <th> Join Date </th>
                <th> Action </th>
                </tr>";


        $view = new Template("templates/index.html");

        $view->replace("DATA_HEADER", $header);
        $view->replace("DATA_LINK", "form.php");
        $view->replace("DATA_TITLE", "Member");
        $view->replace("DATA_TABLE", $dataMember);
        $view->write();
    }
}
