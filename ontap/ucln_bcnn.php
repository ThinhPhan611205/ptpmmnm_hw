<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    if(isset($_POST['submit'])){
        $a = $_POST['a'];
        $b = $_POST['b'];
        if(is_numeric($a) && is_numeric($b)){
            $ketqua = "ƯCLN của $a và $b là: " . ucln($a, $b) . "<br>";
            $ketqua = "BCNN của $a và $b là: " . bcnn($a, $b);
        }
    }

    function ucln($a, $b){
        if($a==0 || $b == 0){
            return $a + $b;
        }
        while($a!=$b){
            if($a>$b){
                $a = $a - $b;
            }else{
                $b = $b - $a;
            }
        }
        return $a;
    }
    function bcnn($a, $b){
        return $a*$b/ucln($a,$b);
    }
    
    ?>

    <form method="post" action="">
        <table>
            <tr>
                <td>Nhap a:</td>
                <td><input type="text" name="a" value="<?php  if(isset($a)) echo $a ?>"></td>
            </tr>
            <tr>
                <td>Nhap b:</td>
                <td><input type="text" name="b" value="<?php  if(isset($b)) echo $b ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Tinh</button></td>
            </tr>
            <tr>
                <td>
                    <?php if(isset($ketqua)) echo $ketqua ?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>