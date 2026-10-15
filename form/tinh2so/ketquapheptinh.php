<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KẾT QUẢ</title>
    <style>


    </style>

</head>
<body>

    <?php
    $phep_tinh = $_POST['phep_tinh'];
    $so_thu_nhat = $_POST['so_thu_nhat'];
    $so_thu_hai = $_POST['so_thu_hai'];
    if(isset($_POST['submit'])){
        if(is_numeric($so_thu_nhat) and is_numeric($so_thu_hai)){
            switch($phep_tinh){
                case "Cộng":
                    $ket_qua = $so_thu_nhat + $so_thu_hai;
                    break;
                case "Trừ":
                    $ket_qua = $so_thu_nhat - $so_thu_hai;
                    break;
                case "Nhân":
                    $ket_qua = $so_thu_nhat * $so_thu_hai;
                    break;
                case "Chia":
                    if($so_thu_hai != 0){
                        $ket_qua = $so_thu_nhat / $so_thu_hai;
                    }else{
                        echo "<script>alert('Khong the chia cho 0');</script>";
                    }
                    break;
            }
        }else{
            echo "<script>alert('Số thứ nhất và số thứ hai phải là số');</script>";
        }
    }
    ?>
    <form method="post" name="tinh_2_so">
        <table align="center" >
            <tr>
                <th colspan="2" align="center" style="color:blue">PHÉP TÍNH TRÊN HAI SỐ</th>
            </tr>
            <tr style="color:red">
                <td>Chọn phép tính:</td>
                <td>
                   <?php if(isset($phep_tinh)) echo $phep_tinh; ?>
                </td>
                <tr>
                    <td style="color:blue">Số thứ nhất:</td>
                    <td>
                        <input type="text" name="so_thu_nhat" value="<?php if(isset($so_thu_nhat)) echo $so_thu_nhat; ?>">
                    </td>
                </tr>
                <tr>
                    <td style="color:blue">Số thứ hai:</td>
                    <td>
                        <input type="text" name="so_thu_hai" value="<?php if(isset($so_thu_hai)) echo $so_thu_hai; ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="color:blue">Kết quả:</td>
                    <td>
                        <input type="text" name="ket_qua" readonly value="<?php if(isset($ket_qua)) echo $ket_qua; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="javascript:window.history.back(-1);">Trở về trang trước</a> </td>
                </tr>
            </tr>
        </table>
    </form>

</body>
</html>