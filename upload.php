<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <form action="/save_file.php" method="post" enctype="multipart/form-data">
        <label for="fileUpload">Chọn file để upload:</label>
        <input type="file" name="fileToUpload" id="fileUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>
