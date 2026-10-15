<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no,
          initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tính tổng dãy số</title>
</head>
<body>
<?php
if(isset($_POST['submit'])){
    $txt=$_POST['list'];
    $arr=explode(",",$txt);
    $sum=array_sum($arr);
}
?>
<form method="post" name="Sum">
    <table style="background:lightblue">
        <tr style="background: darkgreen">
            <th style="color: white" colspan="2">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
        </tr>
        <tr>
            <td>Nhập dãy số</td>
            <td>
                <input type="text" name="list" size="30" required
                       value="<?php if(isset($txt)) echo $txt;?>"
                > <b style="color: red">(*)</b>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Tổng dãy số">
            </td>
        </tr>
        <tr>
            <td>Tổng dãy số</td>
            <td>
                <input type="text" name="result" readonly
                       style="background: greenyellow" size="20"
                       value="<?php if(isset($sum)) echo $sum;?>"
                >
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p style="color: red">(*) Các số được nhập cách nhau bằng dấu <b>,</b> </p>
            </td>
        </tr>
    </table>
</form>
</body>
</html>