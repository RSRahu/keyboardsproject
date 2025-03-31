<?php
include("conn.php");
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

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #1a1b26; /* โทนสีฟ้า-ม่วงเข้ม */
            margin: 0;
            padding: 0;
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .login-container {
            background-color: #24283b; /* โทนสีคีย์บอร์ด Gaming */
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(86, 95, 216, 0.4); /* เงาสีฟ้า */
            padding: 40px;
            width: 100%;
            max-width: 400px;
            border: 2px solid #7aa2f7; /* ขอบสีฟ้า */
            text-align: center;
            position: relative;
            z-index: 2;
        }

        h1 {
            color: #7dcfff; /* สีฟ้าสว่าง */
            font-weight: 800;
            margin-bottom: 30px;
            border-bottom: 3px solid #bb9af7; /* สีม่วงอ่อน */
            padding-bottom: 15px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 2.5rem;
            text-shadow: 0 0 10px #7dcfff, 0 0 20px #7dcfff; /* เอฟเฟกต์เรืองแสงสีฟ้า */
            animation: keyGlow 1.5s ease-in-out infinite alternate;
        }

        @keyframes keyGlow {
            from {
                text-shadow: 0 0 10px #7dcfff, 0 0 20px #7dcfff;
            }
            to {
                text-shadow: 0 0 15px #7dcfff, 0 0 25px #7dcfff, 0 0 35px #7dcfff;
            }
        }

        .form-control {
            background-color: #414868; /* สีพื้นหลังคีย์บอร์ดเข้ม */
            border-radius: 8px;
            border: 2px solid #565f88; /* ขอบคีย์ */
            color: #fff;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: #414868;
            border-color: #7aa2f7; /* สีฟ้า */
            box-shadow: 0 0 0 0.25rem rgba(122, 162, 247, 0.25);
            color: #fff;
            transform: translateY(-2px); /* ปุ่มกดลงเล็กน้อย เหมือนคีย์บอร์ด */
        }

        .form-label {
            color: #bb9af7; /* สีม่วงอ่อน */
            font-weight: 500;
            text-align: left;
            display: block;
            margin-bottom: 8px;
        }

        .btn-custom {
            width: 100%;
            margin-top: 15px;
            background-color: #7aa2f7; /* สีฟ้า */
            border-color: #7aa2f7;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #9ece6a; /* สีเขียว */
            border-color: #9ece6a;
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(158, 206, 106, 0.5); /* เรืองแสงเขียว */
        }

        .btn-outline {
            width: 100%;
            margin-top: 10px;
            background-color: transparent;
            border-color: #f7768e; /* สีชมพู */
            color: #f7768e;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background-color: #f7768e;
            color: #fff;
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(247, 118, 142, 0.5); /* เรืองแสงชมพู */
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #a9b1d6; /* สีฟ้าอ่อน */
            font-size: 0.9em;
        }

        /* เพิ่มลูกเล่นคีย์บอร์ด */
        .key {
            position: absolute;
            border-radius: 5px;
            background-color: #414868;
            border: 2px solid #565f88;
            opacity: 0.2;
            width: 40px;
            height: 40px;
            z-index: 1;
            animation: float 3s infinite ease-in-out;
        }

        .key:nth-child(1) {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .key:nth-child(2) {
            top: 20%;
            right: 15%;
            animation-delay: 0.5s;
        }

        .key:nth-child(3) {
            bottom: 15%;
            left: 20%;
            animation-delay: 1s;
        }

        .key:nth-child(4) {
            bottom: 25%;
            right: 10%;
            animation-delay: 1.5s;
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(10deg);
            }
            100% {
                transform: translateY(0) rotate(0deg);
            }
        }

        @media (max-width: 768px) {
            .login-container {
                padding: 20px;
                margin: 15px;
            }
            h1 {
                font-size: 2rem;
            }
        }
    </style>
    
    <title>เข้าสู่ระบบ</title>
</head>
<body>
    <!-- แทนที่วงกลมด้วยปุ่มคีย์บอร์ด -->
    <div class="key"></div>
    <div class="key"></div>
    <div class="key"></div>
    <div class="key"></div>

    <div class="login-container">
        <h1>เข้าสู่ระบบ</h1>
        <form action="chklogin.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">ชื่อผู้ใช้</label>
                <input type="text" class="form-control" id="username" name="u_id" maxlength="30" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password" class="form-control" id="password" name="u_passwd" maxlength="30" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-custom">เข้าสู่ระบบ</button>
                <button type="reset" class="btn btn-outline">ยกเลิก</button>
            </div>
        </form>
        <div class="footer">
        พัฒนาโดย 664485033 น.ส.กัญญากร จิวรรจนะโรดม 66/96
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>