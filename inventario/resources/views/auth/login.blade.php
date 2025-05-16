
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #5e35b1;
            --primary-light: #9162e4;
            --primary-dark: #280680;
            --accent-color: #b39ddb;
            --text-color: #3c3c3c;
            --error-color: #ef5350;
            --light-gray: #f5f5f5;
            --dark-gray: #757575;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #e9e4f0, #d3cce3);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
        }
        
        .login-card {
            display: flex;
            width: 90%;
            max-width: 900px;
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(94, 53, 177, 0.15);
        }
        
        .login-sidebar {
            width: 45%;
            background: linear-gradient(45deg, var(--primary-dark), var(--primary-color));
            padding: 50px 30px;
            color: white;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-sidebar h2 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 15px;
            letter-spacing: 1px;
        }
        
        .login-sidebar p {
            opacity: 0.85;
            line-height: 1.7;
            margin-bottom: 30px;
        }
        
        .sidebar-decoration {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60%;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='600' height='600' viewBox='0 0 800 800'%3E%3Cg fill='none' stroke='rgba(255,255,255,0.1)' stroke-width='1'%3E%3Cpath d='M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126.5 879.5 40 599-197 493 102 382-31 229 126.5 79.5-69-63'/%3E%3Cpath d='M-31 229L237 261 390 382 603 493 308.5 537.5 101.5 381.5M370 905L295 764'/%3E%3Cpath d='M520 660L578 842 731 737 840 599 603 493 520 660 295 764 309 538 390 382 539 269 769 229 577.5 41.5 370 105 295 -36 126.5 79.5 237 261 102 382 40 599 -69 737 127 880'/%3E%3Cpath d='M520-140L578.5 42.5 731-63M603 493L539 269 237 261 370 105M902 382L539 269M390 382L102 382'/%3E%3Cpath d='M-222 42L126.5 79.5 370 105 539 269 577.5 41.5 927 80 769 229 902 382 603 493 731 737M295-36L577.5 41.5M578 842L295 764M40-201L127 80M102 382L-261 269'/%3E%3C/g%3E%3Cg fill='rgba(255,255,255,0.05)'%3E%3Ccircle cx='769' cy='229' r='8'/%3E%3Ccircle cx='539' cy='269' r='8'/%3E%3Ccircle cx='603' cy='493' r='8'/%3E%3Ccircle cx='731' cy='737' r='8'/%3E%3Ccircle cx='520' cy='660' r='8'/%3E%3Ccircle cx='309' cy='538' r='8'/%3E%3Ccircle cx='295' cy='764' r='8'/%3E%3Ccircle cx='40' cy='599' r='8'/%3E%3Ccircle cx='102' cy='382' r='8'/%3E%3Ccircle cx='127' cy='80' r='8'/%3E%3Ccircle cx='370' cy='105' r='8'/%3E%3Ccircle cx='578' cy='42' r='8'/%3E%3Ccircle cx='237' cy='261' r='8'/%3E%3Ccircle cx='390' cy='382' r='8'/%3E%3C/g%3E%3C/svg%3E");
            background-size: cover;
            opacity: 0.7;
            z-index: 0;
        }
        
        .brand-logo {
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 2px;
        }
        
        .quote {
            position: relative;
            z-index: 1;
            font-style: italic;
            border-left: 3px solid var(--accent-color);
            padding-left: 15px;
            margin: 30px 0;
        }
        
        .login-content {
            width: 55%;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-header {
            margin-bottom: 40px;
        }
        
        .login-header h1 {
            font-size: 28px;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 10px;
        }
        
        .login-header p {
            color: var(--dark-gray);
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-color);
            font-weight: 500;
        }
        
        .input-group {
            position: relative;
        }
        
        .input-group input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            background-color: var(--light-gray);
            font-size: 15px;
            transition: all 0.3s ease;
        }
        
        .input-group input:focus {
            border-color: var(--primary-color);
            background-color: white;
            box-shadow: 0 0 0 3px rgba(94, 53, 177, 0.1);
            outline: none;
        }
        
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--dark-gray);
            font-size: 18px;
            transition: all 0.3s ease;
        }
        
        .input-group input:focus + i {
            color: var(--primary-color);
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
        }
        
        .remember-me input {
            margin-right: 8px;
            accent-color: var(--primary-color);
            width: 16px;
            height: 16px;
        }
        
        .remember-me label {
            color: var(--dark-gray);
        }
        
        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .forgot-password:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        .login-btn {
            width: 100%;
            padding: 15px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(94, 53, 177, 0.2);
        }
        
        .login-btn:hover {
            background-color: var(--primary-dark);
            box-shadow: 0 7px 20px rgba(94, 53, 177, 0.3);
            transform: translateY(-2px);
        }
        
        .login-btn:active {
            transform: translateY(0);
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 30px 0;
            color: var(--dark-gray);
        }
        
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background-color: #e0e0e0;
        }
        
        .divider span {
            padding: 0 15px;
            font-size: 13px;
        }
        
        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background-color: var(--light-gray);
            border: 1px solid #e0e0e0;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .social-btn:hover {
            background-color: white;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }
        
        .social-btn i {
            font-size: 20px;
            color: var(--text-color);
        }
        
        .register-text {
            text-align: center;
            margin-top: 30px;
            color: var(--dark-gray);
        }
        
        .register-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .register-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        /* Responsive styles */
        @media screen and (max-width: 768px) {
            .login-card {
                flex-direction: column;
                max-width: 100%;
                height: 100%;
                border-radius: 0;
            }
            
            .login-sidebar, .login-content {
                width: 100%;
                padding: 30px 20px;
            }
            
            .login-sidebar {
                display: none;
            }
            
            .login-card {
                height: auto;
                min-height: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-sidebar">
            <div class="brand-logo">Sistema de invetario de almacen</div>
            <h2>Bienvenido de nuevo</h2>
            <p>Accede a tu cuenta</p>
            <div class="sidebar-decoration"></div>
        </div>
        
        <div class="login-content">
            <div class="login-header">
                <h1>Iniciar Sesión</h1>
                <p>Por favor, ingresa tus credenciales para continuar</p>
            </div>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group">
                    <label for="correo">Correo electrónico</label>
                    <div class="input-group">
                        <input type="email" id="correo" name="correo" value="{{ old('correo') }}" required>
                        <i class="fas fa-envelope"></i>
                    </div>
                    @error('correo')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="contrasena">Contraseña</label>
                    <div class="input-group">
                    <input type="password" id="contrasena" name="contrasena" required>
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
                
                
                <button type="submit" class="login-btn">Iniciar Sesión</button>
                
            </form>
        </div>
    </div>
</body>
</html>