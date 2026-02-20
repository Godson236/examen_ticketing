<!DOCTYPE html>
<html lang="fr" translate="no">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google" content="notranslate">
    
    <title>Connexion · HelpDesk Pro 3D</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Scripts Laravel -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background: #0a0a0f;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            perspective: 2000px;
        }

        /* Fond cyber dynamique */
        .cyber-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .cyber-grid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(0, 255, 200, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 255, 200, 0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            animation: gridMove 20s linear infinite;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(40px, 40px); }
        }

        .cyber-gradient {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 30% 50%, rgba(0, 255, 200, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 70% 50%, rgba(0, 100, 255, 0.1) 0%, transparent 50%);
        }

        /* Particules flottantes */
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: cyan;
            border-radius: 50%;
            box-shadow: 0 0 20px cyan;
            opacity: 0.3;
            animation: floatParticle 10s infinite linear;
        }

        @keyframes floatParticle {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 0.3; }
            90% { opacity: 0.3; }
            100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
        }

        /* Cube 3D animé */
        .login-cube {
            position: absolute;
            top: 20%;
            right: 10%;
            width: 300px;
            height: 300px;
            transform-style: preserve-3d;
            animation: rotateCube 20s infinite linear;
            opacity: 0.3;
            z-index: 1;
        }

        .cube-face {
            position: absolute;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, rgba(0, 255, 200, 0.1), rgba(0, 100, 255, 0.1));
            border: 2px solid rgba(0, 255, 200, 0.2);
            backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: cyan;
            text-shadow: 0 0 20px cyan;
        }

        .front  { transform: translateZ(150px); }
        .back   { transform: rotateY(180deg) translateZ(150px); }
        .right  { transform: rotateY(90deg) translateZ(150px); }
        .left   { transform: rotateY(-90deg) translateZ(150px); }
        .top    { transform: rotateX(90deg) translateZ(150px); }
        .bottom { transform: rotateX(-90deg) translateZ(150px); }

        @keyframes rotateCube {
            0% { transform: rotateX(0) rotateY(0); }
            100% { transform: rotateX(360deg) rotateY(360deg); }
        }

        /* Carte de connexion 3D */
        .login-card {
            position: relative;
            width: 450px;
            margin: 0 auto;
            transform-style: preserve-3d;
            transform: perspective(2000px) rotateY(-5deg) rotateX(2deg);
            transition: transform 0.5s ease;
            z-index: 10;
        }

        .login-card:hover {
            transform: perspective(2000px) rotateY(-2deg) rotateX(1deg) translateZ(50px);
        }

        .login-card-inner {
            background: rgba(20, 30, 50, 0.4);
            backdrop-filter: blur(20px);
            border-radius: 40px;
            padding: 50px 40px;
            border: 1px solid rgba(0, 255, 200, 0.2);
            box-shadow: 
                0 50px 70px -20px rgba(0, 0, 0, 0.5),
                0 0 0 1px rgba(0, 255, 200, 0.1) inset,
                0 0 50px rgba(0, 255, 200, 0.2);
            position: relative;
            overflow: hidden;
        }

        .login-card-inner::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(
                from 0deg,
                transparent 0deg,
                cyan 90deg,
                transparent 180deg,
                blue 270deg,
                transparent 360deg
            );
            animation: rotate 10s linear infinite;
            opacity: 0.1;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Logo 3D */
        .logo-3d {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
            transform-style: preserve-3d;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            position: relative;
            transform-style: preserve-3d;
            animation: floatIcon 3s ease-in-out infinite;
        }

        .logo-icon .front {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, cyan, blue);
            border-radius: 20px;
            transform: translateZ(20px);
            box-shadow: 0 0 30px cyan;
        }

        .logo-icon .back {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, blue, purple);
            border-radius: 20px;
            transform: translateZ(-10px);
            opacity: 0.5;
        }

        @keyframes floatIcon {
            0%, 100% { transform: translateY(0) rotateX(0); }
            50% { transform: translateY(-10px) rotateX(5deg); }
        }

        .logo-text {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, cyan, blue);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 30px rgba(0, 255, 200, 0.3);
        }

        /* Titre */
        .login-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-title h2 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #fff, cyan);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .login-title p {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.95rem;
        }

        /* Champs de formulaire cyber */
        .input-group {
            margin-bottom: 25px;
            position: relative;
            transform-style: preserve-3d;
        }

        .input-label {
            display: block;
            margin-bottom: 10px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .input-label i {
            color: cyan;
            margin-right: 8px;
            width: 20px;
        }

        .input-field {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(0, 255, 200, 0.2);
            border-radius: 20px;
            padding: 16px 20px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s;
            backdrop-filter: blur(5px);
        }

        .input-field:focus {
            outline: none;
            border-color: cyan;
            box-shadow: 0 0 30px rgba(0, 255, 200, 0.3);
            transform: translateZ(10px);
            background: rgba(255, 255, 255, 0.05);
        }

        .input-field::placeholder {
            color: rgba(255, 255, 255, 0.2);
        }

        /* Options de connexion */
        .login-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .remember-me input {
            width: 18px;
            height: 18px;
            accent-color: cyan;
        }

        .forgot-password {
            color: cyan;
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
        }

        .forgot-password::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: cyan;
            transition: width 0.3s;
        }

        .forgot-password:hover::after {
            width: 100%;
        }

        /* Bouton de connexion */
        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, cyan, blue);
            border: none;
            border-radius: 30px;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            letter-spacing: 1px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
            box-shadow: 0 0 30px rgba(0, 255, 200, 0.3);
            margin-bottom: 20px;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 0 50px rgba(0, 255, 200, 0.5);
        }

        /* Lien d'inscription */
        .register-link {
            text-align: center;
            color: rgba(255, 255, 255, 0.5);
        }

        .register-link a {
            color: cyan;
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
            position: relative;
        }

        .register-link a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: cyan;
            transition: width 0.3s;
        }

        .register-link a:hover::after {
            width: 100%;
        }

        /* Messages d'erreur */
        .error-message {
            background: rgba(255, 0, 0, 0.1);
            border: 1px solid rgba(255, 0, 0, 0.3);
            border-radius: 15px;
            padding: 12px;
            margin-bottom: 20px;
            color: #ff6b6b;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
            backdrop-filter: blur(5px);
        }

        .error-message i {
            color: #ff6b6b;
        }

        /* Lignes cyber */
        .cyber-line {
            position: absolute;
            background: cyan;
            opacity: 0.1;
        }

        .cyber-line-1 {
            top: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, transparent, cyan, transparent);
            animation: scanLine 4s linear infinite;
        }

        @keyframes scanLine {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .cyber-line-2 {
            bottom: 0;
            right: 0;
            width: 1px;
            height: 100%;
            background: linear-gradient(180deg, transparent, cyan, transparent);
            animation: scanLineVertical 4s linear infinite;
        }

        @keyframes scanLineVertical {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(100%); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-card {
                width: 90%;
                margin: 20px;
            }
            
            .login-cube {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Fond cyber -->
    <div class="cyber-bg">
        <div class="cyber-grid"></div>
        <div class="cyber-gradient"></div>
    </div>

    <!-- Particules -->
    @for($i = 0; $i < 50; $i++)
        <div class="particle" style="left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 5) }}s; animation-duration: {{ rand(5, 15) }}s;"></div>
    @endfor

    <!-- Cube 3D -->
    <div class="login-cube">
        <div class="cube-face front"><i class="fas fa-lock"></i></div>
        <div class="cube-face back"><i class="fas fa-shield"></i></div>
        <div class="cube-face right"><i class="fas fa-key"></i></div>
        <div class="cube-face left"><i class="fas fa-user"></i></div>
        <div class="cube-face top"><i class="fas fa-cube"></i></div>
        <div class="cube-face bottom"><i class="fas fa-robot"></i></div>
    </div>

    <!-- Carte de connexion -->
    <div class="login-card">
        <div class="login-card-inner">
            <!-- Lignes cyber -->
            <div class="cyber-line-1"></div>
            <div class="cyber-line-2"></div>

            <!-- Logo -->
            <div class="logo-3d">
                <div class="logo-icon">
                    <div class="front"></div>
                    <div class="back"></div>
                    <i class="fas fa-ticket-alt" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) translateZ(30px); color: white; font-size: 1.5rem;"></i>
                </div>
                <span class="logo-text">HELPDESK PRO</span>
            </div>

            <!-- Titre -->
            <div class="login-title">
                <h2>ACCÈS 3D</h2>
                <p>Connectez-vous à votre espace holographique</p>
            </div>

            <!-- Messages d'erreur (si nécessaire) -->
            @if($errors->any())
                <div class="error-message">
                    <i class="fas fa-exclamation-triangle"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Formulaire de connexion -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="input-group">
                    <label class="input-label">
                        <i class="fas fa-envelope"></i>
                        IDENTIFIANT HOLOGRAPHIQUE
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}" class="input-field" placeholder="votre@email.com" required autofocus>
                </div>

                <!-- Mot de passe -->
                <div class="input-group">
                    <label class="input-label">
                        <i class="fas fa-lock"></i>
                        CLÉ DE SÉCURITÉ
                    </label>
                    <input type="password" name="password" class="input-field" placeholder="••••••••" required>
                </div>

                <!-- Options -->
                <div class="login-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Mémoriser mon avatar</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">
                            Clé perdue ?
                        </a>
                    @endif
                </div>

                <!-- Bouton de connexion -->
                <button type="submit" class="btn-login">
                    <i class="fas fa-cube"></i>
                    ACCÉDER À LA 3D
                </button>

                <!-- Lien d'inscription -->
                @if (Route::has('register'))
                    <div class="register-link">
                        Pas encore d'avatar ?
                        <a href="{{ route('register') }}">
                            Créer un compte 3D
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <!-- RONALDO 3D HOLOGRAM - VERSION SIUUU QUI MARCHE -->
    <div style="
        position: absolute;
        right: 3%;
        bottom: 5%;
        width: 380px;
        height: 480px;
        transform-style: preserve-3d;
        animation: hologramFloat 6s ease-in-out infinite;
        z-index: 20;
    ">
        <!-- Cadre holographique -->
        <div style="
            width: 100%;
            height: 100%;
            position: relative;
            transform: perspective(1000px) rotateY(-15deg) rotateX(5deg);
        ">
            <!-- Image principale Ronaldo (GIF qui marche) -->
            <div style="
                position: absolute;
                inset: 0;
                background: url('https://media1.tenor.com/m/-gJC5dHwrCsAAAAC/ronaldo-cr7.gif') center/cover;
                border-radius: 40px;
                border: 4px solid cyan;
                box-shadow: 
                    0 0 50px cyan,
                    0 0 100px rgba(0,255,255,0.3);
                transform: translateZ(30px);
                filter: brightness(1.1) contrast(1.1);
                z-index: 2;
            "></div>
            
            <!-- Effet de profondeur calque 1 -->
            <div style="
                position: absolute;
                inset: 8px;
                background: url('https://media1.tenor.com/m/-gJC5dHwrCsAAAAC/ronaldo-cr7.gif') center/cover;
                border-radius: 35px;
                border: 2px solid rgba(0,255,255,0.6);
                transform: translateZ(20px);
                opacity: 0.5;
                filter: blur(1px);
                z-index: 1;
            "></div>
            
            <!-- Effet de profondeur calque 2 -->
            <div style="
                position: absolute;
                inset: 16px;
                background: url('https://media1.tenor.com/m/-gJC5dHwrCsAAAAC/ronaldo-cr7.gif') center/cover;
                border-radius: 30px;
                border: 1px solid rgba(255,255,255,0.3);
                transform: translateZ(10px);
                opacity: 0.3;
                filter: blur(2px);
                z-index: 0;
            "></div>
            
            <!-- Effet de scan lumineux -->
            <div style="
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(180deg, 
                    transparent 0%, 
                    rgba(0,255,255,0.2) 50%, 
                    transparent 100%);
                opacity: 0.4;
                animation: scanEffect 3s linear infinite;
                border-radius: 40px;
                pointer-events: none;
                z-index: 3;
            "></div>
            
            <!-- Texte SIUUU avec effet 3D -->
            <div style="
                position: absolute;
                top: -30px;
                right: -30px;
                background: linear-gradient(135deg, cyan, blue);
                color: white;
                padding: 18px 28px;
                border-radius: 60px;
                font-weight: bold;
                font-size: 1.4rem;
                transform: translateZ(60px);
                box-shadow: 0 0 40px cyan;
                animation: siuuPulse 1s infinite;
                border: 2px solid white;
                z-index: 10;
            ">
                🦅 SIUUUU! 🦅
            </div>
            
            <!-- Effet de particules autour -->
            <div style="
                position: absolute;
                top: -20px;
                left: -20px;
                right: -20px;
                bottom: -20px;
                background: radial-gradient(circle at 30% 30%, cyan 0%, transparent 70%);
                opacity: 0.2;
                animation: particlePulse 3s infinite;
                border-radius: 50%;
                z-index: 0;
            "></div>
        </div>
    </div>

    <style>
    @keyframes hologramFloat {
        0%, 100% { 
            transform: translateY(0) rotateY(0) translateZ(0); 
        }
        25% { 
            transform: translateY(-20px) rotateY(5deg) translateZ(20px); 
        }
        50% { 
            transform: translateY(-30px) rotateY(-5deg) translateZ(30px); 
        }
        75% { 
            transform: translateY(-15px) rotateY(5deg) translateZ(15px); 
        }
    }
    @keyframes scanEffect {
        0% { 
            transform: translateY(-100%) rotate(0deg); 
        }
        100% { 
            transform: translateY(300%) rotate(360deg); 
        }
    }
    @keyframes siuuPulse {
        0%, 100% { 
            transform: translateZ(60px) scale(1);
            box-shadow: 0 0 40px cyan;
        }
        50% { 
            transform: translateZ(60px) scale(1.2);
            box-shadow: 0 0 80px cyan, 0 0 120px blue;
        }
    }
    @keyframes particlePulse {
        0%, 100% { 
            opacity: 0.2;
            transform: scale(1);
        }
        50% { 
            opacity: 0.4;
            transform: scale(1.2);
        }
    }
    </style>
</body>
</html>