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
        $n = $_POST['n'];
        $in=[];
        if(is_numeric($n)){
            for($i=0;$i<$n;$i++){
                $in[$i] = fibonaci($i);
            }
        }
    }
    function fibonaci($num){
        if($num == 0 || $num == 1){
            return 1;
        }else{
           return  fibonaci($num -1) + fibonaci($num -2);
        }
    }

    ?>
    <form method="post">
        <h1>Tim day fibonaci cua N</h1>
        <label>Nhap n:</label>
        <input type="text" name="n">
        <button type="submit" name="submit">Tim</button>
        <p><?php if(isset($in)){
            for($i=0;$i<count($in);$i++){
                echo $in[$i]."<br>";

            }
        }
    ?></p>
    </form>
</body>
</html>