<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch quanly_bansua</title>
    <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body>
<?php
// 1. Ket noi CSDL Kieu thu tuc
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanly_ban_sua";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// if($conn){
//     echo "<br> <b>Ket noi thanh cong</b> <br>";
// }
// 2. Chuan bi cau truy van
$query = 'SELECT * FROM khach_hang WHERE Dien_thoai % 2 = 0'; //WHERE Phai=0
// 3. Thuc thi cau truy van


$result = mysqli_query($conn, $query);
if (!$result ) die ('<br> <b>Query failed</b>');
$numfileds = mysqli_num_fields($result);
$numrows = mysqli_num_rows($result);
//?>

<div style="overflow-x:auto;">
  <table>
        <tr>  
            <th>Mã khách hàng</th>
            <th>Tên khách hàng</th>
            <th>Phái</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>
        <?php
            // 4.Xu ly du lieu tra ve
            if($numrows!=0){
               while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
                for ($i=0; $i < $numfileds; $i++){
                    if($i==2){
                        if ($row[$i]==0) echo "<td>Nam</td>";
                        else echo "<td>Nữ</td>";
                    }
                    else echo "<td>".$row[$i]."</td>";
                }
                echo "</tr>";
               }
            }
            // 5. Xoa ket qua khoi vung nho va Dong ket noi
            mysqli_free_result($result);
            mysqli_close($conn);

        ?>

    </table>
</div>
</body>
</html>