<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Festava Live 2025 - The ultimate music festival experience in Siargao, Philippines">
        <meta name="author" content="Festava Live">
        <title>Festava Live 2025 - Music Festival</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Bootstrap Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
        
        <style>
            :root {
                --primary-color: #ff6b35;
                --secondary-color: #f7931e;
                --accent-color: #c73e1d;
                --dark-color: #0a0a0a;
                --light-color: #ffffff;
                --purple-color: #6c5ce7;
                --pink-color: #fd79a8;
                --cyan-color: #00cec9;
                --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                --gradient-2: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
                --gradient-3: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
                --gradient-4: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
                --glass-bg: rgba(255, 255, 255, 0.1);
                --glass-border: rgba(255, 255, 255, 0.2);
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Outfit', sans-serif;
                line-height: 1.6;
                color: var(--light-color);
                background: var(--dark-color);
                overflow-x: hidden;
            }

            /* Glassmorphism utilities */
            .glass {
                background: var(--glass-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            }

            /* Animations */
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }

            @keyframes pulse {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.5; }
            }

            @keyframes slideInUp {
                from { transform: translateY(50px); opacity: 0; }
                to { transform: translateY(0); opacity: 1; }
            }

            @keyframes glow {
                0%, 100% { box-shadow: 0 0 20px rgba(255, 107, 53, 0.5); }
                50% { box-shadow: 0 0 40px rgba(255, 107, 53, 0.8); }
            }

            /* Header */
            .site-header {
                background: var(--glass-bg);
                backdrop-filter: blur(20px);
                border-bottom: 1px solid var(--glass-border);
                padding: 1rem 0;
                position: fixed;
                top: 0;
                width: 100%;
                z-index: 1000;
                transition: all 0.3s ease;
            }

            .site-header.scrolled {
                background: rgba(10, 10, 10, 0.95);
                backdrop-filter: blur(30px);
            }

            /* Navigation */
            .navbar {
                background: transparent;
                padding: 1rem 0;
                transition: all 0.3s ease;
            }

            .navbar-brand {
                font-family: 'Space Grotesk', sans-serif;
                font-size: 2rem;
                font-weight: 700;
                background: var(--gradient-2);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .navbar-brand:hover {
                transform: scale(1.05);
                filter: brightness(1.2);
            }

            .nav-link {
                color: var(--light-color) !important;
                font-weight: 500;
                margin: 0 1rem;
                position: relative;
                transition: all 0.3s ease;
            }

            .nav-link:hover {
                color: var(--primary-color) !important;
                transform: translateY(-2px);
            }

            .nav-link::after {
                content: '';
                position: absolute;
                bottom: -5px;
                left: 50%;
                width: 0;
                height: 2px;
                background: var(--gradient-2);
                transition: all 0.3s ease;
                transform: translateX(-50%);
            }

            .nav-link:hover::after {
                width: 100%;
            }

            /* Buttons */
            .custom-btn {
                background: var(--gradient-2);
                border: none;
                color: var(--light-color);
                padding: 12px 30px;
                border-radius: 50px;
                font-weight: 600;
                text-decoration: none;
                display: inline-block;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .custom-btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 10px 30px rgba(255, 107, 53, 0.4);
                color: var(--light-color);
            }

            .custom-btn::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
                transition: left 0.5s;
            }

            .custom-btn:hover::before {
                left: 100%;
            }

            /* Hero Section */
            .hero-section {
                min-height: 100vh;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                overflow: hidden;
            }

            .hero-section::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: 
                    radial-gradient(circle at 20% 50%, rgba(255, 107, 53, 0.3) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(108, 92, 231, 0.3) 0%, transparent 50%),
                    radial-gradient(circle at 40% 80%, rgba(253, 121, 168, 0.3) 0%, transparent 50%);
                animation: float 6s ease-in-out infinite;
            }

            .hero-content {
                text-align: center;
                z-index: 2;
                position: relative;
                animation: slideInUp 1s ease-out;
            }

            .hero-section h1 {
                font-family: 'Space Grotesk', sans-serif;
                font-size: clamp(3rem, 8vw, 8rem);
                font-weight: 900;
                margin-bottom: 2rem;
                background: linear-gradient(45deg, #fff, #ff6b35, #f7931e);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                text-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
                animation: glow 3s ease-in-out infinite;
            }

            .hero-section small {
                font-size: 1.2rem;
                opacity: 0.8;
                display: block;
                margin-bottom: 1rem;
            }

            /* Floating elements */
            .floating-elements {
                position: absolute;
                width: 100%;
                height: 100%;
                overflow: hidden;
                z-index: 1;
            }

            .floating-element {
                position: absolute;
                width: 60px;
                height: 60px;
                background: var(--gradient-3);
                border-radius: 50%;
                opacity: 0.6;
                animation: float 4s ease-in-out infinite;
            }

            .floating-element:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
            .floating-element:nth-child(2) { top: 60%; left: 85%; animation-delay: 1s; }
            .floating-element:nth-child(3) { top: 40%; left: 70%; animation-delay: 2s; }
            .floating-element:nth-child(4) { top: 80%; left: 20%; animation-delay: 3s; }

            /* Date and Location Info */
            .event-info {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 3rem;
                margin-top: 3rem;
                flex-wrap: wrap;
            }

            .info-card {
                background: var(--glass-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                padding: 1.5rem 2rem;
                border-radius: 20px;
                text-align: center;
                transition: all 0.3s ease;
            }

            .info-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            }

            .info-card i {
                font-size: 2rem;
                color: var(--primary-color);
                margin-bottom: 0.5rem;
                display: block;
            }

            /* Sections */
            .section-padding {
                padding: 6rem 0;
            }

            .section-bg {
                background: linear-gradient(135deg, #2d3436 0%, #636e72 100%);
                position: relative;
            }

            .section-bg::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: 
                    radial-gradient(circle at 30% 40%, rgba(255, 107, 53, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 70% 60%, rgba(108, 92, 231, 0.1) 0%, transparent 50%);
            }

            /* About Section */
            .about-section {
                background: var(--dark-color);
                position: relative;
            }

            .about-image {
                border-radius: 20px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
                transition: all 0.3s ease;
            }

            .about-image:hover {
                transform: scale(1.05);
                box-shadow: 0 30px 60px rgba(0, 0, 0, 0.7);
            }

            /* Artists Section */
            .artists-section {
                background: linear-gradient(135deg, #0c0c0c 0%, #1a1a1a 100%);
                position: relative;
            }

            .artist-card {
                background: var(--glass-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: 20px;
                padding: 2rem;
                margin-bottom: 2rem;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .artist-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: var(--gradient-2);
                opacity: 0.1;
                transition: left 0.5s ease;
            }

            .artist-card:hover::before {
                left: 0;
            }

            .artist-card:hover {
                transform: translateY(-15px);
                box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
            }

            .artist-image {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                object-fit: cover;
                margin-bottom: 1rem;
                border: 3px solid var(--primary-color);
            }

            /* Schedule Section */
            .schedule-section {
                background: linear-gradient(135deg, #2d3436 0%, #636e72 100%);
                position: relative;
            }

            .schedule-table {
                background: var(--glass-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: 20px;
                overflow: hidden;
            }

            .schedule-table th,
            .schedule-table td {
                padding: 1.5rem;
                border-color: var(--glass-border);
                vertical-align: middle;
            }

            .schedule-table th {
                background: var(--gradient-2);
                color: var(--light-color);
                font-weight: 600;
            }

            .event-cell {
                background: var(--gradient-1);
                color: var(--light-color);
                border-radius: 15px;
                margin: 0.5rem;
                padding: 1.5rem;
                transition: all 0.3s ease;
            }

            .event-cell:hover {
                transform: scale(1.05);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            }

            /* Pricing Section */
            .pricing-card {
                background: var(--glass-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: 25px;
                padding: 3rem 2rem;
                margin-bottom: 2rem;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .pricing-card::before {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: conic-gradient(from 0deg, var(--primary-color), var(--secondary-color), var(--purple-color), var(--primary-color));
                opacity: 0;
                transition: opacity 0.3s ease;
                animation: spin 3s linear infinite;
            }

            @keyframes spin {
                to { transform: rotate(360deg); }
            }

            .pricing-card:hover::before {
                opacity: 0.1;
            }

            .pricing-card:hover {
                transform: translateY(-20px);
                box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
            }

            .price {
                font-size: 3rem;
                font-weight: 900;
                background: var(--gradient-2);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            /* Contact Section */
            .contact-section {
                background: var(--dark-color);
                position: relative;
            }

            .contact-form {
                background: var(--glass-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: 20px;
                padding: 3rem;
            }

            .form-control {
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid var(--glass-border);
                border-radius: 15px;
                padding: 1rem 1.5rem;
                color: var(--light-color);
                margin-bottom: 1.5rem;
                transition: all 0.3s ease;
            }

            .form-control:focus {
                background: rgba(255, 255, 255, 0.1);
                border-color: var(--primary-color);
                box-shadow: 0 0 20px rgba(255, 107, 53, 0.3);
                color: var(--light-color);
            }

            .form-control::placeholder {
                color: rgba(255, 255, 255, 0.6);
            }

            /* Footer */
            .site-footer {
                background: linear-gradient(135deg, #0c0c0c 0%, #1a1a1a 100%);
                padding: 4rem 0 2rem;
                position: relative;
            }

            .social-icon {
                display: flex;
                gap: 1rem;
                list-style: none;
            }

            .social-icon-link {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 50px;
                height: 50px;
                background: var(--gradient-2);
                border-radius: 50%;
                color: var(--light-color);
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .social-icon-link:hover {
                transform: translateY(-5px) scale(1.1);
                box-shadow: 0 10px 25px rgba(255, 107, 53, 0.4);
                color: var(--light-color);
            }

            /* Responsive */
            @media (max-width: 768px) {
                .hero-section h1 {
                    font-size: 3rem;
                }
                
                .event-info {
                    flex-direction: column;
                    gap: 1.5rem;
                }
                
                .info-card {
                    width: 100%;
                    max-width: 300px;
                }
                
                .pricing-card,
                .artist-card {
                    margin-bottom: 2rem;
                }
            }

            /* Scroll animations */
            .animate-on-scroll {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.6s ease;
            }

            .animate-on-scroll.animated {
                opacity: 1;
                transform: translateY(0);
            }

            /* Particle background */
            .particles {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
                z-index: -1;
            }

            .particle {
                position: absolute;
                width: 2px;
                height: 2px;
                background: var(--primary-color);
                border-radius: 50%;
                opacity: 0.5;
                animation: twinkle 3s infinite ease-in-out;
            }

            @keyframes twinkle {
                0%, 100% { opacity: 0.2; transform: scale(1); }
                50% { opacity: 1; transform: scale(1.5); }
            }
        </style>
    </head>

    <body>
        <!-- Particle Background -->
        <div class="particles" id="particles"></div>

        <header class="site-header" id="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 d-flex flex-wrap align-items-center">
                        <p class="d-flex me-4 mb-0">
                            <i class="bi-person me-2" style="color: var(--primary-color);"></i>
                            <strong>Welcome to Music Fest 2025</strong>
                        </p>
                        <div class="ms-auto">
                            <a href="#" class="btn btn-sm" style="background: var(--gradient-2); border: none; color: white; border-radius: 20px;">
                                <i class="bi-box-arrow-right me-1"></i> Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#section_1">Festava Live</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="#section_1">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section_2">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section_3">Artists</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section_4">Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section_5">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section_6">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="#section_5" class="custom-btn ms-3">Buy Ticket</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <!-- Hero Section -->
            <section class="hero-section" id="section_1">
                <div class="floating-elements">
                    <div class="floating-element"></div>
                    <div class="floating-element"></div>
                    <div class="floating-element"></div>
                    <div class="floating-element"></div>
                </div>
                
                <div class="container">
                    <div class="hero-content">
                        <small>Festava Live Presents</small>
                        <h1>Night Live 2025</h1>
                        <p style="font-size: 1.2rem; opacity: 0.9; margin-bottom: 2rem;">
                            Experience the ultimate music festival in the heart of Siargao
                        </p>
                        <a class="custom-btn" href="#section_2" style="font-size: 1.1rem; padding: 15px 40px;">
                            Let's Begin the Journey
                        </a>
                    </div>

                    <div class="event-info">
                        <div class="info-card">
                            <i class="bi-clock"></i>
                            <h5>10 - 12<sup>th</sup> December</h5>
                            <p style="margin: 0; opacity: 0.8;">2025</p>
                        </div>

                        <div class="info-card">
                            <i class="bi-geo-alt"></i>
                            <h5>Siargao Del Norte</h5>
                            <p style="margin: 0; opacity: 0.8;">Dapa, Philippines</p>
                        </div>

                        <div class="info-card">
                            <i class="bi-people"></i>
                            <h5>5000+ Attendees</h5>
                            <p style="margin: 0; opacity: 0.8;">Expected</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- About Section -->
            <section class="about-section section-padding animate-on-scroll" id="section_2">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                            <h2 style="font-size: 3rem; margin-bottom: 2rem; background: var(--gradient-2); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                About Festava 2025
                            </h2>
                            
                            <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem;">
                                Welcome to Festava 2025, the ultimate music festival experience that brings together world-class artists, cutting-edge technology, and the breathtaking beauty of Siargao Island.
                            </p>

                            <div style="margin-bottom: 2rem;">
                                <h6 style="color: var(--primary-color); font-size: 1.2rem; margin-bottom: 1rem;">
                                    <i class="bi-star-fill me-2"></i>Once in Lifetime Experience
                                </h6>
                                <p style="line-height: 1.8;">
                                    With a passion for live entertainment and cutting-edge technology, Festava 2025 guarantees a seamless and unforgettable concert experience.
                                </p>
                            </div>

                            <div>
                                <h6 style="color: var(--primary-color); font-size: 1.2rem; margin-bottom: 1rem;">
                                    <i class="bi-moon-stars-fill me-2"></i>Three Days of Magic
                                </h6>
                                <p style="line-height: 1.8;">
                                    Join us for three incredible nights of music, dancing, and memories that will last forever.
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div style="position: relative;">
                                <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="about-image img-fluid" alt="Festival crowd">
                                <div style="position: absolute; bottom: 20px; left: 20px; background: var(--glass-bg); backdrop-filter: blur(20px); padding: 1.5rem; border-radius: 15px; border: 1px solid var(--glass-border);">
                                    <h4 style="margin: 0; color: var(--primary-color);">
                                        <i class="bi-heart-fill me-2"></i>A Happy Moment
                                    </h4>
                                    <p style="margin: 0; opacity: 0.9;">Your amazing festival experience with us</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Artists Section -->
            <section class="artists-section section-padding animate-on-scroll" id="section_3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mb-5">
                            <h2 style="font-size: 3rem; margin-bottom: 1rem; background: var(--gradient-2); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                Meet Our Artists
                            </h2>
                            <p style="font-size: 1.2rem; opacity: 0.8;">
                                Incredible talent from across the globe
                            </p>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="artist-card">
                                <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" class="artist-image" alt="Pahugjaw Artist">
                                <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">Pahugjaw Artist</h4>
                                <p style="opacity: 0.8; margin-bottom: 1rem;">Pop, R&B, Ballad</p>
                                <p style="font-size: 0.9rem; opacity: 0.7; margin-bottom: 1rem;">
                                    <i class="bi-calendar me-2"></i>Since August 16, 1958
                                </p>
                                <a href="#" style="color: var(--secondary-color); text-decoration: none;">
                                    <i class="bi-youtube me-2"></i>Pahugjaw Siargao Official
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="artist-card">
                                <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" class="artist-image" alt="SBIT">
                                <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">SBIT</h4>
                                <p style="opacity: 0.8; margin-bottom: 1rem;">P-POP</p>
                                <p style="font-size: 0.9rem; opacity: 0.7; margin-bottom: 1rem;">
                                    <i class="bi-calendar me-2"></i>Since January 1, 2020           
                                </p>    
                                <a href="#" style="color: var(--secondary-color); text-decoration: none;">
                                    <i class="bi-youtube                                                            me-2"></i>SBIT Official
                                </a>
                            </div>      
                        </div>  
                                        

                                