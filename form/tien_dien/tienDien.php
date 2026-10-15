<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinh tien dien</title>
</head>
<body>
    <?php
     $ten=$_POST['ten'];
            $chi_so_cu=$_POST['chi_so_cu'];
            $chi_so_moi=$_POST['chi_so_moi'];
            $don_gia=$_POST['don_gia'];
        if(isset($ten) and isset($chi_so_cu) and isset($chi_so_moi) and isset($don_gia)){
           
            if(is_numeric($chi_so_cu) and is_numeric($chi_so_moi) and is_numeric($don_gia)){
                if($ten==""){
                    echo "<script>alert('Tên chủ hộ không được để trống');</script>";
                }
                if($don_gia<=0 or $chi_so_cu<0 or $chi_so_moi<0){
                    echo "<script>alert('Chỉ số cũ, chỉ số mới và đơn giá phải lớn hơn 0');</script>";
                }
                if($chi_so_moi>$chi_so_cu){
                    $so_tien=($chi_so_moi-$chi_so_cu)*$don_gia;
                    echo "<script>document.tien_dien.so_tien.value='$so_tien';</script>";
                }else{
                    echo "<script>alert('Chỉ số mới phải lớn hơn chỉ số cũ');</script>";
                }
            }else{
                echo "<script>alert('Chi só cũ, chỉ số mới và đơn giá phải là số');</script>";
            }
        }
    ?>

    <form method="post" name="tien_dien" background="beige">
        <table bgcolor="beige" align="center">
            <tr>
                <th colspan="7" style="background: lightpink">
                TÍNH TIỀN ĐIỆN
                </th>
            </tr>
            <tr>
                <td>Tên chủ hộ:</td>
                <td><input name="ten" type="text" value="<?php if(isset($ten)) echo $ten; ?>"> </td>
            </tr>
             <tr>
                <td>Chỉ số cũ:</td>
                <td><input name="chi_so_cu" type="text" value="<?php if(isset($chi_so_cu)) echo $chi_so_cu; ?>"> </td>
                <td>(Kw)</td>
            </tr>
             <tr>
                <td>Chỉ số mới:</td>
                <td><input name="chi_so_moi" type="text" value="<?php if(isset($chi_so_moi)) echo $chi_so_moi; ?>"> </td>
                <td>(Kw)</td>
            </tr>
             <tr>
                <td>Đơn giá:</td>
                <td><input name="don_gia" type="text" value="<?php if(isset($don_gia)) echo $don_gia; ?>"> </td>
                <td>(VND)</td>
            </tr>
             <tr>
                <td>Số tiền thanh toán:</td>
                <td><input name="so_tien" type="text" readonly
                    value="<?php if(isset($so_tien)) echo $so_tien; ?>" style="background: lightpink"
                > </td>
                <td>(VND)</td>
            </tr>
             <tr>
                <td></td>
                <td><input type="submit" value="Tính tiền" ></td>
            </tr>
           
        </table>
    </form>
</body>
</html>