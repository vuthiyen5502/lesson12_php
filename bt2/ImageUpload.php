<?php
class ImageUpload {
    private $targetDir;

    public function __construct($targetDir) {
        $this->targetDir = $targetDir;
    }

    public function checkFile($file) {
        $allowedFormats = array("jpg", "jpeg", "png", "gif");
        $fileExtension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedFormats)) {
            return "File không hợp lệ. Chỉ được phép tải lên các file hình ảnh (jpg, jpeg, png, gif).";
        }

        return ""; 
    }
}
?>
