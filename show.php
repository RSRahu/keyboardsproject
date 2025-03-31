<?php
include("conn.php");
include("clogin.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #00c8ff;
            --secondary: #7000ff;
            --dark: #121212;
            --light: #ffffff;
            --accent: #ff00c8;
            --gray-dark: #1e1e1e;
            --gray: #2a2a2a;
        }
        
        body {
            font-family: "Kanit", sans-serif;
            background-color: var(--dark);
            margin: 0;
            padding: 20px;
            color: var(--light);
            background-image: linear-gradient(to bottom right, rgba(0, 200, 255, 0.05), rgba(112, 0, 255, 0.05));
            min-height: 100vh;
        }

        .page-container {
            background-color: var(--gray-dark);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 200, 255, 0.2), 0 10px 20px rgba(112, 0, 255, 0.2);
            padding: 30px;
            border: 1px solid var(--primary);
            margin-top: 20px;
        }

        h1 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 30px;
            padding-bottom: 15px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 2.5rem;
            position: relative;
            overflow: hidden;
        }
        
        h1::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 25%;
            width: 50%;
            height: 3px;
            background: linear-gradient(to right, var(--secondary), var(--primary), var(--accent));
        }

        .form-control, .form-select {
            background-color: var(--gray);
            border-radius: 8px;
            border: 1px solid var(--primary);
            color: var(--light);
            padding: 12px;
        }

        .form-control:focus, .form-select:focus {
            background-color: var(--gray);
            border-color: var(--accent);
            box-shadow: 0 0 0 0.25rem rgba(0, 200, 255, 0.25);
            color: var(--light);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 200, 255, 0.3);
        }

        .btn-danger {
            background-color: #ff3860;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #ff1443;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 56, 96, 0.3);
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(0, 200, 255, 0.2);
            color: var(--primary);
            font-size: 0.9em;
        }

        .table {
            margin-top: 20px;
            color: var(--light);
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }
        
        .table thead th {
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 15px;
            border: none;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(42, 42, 42, 0.7);
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: rgba(30, 30, 30, 0.7);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 200, 255, 0.1);
            transition: background-color 0.3s ease;
        }
        
        .table td {
            padding: 15px;
            vertical-align: middle;
        }

        .alert-success {
            background-color: rgba(72, 187, 120, 0.2);
            color: #48bb78;
            border-color: #48bb78;
            border-radius: 8px;
        }

        .alert-danger {
            background-color: rgba(245, 101, 101, 0.2);
            color: #f56565;
            border-color: #f56565;
            border-radius: 8px;
        }

        .alert-warning {
            background-color: rgba(237, 137, 54, 0.2);
            color: #ed8936;
            border-color: #ed8936;
            border-radius: 8px;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: var(--light) !important;
            margin-bottom: 15px;
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background-color: var(--gray);
            color: var(--light);
            border: 1px solid var(--primary);
            border-radius: 8px;
            padding: 5px 10px;
        }
        
        .dataTables_filter input {
            margin-left: 10px;
        }

        .page-link {
            background-color: var(--gray);
            color: var(--primary);
            border-color: var(--primary);
        }

        .page-link:hover {
            background-color: var(--primary);
            color: var(--light);
        }

        .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .user-info-container {
            margin-bottom: 25px;
        }
        
        .user-info-box {
            display: flex;
            align-items: center;
            background-color: rgba(42, 42, 42, 0.7);
            border: 1px solid var(--primary);
            border-radius: 10px;
            padding: 15px 20px;
            margin: 20px 0;
            box-shadow: 0 5px 15px rgba(0, 200, 255, 0.1);
        }
        
        .user-info-title {
            font-weight: 600;
            color: var(--primary);
            margin-right: 10px;
            white-space: nowrap;
        }
        
        .user-info-data {
            color: var(--light);
            border-left: 2px solid var(--primary);
            padding-left: 15px;
            margin-left: 5px;
        }

        .user-action-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
        
        .header-logo {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .header-logo i {
            font-size: 3.5rem;
            background: linear-gradient(to right, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }
        
        .action-btn {
            padding: 8px 15px;
            border-radius: 6px;
            transition: all 0.3s;
            margin: 0 3px;
            font-size: 0.9rem;
        }
        
        .price-display {
            font-weight: 600;
            color: var(--accent);
        }
        
        .stock-display {
            font-weight: 600;
            color: var(--primary);
        }
        
        .brand-badge {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: 500;
            display: inline-block;
        }
        
        .model-display {
            font-weight: 500;
            color: #e2e2e2;
        }
        
        .switch-type-badge {
            background-color: rgba(255, 0, 200, 0.2);
            color: var(--accent);
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: 500;
            display: inline-block;
        }
        
        .connection-type-badge {
            background-color: rgba(112, 0, 255, 0.2);
            color: var(--secondary);
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: 500;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .page-container {
                padding: 15px;
            }
            h1 {
                font-size: 2rem;
            }
            .user-info-box {
                flex-direction: column;
                align-items: flex-start;
            }
            .user-info-data {
                border-left: none;
                padding-left: 0;
                margin-left: 0;
                margin-top: 10px;
            }
        }
    </style>

    <title>คีย์บอร์ดเกมมิ่ง | Gaming Keyboard Shop</title>
</head>

<body>
    <div class="container page-container">
        <?php
        if (isset($_GET['action_even']) && $_GET['action_even'] == 'delete') {
            $id = $_GET['id'];
            $sql = "SELECT * FROM movies WHERE id=$id";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $sql = "DELETE FROM movies WHERE id=$id";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success text-center'>ลบข้อมูลสำเร็จ</div>";
                } else {
                    echo "<div class='alert alert-danger text-center'>ลบข้อมูลมีข้อผิดพลาด กรุณาตรวจสอบ !!! </div>" . $conn->error;
                }
            } else {
                echo "<div class='alert alert-warning text-center'>ไม่พบข้อมูล กรุณาตรวจสอบ</div>";
            }
        }
        ?>
        
        <div class="user-info-container">
            <div class="header-logo">
                <i class="fas fa-keyboard"></i>
                <h1>GAMING KEYBOARD SHOP</h1>
            </div>
            
            <div class="user-info-box">
                <div class="user-info-title"><i class="fas fa-user-circle me-2"></i>ผู้เข้าสู่ระบบ</div>
                <div class="user-info-data">พัฒนาโดย 664485033 น.ส.กัญญากร จิวรรจนะโรดม 66/96</div>
            </div>
            
            <div class="user-action-container">
                <a href="add_movie.php" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-2"></i>เพิ่มข้อมูลคีย์บอร์ดใหม่
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table id="example" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th width="5%"><i class="fas fa-hashtag me-1"></i>รหัส</th>
                        <th width="15%"><i class="fas fa-tag me-1"></i>แบรนด์</th>
                        <th width="15%"><i class="fas fa-keyboard me-1"></i>รุ่น</th>
                        <th width="15%"><i class="fas fa-microchip me-1"></i>ประเภทสวิตช์</th>
                        <th width="10%"><i class="fas fa-calculator me-1"></i>จำนวนปุ่ม</th>
                        <th width="15%"><i class="fas fa-plug me-1"></i>การเชื่อมต่อ</th>
                        <th width="10%"><i class="fas fa-coins me-1"></i>ราคา</th>
                        <th width="15%"><i class="fas fa-cogs me-1"></i>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM keyboards";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td><span class='brand-badge'>" . $row["brand"] . "</span></td>";
                            echo "<td class='model-display'>" . $row["model"] . "</td>";
                            echo "<td><span class='switch-type-badge'>" . $row["switch_type"] . "</span></td>";
                            echo "<td>" . $row["key_count"] . "</td>";
                            echo "<td><span class='connection-type-badge'>" . $row["connection_type"] . "</span></td>";
                            echo "<td class='price-display'>" . number_format($row["stock_quantity"]) . " ฿</td>";
                            echo '<td>
                                <div class="btn-group" role="group">
                                    <a href="edit_movie.php?action_even=edit&id=' . $row['id'] . '" 
                                       class="btn btn-primary btn-sm action-btn"
                                    >
                                       <i class="fas fa-edit me-1"></i>แก้ไข
                                    </a>
                                    <a href="show.php?action_even=delete&id=' . $row['id'] . '" 
                                       class="btn btn-danger btn-sm action-btn"
                                       onclick="return confirm(\'ต้องการจะลบข้อมูลคีย์บอร์ด ' . $row['brand'] . ' ' . $row['model'] . '?\')"
                                    >
                                       <i class="fas fa-trash-alt me-1"></i>ลบ
                                    </a>
                                </div>
                            </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>ไม่พบข้อมูลคีย์บอร์ด</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

        <div class="footer mt-4">
            <p><i class="fas fa-keyboard me-2"></i> GAMING KEYBOARD SHOP © 2025 | คีย์บอร์ดเกมมิ่งคุณภาพสูง</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        new DataTable('#example', {
            language: {
                search: 'ค้นหา:',
                lengthMenu: 'แสดง _MENU_ รายการ',
                info: 'หน้า _PAGE_ จาก _PAGES_',
                infoEmpty: 'ไม่มีข้อมูล',
                zeroRecords: 'ไม่พบข้อมูล',
                paginate: {
                    first: 'หน้าแรก',
                    last: 'หน้าสุดท้าย',
                    next: 'ถัดไป',
                    previous: 'ก่อนหน้า'
                }
            },
            responsive: true,
            order: [[0, 'desc']]
        });
    </script>
</body>
</html>