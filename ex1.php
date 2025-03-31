
CREATE TABLE Keyboards (     id INT AUTO_INCREMENT PRIMARY KEY,     brand VARCHAR(50) NOT NULL,     model VARCHAR(100) NOT NULL,     switch_type VARCHAR(50) NOT NULL,     key_count INT NOT NULL,     connection_type VARCHAR(50) NOT NULL,     price DECIMAL(10,2) NOT NULL,     stock_quantity INT NOT NULL ); INSERT INTO Keyboards (brand, model, switch_type, key_count, connection_type, price, stock_quantity) VALUES ('Logitech', 'G Pro X', 'Mechanical', 87, 'Wired', 3990.00, 15), ('Razer', 'BlackWidow V4', 'Mechanical', 104, 'Wired', 5990.00, 10), ('Corsair', 'K70 RGB', 'Mechanical', 104, 'Wired', 5290.00, 8), ('SteelSeries', 'Apex Pro', 'OmniPoint', 104, 'Wired', 6990.00, 5), ('Keychron', 'K6', 'Gateron Red', 68, 'Wireless', 3190.00, 20), ('HyperX', 'Alloy FPS', 'Cherry MX Red', 104, 'Wired', 3990.00, 12), ('Ducky', 'One 2 Mini', 'Cherry MX Brown', 60, 'Wired', 3590.00, 18), ('Anne Pro', '2', 'Gateron Blue', 61, 'Wireless', 2890.00, 25), ('Akko', '3068B', 'Akko CS Jelly Pink', 68, 'Wireless', 3590.00, 30), ('Royal Kludge', 'RK61', 'RK Brown', 61, 'Wireless', 2290.00, 50), ('Varmilo', 'VA87M', 'Cherry MX Silent Red', 87, 'Wired', 4790.00, 7), ('Filco', 'Majestouch 2', 'Cherry MX Blue', 104, 'Wired', 5290.00, 6), ('Leopold', 'FC660M', 'Cherry MX Red', 66, 'Wired', 4990.00, 9), ('Ajazz', 'AK33', 'Outemu Blue', 82, 'Wired', 1590.00, 40), ('Nuphy', 'Air75', 'Gateron Low-profile Red', 75, 'Wireless', 4590.00, 22), ('Logitech', 'G915', 'Low-profile GL Tactile', 104, 'Wireless', 8990.00, 12), ('Razer', 'Huntsman Mini', 'Optical', 60, 'Wired', 4290.00, 11), ('Corsair', 'K100 RGB', 'OPX Optical', 104, 'Wired', 7990.00, 5), ('Keychron', 'K4', 'Gateron Brown', 96, 'Wireless', 3490.00, 19), ('Durgod', 'Taurus K320', 'Cherry MX Silver', 87, 'Wired', 4690.00, 8), ('Epomaker', 'SK61', 'Gateron Optical Red', 61, 'Wired', 2490.00, 35), ('Royal Kludge', 'RK84', 'RK Red', 84, 'Wireless', 2890.00, 45), ('Akko', '3108', 'Akko CS Switch', 108, 'Wired', 3290.00, 20), ('Anne Pro', '1', 'Gateron Red', 61, 'Wireless', 2590.00, 30), ('HyperX', 'Alloy Origins', 'HyperX Red', 104, 'Wired', 4490.00, 10), ('Leopold', 'FC900R', 'Cherry MX Silent Red', 104, 'Wired', 5490.00, 6), ('Varmilo', 'VA108M', 'Cherry MX Blue', 108, 'Wired', 5290.00, 7), ('Filco', 'Majestouch Minila Air', 'Cherry MX Brown', 67, 'Wireless', 5990.00, 5), ('Ajazz', 'K620T', 'Outemu Red', 60, 'Wireless', 1990.00, 35), ('Nuphy', 'Halo75', 'Gateron Baby Kangaroo', 75, 'Wireless', 5290.00, 15), ('Logitech', 'MX Keys', 'Scissor', 104, 'Wireless', 4590.00, 25), ('Razer', 'Cynosa V2', 'Membrane', 104, 'Wired', 2490.00, 30), ('Corsair', 'K55 RGB Pro', 'Membrane', 110, 'Wired', 1790.00, 20), ('SteelSeries', 'Apex 3', 'Membrane', 104, 'Wired', 1990.00, 25), ('Ducky', 'Mecha Mini', 'Cherry MX Red', 60, 'Wired', 3990.00, 18), ('Epomaker', 'TH66', 'Gateron Pro Yellow', 66, 'Wireless', 3590.00, 30), ('Keychron', 'Q1', 'Gateron Phantom Red', 75, 'Wired', 5990.00, 12), ('Royal Kludge', 'RK71', 'RK Blue', 71, 'Wireless', 2690.00, 40), ('Akko', '5075S', 'Akko CS Cream Yellow', 75, 'Wireless', 4290.00, 20), ('Anne Pro', '3', 'Gateron Yellow', 61, 'Wireless', 3190.00, 22), ('Varmilo', 'VA68M', 'Cherry MX Clear', 68, 'Wired', 4890.00, 7), ('Filco', 'Majestouch Convertible 2', 'Cherry MX Brown', 104, 'Wireless', 6490.00, 6), ('Leopold', 'FC980M', 'Cherry MX Black', 98, 'Wired', 5790.00, 9), ('Ajazz', 'K870T', 'Outemu Brown', 87, 'Wireless', 2190.00, 35), ('Nuphy', 'Halo96', 'Gateron Baby Kangaroo', 96, 'Wireless', 5990.00, 15), ('Durgod', 'Fusion', 'Cherry MX Red', 87, 'Wireless', 5490.00, 8);ห




