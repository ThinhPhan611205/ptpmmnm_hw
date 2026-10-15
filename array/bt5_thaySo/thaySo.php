<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay số</title>
</head>
<body>
    <?php 
    $mang ="";
    $cu = "";
    $moi = "";
    $arr = [];
    $hasErr = false;
    $ann = "";

    function inMang($arr){
       return  implode(",", $arr);
    }
    
    function thayThe($arr, $cu, $moi){
        for($i=0;$i<count($arr);$i++){
            if($arr[$i]==$cu){
                $arr[$i] = $moi;
            }
        }
        return implode(",", $arr);

    }

    if(isset($_POST['submit'])){
        if(!empty($_POST['mang']) && !empty($_POST['cu']) && !empty($_POST['moi'])){
            $mang = $_POST['mang'];
            $cu = $_POST['cu'];
            $moi = $_POST['moi'];
            $arr = explode(",", $mang);
            foreach($arr as $pt){
                if(!is_numeric($pt)){
                    $ann = "Phan tu trong mang phai la so";
                    $hasErr = true;
                    break;
                }
            }
            if(!is_numeric($cu) || !is_numeric($moi)){
                $ann = "Số cũ, số mới phải là số!!";
                $hasErr = true;
            }
        
        }
    }


    ?>


    <form method="post" name="form">
        <table>
            <thead>
                <tr>
                    <th>THAY THE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nhap gia tri cac phan tu:</td>
                    <td><input type="text" name="mang" value="<?php if(!empty($arr)) echo  inMang($arr) ?>"></td>
                </tr>
                <tr>
                    <td>Gia tri can thay the:</td>
                    <td><input type="text" name="cu" value="<?php if(!empty($cu)) echo $cu ?>"></td>
                </tr>
                <tr>
                    <td>Gia tri moi:</td>
                    <td><input type="text" name="moi"  value="<?php if(!empty($moi)) echo $moi ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" name="submit" > Thay thế</button></td>
                </tr>
                <tr>
                    <td>Mang cu:</td>
                    <td><input type="text" value="<?php if(!empty($arr) && !$hasErr) echo  inMang($arr) ?>"></td>
                </tr>
                <tr>
                    <td>Mang moi:</td>
                    <td><input type="text" value="<?php if(!empty($arr) && !empty($cu) && !empty($moi) && !$hasErr) echo thayThe($arr, $cu, $moi) ?>"></td>
                </tr>
              
                <tr>
                    <td>
                        (Ghi chú: Các phần tử trong mảng sẽ cách nhau bằng dấu ,)
                    </td>
                </tr>
                <tr>
                    <td ><?php if(isset($ann))  echo $ann ?></p></td>
                </tr>
            </tbody>
        </table>
    </form>

</body>
</html>