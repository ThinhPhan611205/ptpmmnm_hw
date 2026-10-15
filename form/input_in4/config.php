
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thong tin</title>
    <style>
        p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <?php
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $country = $_POST['country'];
        $study = isset($_POST['study']) ? $_POST['study'] : [];
        $note = $_POST['note'];
        
        echo "<p>Bạn đã nhập thành công, dưới đây là những thông tin bạn đã nhập:</p>";
        echo "<p>Họ và tên:</strong> $name</p>";
        echo "<p>Address:</strong> $address</p>";
        echo "<p>Phone:</strong> $phone</p>";
        echo "<p>Gender:</strong> $gender</p>";
        echo "<p>Country:</strong> $country</p>";
        echo "<p>Study:</strong> " . implode(", ", $study) . "</p>";
        echo "<p>Note:</strong> $note</p>";
    ?>


</body>
</html>