<!DOCTYPE html>
<html lang="en">
<head>
<?php
 include("conn.php")
?>
<!-- เพิ่มส่วน ใช้งาน Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- ส่วนของ DataTable -->
<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<!-- เพิ่มส่วน ใช้งาน Google font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Itim&family=Kanit:ital,wght@0,200;0,300;1,100;1,200&family=Prompt:ital,wght@0,200;0,300;1,300&display=swap" rel="stylesheet">

<!-- เพิ่ม CSS ให้ใช้ Font  -->
<style>
    body{
        font-family: 'Kanit', sans-serif;
    }
</style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบข้อมูลคีย์บอร์ด</title>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">ข้อมูลคีย์บอร์ดทั้งหมด</h1>
        
        <table id="keyboardsTable" class="table table-striped table-hover" style="width:100%">
            <thead>
                <tr class="table-dark">
                    <th>รหัส</th>
                    <th>แบรนด์</th>
                    <th>รุ่น</th>
                    <th>ประเภทสวิตช์</th>
                    <th>จำนวนปุ่ม</th>
                    <th>ประเภทการเชื่อมต่อ</th>
                    <th>ราคา (บาท)</th>
                    <th>จำนวนคงเหลือ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // คำสั่ง SQL เพื่อดึงข้อมูลจากตาราง Keyboards
                    $sql = "SELECT * FROM Keyboards";
                    $result = $conn->query($sql);
                    
                    // ตรวจสอบว่ามีข้อมูลหรือไม่
                    if ($result->num_rows > 0) {
                        // วนลูปแสดงข้อมูลทั้งหมด
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["brand"] . "</td>";
                            echo "<td>" . $row["model"] . "</td>";
                            echo "<td>" . $row["switch_type"] . "</td>";
                            echo "<td>" . $row["key_count"] . "</td>";
                            echo "<td>" . $row["connection_type"] . "</td>";
                            echo "<td>" . number_format($row["price"], 2) . "</td>";
                            echo "<td>" . $row["stock_quantity"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>ไม่พบข้อมูล</td></tr>";
                    }
                    
                    // ปิดการเชื่อมต่อ
                    $conn->close();
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>รหัส</th>
                    <th>แบรนด์</th>
                    <th>รุ่น</th>
                    <th>ประเภทสวิตช์</th>
                    <th>จำนวนปุ่ม</th>
                    <th>ประเภทการเชื่อมต่อ</th>
                    <th>ราคา (บาท)</th>
                    <th>จำนวนคงเหลือ</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

<!-- Latest compiled JavaScript -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    // เริ่มต้นใช้งาน DataTable พร้อมกำหนดค่าภาษาไทย
    $(document).ready(function() {
        $('#keyboardsTable').DataTable({
            language: {
                lengthMenu: "แสดง _MENU_ รายการต่อหน้า",
                zeroRecords: "ไม่พบข้อมูล",
                info: "แสดงหน้า _PAGE_ จาก _PAGES_",
                infoEmpty: "ไม่พบข้อมูล",
                infoFiltered: "(กรองจากทั้งหมด _MAX_ รายการ)",
                search: "ค้นหา:",
                paginate: {
                    first: "หน้าแรก",
                    last: "หน้าสุดท้าย",
                    next: "ถัดไป",
                    previous: "ก่อนหน้า"
                }
            }
        });
    });
</script>
</html>
