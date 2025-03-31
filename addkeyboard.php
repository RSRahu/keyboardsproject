<?php
// Add database connection code at the top of the file
$servername = "localhost";
$username = "root";  // Your database username
$password = "";      // Your database password
$dbname = "finalprojectkeyboard"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to utf8
$conn->set_charset("utf8");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลคีย์บอร์ด | MechaKeys</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #00c8ff;
            --primary-dark: #0099cc;
            --secondary: #ff3c7b;
            --dark: #121212;
            --dark-lighter: #1e1e1e;
            --dark-panel: #252525;
            --text-light: #ffffff;
            --text-highlight: #00eaff;
        }
        
        body {
            font-family: "Kanit", sans-serif;
            background-color: var(--dark);
            background-image: url('/api/placeholder/400/400');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-blend-mode: overlay;
            margin: 0;
            padding: 20px;
            color: var(--text-light);
            position: relative;
        }
        
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(0,0,0,0.9) 0%, rgba(18,18,18,0.8) 100%);
            z-index: -1;
        }

        .page-title {
            text-align: center;
            margin-bottom: 15px;
        }

        .page-title h1 {
            color: var(--text-highlight);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
            padding: 0;
            font-size: 2.5rem;
            display: inline-block;
            position: relative;
            text-shadow: 0 0 10px rgba(0, 234, 255, 0.5);
        }

        .page-title h1::after {
            content: "";
            display: block;
            width: 80%;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--primary), transparent);
            margin: 10px auto 5px;
            border-radius: 2px;
        }

        .page-subtitle {
            color: var(--secondary);
            text-align: center;
            margin-bottom: 30px;
            font-weight: 300;
            font-size: 1.1rem;
        }

        .add-container {
            background-color: var(--dark-panel);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3), 
                        0 0 20px rgba(0, 200, 255, 0.15);
            padding: 35px;
            border: 1px solid rgba(0, 200, 255, 0.2);
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }
        
        .add-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .form-label {
            color: var(--text-light);
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .form-control, .form-select {
            background-color: rgba(18, 18, 18, 0.7);
            border: 1px solid rgba(0, 200, 255, 0.3);
            border-radius: 8px;
            color: #fff;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            background-color: rgba(18, 18, 18, 0.9);
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 200, 255, 0.2);
            color: #fff;
        }
        
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .input-group-text {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            color: white;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            z-index: -1;
        }
        
        .btn:hover::after {
            height: 100%;
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--primary-dark), var(--primary));
            color: white;
            box-shadow: 0 4px 15px rgba(0, 200, 255, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, var(--primary), var(--primary-dark));
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(0, 200, 255, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(45deg, #333, #444);
            color: white;
        }

        .btn-secondary:hover {
            background: linear-gradient(45deg, #444, #555);
            transform: translateY(-2px);
        }

        .btn-danger {
            background: linear-gradient(45deg, #cc0033, var(--secondary));
            color: white;
        }

        .btn-danger:hover {
            background: linear-gradient(45deg, var(--secondary), #cc0033);
            transform: translateY(-2px);
        }

        .alert-success {
            background-color: rgba(25, 135, 84, 0.2);
            color: #4CFF50;
            border-color: rgba(25, 135, 84, 0.5);
            border-radius: 8px;
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.2);
            color: #ff6b6b;
            border-color: rgba(220, 53, 69, 0.5);
            border-radius: 8px;
        }

        .invalid-feedback {
            color: #ff6b6b;
            font-size: 0.8rem;
            margin-top: 5px;
        }

        .user-info-container {
            margin-bottom: 30px;
        }
        
        .user-info-box {
            display: flex;
            align-items: center;
            background-color: rgba(18, 18, 18, 0.6);
            border: 1px solid rgba(0, 200, 255, 0.3);
            border-radius: 10px;
            padding: 15px 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
        }
        
        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #121212;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .user-info-content {
            flex: 1;
        }
        
        .user-info-title {
            font-weight: 600;
            color: var(--text-highlight);
            margin-bottom: 3px;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .user-info-data {
            color: #fff;
            font-weight: 300;
        }
        
        .footer-credits {
            text-align: center;
            margin-top: 30px;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.6);
            padding: 10px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Enhanced form styling with icons */
        .input-group {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 15px;
            color: var(--primary);
            z-index: 10;
        }
        
        .icon-input {
            padding-left: 45px;
        }
        
        /* Keyboard animation in background */
        .keyboard-bg {
            position: fixed;
            bottom: -50px;
            right: -100px;
            width: 500px;
            height: 200px;
            background: radial-gradient(circle, rgba(0, 200, 255, 0.1) 0%, rgba(0, 0, 0, 0) 70%);
            opacity: 0.5;
            z-index: -1;
            animation: glow 3s infinite alternate;
        }
        
        @keyframes glow {
            from {
                opacity: 0.3;
                transform: scale(1);
            }
            to {
                opacity: 0.6;
                transform: scale(1.1);
            }
        }
        
        /* Form row styling */
        .form-row {
            position: relative;
            margin-bottom: 25px;
            padding-left: 20px;
        }
        
        .form-row::before {
            content: "";
            position: absolute;
            left: 0;
            top: 10px;
            bottom: 10px;
            width: 3px;
            background: linear-gradient(to bottom, var(--primary), transparent);
            border-radius: 3px;
        }
        
        /* Button container */
        .button-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            .add-container {
                padding: 25px 20px;
            }
            
            .page-title h1 {
                font-size: 2rem;
            }
            
            .button-container {
                flex-direction: column;
            }
            
            .button-container .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="keyboard-bg"></div>
    
    <div class="container add-container">
        <div class="page-title">
            <h1>MechaKeys</h1>
        </div>
        <div class="page-subtitle">
            ระบบจัดการข้อมูลคีย์บอร์ดพรีเมียม
        </div>
        
        <div class="user-info-box">
            <div class="user-avatar">
                A
            </div>
            <div class="user-info-content">
                <div class="user-info-title">ผู้เข้าสู่ระบบ</div>
                <div class="user-info-data">พัฒนาโดย 664485033 น.ส.กัญญากร จิวรรจนะโรดม 66/96 </div>
            </div>
        </div>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate id="keyboardForm">
            <div class="form-row">
                <div class="row mb-3">
                    <label for="brand" class="col-sm-3 col-form-label form-label">
                        <i class="fa-solid fa-tag me-2"></i>แบรนด์
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="เช่น Glorious, Razer, Ducky" required>
                        <div class="invalid-feedback">
                            กรุณากรอกชื่อแบรนด์
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="row mb-3">
                    <label for="model" class="col-sm-3 col-form-label form-label">
                        <i class="fa-solid fa-keyboard me-2"></i>รุ่น
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="model" name="model" placeholder="เช่น GMMK Pro, Huntsman Elite" required>
                        <div class="invalid-feedback">
                            กรุณากรอกชื่อรุ่น
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="row mb-3">
                    <label for="switch_type" class="col-sm-3 col-form-label form-label">
                        <i class="fa-solid fa-microchip me-2"></i>ประเภทสวิตช์
                    </label>
                    <div class="col-sm-9">
                        <select name="switch_type" id="switch_type" class="form-select" required>
                            <option value="" selected disabled>เลือกประเภทสวิตช์</option>
                            <option value="Mechanical">Mechanical</option>
                            <option value="Optical">Optical</option>
                            <option value="Membrane">Membrane</option>
                            <option value="Scissor">Scissor</option>
                            <option value="Capacitive">Capacitive</option>
                            <option value="Topre">Topre</option>
                        </select>
                        <div class="invalid-feedback">
                            กรุณาเลือกประเภทสวิตช์
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="row mb-3">
                    <label for="key_count" class="col-sm-3 col-form-label form-label">
                        <i class="fa-solid fa-calculator me-2"></i>จำนวนปุ่ม
                    </label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="key_count" name="key_count" placeholder="เช่น 61, 87, 104" required min="1">
                        <div class="invalid-feedback">
                            กรุณากรอกจำนวนปุ่ม
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="row mb-3">
                    <label for="connection_type" class="col-sm-3 col-form-label form-label">
                        <i class="fa-solid fa-plug me-2"></i>ประเภทการเชื่อมต่อ
                    </label>
                    <div class="col-sm-9">
                        <select name="connection_type" id="connection_type" class="form-select" required>
                            <option value="" selected disabled>เลือกประเภทการเชื่อมต่อ</option>
                            <option value="Wired">Wired</option>
                            <option value="Wireless">Wireless</option>
                            <option value="Bluetooth">Bluetooth</option>
                            <option value="Wired/Wireless">Wired/Wireless</option>
                            <option value="Wired/Bluetooth">Wired/Bluetooth</option>
                        </select>
                        <div class="invalid-feedback">
                            กรุณาเลือกประเภทการเชื่อมต่อ
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="row mb-3">
                    <label for="price" class="col-sm-3 col-form-label form-label">
                        <i class="fa-solid fa-baht-sign me-2"></i>ราคา
                    </label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="number" class="form-control" id="price" name="price" placeholder="เช่น 3990, 5590" required step="0.01" min="0">
                            <span class="input-group-text">บาท</span>
                            <div class="invalid-feedback">
                                กรุณากรอกราคา
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="row mb-3">
                    <label for="stock_quantity" class="col-sm-3 col-form-label form-label">
                        <i class="fa-solid fa-boxes-stacked me-2"></i>จำนวนในสต็อกปx
                    </label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" placeholder="เช่น 10, 25, 50" required min="0">
                        <div class="invalid-feedback">
                            กรุณากรอกจำนวนในสต็อก
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="button-container">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk me-2"></i>บันทึกข้อมูล
                </button>
                <button type="button" class="btn btn-danger" onclick="window.location.href='show.php'">
                    <i class="fa-solid fa-xmark me-2"></i>ยกเลิก
                </button>
                <a href="show.php" class="btn btn-secondary">
                    <i class="fa-solid fa-list me-2"></i>แสดงข้อมูล
                </a>
            </div>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data and sanitize inputs
            $brand = mysqli_real_escape_string($conn, $_POST['brand']);
            $model = mysqli_real_escape_string($conn, $_POST['model']);
            $switch_type = mysqli_real_escape_string($conn, $_POST['switch_type']);
            $key_count = mysqli_real_escape_string($conn, $_POST['key_count']);
            $connection_type = mysqli_real_escape_string($conn, $_POST['connection_type']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            $stock_quantity = mysqli_real_escape_string($conn, $_POST['stock_quantity']);
            
            // Insert data into database
            $sql = "INSERT INTO keyboards (brand, model, switch_type, key_count, connection_type, price, stock_quantity) 
                    VALUES ('$brand', '$model', '$switch_type', '$key_count', '$connection_type', '$price', '$stock_quantity')";
            
            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success mt-4 text-center">
                        <i class="fa-solid fa-circle-check me-2"></i>บันทึกข้อมูลคีย์บอร์ดเรียบร้อยแล้ว
                      </div>';
            } else {
                echo '<div class="alert alert-danger mt-4 text-center">
                        <i class="fa-solid fa-circle-exclamation me-2"></i>เกิดข้อผิดพลาด: ' . $conn->error . '
                      </div>';
            }
        }
        ?>

        <div class="footer-credits">
            <div>พัฒนาโดย 664485033 น.ส.กัญญากร จิวรรจนะโรดม 664485033 66/96</div>
            <div class="mt-1">© 2025 MechaKeys - ระบบจัดการข้อมูลคีย์บอร์ดพรีเมียม</div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Form Validation Script -->
    <script>
        // Form validation
        (function() {
            'use strict';
            
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            
            // Loop over them and prevent submission
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>