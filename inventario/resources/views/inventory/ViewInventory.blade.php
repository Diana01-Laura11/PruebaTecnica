
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
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
        
        .inventory-container {
            width: 95%;
            max-width: 1200px;
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(94, 53, 177, 0.15);
            display: flex;
            flex-direction: column;
        }
        
        .inventory-header {
            background: linear-gradient(45deg, var(--primary-dark), var(--primary-color));
            padding: 25px 30px;
            color: white;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .inventory-title {
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 1px;
            z-index: 1;
        }
        
        .brand-logo {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 2px;
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
        
        .actions-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            background-color: white;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .search-container {
            position: relative;
            width: 300px;
        }
        
        .search-input {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            background-color: var(--light-gray);
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            border-color: var(--primary-color);
            background-color: white;
            box-shadow: 0 0 0 3px rgba(94, 53, 177, 0.1);
            outline: none;
        }
        
        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--dark-gray);
            font-size: 16px;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            padding: 10px 20px;
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
        
        .inventory-content {
            padding: 20px 30px 30px;
            overflow-x: auto;
        }
        
        .inventory-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .inventory-table th,
        .inventory-table td {
            padding: 15px;
            text-align: left;
        }
        
        .inventory-table th {
            background-color: var(--light-gray);
            font-weight: 600;
            color: var(--text-color);
            border-bottom: 2px solid #e0e0e0;
            position: sticky;
            top: 0;
        }
        
        .inventory-table th:first-child {
            border-top-left-radius: 10px;
        }
        
        .inventory-table th:last-child {
            border-top-right-radius: 10px;
        }
        
        .inventory-table tbody tr {
            border-bottom: 1px solid #e0e0e0;
            transition: all 0.2s ease;
        }
        
        .inventory-table tbody tr:hover {
            background-color: rgba(177, 156, 217, 0.1);
        }
        
        .inventory-table tbody tr:last-child {
            border-bottom: none;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-disponible {
            background-color: rgba(102, 187, 106, 0.15);
            color: var(--success-color);
        }
        
        .status-bajo {
            background-color: rgba(255, 183, 77, 0.15);
            color: var(--warning-color);
        }
        
        .status-agotado {
            background-color: rgba(239, 83, 80, 0.15);
            color: var(--danger-color);
        }
        
        .actions-cell {
            white-space: nowrap;
        }
        
        .action-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background-color: var(--light-gray);
            color: var(--dark-gray);
            margin-right: 8px;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        
        .action-icon:hover {
            background-color: var(--primary-light);
            color: white;
        }
        
        .pagination {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
            gap: 5px;
        }
        
        .page-item {
            list-style: none;
        }
        
        .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background-color: var(--light-gray);
            color: var(--text-color);
            transition: all 0.2s ease;
            cursor: pointer;
            text-decoration: none;
        }
        
        .page-link:hover, .page-item.active .page-link {
            background-color: var(--primary-color);
            color: white;
        }
        
        .page-link.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        .inventory-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: var(--light-gray);
            border-top: 1px solid #e0e0e0;
            font-size: 13px;
            color: var(--dark-gray);
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }
        
        /* Responsive styles */
        @media screen and (max-width: 992px) {
            .inventory-container {
                width: 100%;
                border-radius: 15px;
            }
            
            .actions-bar {
                flex-direction: column;
                gap: 15px;
            }
            
            .search-container {
                width: 100%;
            }
        }
        
        @media screen and (max-width: 768px) {
            .inventory-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .inventory-table {
                font-size: 13px;
            }
            
            .pagination {
                justify-content: center;
            }
            
            .inventory-footer {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
            
            .user-info {
                margin: 0 auto;
            }
        }
        
        @media screen and (max-width: 576px) {
            .inventory-container {
                border-radius: 0;
            }
            
            .btn span {
                display: none;
            }
            
            .btn i {
                margin-right: 0;
            }
            
            .action-buttons {
                width: 100%;
                justify-content: space-between;
            }
            
            .btn {
                padding: 10px;
            }
            
            .inventory-content {
                padding: 15px;
            }
            
            .inventory-table th,
            .inventory-table td {
                padding: 10px 8px;
            }
        }

        .menu-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(94, 53, 177, 0.1);
        }
        
        .menu-header {
            background: linear-gradient(45deg, var(--primary-dark), var(--primary-color));
            padding: 15px 30px;
            color: white;
            position: relative;
        }
        
        .menu-title {
            font-size: 20px;
            font-weight: 600;
            letter-spacing: 1px;
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
        
        .menu-nav {
            display: flex;
            background-color: white;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .menu-item {
            flex: 1;
            text-align: center;
            padding: 15px 0;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .menu-item:hover {
            background-color: rgba(177, 156, 217, 0.1);
        }
        
        .menu-item.active {
            background-color: rgba(94, 53, 177, 0.1);
        }
        
        .menu-item.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--primary-color);
        }
        
        .menu-icon {
            font-size: 20px;
            margin-bottom: 5px;
            color: var(--primary-color);
        }
        
        .menu-text {
            font-weight: 500;
            color: var(--text-color);
        }
        
        .content-area {
            padding: 30px;
            min-height: 300px;
            background-color: white;
        }
        
        /* Responsive styles */
        @media screen and (max-width: 768px) {
            .menu-nav {
                flex-direction: column;
            }
            
            .menu-item {
                padding: 12px 0;
                border-bottom: 1px solid #eee;
            }
            
            .menu-item.active::after {
                height: 100%;
                width: 3px;
                left: auto;
                right: 0;
            }
        }
    </style>
</head>
<body>
    <div class="menu-container">
        <div class="menu-header">
            <h1 class="menu-title">Sistema de Gestión</h1>
            <div class="header-decoration"></div>
        </div>
        
        <nav class="menu-nav">
            <!-- Opción 1 -->
            <div class="menu-item active">
                <a href="{{ route('inventory.ViewInventory') }}" style="text-decoration: none; color: inherit; display: block;">
                    <div class="menu-icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="menu-text">Inventario</div>
                </a>
            </div>
            @if(Auth::user()->idRol == 2) 
            <!-- Opción 2 -->
            <div class="menu-item">
                <a href="{{ route('inventory.ViewDepartures') }}" style="text-decoration: none; color: inherit; display: block;">
                    <div class="menu-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="menu-text">Salidas</div>
                </a>
            </div>
            @endif

            @if(Auth::user()->idRol == 1) 
            <!-- Opción 3 -->
             
            <div class="menu-item">
                <a href="{{ route('inventory.ViewHistory') }}" style="text-decoration: none; color: inherit; display: block;">
                    <div class="menu-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="menu-text">Historico</div>
                </a>
            </div>
            @endif
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="background: none; border: none; cursor: pointer; color: var(--danger-color);">
                    <div class="menu-icon">
                        <i class="fas fa-power-off"></i>
                    </div>
                    <div class="menu-text">Cerrar sesión</div>
                </button>
            </form>
        </nav>
        
        <div class="content-area">
            
        
            <div class="inventory-container">
                <div class="inventory-header">
                    <div class="brand-logo">Sistema de inventario de almacén</div>
                    <h1 class="inventory-title">Módulo para ver el inventario de la empresa</h1>
                    <div class="header-decoration"></div>
                </div>
                

                @if(Auth::user()->idRol == 1) 
                <div class="actions-bar">
                    
                    <div class="action-buttons">
                        <a href="{{ route('inventory.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            <span>Nuevo Producto</span>
                        </a>
                    </div>
                    
                </div>
                @endif
                
                <div class="inventory-content">
                    <table class="inventory-table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Stock</th>
                                <th>Estado</th>
                                @if(Auth::user()->idRol == 1) 
                                <th>Modificar estado</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                            <tr>
                                <td>{{ $producto->nombre }}</td>
                                
                                <td>
                                    {{ $producto->cantidad }}
                                    @if(Auth::user()->idRol == 1) 
                                    <a href="{{ route('inventory.update', $producto->idProducto) }}" class="action-icon">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    @endif
                                </td>
                                
                                
                                <td>{{ $producto->estatus }}</td>
                                @if(Auth::user()->idRol == 1) 
                                <td class="actions-cell">
                                    
                                    <a href="#" class="action-icon" onclick="event.preventDefault(); 
                                      
                                        document.getElementById('delete-form-{{ $producto->idProducto }}').submit();">
                                        @if($producto->estatus == 1)
                                            <i class="fas fa-toggle-on" title="Desactivar"></i>
                                        @else
                                            <i class="fas fa-toggle-off" title="Activar"></i>
                                        @endif
                                    </a>
                                    <form id="delete-form-{{ $producto->idProducto }}" action="{{ route('inventory.destroy', $producto->idProducto) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    @if($productos->count() == 0)
                    <div style="text-align: center; padding: 30px 0; color: var(--dark-gray);">
                        <i class="fas fa-box-open" style="font-size: 48px; margin-bottom: 15px; opacity: 0.3;"></i>
                        <p>No hay productos disponibles en el inventario</p>
                    </div>
                    @endif
                    
                    
                </div>
                
                <div class="inventory-footer">
                    <div class="user-info">
                        <div class="user-avatar">
                            {{ substr(Auth::user()->nombre, 0, 1) }}
                        </div>
                        <span>{{ Auth::user()->nombre  }}</span>
                    </div>
                    <div>
                        Total de productos: {{ $totalProductos }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>