<!DOCTYPE html>
<html>
<head>
    <title>File Upload Example</title>
</head>
<body>
    <h1>Tải hình ảnh</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>
    <div id="uploaded-image">
        <!-- Hiển thị hình ảnh tải lên ở đây -->
    </div>
</body>
</html>
