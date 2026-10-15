<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <form method="post">
        <tr>
            <td>Nhap N:</td>
            <td><input type="number" name="n"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Thực hiện"></td>
        </tr>
    </form>
    <?php
        if(isset($_POST['n'])){
        $n = $_POST['n'];
            if(is_numeric($n) and $n>0){
                    echo "$n là số nguyên dương";
                $mang_ngau_nhien = [];
                for($i=0; $i<=$n; $i++){
                    $mang_ngau_nhien[$i] = rand(0, 200);
                }
                echo "<br> Mảng ngẫu nhiên: ";
                for($i=1;$i<count($mang_ngau_nhien);$i++){
                    echo $mang_ngau_nhien[$i] . " ";
                }
                $count_chan = 0;
                $count_lonHon100 = 0;
                for($i=1;$i<count($mang_ngau_nhien);$i++){
                    if($mang_ngau_nhien[$i]%2==0){
                        $count_chan++;
                    }
                    if($mang_ngau_nhien[$i] > 100){
                        $count_lonHon100++;
                    }
                }
                echo "<br> Số lượng phần tử chẵn: $count_chan";
                echo "<br> Số lượng phần tử lớn hơn 100: $count_lonHon100";
                $temp = 0;
                for($i=0;$i<count($mang_ngau_nhien)-1;$i++){
                    for($j=$i+1;$j<count($mang_ngau_nhien);$j++){
                        if($mang_ngau_nhien[$i] > $mang_ngau_nhien[$j]){
                            $temp = $mang_ngau_nhien[$i];
                            $mang_ngau_nhien[$i] = $mang_ngau_nhien[$j];
                            $mang_ngau_nhien[$j] = $temp;
                        }
                    }
                }
                echo "<br> Mảng sau khi sắp xếp: ";
                for($i=0;$i<count($mang_ngau_nhien);$i++){
                    echo $mang_ngau_nhien[$i] . " ";
                }

            }else{
                echo "$n không phải là số nguyên dương";
            }        
        }
    ?>
</body>
</html>