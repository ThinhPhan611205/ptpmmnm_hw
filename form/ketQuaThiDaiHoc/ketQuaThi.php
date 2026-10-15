<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ket qua thi</title>
</head>
<body>
    <?php
    if(isset($_POST['toan']) and isset($_POST['ly']) and isset($_POST['hoa']) and isset($_POST['diem_chuan']) and isset($_POST['tong_diem'])){
        $toan=$_POST['toan'];
        $ly=$_POST['ly'];
        $hoa=$_POST['hoa'];
        $diem_chuan=$_POST['diem_chuan']; 
        $tong_diem=$toan+$ly+$hoa;
        if(is_numeric($toan) and is_numeric($ly) and is_numeric($hoa) and is_numeric($diem_chuan) and is_numeric($tong_diem)){
            if($toan >10 or $ly>10 or $hoa>10){
                echo "<script>alert('Điểm các môn phải <=10');</script>";
            }
            if($toan>=0 and $ly>=0 and $hoa>=0){
                if($tong_diem>=$diem_chuan){
                    $ket_qua_thi="Đậu";
                }else{
                    $ket_qua_thi="Rớt";
                }
            }else{
                echo "<script>alert('Điểm Toán, Lý, Hóa phải >= 0');</script>";
            }
        }else{
            echo "<script>alert('Điểm Toán, Lý, Hóa, Điểm chuẩn và Tổng điểm phải là số');</script>";
        }
    }
    ?>

    <form method="post" name="ket_qua_thi" background="beige">
        <table bgcolor="beige" align="center">
            <tr>
                <th colspan="2" style="background: lightpink">
                    KẾT QUẢ THI ĐẠI HỌC
                </th>
            </tr>
            <tr>
                <td>Toán: </td>
                <td><input name="toan" type="text" value="<?php if(isset($toan)) echo $toan; ?>"></td>
            </tr>
            <tr>
                <td>Lý : </td>
                <td><input name="ly" type="text" value="<?php if(isset($ly)) echo $ly; ?>"></td>
            </tr>
            <tr>
                <td>Hóa: </td>
                <td><input name="hoa" type="text" value="<?php if(isset($hoa)) echo $hoa; ?>"></td>
            </tr>
            <tr>
                <td>Điểm chuẩn: </td>
                <td><input name="diem_chuan" type="text" value="<?php if(isset($diem_chuan)) echo $diem_chuan; ?>"></td>
            </tr>
            <tr>
                <td>Tổng điểm: </td>
                <td><input name="tong_diem" type="text" readonly style="background-color: lightpink;" value="<?php if(isset($tong_diem)) echo $tong_diem; ?>">
            </tr>
            <tr>
                <td>Kết quả thi: </td>
                <td><input name="ket_qua_thi" type="text" readonly style="background-color: lightpink;" value="<?php if(isset($ket_qua_thi)) echo $ket_qua_thi; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Xem kết quả">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>