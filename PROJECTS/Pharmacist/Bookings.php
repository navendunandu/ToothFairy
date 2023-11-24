<?php
include("../Assets/Connection/Connection.php"); 
session_start();
ob_start();
    include('Head.php');
 if(isset($_GET["id"]))
   {
	   $did = $_GET["id"];
  $delqry="UPDATE tbl_appointment set app_status='".$_GET['st']."' WHERE app_id=".$did;
   mysql_query($delqry);
   header("location:Bookings.php");
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
    <?php
    $selApp='SELECT * FROM tbl_appointment a inner join tbl_user u on u.user_id=a.user_id inner join tbl_booking b on b.app_id=a.app_id where a.app_status>=2 or a.app_status<5 order by a.app_id desc';
    $resApp=mysql_query($selApp);
    while ($dataApp=mysql_fetch_array($resApp)){
        ?>
    <table class='table' border='1'>
        <tr>
            <td colspan='2'>Patient Name</td>
            <td colspan='3'><?php echo $dataApp['user_name'] ?></td>
        </tr>
        
        <tr>
            <td>Sl.No</td>
            <td>Product</td>
            <td>quantity</td>
            <td>Cost</td>
            <td>Total</td>
        </tr>
        <?php
        $selP="select * from tbl_cart c inner join tbl_product p on p.product_id = c.product_id where c.booking_id=".$dataApp['booking_id'];
        $resP=mysql_query($selP);
        $i=0;
        while($dataP=mysql_fetch_array($resP)){
            $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $dataP['product_name'] ?></td>
            <td><?php echo $dataP['cart_quantity'] ?></td>
            <td><?php echo $dataP['product_rate'] ?></td>
            <td>
            <?php
             echo $dataP['cart_quantity'] * $dataP['product_rate'] ?>
            </td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan='2'>
                <?php
                if ($dataApp['app_status'] == 2){
                    ?>
                    <a href="Bookings.php?id=<?php echo $dataApp['app_id'] ?>&st=3">Medicine Packed</a>
                    <?php
                }
                else if ($dataApp['app_status'] == 3){
                    ?>
                    <a href="Bookings.php?id=<?php echo $dataApp['app_id'] ?>&st=4">Medicine Delivered</a>
                    <?php
                }
                else if ($dataApp['app_status'] == 4){
                    echo "Completed";
                }
                ?>
            </td>
            <td colspan='2'><p align='right'>Total</p></td>
            <td><?php echo $dataApp['booking_amount'] ?></td>
        </tr>
    </table>
    <br>
    <hr>
    <?php
    }
    ?>
</body>
</html>