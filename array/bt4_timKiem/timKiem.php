<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tim Kiem</title>
</head>
<body>
    <?php

    $mang ="";
    $n = "";
    $arr=[];
    $anTxt = "Các phần tử trong mảng sẽ cách nhau bằng dấu ,";
    $hasError = false;
    
    function inMang($arr){
            return implode(",",$arr);
        }

    function timKiem($arr, $n) {
            $viTri = null ;
            for($i = 0; $i < count($arr); $i++) {
                if(trim($arr[$i]) == trim($n)) {
                    $viTri = $i;
                }
            }
            if($viTri!==null){
                return "Đã tìm ra phần tử ".$n." tại vị trí thứ ".$viTri." "; 
            }else{
                return "Không tìm thấy phần tử trong mảng";
            }
            
            
        
        }
   
    if(isset($_POST['submit'])){
        if(isset($_POST['mang']) && isset($_POST['soCanTim'])){
            if(!empty($_POST['mang']) && !empty($_POST['soCanTim']) ){
                $mang = $_POST['mang'];
                $n = $_POST['soCanTim'];
                $arr = explode(",", $mang);
                // Kiểm tra từng phần tử của mảng có phải số không
                for($i=0;$i<count($arr);$i++){
                    if(!is_numeric(trim($arr[$i]))){
                        $anTxt = "Mảng phải là số!";
                        $hasError = true;
                        break;
                    }
                }
                // Kiểm tra số cần tìm có phải số không
                if(!is_numeric($n)){
                    $anTxt = "Số cần tìm phải là số!!";
                    $hasError = true;
                }
            }else{
                $anTxt = "Bạn cần nhập đủ cả mảng và số cần tìm";
                $hasError = true;
            }
        }else{
            $anTxt = "Bạn cần nhập đủ cả mảng và số cần tìm";
            $hasError = true;
        }
        
    }
    
    ?>
    <form method="post">
        <table>
            <thead>
                <th>TÌM KIẾM</th>
            </thead>
            <tbody>
                <tr>
                    <td>Nhập mảng:</td>
                    <td><input type="text" name="mang" value="<?php if(isset($mang))  echo $mang ?>"></td>
                </tr>
                <tr>
                    <td>Nhập số cần tìm:</td>
                    <td><input type="text" name="soCanTim" value="<?php if(isset($n)) echo $n ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Tìm kiếm"></td>
                </tr>
                <tr>
                    <td>Mảng:</td>
                    <td><input type="text" readonly value="<?php if(!empty($arr) && !$hasError) echo inMang($arr) ?>"></td>
                </tr>
                <tr>
                    <td>Kết quả tìm kiếm:</td>
                    <td><input type="text" readonly name="ketqua" value="<?php if(!empty($arr) && !empty($n) && !$hasError) echo timKiem($arr, $n) ?>" > </td>
                </tr>
                <tr>
                    <td><p><?php if(isset($anTxt)) echo $anTxt; ?></p></td>
                </tr>
            </tbody>
       
                
           
        </table>
    </form>

</body>
</html>