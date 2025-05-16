<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Producto</title>
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
            --success-color: #66bb6a;
            --warning-color: #ffb74d;
            --danger-color: #ef5350;
            --info-color: #29b6f6;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #e9e4f0, #d3cce3);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            padding: 20px;
        }
        
        .form-container {
            width: 95%;
            max-width: 800px;
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(94, 53, 177, 0.15);
            display: flex;
            flex-direction: column;
        }
        
        .form-header {
            background: linear-gradient(45deg, var(--primary-dark), var(--primary-color));
            padding: 25px 30px;
            color: white;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .brand-logo {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 2px;
            z-index: 1;
        }
        
        .form-title {
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 1px;
            z-index: 1;
        }
        
        .header-decoration {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='600' height='600' viewBox='0 0 800 800'%3E%3Cg fill='none' stroke='rgba(255,255,255,0.1)' stroke-width='1'%3E%3Cpath d='M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126.5 879.5 40 599-197 493 102 382-31 229 126.5 79.5-69-63'/%3E%3Cpath d='M-31 229L237 261 390 382 603 493 308.5 537.5 101.5 381.5M370 905L295 764'/%3E%3Cpath d='M520 660L578 842 731 737 840 599 603 493 520 660 295 764 309 538 390 382 539 269 769 229 577.5 41.5 370 105 295 -36 126.5 79.5 237 261 102 382 40 599 -69 737 127 880'/%3E%3Cpath d='M520-140L578.5 42.5 731-63M603 493L539 269 237 261 370 105M902 382L539 269M390 382L102 382'/%3E%3Cpath d='M-222 42L126.5 79.5 370 105 539 269 577.5 41.5 927 80 769 229 902 382 603 493 731 737M295-36L577.5 41.5M578 842L295 764M40-201L127 80M102 382L-261 269'/%3E%3C/g%3E%3Cg fill='rgba(255,255,255,0.05)'%3E%3Ccircle cx='769' cy='229' r='8'/%3E%3Ccircle cx='539' cy='269' r='8'/%3E%3Ccircle cx='603' cy='493' r='8'/%3E%3Ccircle cx='731' cy='737' r='8'/%3E%3Ccircle cx='520' cy='660' r='8'/%3E%3Ccircle cx='309' cy='538' r='8'/%3E%3Ccircle cx='295' cy='764' r='8'/%3E%3Ccircle cx='40' cy='599' r='8'/%3E%3Ccircle cx='102' cy='382' r='8'/%3E%3Ccircle cx='127' cy='80' r='8'/%3E%3Ccircle cx='370' cy='105' r='8'/%3E%3Ccircle cx='578' cy='42' r='8'/%3E%3Ccircle cx='237' cy='261' r='8'/%3E%3Ccircle cx='390' cy='382' r='8'/%3E%3C/g%3E%3C/svg%3E");
            background-size: cover;
            opacity: 0.7;
            z-index: 0;
        }
        
        .form-content {
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-color);
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            background-color: var(--light-gray);
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            background-color: white;
            box-shadow: 0 0 0 3px rgba(94, 53, 177, 0.1);
            outline: none;
        }
        
        .form-text {
            font-size: 12px;
            color: var(--dark-gray);
            margin-top: 5px;
        }
        
        .select-wrapper {
            position: relative;
        }
        
        .select-wrapper::after {
            content: '\f078';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--dark-gray);
            pointer-events: none;
        }
        
        select.form-control {
            appearance: none;
            padding-right: 30px;
        }
        
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-col {
            flex: 1;
        }
        
        .actions-bar {
            display: flex;
            justify-content: space-between;
            padding: 20px 30px;
            background-color: var(--light-gray);
            border-top: 1px solid #e0e0e0;
        }
        
        .btn {
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn i {
            font-size: 16px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            box-shadow: 0 3px 8px rgba(94, 53, 177, 0.2);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            box-shadow: 0 5px 12px rgba(94, 53, 177, 0.3);
            transform: translateY(-2px);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .btn-outline {
            background-color: transparent;
            color: var(--text-color);
            border: 1px solid #e0e0e0;
        }
        
        .btn-outline:hover {
            background-color: var(--light-gray);
            border-color: var(--dark-gray);
        }
        
        .input-icon-wrapper {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--dark-gray);
        }
        
        .input-with-icon {
            padding-left: 40px;
        }
        
        /* Estilos para validación */
        .is-invalid {
            border-color: var(--error-color);
        }
        
        .is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(239, 83, 80, 0.1);
        }
        
        .invalid-feedback {
            color: var(--error-color);
            font-size: 12px;
            margin-top: 5px;
        }
        
        /* Estilos responsivos */
        @media screen and (max-width: 768px) {
            .form-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 10px;
            }
            
            .actions-bar {
                flex-direction: column-reverse;
                gap: 15px;
            }
            
            .actions-bar .btn {
                width: 100%;
                justify-content: center;
            }
        }
        
        @media screen and (max-width: 576px) {
            .form-container {
                border-radius: 0;
                width: 100%;
            }
            
            .form-content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <div class="brand-logo">Sistema de inventario de almacén</div>
            <h1 class="form-title">Agregar Nuevo Producto</h1>
            <div class="header-decoration"></div>
        </div>
        
        <form action="{{ route('inventory.store') }}" method="POST">
            @csrf
            <div class="form-content">
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="nombre" class="form-label">Nombre del Producto*</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                   
                </div>

                <button type="submit" class="login-btn">Guardar producto</button>
            </div>
        </form>
    </div>
</body>
</html>
                
                
                