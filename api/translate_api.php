<?php
session_start();

$apiKey = "d95180ad52msh3e89d4ca7d89dc6p1c3f96jsnfa8035b5cd2a";
$apiHost = "google-translator9.p.rapidapi.com";

/**
 * Lấy danh sách ngôn ngữ từ Endpoint Languages của Google Translator (RapidAPI)
 * URL: https://google-translator9.p.rapidapi.com/v2/languages?target=vi
 * Sử dụng Session để lưu tạm (cache), tránh tốn lượt gọi API (Quota) mỗi khi tải trang
 */
function getLanguages($apiKey, $apiHost) {
    if (isset($_SESSION['cached_languages']) && !empty($_SESSION['cached_languages'])) {
        return $_SESSION['cached_languages'];
    }

    $curl = curl_init();
    curl_setopt_array($curl, [
        // Thêm tham số ?target=vi để API trả về tên ngôn ngữ bằng tiếng Việt
        CURLOPT_URL => "https://google-translator9.p.rapidapi.com/v2/languages?target=vi",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: " . $apiHost,
            "x-rapidapi-key: " . $apiKey
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    $languages = [];

    if (!$err && $response) {
        $result = json_decode($response, true);
        if (isset($result['data']['languages']) && is_array($result['data']['languages'])) {
            foreach ($result['data']['languages'] as $item) {
                $code = $item['language'] ?? '';
                $name = $item['name'] ?? $code;
                if (!empty($code)) {
                    $languages[$code] = $name . " (" . $code . ")";
                }
            }
        }
    }

    // Danh sách dự phòng nếu cURL lỗi, chưa kết nối mạng hoặc API hết hạn ngạch
    if (empty($languages)) {
        $languages = [
            'en'    => 'Tiếng Anh (en)',
            'vi'    => 'Tiếng Việt (vi)',
            'fr'    => 'Tiếng Pháp (fr)',
            'zh-CN' => 'Tiếng Trung - Giản thể (zh-CN)',
            'ja'    => 'Tiếng Nhật (ja)',
            'ko'    => 'Tiếng Hàn (ko)',
            'de'    => 'Tiếng Đức (de)',
            'ru'    => 'Tiếng Nga (ru)',
            'es'    => 'Tiếng Tây Ban Nha (es)',
            'it'    => 'Tiếng Ý (it)',
            'th'    => 'Tiếng Thái (th)',
            'lo'    => 'Tiếng Lào (lo)',
            'km'    => 'Tiếng Khmer (km)'
        ];
    } else {
        // Lưu vào session để dùng lại
        $_SESSION['cached_languages'] = $languages;
    }

    return $languages;
}

$languages = getLanguages($apiKey, $apiHost);

$inputText = "";
$translatedText = "";
$source = "en";
$tranLg = "vi";
$errorMessage = "";

if (isset($_POST['submit'])) {
    $inputText = trim($_POST['q'] ?? '');
    $source = $_POST['source'] ?? 'en';
    $tranLg = $_POST['target'] ?? 'vi';

    if (!empty($inputText)) {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://google-translator9.p.rapidapi.com/v2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'q' => $inputText,
                'source' => $source,
                'target' => $tranLg,
                'format' => 'text'
            ]),
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "x-rapidapi-host: " . $apiHost,
                "x-rapidapi-key: " . $apiKey
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            $errorMessage = "Lỗi kết nối cURL: " . htmlspecialchars($err);
        } else {
            $result = json_decode($response, true);
            
            if (isset($result['data']['translations'][0]['translatedText'])) {
                $translatedText = $result['data']['translations'][0]['translatedText'];
            } elseif (isset($result['message'])) {
                $errorMessage = "Lỗi từ API: " . htmlspecialchars($result['message']);
            } else {
                $errorMessage = "Không nhận được phản hồi hợp lệ từ máy chủ dịch thuật.";
            }
        }
    } else {
        $errorMessage = "Vui lòng nhập văn bản cần dịch!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Translate API Demo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fa;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 850px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            padding: 25px 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        }
        h2 {
            margin-top: 0;
            color: #1a73e8;
            text-align: center;
        }
        .error-message {
            background-color: #ffebee;
            color: #d32f2f;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid #d32f2f;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 10px;
            vertical-align: top;
        }
        .col-select {
            width: 260px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            color: #333;
        }
        select {
            width: 100%;
            padding: 9px 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
            background: #fff;
        }
        textarea {
            width: 100%;
            height: 120px;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
            resize: vertical;
            font-family: inherit;
        }
        textarea:focus, select:focus {
            outline: none;
            border-color: #1a73e8;
        }
        .btn-submit {
            background-color: #1a73e8;
            color: #ffffff;
            border: none;
            padding: 10px 28px;
            font-size: 15px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-submit:hover {
            background-color: #1558b0;
        }
    </style>
</head>
<body>
    <div class="container">

        <?php if (!empty($errorMessage)): ?>
            <div class="error-message"><?= $errorMessage ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <table>
                <tr>
                    <td class="col-select">
                        <label for="source"><strong>Ngôn ngữ nguồn:</strong></label>
                        <select name="source" id="source">
                            <?php foreach ($languages as $code => $name): ?>
                                <option value="<?= htmlspecialchars($code) ?>" <?= ($source === $code) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <label for="q"><strong>Văn bản cần dịch:</strong></label>
                        <textarea name="q" id="q" rows="4" required placeholder="Nhập nội dung cần dịch..."><?= htmlspecialchars($inputText) ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="submit" class="btn-submit">Dịch</button>
                    </td>
                </tr>

                <tr>
                    <td class="col-select">
                        <label for="target"><strong>Ngôn ngữ đích:</strong></label>
                        <select name="target" id="target">
                            <?php foreach ($languages as $code => $name): ?>
                                <option value="<?= htmlspecialchars($code) ?>" <?= ($tranLg === $code) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <label for="translated_text"><strong>Bản dịch:</strong></label>
                        <textarea id="translated_text" rows="4" readonly placeholder="Kết quả dịch hiển thị tại đây..."><?= htmlspecialchars($translatedText) ?></textarea>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
