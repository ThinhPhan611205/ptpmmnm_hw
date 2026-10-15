


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quanly_ban_sua";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if($conn){
        echo "<br><b>Ket noi thanh cong</b><br>";
    }

    $query = 'SELECT * FROM khach_hang';
    $result = mysqli_query($conn, $query);
    //PHAN 1.3
    //1
    $query1 = 'SELECT Ten_hang_sua, Dia_chi, Dien_thoai FROM hang_sua';
    $result1 = mysqli_query($conn, $query1);
    //2
    $query2 = 'SELECT * FROM khach_hang ORDER BY Ten_khach_hang ASC';
    $result2 = mysqli_query($conn, $query2);
    //3
    $query3 = 'SELECT Ten_khach_hang, Phai, Dia_chi, Dien_thoai FROM khach_hang ORDER BY CASE WHEN Phai = 0 THEN 1 ELSE 2 END';
    $result3 = mysqli_query($conn, $query3);
    //4
    $query4 = 'SELECT Ten_sua, Trong_luong, Don_gia FROM sua ORDER BY Ten_sua ASC';
    $result4 = mysqli_query($conn, $query4);
    $query41 = 'SELECT Ten_sua, Trong_luong, Don_gia FROM sua ORDER BY Don_gia DESC';
    $result41 = mysqli_query($conn, $query41);
    //5
    $query5 = 'SELECT Ten_sua, Trong_luong, Don_gia, TP_Dinh_Duong FROM sua WHERE Ten_Sua LIKE "S%"';
    $result5 = mysqli_query($conn, $query5);
    //6
    $query6 = 'SELECT * FROM hang_sua WHERE Ma_hang_sua LIKE "%M"';
    $result6 = mysqli_query($conn, $query6);
    //7
    $querry7 = 'SELECT * FROM sua WHERE ten_sua LIKE "%grow%"';
    $result7 = mysqli_query($conn, $querry7);
    //8
    $querry8 = 'SELECT Ten_sua, Don_gia, Trong_luong FROM sua WHERE Don_gia > 100000 ORDER BY Ten_sua DESC';
    $result8 = mysqli_query($conn, $querry8);
    //9
    $querry9 = 'SELECT Ten_sua, TP_Dinh_Duong, Loi_ich FROM sua WHERE Ma_loai_sua = "SC" AND Ma_hang_sua = "VNM" ORDER BY Ten_sua ASC';
    $result9 = mysqli_query($conn, $querry9);
    //10
    $querry10 = 'SELECT * FROM sua WHERE Trong_Luong >= 900 OR Ma_hang_sua = "DS"';
    $result10 = mysqli_query($conn, $querry10);
    //11
    $querry11 = 'SELECT * FROM sua WHERE Don_gia > 100000 AND Don_gia <150000';
    $result11 = mysqli_query($conn, $querry11); 
    //12
    $querry12 = 'SELECT * FROM sua WHERE (Ma_hang_sua = "DM" OR Ma_hang_sua = "DL" OR Ma_hang_sua = "DS") AND Trong_Luong >= 800 ORDER BY Trong_Luong ASC';
    $result12 = mysqli_query($conn, $querry12);
    //13
    $querry13 = 'SELECT * FROM sua WHERE Ma_loai_sua = "SD" OR Don_gia <= 12000';
    $result13 = mysqli_query($conn, $querry13);
    //14
    $querry14 = 'SELECT * FROM khach_hang WHERE Phai = 0 AND Ten_khach_hang LIKE "N%"';
    $result14 = mysqli_query($conn, $querry14);
    //15
    $querry15 = 'SELECT * FROM sua WHERE Ma_hang_sua NOT LIKE "%M%"';
    $result15 = mysqli_query($conn, $querry15);
    //16
    $querry16 = 'SELECT Ten_sua, TP_Dinh_Duong FROM sua WHERE TP_Dinh_Duong LIKE "%canxi%" AND TP_Dinh_Duong LIKE "%vitamin%"';   
    $result16 = mysqli_query($conn, $querry16);
    //17
    $querry17 = 'SELECT * FROM sua WHERE Trong_luong = 180 OR Trong_luong = 200 OR Trong_luong = 900';
    $result17 = mysqli_query($conn, $querry17);
    //18
    $querry18 = 'SELECT * FROM sua WHERE Trong_luong != 400 AND Trong_luong != 800 AND Trong_luong != 900';
    $result18 = mysqli_query($conn, $querry18);
    //19
    $querry19 = 'SELECT Ten_sua, Don_gia, TP_Dinh_Duong FROM sua ORDER BY Don_gia DESC LIMIT 10';
    $result19 = mysqli_query($conn, $querry19);
    //20
    $querry20 = 'SELECT Ten_sua, Trong_luong FROM sua WHERE Ma_hang_sua = "VNM" ORDER BY Trong_luong DESC LIMIT 3';
    $result20 = mysqli_query($conn, $querry20);
    //21
    $querry21 = 'SELECT Ten_sua, Loi_ich, Don_gia FROM sua WHERE Ma_hang_sua = "VNM" ORDER BY Don_gia DESC';
    $result21 = mysqli_query($conn, $querry21);
    //22
    $querry22 = 'SELECT Ten_sua, Trong_luong, Loi_ich FROM sua WHERE Ma_hang_sua = "AB" ORDER BY Trong_luong ASC';
    $result22 = mysqli_query($conn, $querry22);


    //PHAN 1.4
    //1
    $querry141 ='SELECT ROUND(AVG(Tri_gia), 3) FROM hoa_don ';
    $result141 = mysqli_query($conn, $querry141);
    //2
    $querry142 ='SELECT * FROM hoa_don WHERE MONTH(Ngay_HD) = 7 AND YEAR(Ngay_HD) = 2007';
    $result142 = mysqli_query($conn, $querry142);
    //3
    $querry143 ='SELECT So_hoa_don, Ngay_HD, DATEDIFF(CURDATE(), DATE(Ngay_HD)) AS So_ngay FROM hoa_don ORDER BY So_ngay DESC';
    $result143 = mysqli_query($conn, $querry143);
    //4
    $querry144 ='SELECT Ten_sua FROM sua WHERE LENGTH(Ten_sua) <= 10';
    $result144 = mysqli_query($conn, $querry144);
    //5
    $querry145 ='SELECT UPPER(Ten_hang_sua), Dia_chi, Dien_thoai FROM hang_sua';
    $result145 = mysqli_query($conn, $querry145);
    //6
    $querry146 ='SELECT  So_hoa_don,
     DATE_FORMAT(Ngay_HD, "%d/%m/%Y") AS Ngay_HD FROM hoa_don';
    $result146 = mysqli_query($conn, $querry146);
    //8
    $querry148 ='SELECT CONCAT( Ma_khach_hang," ",Ten_khach_hang) AS ma_ten_KH, IF(Phai=0,"Nam","Nữ") FROM khach_hang';
    $result148 = mysqli_query($conn, $querry148);
    //9
    $querry149 ='SELECT Ten_sua, Don_gia, Trong_luong, IF(Don_gia < 100000,"Sữa giá trung bình","Sữa giá cao") AS Danh_gia FROM sua WHERE Trong_luong > 400 AND Trong_luong < 500 ';
    $result149 = mysqli_query($conn, $querry149);
    //10 - Thống kê số khách hàng nam, nữ và tổng số khách hàng
   $querry1410 = 'SELECT 
        SUM(IF(Phai = 0, 1, 0)) AS So_KH_Nam, 
        SUM(IF(Phai = 1, 1, 0)) AS So_KH_Nu, 
        COUNT(*) AS Tong_KH 
        FROM khach_hang';
    $result1410 = mysqli_query($conn, $querry1410);

    // if(mysqli_num_rows($result)!=0){
    //     while($row = mysqli_fetch_array($result))
    //         {
    //             for($i=0; $i<mysqli_num_fields($result); $i++)
    //             {
    //                 echo $row[$i] . " ";
    //             }
    //               echo "<br>";
    //         }
          
    // }

