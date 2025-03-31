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
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #0a0e17; /* Deep navy background */
            margin: 0;
            padding: 20px;
            color: #fff;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%231e293b' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .page-container {
            background-color: #15192a; /* Dark blue container */
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 200, 255, 0.3); /* Cyan-tinted shadow */
            padding: 30px;
            border: 2px solid #00c8ff; /* Cyan border */
            max-width: 1000px;
            margin: 20px auto;
        }

        h1 {
            color: #00eeff; /* Bright cyan */
            font-weight: 800;
            margin-bottom: 30px;
            border-bottom: 3px solid #0088ff; /* Blue */
            padding-bottom: 15px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 2.8rem;
            text-shadow: 0 0 10px #00eeff, 0 0 20px #00eeff; /* Cyan glowing effect */
            animation: cyanGlow 1.5s ease-in-out infinite alternate;
            line-height: 1.3;
            position: relative;
        }

        h1::before, h1::after {
            content: "⌨️";
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2rem;
        }

        h1::before {
            left: 10px;
        }

        h1::after {
            right: 10px;
        }

        @keyframes cyanGlow {
            from {
                text-shadow: 0 0 10px #00eeff, 0 0 20px #00eeff;
            }
            to {
                text-shadow: 0 0 15px #00eeff, 0 0 25px #00eeff, 0 0 35px #00eeff, 0 0 45px #00eeff;
            }
        }

        .form-control, .form-select {
            background-color: #1e2942;
            border-radius: 8px;
            border: 2px solid #0088ff; /* Blue */
            color: #fff;
            transition: all 0.3s ease;
            padding: 10px 15px;
        }

        .form-control:focus, .form-select:focus {
            background-color: #263250;
            border-color: #00eeff;
            box-shadow: 0 0 0 0.25rem rgba(0, 200, 255, 0.25);
            color: #fff;
            transform: translateY(-2px);
        }

        label {
            color: #00c8ff; /* Cyan */
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
            text-shadow: 0 0 5px rgba(0, 200, 255, 0.5);
        }

        .btn-primary {
            background-color: #0088ff; /* Blue */
            border: none;
            transition: all 0.3s ease;
            padding: 10px 20px;
            font-weight: 600;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 136, 255, 0.4);
        }

        .btn-primary:hover {
            background-color: #00eeff; /* Cyan */
            color: #15192a;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 238, 255, 0.6);
        }

        .btn-danger {
            background-color: #142340; /* Dark blue */
            border: 2px solid #0088ff;
            color: #00c8ff;
            transition: all 0.3s ease;
            padding: 10px 20px;
            font-weight: 600;
            border-radius: 8px;
        }

        .btn-danger:hover {
            background-color: #8400ff;
            border-color: #7700e6;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(132, 0, 255, 0.4);
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #0088ff; /* Blue */
            font-size: 0.9em;
            padding: 15px;
            border-top: 1px solid #00c8ff;
            text-shadow: 0 0 5px rgba(0, 136, 255, 0.5);
        }

        .alert-success {
            background-color: #0b2b26;
            color: #00ffc3;
            border-color: #00c396;
            border-radius: 8px;
        }

        .alert-danger {
            background-color: #2b0b1e;
            color: #ff00c3;
            border-color: #c3008f;
            border-radius: 8px;
        }

        .alert-warning {
            background-color: #2b240b;
            color: #ffc300;
            border-color: #c39600;
            border-radius: 8px;
        }

        /* User Info Box */
        .user-info-container {
            margin-bottom: 25px;
        }
        
        .user-info-box {
            display: flex;
            align-items: center;
            background-color: #1e2942;
            border: 2px solid #0088ff;
            border-radius: 12px;
            padding: 12px 20px;
            margin: 20px 0;
            box-shadow: 0 4px 15px rgba(0, 136, 255, 0.3);
            transition: all 0.3s ease;
        }
        
        .user-info-box:hover {
            box-shadow: 0 6px 20px rgba(0, 200, 255, 0.4);
            transform: translateY(-5px);
        }
        
        .user-info-title {
            font-weight: 600;
            color: #00eeff;
            margin-right: 10px;
            white-space: nowrap;
        }
        
        .user-info-data {
            color: #fff;
            border-left: 2px solid #0088ff;
            padding-left: 15px;
            margin-left: 5px;
        }

        .edit-form {
            background-color: #1e2942;
            border-radius: 12px;
            border: 2px solid #0088ff;
            padding: 30px;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(0, 136, 255, 0.3);
            position: relative;
            overflow: hidden;
        }

        .edit-form::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #00eeff, #0088ff, #8400ff, #0088ff, #00eeff);
            background-size: 200% 100%;
            animation: gradient-animation 3s linear infinite;
        }

        @keyframes gradient-animation {
            0% {background-position: 0% 50%}
            50% {background-position: 100% 50%}
            100% {background-position: 0% 50%}
        }

        .keyboard-id-badge {
            background-color: #0088ff;
            color: #fff;
            font-weight: 600;
            padding: 8px 15px;
            border-radius: 8px;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(0, 136, 255, 0.4);
            transition: all 0.3s ease;
        }

        .keyboard-id-badge:hover {
            background-color: #00eeff;
            color: #15192a;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 238, 255, 0.6);
        }

        .row {
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }

        .row:hover {
            transform: translateX(5px);
        }

        .form-icon {
            margin-right: 10px;
            color: #00c8ff;
        }

        .btn-icon {
            margin-right: 10px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .page-container {
                padding: 20px;
            }
            h1 {
                font-size: 2.2rem;
            }
            h1::before, h1::after {
                display: none;
            }
        }

        @media (min-width: 992px) {
            h1 {
                font-size: 3.2rem;
            }
        }
    </style>

    <title>แก้ไขข้อมูลคีย์บอร์ด</title>
