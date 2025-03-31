<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts - Kanit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Kanit', sans-serif;
        }
        .login-page {
            background-color: #1a1b26; /* โทนสีฟ้า-ม่วงเข้ม */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .error-container {
            background-color: #24283b; /* โทนสีคีย์บอร์ด Gaming */
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(247, 118, 142, 0.3); /* เงาสีชมพู */
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            border: 2px solid #f7768e; /* ขอบสีชมพู */
        }
        .text-danger {
            color: #f7768e !important; /* สีชมพู - สีปุ่ม Esc */
            text-shadow: 0 0 10px rgba(247, 118, 142, 0.5);
            animation: errorGlow 1.5s ease-in-out infinite alternate;
        }
        
        @keyframes errorGlow {
            from {
                text-shadow: 0 0 10px rgba(247, 118, 142, 0.5);
            }
            to {
                text-shadow: 0 0 15px rgba(247, 118, 142, 0.8), 0 0 25px rgba(247, 118, 142, 0.5);
            }
        }
        
        .text-success {
            color: #9ece6a !important; /* สีเขียวสว่าง */
        }
        
        .btn-success {
            background-color: #7aa2f7; /* สีฟ้า */
            border-color: #7aa2f7;
            transition: all 0.3s ease;
        }
        
        .btn-success:hover {
            background-color: #9ece6a; /* สีเขียว */
            border-color: #9ece6a;
            transform: scale(1.02);
            box-shadow: 0 0 15px rgba(158, 206, 106, 0.5);
        }
        
        .btn-back {
            width: 100%;
            margin-top: 15px;
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
        
        .text-muted {
            color: #a9b1d6 !important; /* สีฟ้าอ่อน */
        }
    </style>
    
    <title>ตรวจสอบ Login</title>
</head>
<body>
    <div class="login-page">
        <!-- แทนที่ใบไม้ด้วยปุ่มคีย์บอร์ด -->
        <div class="key"></div>
        <div class="key"></div>
        <div class="key"></div>
        <div class="key"></div>

        <div class="error-container">
            <h1 class="text-danger mb-4">Login ผิดพลาด</h1>
            <h2 class="mb-4 text-success">กรุณาตรวจสอบ ชื่อผู้ใช้และรหัสผ่าน</h2>
            <a href="login.php" class="btn btn-success btn-back">กลับสู่หน้าจอ Login</a>
            <div class="text-center mt-3 text-muted small">
            พัฒนาโดย 664485033 น.ส.กัญญากร จิวรรจนะโรดม 66/96
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>