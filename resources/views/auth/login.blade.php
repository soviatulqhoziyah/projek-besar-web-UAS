<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body{background:linear-gradient(135deg,#fff9c4 0%,#f9ca24 50%,#ff6b35 100%);min-height:100vh;font-family:'Segoe UI',sans-serif;position:relative;overflow:hidden}
        .login-container{backdrop-filter:blur(10px);background:rgba(255,255,255,0.25);border:1px solid rgba(255,255,255,0.2);border-radius:20px;box-shadow:0 25px 45px rgba(0,0,0,0.1);padding:40px;width:420px;animation:slideIn 0.6s ease-out}
        @keyframes slideIn{from{opacity:0;transform:translateY(-30px)}to{opacity:1;transform:translateY(0)}}
        .login-title{color:#333;font-weight:700;margin-bottom:30px;text-align:center;font-size:28px;text-shadow:1px 1px 2px rgba(0,0,0,0.1)}
        .form-control{background:rgba(255,255,255,0.8);border:2px solid rgba(255,255,255,0.3);border-radius:15px;padding:15px 20px 15px 45px;font-size:16px;transition:all 0.3s ease;backdrop-filter:blur(5px)}
        .form-control:focus{background:rgba(255,255,255,0.95);border-color:#f9ca24;box-shadow:0 0 0 0.2rem rgba(249,202,36,0.25);transform:translateY(-2px)}
        .input-group{position:relative;margin-bottom:20px}
        .input-icon{position:absolute;left:15px;top:50%;transform:translateY(-50%);color:#666;z-index:10}
        .btn-login{background:linear-gradient(135deg,#f9ca24 0%,#ff6b35 100%);border:none;border-radius:15px;color:white;font-weight:600;font-size:16px;padding:15px;width:100%;transition:all 0.3s ease;text-transform:uppercase;letter-spacing:1px;box-shadow:0 8px 15px rgba(0,0,0,0.1)}
        .btn-login:hover{transform:translateY(-2px);box-shadow:0 12px 25px rgba(0,0,0,0.15);background:linear-gradient(135deg,#e6b800 0%,#e55a2b 100%)}
        .alert{background:rgba(220,53,69,0.1);border:1px solid rgba(220,53,69,0.3);border-radius:15px;color:#721c24;padding:15px;margin-bottom:25px;backdrop-filter:blur(5px)}
        .circle{position:absolute;border-radius:50%;background:rgba(255,255,255,0.1);animation:float 6s ease-in-out infinite}
        .circle:nth-child(1){width:100px;height:100px;top:20%;left:10%;animation-delay:0s}
        .circle:nth-child(2){width:150px;height:150px;top:60%;right:10%;animation-delay:2s}
        .circle:nth-child(3){width:80px;height:80px;bottom:20%;left:20%;animation-delay:4s}
        @keyframes float{0%,100%{transform:translateY(0px) rotate(0deg)}50%{transform:translateY(-20px) rotate(180deg)}}
        .logo{width:60px;height:60px;background:linear-gradient(135deg,#f9ca24 0%,#ff6b35 100%);border-radius:50%;display:inline-flex;align-items:center;justify-content:center;color:white;font-size:24px;box-shadow:0 8px 20px rgba(0,0,0,0.1);margin-bottom:20px}
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    
    <div class="login-container">
        <div class="text-center">
            <div class="logo">
                <i class="fas fa-user-shield"></i>
            </div>
        </div>
        
        <h4 class="login-title">Login Admin</h4>

        @if (session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i>
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            
            <div class="input-group">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email Anda" required autofocus>
            </div>
            
            <div class="input-group">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" name="password" class="form-control" placeholder="Masukkan kata sandi" required>
            </div>
            
            <button type="submit" class="btn btn-login">
                <i class="fas fa-sign-in-alt me-2"></i>
                Masuk
            </button>
        </form>
    </div>
</body>
</html>