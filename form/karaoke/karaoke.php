<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinh Tien Karaoke</title>
</head>
<body>
    <?php
    if(isset($_POST['gio_bat_dau']) and isset($_POST['gio_ket_thuc'])) {
        $gio_bat_dau = $_POST['gio_bat_dau'];
        $gio_ket_thuc = $_POST['gio_ket_thuc'];

        if (is_numeric($gio_bat_dau) and is_numeric($gio_ket_thuc)){
            if($gio_bat_dau<10 or $gio_bat_dau>24 or $gio_ket_thuc<10 or $gio_ket_thuc>24){
                echo "<script>alert('Thời gian làm việc từ 10h đến 24h!!');</script>";
            }
            if($gio_bat_dau<$gio_ket_thuc){
               if($gio_bat_dau<17 and $gio_ket_thuc<=17){
                   $tien_thanh_toan=($gio_ket_thuc-$gio_bat_dau)*20000;
                }else if($gio_bat_dau>=17 and $gio_ket_thuc>17){
                   $tien_thanh_toan=($gio_ket_thuc-$gio_bat_dau)*45000;
                }else if($gio_bat_dau<17 and $gio_ket_thuc>17){
                   $tien_thanh_toan=(17-$gio_bat_dau)*20000+($gio_ket_thuc-17)*45000;
                }
            }else if($gio_bat_dau>$gio_ket_thuc){
                echo "<script>alert('Giờ bắt đầu phải nhỏ hơn giờ kết thúc!!');</script>";
            }
        }else
        {
            echo "<script>alert('Giờ bắt đầu và giờ kết thúc phải là số!!');</script>";
        }
    }
    ?>

    <form method="post" name="tinh_tien_karaoke">
        <table bgcolor="beige" align="center">
            <tr>
                <th bgcolor="lightpink" colspan="3">
                   TÍNH TIỀN KARAOKE
                </th>
            </tr>
            <tr>
                <td>Giờ bắt đầu:</td>
                <td><input type="text" name="gio_bat_dau" value="<?php if(isset($gio_bat_dau)) echo $gio_bat_dau; ?>" ></td>
                  <td>(h)</td>
            </tr>
            <tr>
                <td>Giờ kết thúc:</td>
                <td><input type="text" name="gio_ket_thuc" value="<?php if(isset($gio_ket_thuc)) echo $gio_ket_thuc; ?>"></td>
                <td>(h)</td>
            </tr>
            <tr>
                <td>Tiền thanh toán:</td>
                <td><input type="text" readonly name="tien_thanh_toan" value="<?php if(isset($tien_thanh_toan)) echo $tien_thanh_toan; ?>"></td>
                <td>(VND)</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tính Tiền"></td>
            </tr>
        </table>
    </form>
</body>
</html>