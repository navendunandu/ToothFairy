<?php
include("../Assets/Connection/Connection.php"); 
session_start();
ob_start();
    include('Head.php');
    if(isset($_POST['btnsubmit'])){
        $insqry="insert into tbl_complaint (complaint_title, complaint_content, user_id,complaint_date) values('".$_POST['txttitle']."','".$_POST['txtcontent']."','".$_SESSION['userid']."',curdate())";
        if(mysql_query($insqry)){
            ?>
            <script>
                alert('Successfully inserted')
                window.location='Homepage.php';
            </script>
            <?php
        }
    }
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
            <td>Title</td>
            <td><input type="text" name="txttitle" id="txttitle"></td>
        </tr>
        <tr>
            <td>Content</td>
            <td><textarea name="txtcont" id="txtcont" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td colspan='2'><input type="submit" value="Submit" name='btnsubmit'></td>
        </tr>
    </table>
</body>
</html>