?>
<h1>Danh sách khách hàng</h1>
<table style="border:1px solid black;">
    <thead>
        <tr>
            <th style='border:1px solid black; padding:8px;'>Ma KH</th>
            <th style='border:1px solid black; padding:8px;'>Ho ten</th>
            <th style='border:1px solid black; padding:8px;'>Gioi tinh</th>
            <th style='border:1px solid black; padding:8px;'>Dia chi</th>
            <th style='border:1px solid black; padding:8px;'>Dien thoai</th>
            <th style='border:1px solid black; padding:8px;'>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            $num_fields = mysqli_num_fields($result);

            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                for ($i = 0; $i < $num_fields; $i++) {
                    if($i==2){
                        $row[$i] = ($row[$i] == 0) ? "Nam" : "Nữ";
                    }

                    echo "<td style='border:1px solid black; padding:8px;'>" . $row[$i] . "</td>";
                }
                echo "</tr>";
            }
        } 

        mysqli_close($conn);
        ?>
    </tbody>
</table>

<h1>1.Liệt kê danh sách hãng sữa </h1>
<table>
    <thead>
        <tr>
            <th style='border:1px solid black; padding:8px;'>Tên hãng sữa</th>
            <th style='border:1px solid black; padding:8px;'>Địa chỉ</th>
            <th style='border:1px solid black; padding:8px;'>Điện thoại</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if($result1 && mysqli_num_rows($result1)>0){
                $num_fields1 = mysqli_num_fields($result1);

                while($row1 = mysqli_fetch_array($result1)){
                    echo "<tr>";
                    for($i=0; $i<$num_fields1; $i++){
                        if($i==0 && $i==4){
                            continue;
                        }
                        echo "<td style='border:1px solid black; padding:8px;'>".$row1[$i]."</td>";
                    }
                    echo "</tr>";
                }

            }
        ?>
    </tbody>
