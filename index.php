<?php include 'db_config.php'; ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>รายการร้านมนชิน</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .product-card { border: 1px solid #ccc; padding: 10px; margin: 10px; display: inline-block; width: 200px; text-align: center; }
        .product-card img { max-width: 100%; height: auto; }
    </style>
</head>
<body>
    <h1>อัปโหลดรายการร้านมนชิน</h1>
    
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="text" name="item_name" placeholder="ชื่อรายการ" required><br><br>
        <input type="file" name="fileToUpload" required><br><br>
        <button type="submit" name="submit">บันทึกข้อมูล</button>
    </form>

    <hr>
    <h2>รายการทั้งหมด</h2>
    <div>
        <?php
        // ดึงข้อมูลมาแสดงผล
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='product-card'>";
                echo "<img src='" . $row['image_path'] . "'>";
                echo "<h3>" . $row['item_name'] . "</h3>";
                echo "</div>";
            }
        } else {
            echo "ยังไม่มีข้อมูล";
        }
        ?>
    </div>
</body>
</html>