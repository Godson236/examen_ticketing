<!DOCTYPE html>
<html lang="fr" translate="no">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google" content="notranslate">
    
    <title>HelpDesk Pro · Solution de Ticketing Professionnelle</title>
    <meta name="description" content="Solution complète de gestion de tickets support pour entreprises">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    
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
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            color: #111827;
            line-height: 1.5;
            overflow-x: hidden;
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #f0f0f0;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: #2563eb;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: #111827;
        }

        .logo-text span {
            color: #2563eb;
        }

        .nav-links {
            display: flex;
            gap: 32px;
        }

        .nav-links a {
            color: #4b5563;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: #2563eb;
        }

        .nav-buttons {
            display: flex;
            gap: 16px;
        }

        .btn-login {
            padding: 10px 20px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            color: #374151;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-login:hover {
            background: #f9fafb;
            border-color: #d1d5db;
        }

        .btn-register {
            padding: 10px 20px;
            background: #2563eb;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-register:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }

        /* Hero Section */
        .hero {
            max-width: 1280px;
            margin: 0 auto;
            padding: 80px 24px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            background: #eef2ff;
            border-radius: 30px;
            color: #2563eb;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 24px;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 24px;
            color: #111827;
        }

        .hero-title span {
            color: #2563eb;
            position: relative;
        }

        .hero-title span::after {
            content: '';
            position: absolute;
            bottom: 8px;
            left: 0;
            width: 100%;
            height: 8px;
            background: #dbeafe;
            z-index: -1;
        }

        .hero-text {
            font-size: 1.1rem;
            color: #6b7280;
            margin-bottom: 32px;
            max-width: 500px;
            line-height: 1.7;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            margin-bottom: 40px;
        }

        .btn-primary {
            padding: 14px 32px;
            background: #2563eb;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
        }

        .btn-outline {
            padding: 14px 32px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            color: #374151;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-outline:hover {
            background: #f9fafb;
            border-color: #d1d5db;
        }

        .hero-stats {
            display: flex;
            gap: 40px;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: #111827;
        }

        .stat-label {
            color: #6b7280;
            font-size: 0.9rem;
        }

        /* Hero Image - Plus élaboré */
        .hero-image {
            background: #f9fafb;
            border-radius: 24px;
            padding: 24px;
            border: 1px solid #f0f0f0;
            box-shadow: 0 20px 40px -10px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }

        .hero-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #2563eb, #7c3aed, #db2777);
        }

        .mockup-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .mockup-dots {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .mockup-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #e5e7eb;
        }

        .mockup-dot:nth-child(1) { background: #ef4444; }
        .mockup-dot:nth-child(2) { background: #f59e0b; }
        .mockup-dot:nth-child(3) { background: #10b981; }

        .mockup-time {
            color: #6b7280;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .ticket-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin: 20px 0;
        }

        .ticket-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
            background: white;
            border-radius: 12px;
            border: 1px solid #f0f0f0;
            transition: all 0.2s;
        }

        .ticket-item:hover {
            border-color: #2563eb;
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.1);
        }

        .ticket-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .ticket-priority {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .priority-high { background: #ef4444; box-shadow: 0 0 0 2px #fee2e2; }
        .priority-medium { background: #f59e0b; box-shadow: 0 0 0 2px #fef3c7; }
        .priority-low { background: #10b981; box-shadow: 0 0 0 2px #d1fae5; }

        .ticket-title {
            font-weight: 500;
            color: #111827;
        }

        .ticket-id {
            color: #9ca3af;
            font-size: 0.8rem;
        }

        .ticket-status {
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-open {
            background: #fee2e2;
            color: #ef4444;
        }

        .status-progress {
            background: #fef3c7;
            color: #f59e0b;
        }

        .status-done {
            background: #d1fae5;
            color: #10b981;
        }

        .mockup-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 16px;
            border-top: 1px solid #f0f0f0;
        }

        .mockup-activity {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #6b7280;
            font-size: 0.8rem;
        }

        .live-dot {
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }

        /* Features améliorés */
        .features {
            background: #f9fafb;
            padding: 100px 24px;
            position: relative;
            overflow: hidden;
        }

        .features::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #2563eb, transparent);
        }

        .features-container {
            max-width: 1280px;
            margin: 0 auto;
            position: relative;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 16px;
        }

        .section-title p {
            color: #6b7280;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .feature-card {
            background: white;
            padding: 32px;
            border-radius: 24px;
            border: 1px solid #f0f0f0;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #2563eb, #7c3aed);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .feature-card:hover {
            border-color: #dbeafe;
            box-shadow: 0 20px 40px -15px rgba(37, 99, 235, 0.2);
            transform: translateY(-8px);
        }

        .feature-card:hover::before {
            opacity: 1;
        }

        .feature-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #eef2ff, #ffffff);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2563eb;
            font-size: 1.8rem;
            margin-bottom: 24px;
            border: 1px solid #dbeafe;
        }

        .feature-card h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: #111827;
            margin-bottom: 12px;
        }

        .feature-card p {
            color: #6b7280;
            line-height: 1.6;
        }

        /* Section témoignages */
        .testimonials {
            max-width: 1280px;
            margin: 0 auto;
            padding: 80px 24px;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 40px;
        }

        .testimonial-card {
            background: white;
            padding: 32px;
            border-radius: 24px;
            border: 1px solid #f0f0f0;
            position: relative;
        }

        .testimonial-card::after {
            content: '"';
            position: absolute;
            top: 20px;
            right: 24px;
            font-size: 6rem;
            color: #e5e7eb;
            font-family: serif;
            line-height: 1;
        }

        .testimonial-text {
            color: #4b5563;
            line-height: 1.7;
            margin-bottom: 24px;
            font-style: italic;
            position: relative;
            z-index: 1;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .author-avatar {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .author-info h4 {
            font-weight: 600;
            color: #111827;
        }

        .author-info p {
            color: #6b7280;
            font-size: 0.9rem;
        }

        /* Pricing */
        .pricing {
            background: #f9fafb;
            padding: 80px 24px;
        }

        .pricing-container {
            max-width: 1280px;
            margin: 0 auto;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 40px;
        }

        .pricing-card {
            background: white;
            padding: 40px 32px;
            border-radius: 32px;
            border: 1px solid #f0f0f0;
            transition: all 0.3s;
            position: relative;
        }

        .pricing-card.popular {
            border-color: #2563eb;
            box-shadow: 0 20px 40px -15px rgba(37, 99, 235, 0.3);
            transform: scale(1.02);
        }

        .popular-badge {
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: #2563eb;
            color: white;
            padding: 4px 16px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .pricing-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .pricing-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 8px;
        }

        .pricing-price {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2563eb;
        }

        .pricing-price span {
            font-size: 1rem;
            font-weight: 400;
            color: #6b7280;
        }

        .pricing-features {
            list-style: none;
            margin: 24px 0;
        }

        .pricing-features li {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 0;
            color: #4b5563;
        }

        .pricing-features i {
            color: #10b981;
            font-size: 0.9rem;
        }

        .btn-pricing {
            display: block;
            text-align: center;
            padding: 14px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-pricing-primary {
            background: #2563eb;
            color: white;
        }

        .btn-pricing-primary:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
        }

        .btn-pricing-outline {
            border: 1px solid #e5e7eb;
            color: #374151;
        }

        .btn-pricing-outline:hover {
            border-color: #2563eb;
            color: #2563eb;
        }

        /* CTA amélioré */
        .cta {
            max-width: 1280px;
            margin: 0 auto;
            padding: 80px 24px;
        }

        .cta-card {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            border-radius: 40px;
            padding: 80px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .cta-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
            animation: rotate 30s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .cta-card h2 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 16px;
            position: relative;
        }

        .cta-card p {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 32px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
        }

        .btn-white {
            padding: 16px 48px;
            background: white;
            border-radius: 40px;
            color: #2563eb;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .btn-white:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }

        /* Footer amélioré */
        .footer {
            border-top: 1px solid #f0f0f0;
            padding: 60px 24px 30px;
        }

        .footer-container {
            max-width: 1280px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1fr;
            gap: 40px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
        }

        .footer-logo-icon {
            width: 40px;
            height: 40px;
            background: #2563eb;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .footer-col p {
            color: #6b7280;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .social-links {
            display: flex;
            gap: 16px;
        }

        .social-links a {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4b5563;
            transition: all 0.2s;
        }

        .social-links a:hover {
            background: #2563eb;
            color: white;
            transform: translateY(-2px);
        }

        .footer-col h4 {
            font-size: 1rem;
            font-weight: 600;
            color: #111827;
            margin-bottom: 20px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 12px;
        }

        .footer-col ul a {
            color: #6b7280;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s;
        }

        .footer-col ul a:hover {
            color: #2563eb;
        }

        .footer-bottom {
            max-width: 1280px;
            margin: 40px auto 0;
            padding-top: 30px;
            border-top: 1px solid #f0f0f0;
            text-align: center;
            color: #9ca3af;
            font-size: 0.9rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-links {
            display: flex;
            gap: 24px;
        }

        .footer-links a {
            color: #6b7280;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .footer-links a:hover {
            color: #2563eb;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .hero {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .hero-text {
                margin-left: auto;
                margin-right: auto;
            }
            .hero-buttons {
                justify-content: center;
            }
            .hero-stats {
                justify-content: center;
            }
            .features-grid,
            .pricing-grid,
            .testimonials-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .footer-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            .features-grid,
            .pricing-grid,
            .testimonials-grid {
                grid-template-columns: 1fr;
            }
            .footer-container {
                grid-template-columns: 1fr;
            }
            .footer-bottom {
                flex-direction: column;
                gap: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <div class="navbar">
        <div class="nav-container">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <span class="logo-text">HelpDesk<span>Pro</span></span>
            </div>

            <div class="nav-links">
                <a href="#features">Fonctionnalités</a>
                <a href="#pricing">Tarifs</a>
                <a href="#testimonials">Témoignages</a>
                <a href="#ressources">Ressources</a>
            </div>

            <div class="nav-buttons">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('tickets.index') }}" class="btn-register">
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-login">
                            <i class="fas fa-sign-in-alt"></i>Connexion
                        </a>
                        <a href="{{ route('register') }}" class="btn-register">
                            <i class="fas fa-user-plus"></i>Inscription
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <div>
            <div class="hero-badge">
                <i class="fas fa-bolt"></i>
                <span>Nouvelle version 2.0 disponible</span>
            </div>
            
            <h1 class="hero-title">
                La meilleure façon de <span>gérer vos tickets</span> support
            </h1>
            
            <p class="hero-text">
                Centralisez, organisez et résolvez toutes vos demandes clients en un seul endroit. Une solution intuitive qui fait gagner 3 heures par jour à vos équipes.
            </p>
            
            <div class="hero-buttons">
                @auth
                    <a href="{{ route('tickets.index') }}" class="btn-primary">
                        <i class="fas fa-tachometer-alt"></i>
                        Accéder au dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn-primary">
                        <i class="fas fa-rocket"></i>
                        Essai gratuit 14 jours
                    </a>
                    <a href="#demo" class="btn-outline">
                        <i class="fas fa-play"></i>
                        Voir démo
                    </a>
                @endauth
            </div>

            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">entreprises</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">50k+</span>
                    <span class="stat-label">tickets résolus</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">4.9/5</span>
                    <span class="stat-label">satisfaction</span>
                </div>
            </div>
        </div>

        <div class="hero-image">
            <div class="mockup-header">
                <div class="mockup-dots">
                    <span class="mockup-dot"></span>
                    <span class="mockup-dot"></span>
                    <span class="mockup-dot"></span>
                </div>
                <span class="mockup-time">Aujourd'hui · 14:32</span>
            </div>

            <div class="ticket-list">
                <div class="ticket-item">
                    <div class="ticket-info">
                        <span class="ticket-priority priority-high"></span>
                        <div>
                            <div class="ticket-title">Problème de connexion VPN</div>
                            <div class="ticket-id">#TKT-2024-001</div>
                        </div>
                    </div>
                    <span class="ticket-status status-open">Urgent</span>
                </div>

                <div class="ticket-item">
                    <div class="ticket-info">
                        <span class="ticket-priority priority-medium"></span>
                        <div>
                            <div class="ticket-title">Demande de nouveau matériel</div>
                            <div class="ticket-id">#TKT-2024-002</div>
                        </div>
                    </div>
                    <span class="ticket-status status-progress">En cours</span>
                </div>

                <div class="ticket-item">
                    <div class="ticket-info">
                        <span class="ticket-priority priority-low"></span>
                        <div>
                            <div class="ticket-title">Question sur la facturation</div>
                            <div class="ticket-id">#TKT-2024-003</div>
                        </div>
                    </div>
                    <span class="ticket-status status-done">Résolu</span>
                </div>
            </div>

            <div class="mockup-footer">
                <div class="mockup-activity">
                    <span class="live-dot"></span>
                    <span>Activité en temps réel</span>
                </div>
                <span style="color: #2563eb; font-weight: 600;">+3 nouveaux</span>
            </div>
        </div>
    </section>

    <!-- Trust Bar -->
    <div class="trust-bar">
        <p>Ils nous font confiance</p>
        <div class="trust-logos">
            <span>BNP Paribas</span>
            <span>Orange</span>
            <span>TotalEnergies</span>
            <span>Air France</span>
            <span>SNCF</span>
            <span>EDF</span>
        </div>
    </div>

    <!-- Features -->
    <section id="features" class="features">
        <div class="features-container">
            <div class="section-title">
                <h2>Des fonctionnalités pensées pour votre équipe</h2>
                <p>Tout ce dont vous avez besoin pour un support client efficace</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Rapidité d'exécution</h3>
                    <p>Interface intuitive et réactive pour traiter vos tickets en quelques clics. Temps de réponse record.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Gestion d'équipe</h3>
                    <p>Collaborez efficacement avec votre équipe sur la résolution des tickets. Assignation automatique.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Statistiques avancées</h3>
                    <p>Suivez vos performances, temps de résolution, satisfaction client et identifiez les axes d'amélioration.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Sécurité renforcée</h3>
                    <p>Vos données sont protégées par les meilleurs standards de sécurité. Chiffrement de bout en bout.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Application mobile</h3>
                    <p>Accédez à votre plateforme depuis tous vos appareils. Interface responsive et application dédiée.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>Support 24/7</h3>
                    <p>Une équipe dédiée pour vous accompagner à chaque étape. Support prioritaire pour les clients Pro.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="testimonials">
        <div class="section-title">
            <h2>Ils ont déjà adopté HelpDesk Pro</h2>
            <p>Découvrez ce que nos clients disent de nous</p>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card">
                <p class="testimonial-text">"Depuis que nous utilisons HelpDesk Pro, notre temps de résolution a été divisé par 3. L'interface est intuitive et l'équipe support est réactive."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">M</div>
                    <div class="author-info">
                        <h4>Marie Lambert</h4>
                        <p>Responsable Support · TechCorp</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <p class="testimonial-text">"La meilleure décision que nous avons prise cette année. Nos équipes gagnent un temps précieux et nos clients sont plus satisfaits."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">T</div>
                    <div class="author-info">
                        <h4>Thomas Bernard</h4>
                        <p>CTO · FinancePlus</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <p class="testimonial-text">"Un outil puissant mais simple à prendre en main. La migration depuis notre ancien outil s'est faite sans aucun problème."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">C</div>
                    <div class="author-info">
                        <h4>Claire Dubois</h4>
                        <p>Directrice Support · LogiSoft</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section id="pricing" class="pricing">
        <div class="pricing-container">
            <div class="section-title">
                <h2>Des tarifs adaptés à vos besoins</h2>
                <p>Choisissez l'offre qui correspond à votre équipe</p>
            </div>

            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <div class="pricing-name">Débutant</div>
                        <div class="pricing-price">0€<span>/mois</span></div>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i> Jusqu'à 5 agents</li>
                        <li><i class="fas fa-check"></i> 50 tickets/mois</li>
                        <li><i class="fas fa-check"></i> Support par email</li>
                        <li><i class="fas fa-check"></i> Statistiques de base</li>
                    </ul>
                    <a href="{{ route('register') }}" class="btn-pricing btn-pricing-outline">Commencer</a>
                </div>

                <div class="pricing-card popular">
                    <div class="popular-badge">POPULAIRE</div>
                    <div class="pricing-header">
                        <div class="pricing-name">Professionnel</div>
                        <div class="pricing-price">29€<span>/mois</span></div>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i> Agents illimités</li>
                        <li><i class="fas fa-check"></i> Tickets illimités</li>
                        <li><i class="fas fa-check"></i> Support prioritaire 24/7</li>
                        <li><i class="fas fa-check"></i> Rapports avancés</li>
                        <li><i class="fas fa-check"></i> API dédiée</li>
                    </ul>
                    <a href="{{ route('register') }}" class="btn-pricing btn-pricing-primary">Choisir Pro</a>
                </div>

                <div class="pricing-card">
                    <div class="pricing-header">
                        <div class="pricing-name">Entreprise</div>
                        <div class="pricing-price">99€<span>/mois</span></div>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i> Tout du plan Pro</li>
                        <li><i class="fas fa-check"></i> SLA personnalisé</li>
                        <li><i class="fas fa-check"></i> Formation dédiée</li>
                        <li><i class="fas fa-check"></i> Audit sécurité</li>
                        <li><i class="fas fa-check"></i> Onboarding prioritaire</li>
                    </ul>
                    <a href="{{ route('register') }}" class="btn-pricing btn-pricing-outline">Nous contacter</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta">
        <div class="cta-card">
            <h2>Prêt à révolutionner votre support ?</h2>
            <p>Rejoignez plus de 500 entreprises qui nous font confiance et testez gratuitement pendant 14 jours</p>
            @auth
                <a href="{{ route('tickets.index') }}" class="btn-white">
                    <i class="fas fa-arrow-right"></i>
                    Accéder à mon espace
                </a>
            @else
                <a href="{{ route('register') }}" class="btn-white">
                    <i class="fas fa-rocket"></i>
                    Essai gratuit 14 jours
                </a>
            @endauth
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-col">
                <div class="footer-logo">
                    <div class="footer-logo-icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <span style="font-weight: 600; font-size: 1.2rem;">HelpDesk Pro</span>
                </div>
                <p>La solution complète de gestion de tickets support pour les entreprises modernes.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                </div>
            </div>

            <div class="footer-col">
                <h4>Produit</h4>
                <ul>
                    <li><a href="#">Fonctionnalités</a></li>
                    <li><a href="#">Tarifs</a></li>
                    <li><a href="#">API</a></li>
                    <li><a href="#">Intégrations</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Ressources</h4>
                <ul>
                    <li><a href="#">Documentation</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Guides</a></li>
                    <li><a href="#">Support</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Entreprise</h4>
                <ul>
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Carrières</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Partenaires</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Légal</h4>
                <ul>
                    <li><a href="#">Confidentialité</a></li>
                    <li><a href="#">CGU</a></li>
                    <li><a href="#">Mentions légales</a></li>
                    <li><a href="#">Cookies</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© 2026 HelpDesk Pro. Tous droits réservés.</p>
            <div class="footer-links">
                <a href="#">Confidentialité</a>
                <a href="#">CGU</a>
                <a href="#">Cookies</a>
            </div>
        </div>
    </footer>
</body>
</html>