</head>

<body>
    <div class="container page-container">
        <div class="user-info-container">
            <h1 class="text-center">แก้ไขข้อมูลคีย์บอร์ด</h1>
            
            <div class="user-info-box">
                <div class="user-info-title"><i class="fas fa-user form-icon"></i>ผู้เข้าสู่ระบบ :</div>
                <div class="user-info-data">พัฒนาโดย 664485033 น.ส.กัญญากร จิวรรจนะโรดม 66/96</div>
            </div>
        </div>

        <?php
        if(isset($_GET['action_even']) && $_GET['action_even']=='edit'){
            $id = $_GET['id'];
            $sql = "SELECT * FROM keyboards WHERE id=$id";
            $result = $conn->query($sql);
            
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
            } else {
                echo "<div class='alert alert-warning text-center'><i class='fas fa-exclamation-triangle me-2'></i>ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ</div>";
                echo "<div class='text-center mt-3'><a href='show.php' class='btn btn-primary'><i class='fas fa-arrow-left btn-icon'></i>กลับไปหน้าแสดงข้อมูล</a></div>";
                exit();
            }
        } else {
            echo "<div class='alert alert-danger text-center'><i class='fas fa-times-circle me-2'></i>ไม่ได้ระบุข้อมูลที่ต้องการแก้ไข</div>";
            echo "<div class='text-center mt-3'><a href='show.php' class='btn btn-primary'><i class='fas fa-arrow-left btn-icon'></i>กลับไปหน้าแสดงข้อมูล</a></div>";
            exit();
        }
        ?>

        <div class="edit-form">
            <form action="edit_1.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                
                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label"><i class="fas fa-keyboard form-icon"></i>รหัสคีย์บอร์ด</label>
                    </div>
                    <div class="col-sm-8">
                        <div class="keyboard-id-badge"><?php echo $row['id']; ?></div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label"><i class="fas fa-tag form-icon"></i>แบรนด์</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="brand" class="form-control" maxlength="100" value="<?php echo $row['brand']; ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label"><i class="fas fa-laptop form-icon"></i>รุ่น</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="model" class="form-control" maxlength="100" value="<?php echo $row['model']; ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label"><i class="fas fa-microchip form-icon"></i>ประเภทสวิตช์</label>
                    </div>
                    <div class="col-sm-8">
                        <select name="switch_type" class="form-select" required>
                            <option>กรุณาระบุประเภทสวิตช์</option>
                            <option value="Mechanical" <?php if ($row['switch_type']=='Mechanical'){ echo "selected";} ?>>Mechanical</option>
                            <option value="Optical" <?php if ($row['switch_type']=='Optical'){ echo "selected";} ?>>Optical</option>
                            <option value="Membrane" <?php if ($row['switch_type']=='Membrane'){ echo "selected";} ?>>Membrane</option>
                            <option value="Scissor" <?php if ($row['switch_type']=='Scissor'){ echo "selected";} ?>>Scissor</option>
                            <option value="Topre" <?php if ($row['switch_type']=='Topre'){ echo "selected";} ?>>Topre</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label"><i class="fas fa-calculator form-icon"></i>จำนวนปุ่ม</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="number" name="key_count" class="form-control" value="<?php echo $row['key_count']; ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label"><i class="fas fa-plug form-icon"></i>ประเภทการเชื่อมต่อ</label>
                    </div>
                    <div class="col-sm-8">
                        <select name="connection_type" class="form-select" required>
                            <option>กรุณาระบุประเภทการเชื่อมต่อ</option>
                            <option value="Wired" <?php if ($row['connection_type']=='Wired'){ echo "selected";} ?>>Wired</option>
                            <option value="Wireless" <?php if ($row['connection_type']=='Wireless'){ echo "selected";} ?>>Wireless</option>
                            <option value="Bluetooth" <?php if ($row['connection_type']=='Bluetooth'){ echo "selected";} ?>>Bluetooth</option>
                            <option value="Hybrid" <?php if ($row['connection_type']=='Hybrid'){ echo "selected";} ?>>Hybrid</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label"><i class="fas fa-tags form-icon"></i>ราคา</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="number" name="price" class="form-control" value="<?php echo $row['price']; ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label"><i class="fas fa-boxes form-icon"></i>จำนวนในสต็อก</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="number" name="stock_quantity" class="form-control" value="<?php echo $row['stock_quantity']; ?>" required>
                    </div>
                </div>

                <div class="row mb-0 mt-4">
                    <div class="col-sm-12 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary flex-grow-1 me-2">
                            <i class="fas fa-save btn-icon"></i>บันทึกข้อมูล
                        </button>
                        <a href="show.php" class="btn btn-danger flex-grow-1">
                            <i class="fas fa-times btn-icon"></i>ยกเลิก
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <div class="footer mt-4">
            <i class="fas fa-code"></i> พัฒนาโดย 664485033 น.ส.กัญญากร จิวรรจนะโรดม 66/96
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>