</table>

<h1>2.Danh sách khách hàng với thứ tự tên tăng dần</h1>
<table style="border:1px solid black;">
    <thead>
        <tr>
            <th style='border:1px solid black; padding:8px;'>Ma KH</th>
            <th style='border:1px solid black; padding:8px;'>Ho ten</th>
            <th style='border:1px solid black; padding:8px;'>Gioi tinh</th>
            <th style='border:1px solid black; padding:8px;'>Dia chi</th>
            <th style='border:1px solid black; padding:8px;'>Dien thoai</th>
            <th style='border:1px solid black; padding:8px;'>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result2 && mysqli_num_rows($result2) > 0) {
            $num_fields = mysqli_num_fields($result2);

            while ($row = mysqli_fetch_array($result2)) {
                echo "<tr>";
                for ($i = 0; $i < $num_fields; $i++) {
                    if($i==2){
                        $row[$i] = ($row[$i] == 0) ? "Nam" : "Nữ";
                    }

                    echo "<td style='border:1px solid black; padding:8px;'>" . $row[$i] . "</td>";
                }
                echo "</tr>";
            }
        } 
        ?>
    </tbody>
</table>

<h1>3.Danh sách khách hàng với thứ tự nam trước nữ sau</h1>
<table style="border:1px solid black;">
    <thead>
        <tr>
            <th style='border:1px solid black; padding:8px;'>Ho ten</th>
            <th style='border:1px solid black; padding:8px;'>Gioi tinh</th>
            <th style='border:1px solid black; padding:8px;'>Dia chi</th>
            <th style='border:1px solid black; padding:8px;'>Dien thoai</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result3 && mysqli_num_rows($result3) > 0) {
            $num_fields = mysqli_num_fields($result3);

            while ($row = mysqli_fetch_array($result3)) {
                echo "<tr>";
                for ($i = 0; $i < $num_fields; $i++) {
                    if($i==1){
                        $row[$i] = ($row[$i] == 0) ? "Nam" : "Nữ";
                    }

                    echo "<td style='border:1px solid black; padding:8px;'>" . $row[$i] . "</td>";
                }
                echo "</tr>";
            }
        } 
        ?>
    </tbody>
</table>

