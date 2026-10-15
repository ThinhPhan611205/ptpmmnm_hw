<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinh 2 so</title>
</head>
<body>
    <form action="ketquapheptinh.php" method="post" name="tinh_2_so">
        <table align="center">
            <tr>
                <th colspan="2" align="center" style="color:blue">PHÉP TÍNH TRÊN HAI SỐ</th>
            </tr>
            <tr style="color:red">
                <td>Chọn phép tính:</td>
                <td>
                    <input type="radio" name="phep_tinh" value="Cộng">Cộng
                    <input type="radio" name="phep_tinh" value="Trừ">Trừ
                    <input type="radio" name="phep_tinh" value="Nhân">Nhân
                    <input type="radio" name="phep_tinh" value="Chia">Chia
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
                    <td></td>
                    <td><input type="submit" value="Tính" name="submit"></td>
                </tr>
            </tr>
        </table>
    </form>

</body>
</html>