<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra nếu file đã tồn tại
    if (file_exists($target_file)) {
        echo "File đã tồn tại.";
        $uploadOk = 0;
    }

    // Giới hạn loại file được upload (chỉ cho phép một số loại file)
    $allowed_types = ["jpg", "png", "jpeg", "gif", "pdf"];
    if (!in_array($fileType, $allowed_types)) {
        echo "Chỉ cho phép các loại file JPG, JPEG, PNG, GIF, và PDF.";
        $uploadOk = 0;
    }

    // Kiểm tra uploadOk để xem có thể upload không
    if ($uploadOk == 0) {
        echo "File của bạn không được upload.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "File ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " đã được upload.";
        } else {
            echo "Có lỗi xảy ra khi upload file của bạn.";
        }
    }
}
?>
