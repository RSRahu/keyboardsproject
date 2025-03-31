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
    <title>ข้อมูลคีย์บอร์ด</title>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">ข้อมูลคีย์บอร์ดทั้งหมด</h1>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
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
            </thead>
            <tbody>
<?php
$sql = "SELECT * FROM keyboards";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>". $row["id"]. "</td>";
    echo "<td>". $row["brand"]. "</td>";
    echo "<td>". $row["model"]. "</td>";
    echo "<td>". $row["switch_type"]. "</td>";
    echo "<td>". $row["key_count"]. "</td>";
    echo "<td>". $row["connection_type"]. "</td>";
    echo "<td>". number_format($row["price"], 2). "</td>";
    echo "<td>". $row["stock_quantity"]. "</td>";
    echo "</tr>";
  }

} else {
  echo "<tr><td colspan='8' class='text-center'>ไม่พบข้อมูล</td></tr>";
}
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
    new DataTable('#example');
</script>
</html>