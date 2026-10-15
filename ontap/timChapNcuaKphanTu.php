<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Công cụ tính tổ hợp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }
        h2 {
            font-size: 24px;
            color: #222;
        }
        .container {
            background-color: #e5edf4;
            padding: 20px 30px;
            border-radius: 5px;
            width: fit-content;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .title-box {
            font-weight: bold;
            margin-bottom: 15px;
            color: #444;
        }
        .input-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .input-group label {
            width: 30px;
            font-weight: bold;
        }
        .input-group input {
            padding: 8px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        .btn-submit {
            background-color: #1976d2;
            color: white;
            border: none;
            padding: 10px 25px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            margin: 15px auto;
            display: block;
        }
        .btn-submit:hover {
            background-color: #1565c0;
        }
        #result-box {
            font-weight: bold;
            margin-top: 20px;
            line-height: 1.6;
            max-width: 300px;
        }
        .error {
            color: #d32f2f;
            font-weight: normal;
        }
    </style>
</head>
<body>

    <h2>Công cụ tính tổ hợp chập K của N phần tử online</h2>

    <?php
    // Khởi tạo giá trị mặc định giống ảnh mẫu
    $k_val = "2";
    $n_val = "4";
    $result_html = "";

    // Hàm tính giai thừa
    function factorial($num) {
        if ($num === 0 || $num === 1) return 1;
        $result = 1;
        for ($i = 2; $i <= $num; $i++) {
            $result *= $i;
        }
        return $result;
    }

    // Xử lý dữ liệu khi người dùng bấm submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Giữ lại giá trị người dùng đã nhập trên form
        $k_val = htmlspecialchars($_POST['kValue']);
        $n_val = htmlspecialchars($_POST['nValue']);
        
        $k_input = trim($_POST['kValue']);
        $n_input = trim($_POST['nValue']);

        // 1. Ràng buộc: Không được để trống
        if ($k_input === '' || $n_input === '') {
            $result_html = '<span class="error">Vui lòng nhập đầy đủ giá trị K và N.</span>';
        } 
        // 2. Ràng buộc: Phải là số nguyên
        elseif (filter_var($k_input, FILTER_VALIDATE_INT) === false || filter_var($n_input, FILTER_VALIDATE_INT) === false) {
            $result_html = '<span class="error">K và N phải là số nguyên.</span>';
        } 
        else {
            $k = (int)$k_input;
            $n = (int)$n_input;

            // 3. Ràng buộc: Không được là số âm
            if ($k < 0 || $n < 0) {
                $result_html = '<span class="error">K và N không được là số âm.</span>';
            } 
            // 4. Ràng buộc: K không được lớn hơn N
            elseif ($k > $n) {
                $result_html = '<span class="error">Lỗi: K không được lớn hơn N (K &le; N).</span>';
            } 
            // Giới hạn để tránh tràn bộ nhớ máy chủ do số quá lớn
            elseif ($n > 170) {
                $result_html = '<span class="error">N quá lớn, vượt quá giới hạn tính toán của PHP.</span>';
            } 
            else {
                // Tính tổ hợp: C(n, k) = n! / (k! * (n - k)!)
                $combination = factorial($n) / (factorial($k) * factorial($n - $k));
                
                $result_html = "Tổ hợp chập {$k} của {$n} phần tử là {$combination}.<br>Có {$combination} cách chọn ra {$k} phần tử từ một tập hợp có {$n} phần tử.";
            }
        }
    }
    ?>

    <div class="container">
        <div class="title-box">Tính tổ hợp chập K của N phần tử:</div>
        
        <form method="POST" action="">
            <div class="input-group">
                <label for="kValue">K:</label>
                <!-- Giữ lại giá trị đã nhập sau khi submit -->
                <input type="text" id="kValue" name="kValue" value="<?php echo $k_val; ?>">
            </div>
            
            <div class="input-group">
                <label for="nValue">N:</label>
                <input type="text" id="nValue" name="nValue" value="<?php echo $n_val; ?>">
            </div>

            <button type="submit" class="btn-submit">Kết quả</button>
        </form>

        <div id="result-box">
            <?php echo $result_html; ?>
        </div>
    </div>

</body>
</html>