<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no,
          initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hình Tròn</title>
</head>
<body>
<?php
define('PI', 3.14);
if(isset($_POST['submit'])){
    $r = $_POST['ban_kinh'];
    if(is_numeric($r)) {
        if($r > 0) {
            $cv = 2 * PI * $r;
            $dt = PI * pow($r, 2);
        } else {
            $msg = "Bán kính phải lớn hơn 0";
        }
    } else {
        $msg = "Bán kính phải là số";
    }
}
?>

<form method="post" name="HT">
    <table bgcolor="beige" align="center">
        <tr style="background: lightpink">
            <th colspan="2">
                DIỆN TÍCH & CHU VI HÌNH TRÒN
            </th>
        </tr>
        <tr>
            <td>Bán kính:</td>
            <td>
                <input type="number" step="any" name="ban_kinh" size="20" required
                       value="<?php if(isset($r)) echo "$r"; ?>">
            </td>
        </tr>
        <tr>
            <td>Chu vi:</td>
            <td>
                <input type="text" name="cv" size="20" readonly
                       style="background: lightpink"
                       value="<?php if(isset($cv)) echo round($cv, 2); ?>">
            </td>
        </tr>
        <tr>
            <td>Diện tích:</td>
            <td>
                <input type="text" name="dt" size="20" readonly
                       style="background: lightpink"
                       value="<?php if(isset($dt)) echo round($dt, 2); ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <input type="submit" value="Tính" name="submit">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="color: red"><?php if(isset($msg)) echo $msg;?></td>
        </tr>
    </table>
</form>
</body>
</html>