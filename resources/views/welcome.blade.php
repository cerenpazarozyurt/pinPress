<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PinPress - Emotional Map Journal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #fff7ed 0%, #fdf2f8 50%, #eff6ff 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            overflow-x: hidden;
        }

        /* Background decorative elements */
        .bg-decorative {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
            pointer-events: none;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.2;
            animation: pulse 3s ease-in-out infinite;
        }

        .circle-1 {
            top: 80px;
            left: 80px;
            width: 128px;
            height: 128px;
            background: linear-gradient(135deg, #fed7aa, #fbb6ce);
            animation-delay: 0s;
        }

        .circle-2 {
            top: 160px;
            right: 128px;
            width: 96px;
            height: 96px;
            background: linear-gradient(135deg, #bfdbfe, #99f6e4);
            animation-delay: 1s;
        }

        .circle-3 {
            bottom: 128px;
            left: 128px;
            width: 112px;
            height: 112px;
            background: linear-gradient(135deg, #fde68a, #fed7aa);
            animation-delay: 2s;
        }

        .circle-4 {
            bottom: 80px;
            right: 80px;
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #fbb6ce, #ddd6fe);
            animation-delay: 3s;
        }

        @keyframes pulse {
            0%, 100% { 
                opacity: 0.2; 
                transform: scale(1);
            }
            50% { 
                opacity: 0.4; 
                transform: scale(1.05);
            }
        }

        /* Main container */
        .main-container {
            position: relative;
            z-index: 10;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .content-wrapper {
            width: 100%;
            max-width: 600px;
        }

        /* Brand header */
        .brand-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .brand-icon-container {
            position: relative;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .brand-icon-main {
            font-size: 48px;
            color: #f97316;
            margin-right: 8px;
        }

        .brand-icon-heart {
            font-size: 24px;
            color: #ec4899;
            position: absolute;
            top: -4px;
            right: -4px;
        }

        .brand-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 0.5rem;
            line-height: 1.1;
        }

        .brand-subtitle {
            font-size: 1.125rem;
            font-weight: 600;
            color: #64748b;
            margin-bottom: 0.5rem;
        }

        .brand-description {
            font-size: 0.875rem;
            color: #94a3b8;
            margin-top: 0.5rem;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Map illustration */
        .map-illustration {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .map-container {
            position: relative;
            width: 320px;
            height: 240px;
            background: linear-gradient(135deg, #dbeafe, #99f6e4);
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            transform: rotate(1deg);
            border: 4px solid white;
            overflow: hidden;
        }

        .map-background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #f0f9ff, #dbeafe);
        }

        /* Landmasses */
        .landmass {
            position: absolute;
            background: #bbf7d0;
            border-radius: 8px;
            opacity: 0.8;
        }

        .landmass-1 {
            top: 12px;
            left: 24px;
            width: 80px;
            height: 60px;
            transform: rotate(12deg);
            border-radius: 16px;
        }

        .landmass-2 {
            top: 32px;
            right: 32px;
            width: 60px;
            height: 40px;
            transform: rotate(-6deg);
            border-radius: 12px;
        }

        .landmass-3 {
            bottom: 24px;
            left: 12px;
            width: 100px;
            height: 50px;
            transform: rotate(3deg);
            border-radius: 20px;
        }

        .landmass-4 {
            bottom: 12px;
            right: 24px;
            width: 70px;
            height: 30px;
            transform: rotate(-12deg);
            border-radius: 16px;
        }

        /* Rivers */
        .river {
            position: absolute;
            height: 6px;
            background: #7dd3fc;
            border-radius: 3px;
            opacity: 0.6;
        }

        .river-1 {
            top: 48px;
            left: 48px;
            width: 120px;
            transform: rotate(45deg);
        }

        .river-2 {
            bottom: 48px;
            right: 48px;
            width: 80px;
            transform: rotate(-30deg);
        }

        /* Roads */
        .road {
            position: absolute;
            height: 3px;
            background: #d1d5db;
            opacity: 0.4;
            width: 100%;
        }

        .road-1 {
            top: 72px;
            transform: rotate(12deg);
        }

        .road-2 {
            top: 120px;
            transform: rotate(-6deg);
        }

        /* Memory pins */
        .memory-pin {
            position: absolute;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
            transition: transform 0.2s ease;
            cursor: pointer;
            border: 3px solid white;
        }

        .memory-pin:hover {
            transform: scale(1.15);
        }

        .memory-pin i {
            font-size: 14px;
            color: white;
        }

        .pin-red {
            top: 24px;
            left: 36px;
            background: #ef4444;
        }

        .pin-orange {
            top: 48px;
            right: 48px;
            background: #f97316;
        }

        .pin-yellow {
            bottom: 48px;
            left: 48px;
            background: #eab308;
        }

        .pin-blue {
            bottom: 36px;
            right: 36px;
            background: #2563eb;
        }

        .pin-pink {
            bottom: 72px;
            right: 72px;
            background: #ec4899;
        }

        /* Map grid */
        .map-grid {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.15;
        }

        .grid-line-v {
            position: absolute;
            width: 1px;
            height: 100%;
            background: #9ca3af;
        }

        .grid-line-h {
            position: absolute;
            width: 100%;
            height: 1px;
            background: #9ca3af;
        }

        /* Action card */
        .action-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 2rem;
            margin-bottom: 1.5rem;
        }

        /* Stats panel */
        .stats-panel {
            display: flex;
            justify-content: space-around;
            text-align: center;
            margin-bottom: 2rem;
        }

        .stat-item {
            flex: 1;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #f97316;
            display: block;
        }

        .stat-label {
            font-size: 0.875rem;
            color: #64748b;
            font-weight: 600;
        }

        /* Action buttons */
        .action-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-custom {
            flex: 1;
            padding: 16px 24px;
            font-size: 1.125rem;
            font-weight: 600;
            border-radius: 12px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            min-width: 200px;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #f97316, #ec4899);
            color: white;
            border: none;
            box-shadow: 0 10px 25px rgba(249, 115, 22, 0.3);
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #ea580c, #db2777);
            box-shadow: 0 15px 35px rgba(249, 115, 22, 0.4);
            transform: translateY(-2px);
            color: white;
        }

        .btn-secondary-custom {
            background: rgba(255, 255, 255, 0.9);
            color: #1e293b;
            border: 2px solid #e2e8f0;
            backdrop-filter: blur(10px);
        }

        .btn-secondary-custom:hover {
            background: white;
            border-color: #f97316;
            color: #f97316;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        /* Button animation */
        .btn-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-custom:hover::before {
            left: 100%;
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            animation: fadeIn 0.3s ease;
        }

        .modal-overlay.show {
            display: flex;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { 
                opacity: 0;
                transform: translateY(-30px) scale(0.95);
            }
            to { 
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .login-modal {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 2.5rem;
            width: 100%;
            max-width: 450px;
            position: relative;
            animation: slideIn 0.4s ease;
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 24px;
            color: #94a3b8;
            cursor: pointer;
            transition: all 0.2s ease;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-close:hover {
            background: #f1f5f9;
            color: #64748b;
            transform: rotate(90deg);
        }

        .modal-header {
            text-align: center;
            margin-bottom: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .modal-icon-container {
            position: relative;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .modal-icon-main {
            font-size: 36px;
            color: #f97316;
            margin-right: 6px;
        }

        .modal-icon-heart {
            font-size: 18px;
            color: #ec4899;
            position: absolute;
            top: -2px;
            right: -2px;
        }

        .modal-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .modal-subtitle {
            font-size: 1rem;
            color: #64748b;
            font-weight: 600;
        }

        /* Form tabs */
        .form-tabs {
            display: flex;
            margin-bottom: 1.5rem;
            border-radius: 12px;
            overflow: hidden;
            background: #f8fafc;
        }

        .tab-button {
            flex: 1;
            padding: 12px 16px;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
            cursor: pointer;
            background: transparent;
            color: #64748b;
        }

        .tab-button.active {
            background: #1e293b;
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .tab-button:not(.active):hover {
            background: #f1f5f9;
        }

        /* Form styles */
        .form-group {
            position: relative;
            margin-bottom: 1rem;
        }

        .form-control {
            padding: 16px 16px 16px 48px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #f8fafc;
            transition: all 0.3s ease;
            font-size: 16px;
            width: 100%;
        }

        .form-control:focus {
            outline: none;
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
            background: white;
        }

        .form-control:hover {
            background: white;
            border-color: #cbd5e1;
        }

        .form-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 18px;
            z-index: 2;
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #f97316, #ec4899);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 18px;
            box-shadow: 0 10px 25px rgba(249, 115, 22, 0.3);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #ea580c, #db2777);
            box-shadow: 0 15px 35px rgba(249, 115, 22, 0.4);
            transform: translateY(-2px);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        /* Form check styles */
        .form-check-input:checked {
            background-color: #f97316;
            border-color: #f97316;
        }

        .form-check-input:focus {
            box-shadow: 0 0 0 0.25rem rgba(249, 115, 22, 0.25);
        }

        .form-check-label {
            color: #64748b;
            font-size: 14px;
        }

        /* Links */
        .link-orange {
            color: #f97316;
            text-decoration: none;
            font-weight: 600;
        }

        .link-orange:hover {
            color: #ea580c;
            text-decoration: none;
        }

        .btn-link {
            border: none;
            background: none;
            padding: 0;
            font-size: inherit;
            cursor: pointer;
        }

        /* Toggle text */
        .toggle-text {
            text-align: center;
            margin-top: 1.5rem;
            color: #64748b;
        }

        /* Copyright */
        .copyright {
            text-align: center;
            margin-top: 1.5rem;
            color: #94a3b8;
            font-size: 0.875rem;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .brand-title {
                font-size: 2rem;
            }
            
            .action-card {
                margin: 10px;
                padding: 1.5rem;
            }
            
            .map-container {
                width: 280px;
                height: 210px;
            }
            
            .floating-circle {
                display: none;
            }

            .main-container {
                padding: 10px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-custom {
                min-width: auto;
            }

            .stats-panel {
                flex-direction: column;
                gap: 1rem;
            }

            .login-modal {
                margin: 10px;
                padding: 2rem;
            }
        }

        @media (max-width: 576px) {
            .map-container {
                width: 240px;
                height: 180px;
            }

            .circle-1, .circle-2 {
                width: 80px;
                height: 80px;
            }
            
            .circle-3, .circle-4 {
                width: 60px;
                height: 60px;
            }

            .login-modal {
                padding: 1.5rem;
            }

            .modal-title {
                font-size: 1.5rem;
            }
        }

        /* Additional animations */
        .memory-pin {
            animation: pinPulse 2s ease-in-out infinite;
        }

        .memory-pin:nth-child(1) { animation-delay: 0s; }
        .memory-pin:nth-child(2) { animation-delay: 0.4s; }
        .memory-pin:nth-child(3) { animation-delay: 0.8s; }
        .memory-pin:nth-child(4) { animation-delay: 1.2s; }
        .memory-pin:nth-child(5) { animation-delay: 1.6s; }

        @keyframes pinPulse {
            0%, 100% { 
                transform: scale(1);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
            }
            50% { 
                transform: scale(1.05);
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.35);
            }
        }

        /* Map container hover effect */
        .map-container:hover {
            transform: rotate(0deg) scale(1.02);
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body>
    <!-- Background decorative elements -->
    <div class="bg-decorative">
        <div class="floating-circle circle-1"></div>
        <div class="floating-circle circle-2"></div>
        <div class="floating-circle circle-3"></div>
        <div class="floating-circle circle-4"></div>
    </div>

    <div class="main-container">
        <div class="content-wrapper">
            <!-- Header -->
            <div class="brand-header">
                <div class="brand-icon-container">
                    <i class="fas fa-map-marker-alt brand-icon-main"></i>
                    <i class="fas fa-heart brand-icon-heart"></i>
                </div>
                <h1 class="brand-title">PINPRESS</h1>
                <p class="brand-subtitle">Emotional Map Journal</p>
                <p class="brand-description">
                    Add memory spots to the map and share your travel memories with others or save them for yourself.
                </p>
            </div>

            <!-- Map illustration -->
            <div class="map-illustration">
                <div class="map-container">
                    <div class="map-background">
                        <!-- Landmasses -->
                        <div class="landmass landmass-1"></div>
                        <div class="landmass landmass-2"></div>
                        <div class="landmass landmass-3"></div>
                        <div class="landmass landmass-4"></div>
                        
                        <!-- Rivers/waterways -->
                        <div class="river river-1"></div>
                        <div class="river river-2"></div>
                        
                        <!-- Roads/paths -->
                        <div class="road road-1"></div>
                        <div class="road road-2"></div>
                    </div>
                    
                    <!-- Location pins with hearts -->
                    <div class="memory-pin pin-red" title="İstanbul Hatırası">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="memory-pin pin-orange" title="İzmir Rüzgarı">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="memory-pin pin-yellow" title="Antalya Günü">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="memory-pin pin-blue" title="Kapadokya Balonu">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="memory-pin pin-pink" title="Bodrum Akşamı">
                        <i class="fas fa-heart"></i>
                    </div>
                    
                    <!-- Map grid lines -->
                    <div class="map-grid">
                        <div class="grid-line-v" style="left: 25%;"></div>
                        <div class="grid-line-v" style="left: 50%;"></div>
                        <div class="grid-line-v" style="left: 75%;"></div>
                        <div class="grid-line-h" style="top: 25%;"></div>
                        <div class="grid-line-h" style="top: 50%;"></div>
                        <div class="grid-line-h" style="top: 75%;"></div>
                    </div>
                </div>
            </div>

            <!-- Action Card -->
            <div class="action-card">
                <!-- Action Buttons -->
                <div class="action-buttons">
                    <button id="addMemoryBtn" class="btn btn-custom btn-primary-custom">
                        <i class="fas fa-plus me-2"></i>Add Memory
                    </button>
                    <a href="{{ route('view-map') }}" class="btn btn-custom btn-secondary-custom">
                        <i class="fas fa-eye me-2"></i>View All Memories
                    </a>
                </div>
            </div>

            <div class="copyright">
                <p>© 2024 PinPress. Tüm hakları saklıdır.</p>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="modal-overlay">
        <div class="login-modal">
            <button class="modal-close" id="closeModal">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="modal-header">
                <div class="modal-icon-container">
                    <i class="fas fa-map-marker-alt modal-icon-main"></i>
                    <i class="fas fa-heart modal-icon-heart"></i>
                </div>
                <h2 class="modal-title">PinPress'e Hoş Geldiniz</h2>
                <p class="modal-subtitle">Anılarınızı paylaşmak için giriş yapın</p>
            </div>

            <div class="form-tabs">
                <button type="button" id="loginTab" onclick="showLogin()" class="tab-button active">
                    Giriş Yap
                </button>
                <button type="button" id="registerTab" onclick="showRegister()" class="tab-button">
                    Kayıt Ol
                </button>
            </div>

            <!-- Login Form -->
            <form id="loginForm" action="{{ route('login') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <i class="fas fa-envelope form-icon"></i>
                    <input type="email" name="email" class="form-control" 
                           placeholder="E-posta" value="{{ old('email') }}" required>
                </div>
                
                <div class="form-group">
                    <i class="fas fa-lock form-icon"></i>
                    <input type="password" name="password" class="form-control" 
                           placeholder="Şifre" required>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">
                            Beni hatırla
                        </label>
                    </div>
                    <a href="{{ route('password.request') }}" class="link-orange" style="font-size: 14px;">
                        Şifremi unuttum
                    </a>
                </div>

                <button type="submit" class="submit-btn">
                    Giriş Yap
                </button>
            </form>

            <!-- Register Form -->
            <form id="registerForm" action="{{ route('register') }}" method="POST" style="display: none;">
                @csrf
                
                <div class="form-group">
                    <i class="fas fa-user form-icon"></i>
                    <input type="text" name="name" class="form-control" 
                           placeholder="Ad Soyad" value="{{ old('name') }}" required>
                </div>
                
                <div class="form-group">
                    <i class="fas fa-envelope form-icon"></i>
                    <input type="email" name="email" class="form-control" 
                           placeholder="E-posta" value="{{ old('email') }}" required>
                </div>
                
                <div class="form-group">
                    <i class="fas fa-lock form-icon"></i>
                    <input type="password" name="password" class="form-control" 
                           placeholder="Şifre" required>
                </div>

                <div class="form-group">
                    <i class="fas fa-lock form-icon"></i>
                    <input type="password" name="password_confirmation" class="form-control" 
                           placeholder="Şifre Tekrar" required>
                </div>

                <button type="submit" class="submit-btn">
                    Kayıt Ol
                </button>
            </form>

            <!-- Toggle Links -->
            <div id="loginToggle" class="toggle-text">
                <p>
                    Hesabınız yok mu? 
                    <button type="button" onclick="showRegister()" class="link-orange btn-link">
                        Kayıt olun
                    </button>
                </p>
            </div>

            <div id="registerToggle" class="toggle-text" style="display: none;">
                <p>
                    Zaten hesabınız var mı? 
                    <button type="button" onclick="showLogin()" class="link-orange btn-link">
                        Giriş yapın
                    </button>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Modal functionality
        const addMemoryBtn = document.getElementById('addMemoryBtn');
        const loginModal = document.getElementById('loginModal');
        const closeModal = document.getElementById('closeModal');

        // Open modal
        addMemoryBtn.addEventListener('click', function(e) {
            e.preventDefault();
            loginModal.classList.add('show');
            document.body.style.overflow = 'hidden';
        });

        // Close modal
        closeModal.addEventListener('click', function() {
            loginModal.classList.remove('show');
            document.body.style.overflow = 'auto';
        });

        // Close modal when clicking outside
        loginModal.addEventListener('click', function(e) {
            if (e.target === loginModal) {
                loginModal.classList.remove('show');
                document.body.style.overflow = 'auto';
            }
        });

        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && loginModal.classList.contains('show')) {
                loginModal.classList.remove('show');
                document.body.style.overflow = 'auto';
            }
        });

        // Tab functionality
        function showLogin() {
            // Update tabs
            document.getElementById('loginTab').classList.add('active');
            document.getElementById('registerTab').classList.remove('active');
            
            // Show/hide forms
            document.getElementById('loginForm').style.display = 'block';
            document.getElementById('registerForm').style.display = 'none';
            
            // Show/hide toggle links
            document.getElementById('loginToggle').style.display = 'block';
            document.getElementById('registerToggle').style.display = 'none';
        }

        function showRegister() {
            // Update tabs
            document.getElementById('registerTab').classList.add('active');
            document.getElementById('loginTab').classList.remove('active');
            
            // Show/hide forms
            document.getElementById('registerForm').style.display = 'block';
            document.getElementById('loginForm').style.display = 'none';
            
            // Show/hide toggle links
            document.getElementById('registerToggle').style.display = 'block';
            document.getElementById('loginToggle').style.display = 'none';
        }

        // Memory pin click events
        document.querySelectorAll('.memory-pin').forEach(pin => {
            pin.addEventListener('click', function() {
                const title = this.getAttribute('title');
                alert(`${title} - Bu anıyı görüntülemek için tıkladınız!`);
            });
        });

        // Add entrance animation
        document.addEventListener('DOMContentLoaded', function() {
            const mapContainer = document.querySelector('.map-container');
            const actionCard = document.querySelector('.action-card');
            
            // Initial state
            mapContainer.style.opacity = '0';
            mapContainer.style.transform = 'translateY(30px) rotate(1deg)';
            actionCard.style.opacity = '0';
            actionCard.style.transform = 'translateY(30px)';
            
            // Animate in
            setTimeout(() => {
                mapContainer.style.transition = 'all 0.6s ease';
                mapContainer.style.opacity = '1';
                mapContainer.style.transform = 'translateY(0) rotate(1deg)';
            }, 200);
            
            setTimeout(() => {
                actionCard.style.transition = 'all 0.6s ease';
                actionCard.style.opacity = '1';
                actionCard.style.transform = 'translateY(0)';
            }, 400);
        });

        // Add interactive hover effects for stats
        document.querySelectorAll('.stat-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
                this.style.transition = 'transform 0.2s ease';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Add form validation feedback
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    this.style.borderColor = '#ef4444';
                } else {
                    this.style.borderColor = '#e2e8f0';
                }
            });

            input.addEventListener('focus', function() {
                this.style.borderColor = '#f97316';
            });
        });

        // Add smooth transitions for forms
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.style.transition = 'all 0.3s ease';
            });

            const toggles = document.querySelectorAll('.toggle-text');
            toggles.forEach(toggle => {
                toggle.style.transition = 'all 0.3s ease';
            });
        });
    </script>
</body>
</html>