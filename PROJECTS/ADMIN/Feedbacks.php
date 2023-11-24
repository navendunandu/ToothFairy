<?php
include("../Assets/Connection/Connection.php"); 
session_start();
ob_start();
    include('Head.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>Sl.No</td>
            <td>Date</td>
            <td>Name</td>
            <td>Title</td>
            <td>Content</td>
        </tr>
        <?php
        $selQry="select * from tbl_complaint inner join tbl_user on u.user_id=f.user_id";
        $res=mysql_query($selQry);
        $i=0;
        while ($row=mysql_fetch_array($res))
        {
            $i++;
            ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['complaint_date'] ?></td>
            <td><?php echo $row['user_name'] ?></td>
            <td><?php echo $row['complaint_title'] ?></td>
            <td><?php echo $row['complaint_content'] ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>