<?php
    include("conn.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #0a0a0a;
            margin: 0;
            padding: 0;
            color: #fff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
            overflow: hidden;
        }
        
        /* คีย์บอร์ดเอฟเฟกต์พื้นหลัง */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(255, 0, 0, 0.1) 0%, transparent 20%),
                radial-gradient(circle at 80% 70%, rgba(0, 255, 255, 0.1) 0%, transparent 20%);
            opacity: 0.5;
            z-index: -1;
        }
        
        /* จุดๆเหมือนไฟ LED บนพื้นหลัง */
        .led-dots {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        
        .led-dot {
            position: absolute;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            opacity: 0.6;
            animation: pulse 3s infinite alternate;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); opacity: 0.6; }
            100% { transform: scale(1.5); opacity: 0.2; }
        }

        .login-container {
            background-color: rgba(15, 15, 20, 0.95);
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 255, 255, 0.15), 0 0 15px rgba(255, 0, 0, 0.15);
            padding: 40px;
            border: 2px solid transparent;
            border-image: linear-gradient(135deg, #ff0055, #00aaff);
            border-image-slice: 1;
            max-width: 500px;
            width: 100%;
            position: relative;
            backdrop-filter: blur(10px);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .login-container:hover {
            box-shadow: 0 0 40px rgba(0, 255, 255, 0.2), 0 0 20px rgba(255, 0, 0, 0.2);
        }
        
        /* เอฟเฟกต์ไฟว่ิงตามขอบ */
        .login-container::after {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            z-index: -1;
            background: linear-gradient(90deg, 
                #ff0055, #ff00a2, #b300ff, #0062ff, #00a2ff, #00fff6, 
                #00ff62, #80ff00, #daff00, #ff8c00, #ff0000, #ff0055);
            background-size: 300% 300%;
            border-radius: 16px;
            animation: borderGlow 5s linear infinite;
            opacity: 0.3;
            filter: blur(10px);
        }
        
        @keyframes borderGlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        h1 {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 30px;
            padding-bottom: 15px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 2.2rem;
            position: relative;
        }
        
        h1 span {
            background: linear-gradient(90deg, #ff0055, #00aaff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: none;
            animation: colorChange 3s infinite alternate;
        }
        
        @keyframes colorChange {
            0% { filter: hue-rotate(0deg); }
            100% { filter: hue-rotate(360deg); }
        }
        
        h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 25%;
            width: 50%;
            height: 3px;
            background: linear-gradient(to right, transparent, #ff0055, #00aaff, transparent);
        }

        .alert-success {
            background-color: rgba(11, 39, 11, 0.8);
            color: #00ff4c;
            border: none;
            box-shadow: 0 0 15px rgba(0, 255, 76, 0.3);
        }

        .alert-danger {
            background-color: rgba(39, 11, 11, 0.8);
            color: #ff5555;
            border: none;
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.3);
        }

        .login-message {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(5px);
            letter-spacing: 0.5px;
        }
        
        /* ไอคอนคีย์บอร์ด */
        .keyboard-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 24px;
            color: rgba(255, 255, 255, 0.1);
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(5deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        .btn-redirect {
            background: linear-gradient(135deg, #ff0055, #00aaff);
            border: none;
            color: white;
            padding: 12px 25px;
            transition: all 0.3s ease;
            display: block;
            width: 100%;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            font-weight: 600;
            margin-top: 25px;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .btn-redirect span {
            position: relative;
            z-index: 1;
        }

        .btn-redirect::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .btn-redirect:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
            color: white;
            filter: brightness(1.1) hue-rotate(15deg);
        }
        
        .btn-redirect:hover::before {
            left: 100%;
        }
        
        .btn-redirect:active {
            transform: translateY(1px);
        }
        
        /* ปุ่มกดดูยิ่งใหญ่ขึ้น */
        .keys-effect {
            position: absolute;
            bottom: -50px;
            left: 0;
            width: 100%;
            height: 50px;
            background: linear-gradient(to bottom, rgba(255,255,255,0.1), transparent);
            z-index: -1;
        }
    </style>
    
    <title>MECHA KEYBOARD SHOP | ตรวจสอบการเข้าสู่ระบบ</title>
</head>
<body>
    <!-- จุดๆ LED ในพื้นหลัง -->
    <div class="led-dots" id="led-dots"></div>
    
    <div class="login-container">
        <div class="keyboard-icon">
            <i class="fas fa-keyboard"></i>
        </div>
        <h1><span>ตรวจสอบการเข้าสู่ระบบ</span></h1>
        <div class="keys-effect"></div>
        
        <?php
            // เช็คค่า
            $u_id = isset($_POST['u_id']) ? $_POST['u_id'] : '';
            $u_passwd = isset($_POST['u_passwd']) ? $_POST['u_passwd'] : '';
            
            // เช็ค ชื่อผู้ใช้ กับ รหัสผ่านว่าตรงกับในฐานข้อมูลหรือไม่
            $lvsql = "SELECT * FROM userdata WHERE u_id='$u_id' and u_passwd='$u_passwd'";
            
            $result = $conn->query($lvsql);
            if($result->num_rows == 0){
                echo "<div class='login-message alert-danger'><i class='fas fa-exclamation-circle me-2'></i> ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบ</div>";
                echo "<a href='login.php' class='btn-redirect'><span><i class='fas fa-arrow-left me-2'></i> กลับไปหน้าเข้าสู่ระบบ</span></a>";
            } else {
                //get user data
                $row = $result->fetch_assoc();
                
                // กำหนดตัวแปร session
                $_SESSION["u_id"] = $u_id;
                $_SESSION["u_passwd"] = $row['u_passwd'];
                $_SESSION["u_name"] = $row['u_name'];
                
                echo "<div class='login-message alert-success'><i class='fas fa-check-circle me-2'></i> เข้าสู่ระบบสำเร็จ กำลังนำท่านไปยังร้านคีย์บอร์ด...</div>";
                
                // Redirect with JavaScript for better user experience
                echo "<script>
                    setTimeout(function() {
                        window.location.href = 'show.php';
                    }, 1800);
                </script>";
                
                echo "<a href='show.php' class='btn-redirect'><span><i class='fas fa-store me-2'></i> เข้าสู่ร้านทันที</span></a>";
            }
        ?>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- สคริปต์สร้างจุด LED -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('led-dots');
            const colors = ['#ff0055', '#00aaff', '#00ff4c', '#ffaa00', '#aa00ff'];
            
            // สร้างจุด LED 50 จุด
            for (let i = 0; i < 50; i++) {
                const dot = document.createElement('div');
                dot.classList.add('led-dot');
                
                // สุ่มตำแหน่ง
                const x = Math.random() * 100;
                const y = Math.random() * 100;
                
                // สุ่มสี
                const color = colors[Math.floor(Math.random() * colors.length)];
                
                // สุ่มความล่าช้าในการเริ่ม animation
                const delay = Math.random() * 5;
                
                dot.style.left = `${x}%`;
                dot.style.top = `${y}%`;
                dot.style.backgroundColor = color;
                dot.style.animationDelay = `${delay}s`;
                
                container.appendChild(dot);
            }
        });
    </script>
</body>
</html>