<h1>4.Danh sách tên sữa, trọng lượng, đơn giá. Tăng theo cột sữa, giảm theo cột đơn giá </h1>
<p>Tăng theo cột</p>
<?php
    if(mysqli_num_rows($result4)!=0){
     while($row = mysqli_fetch_array($result4))
       {
                 for($i=0; $i<mysqli_num_fields($result4); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<p>Giảm theo giá</p>
<?php
    if(mysqli_num_rows($result41)!=0){
     while($row = mysqli_fetch_array($result41))
       {
                 for($i=0; $i<mysqli_num_fields($result41); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>5. Danh sách sữa có tên chứa ký tự 'S'</h1>
<?php
    if(mysqli_num_rows($result5)!=0){
     while($row = mysqli_fetch_array($result5))
       {
                 for($i=0; $i<mysqli_num_fields($result5); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>6. Danh sách hàng sữa có mã hàng sữa kết thúc bằng 'M'</h1>
<?php
    if(mysqli_num_rows($result6)!=0){
     while($row = mysqli_fetch_array($result6))
       {
                 for($i=0; $i<mysqli_num_fields($result6); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>7. Danh sách sữa có tên chứa từ 'Grow'</h1>
<?php
    if(mysqli_num_rows($result7)!=0){
     while($row = mysqli_fetch_array($result7))
       {
                 for($i=0; $i<mysqli_num_fields($result7); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>8. Danh sách sữa có đơn giá lớn hơn 100.000 và tên sữa giảm dần</h1>
<?php
    if(mysqli_num_rows($result8)!=0){
     while($row = mysqli_fetch_array($result8))
       {
                 for($i=0; $i<mysqli_num_fields($result8); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>9. Danh sách sữa có mã hãng là VMN và Loại SC</h1>
<?php
    if(mysqli_num_rows($result9)!=0){
     while($row = mysqli_fetch_array($result9))
       {
                 for($i=0; $i<mysqli_num_fields($result9); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>10. Danh sách sữa có trọng lượng lớn hơn hoặc bằng 900 hoặc có mã hãng là DS</h1>
<?php
    if(mysqli_num_rows($result10)!=0){
     while($row = mysqli_fetch_array($result10))
       {
                 for($i=0; $i<mysqli_num_fields($result10); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>11. Danh sách sữa có đơn giá từ 100.000 đến 150.000</h1>
<?php
    if(mysqli_num_rows($result11)!=0){
     while($row = mysqli_fetch_array($result11))
       {
                 for($i=0; $i<mysqli_num_fields($result11); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>12. Danh sách sữa có mã hãng là DM hay DL hoặc DS và có trọng lượng lớn hơn hoặc bằng 800</h1>
<?php
    if(mysqli_num_rows($result12)!=0){
     while($row = mysqli_fetch_array($result12))
       {
                 for($i=0; $i<mysqli_num_fields($result12); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>13. Danh sách sữa có mã hãng là SD hoặc có giá tiền nhỏ hơn hoặc bằng 12000</h1>
<?php
    if(mysqli_num_rows($result13)!=0){
     while($row = mysqli_fetch_array($result13))
       {
                 for($i=0; $i<mysqli_num_fields($result13); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>14. Danh sách khách hàng là nam và tên có bắt đầu bằng N</h1>
<?php
    if(mysqli_num_rows($result14)!=0){
     while($row = mysqli_fetch_array($result14))
       {
                 for($i=0; $i<mysqli_num_fields($result14); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>15. Danh sách sữa không chứa chữ M</h1>
<?php
    if(mysqli_num_rows($result15)!=0){
     while($row = mysqli_fetch_array($result15))
       {
                 for($i=0; $i<mysqli_num_fields($result15); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>16. Danh sách sữa có chứa cả canxi và vitamin</h1>
<?php
    if(mysqli_num_rows($result16)!=0){
     while($row = mysqli_fetch_array($result16))
       {
                 for($i=0; $i<mysqli_num_fields($result16); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>17. Danh sách sữa có trọng lượng là 180, 200 hoặc 900</h1>
<?php
    if(mysqli_num_rows($result17)!=0){
     while($row = mysqli_fetch_array($result17))
       {
                 for($i=0; $i<mysqli_num_fields($result17); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>18. Danh sách sữa có trọng lượng không phải là 400, 800 hoặc 900</h1>
<?php
    if(mysqli_num_rows($result18)!=0){
     while($row = mysqli_fetch_array($result18))
       {
                 for($i=0; $i<mysqli_num_fields($result18); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>19. Tên sữa, đơn giá, thành phần dinh dưỡng của 10 sữa có đơn giá cao nhất </h1>
<?php
    if(mysqli_num_rows($result19)!=0){
     while($row = mysqli_fetch_array($result19))
       {
                 for($i=0; $i<mysqli_num_fields($result19); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>20. Tên sữa, trọng lượng của 3 sữa có trọng lượng cao nhất của hãng Vinamilk </h1>
<?php
    if(mysqli_num_rows($result20)!=0){
     while($row = mysqli_fetch_array($result20))
       {
                 for($i=0; $i<mysqli_num_fields($result20); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>21. Các sữa của hãng Vinamilk trong đó đơn giá sắp 
giảm dần. </h1>
<?php
    if(mysqli_num_rows($result21)!=0){
     while($row = mysqli_fetch_array($result21))
       {
                 for($i=0; $i<mysqli_num_fields($result21); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>22.  Danh sách các sữa của hãng Abbott trong đó trọng lượng sắp tăng dần.  </h1>
<?php
    if(mysqli_num_rows($result22)!=0){
     while($row = mysqli_fetch_array($result22))
       {
                 for($i=0; $i<mysqli_num_fields($result22); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>

<h1>Phần 1.4</h1>
<h1>1. Giá trị trung bình đơn giá của hóa đơn làm tròn đơn vị phần nghìn</h1>
<?php
    echo mysqli_fetch_array($result141)[0];
?>
<h1>2. Danh sách các hóa đơn trong tháng 7 năm 2007 </h1>
<?php
    if(mysqli_num_rows($result142)!=0){
     while($row = mysqli_fetch_array($result142))
       {
                 for($i=0; $i<mysqli_num_fields($result142); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>3. Liệt kê các hóa đơn và có thêm một cột là số ngày sắp theo cột số ngày giảm dần   </h1>
<?php
    if(mysqli_num_rows($result143)!=0){
     while($row = mysqli_fetch_array($result143))
       {
                 for($i=0; $i<mysqli_num_fields($result143); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>4. Liệt kê các sữa có tên ngắn hơn hoặc bằng 10 ký tự   </h1>
<?php
    if(mysqli_num_rows($result144)!=0){
     while($row = mysqli_fetch_array($result144))
       {
                 for($i=0; $i<mysqli_num_fields($result144); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>5. Liệt kê các hãng sữa và thông tin liên hệ, Tên hãng viết hoa  </h1>
<?php
    if(mysqli_num_rows($result145)!=0){
     while($row = mysqli_fetch_array($result145))
       {
                 for($i=0; $i<mysqli_num_fields($result145); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>6. Danh sách hóa đơn kèm theo ngày được định dạng như sau "Thứ - ngày – tháng – năm" (theo 
dạng tiếng Anh)   </h1>
<?php
    if(mysqli_num_rows($result146)!=0){
     while($row = mysqli_fetch_array($result146))
       {
                 for($i=0; $i<mysqli_num_fields($result146); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>7.</h1>
<h1>8.Liệt kê danh sách khách hàng gồm </h1>
<?php
    if(mysqli_num_rows($result148)!=0){
     while($row = mysqli_fetch_array($result148))
       {
                 for($i=0; $i<mysqli_num_fields($result148); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>9.Liệt kê danh sách khách hàng gồm </h1>
<?php
    if(mysqli_num_rows($result149)!=0){
     while($row = mysqli_fetch_array($result149))
       {
                 for($i=0; $i<mysqli_num_fields($result149); $i++)
                {
                    echo $row[$i] . " ";
               }
                   echo "<br>";
           }
          
    }
?>
<h1>11. Thống kê số khách hàng nam – nữ và tổng số khách hàng</h1>
<table style="border:1px solid black;">
    <thead>
        <tr>
            <th>Số KH Nam</th>
            <th>Số KH Nữ</th>
            <th>Tổng KH</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if($result1410 && mysqli_num_rows($result1410) > 0){
                $row = mysqli_fetch_assoc($result1410);
                echo "<tr>";
                echo "<td >" . $row['So_KH_Nam'] . "</td>";
                echo "<td >" . $row['So_KH_Nu'] . "</td>";
                echo "<td >" . $row['Tong_KH'] . "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
</body>
</html>
