<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>
<body>
    <?php
            function taoMang($n){
                $mang = [];
                for($i=0; $i<$n; $i++){
                    $mang[$i] = rand(0, 20);
                }
                return $mang;
            }
            function inMang($mang){
                for($i=0; $i<count($mang); $i++){
                    echo $mang[$i] . " ";
                }
            }
            function tinhMax($mang){
                return max($mang);
            }
            function tinhMin($mang){
                return min($mang);
            }
            function tinhTong($mang){
                return array_sum($mang);
            }
        
        $n = '';
        $mang = null;

        if(isset($_POST['n'])){
            $n = $_POST['n'];
            
            if(is_numeric($n) && $n > 0){
                $mang = taoMang($n); 
            } else {
                echo "<script>alert('N phải là số nguyên dương lớn hơn 0!');</script>";
            }
        }
    ?>

    <form method="post" name="nhap_n">
        <table  align="center" style="background: beige">
            <tr bgcolor="pink" text-align="center">
                <th colspan="2">PHÁT SINH MẢNG VÀ TÍNH TOÁN</th>
            </tr>
            <tr>
                <td>Nhập số phần tử: </td>
                <td><input type="number" name="n" value="<?php if (isset($n)) echo $n;?>"</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Phát sinh và tính toán"></td>
            </tr>
            <tr>
                <td>Mảng: </td>
                <td><input type="text" name="mang" readonly value="<?php if (isset($mang)) { taoMang($n); inMang($mang); } ?>"></td>
            </tr>
            <tr>
                <td>GTLN (MAX) trong mảng: </td>
                <td><input type="text" name="max" readonly value="<?php if (isset($mang)) echo tinhMax($mang); ?>"></td>
            </tr>
            <tr>
                <td>GTNN (MIN) trong mảng: </td>
                <td><input type="text" name="min" readonly value="<?php if (isset($mang)) echo tinhMin($mang); ?>"></td>
            </tr>
            <tr>
                <td>Tổng mảng: </td>
                <td><input type="text" name="tong" readonly value="<?php if (isset($mang)) echo tinhTong($mang); ?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="font-size: 12px; text-align: center;">(Ghi chú: Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</td>
            </tr>
        </table>
    </form>
</body>
</html>