<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        require_once 'ImageUpload.php';

        $targetDir = __DIR__ . "/images"; // Thư mục lưu trữ hình ảnh đã tải lên
        $imageUpload = new ImageUpload($targetDir);

        $file = $_FILES["fileToUpload"];

        // Kiểm tra file hợp lệ trước khi tải lên
        $uploadError = $imageUpload->checkFile($file);
        if (empty($uploadError)) {
            $uploadResult = move_uploaded_file($file["tmp_name"], $targetDir . "/" . $file["name"]);
            if ($uploadResult) {
                echo "<p>Tải ảnh lên thành công!</p>";
            } else {
                echo "<p>Có lỗi xảy ra trong quá trình tải ảnh lên.</p>";
            }
        } else {
            echo "<p>$uploadError</p>";
        }
    }

    // Hiển thị các hình ảnh đã tải lên
    $uploadedFiles = array_diff(scandir($targetDir), array('..', '.'));
    if (!empty($uploadedFiles)) {
        echo "<h2>Hình ảnh :</h2>";
        echo "<div id='uploaded-image'>";
        foreach ($uploadedFiles as $file) {
            echo "<img src='images/$file' alt='Hình ảnh'>";
        }
        echo "</div>";
    }
    ?>