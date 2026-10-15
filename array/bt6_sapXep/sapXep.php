<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sap Xep</title>
</head>
<body>
<?php 
    $mang = "";
    $arr = [];
    $hasError = false;
    $ann = "";

    function inMang($arr){
        return implode(",", $arr);
    }
    function hoanVi(&$a, &$b){
        $temp = $a;
        $a = $b;
        $b = $temp;
    }
    function tangDan($arr){
        // for($i=0;$i<count($arr)-1;$i++){
        //     for($j=$i+1;$j<count($arr);$j++){
        //         if($arr[$i]>$arr[$j]){
        //         hoanVi($arr[$i], $arr[$j]);
        //         }
        //     } 
        // }
        sort($arr);
        return implode(",", $arr);
    }
    function giamDan($arr){
    //    for($i=0;$i<count($arr)-1;$i++){
    //         for($j=$i+1;$j<count($arr);$j++){
    //             if($arr[$i]<$arr[$j]){
    //             hoanVi($arr[$i], $arr[$j]);
    //             }
    //         } 
    //     }
        rsort($arr);
        return implode(",", $arr);
    }
    
    if(isset($_POST['mang'])){
        $mang = trim($_POST['mang'], ",");
        $arr = explode(",",$mang);
        for($i=0;$i<count($arr);$i++){
            if(!is_numeric($arr[$i])){
                $ann = "Mang phai la so";
                $hasError = true;
                break;
            }
        }
    }

?>
    <form method="post">
        <table>
            <thead>
                <tr>
                    SAP XEP MANG
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nhap mang:</td>
                    <td><input type="text" name="mang" value="<?php if(!empty($arr)) echo inMang($arr) ?>" ></td>
                    <td>(*)</td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" name="submit">Sap xep tang/giam</button></td>
                </tr>
                <tr>
                    <td>Sau khi sap xep:</td>
                </tr>
                <tr>
                    <td>Tang dan:</td>
                    <td><input type="text" name="mangTang" value="<?php if(!empty($arr) && !$hasError) echo tangDan($arr) ?>"></td>
                </tr>
                   <tr>
                    <td>Giam dan:</td>
                    <td><input type="text" name="mangGiam" value="<?php if(!empty($arr) && !$hasError) echo giamDan($arr) ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">(*) Cac so duoc nhap cach nhau bang dau ","</td>
                </tr>
                <tr>
                    <td><?php if(isset($ann)) echo $ann ?></td>
                </tr>
            </tbody>

        </table>
    </form>
</body>
</html>