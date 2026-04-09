<?php
include 'db_config.php';

if (isset($_POST['submit'])) {
    $item_name = $_POST['item_name'];
    $target_dir = "uploads/";
    
    // สร้างโฟลเดอร์อัตโนมัติถ้ายังไม่มี
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_name = time() . "_" . basename($_FILES["fileToUpload"]["name"]); // ตั้งชื่อใหม่กันชื่อซ้ำ
    $target_file = $target_dir . $file_name;

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // บันทึกลง Database
        $sql = "INSERT INTO products (item_name, image_path) VALUES ('$item_name', '$target_file')";
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php"); // อัปโหลดเสร็จให้กลับไปหน้าแรก
        }
    } else {
        echo "ขออภัย เกิดข้อผิดพลาดในการอัปโหลด";
    }
}
?>