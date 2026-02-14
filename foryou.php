<?php
// Include quotes database
require_once 'quotes.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Valentine's Day 💕</title>
    
    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        /* RESET & VARIABLES */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --pink-primary: #ff4d8d;
            --pink-light: #ff85b3;
            --pink-soft: #ffb6c1;
            --purple-gradient: linear-gradient(135deg, #667eea, #764ba2);
            --white-transparent: rgba(255, 255, 255, 0.2);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at 30% 30%, #ffd9e8, #ffb6c1, #ff9a9e);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* BACKGROUND ANIMATIONS */
        #particle-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        .floating-heart-3d {
            position: absolute;
            color: rgba(255, 77, 141, 0.5);
            font-size: 30px;
            transform-style: preserve-3d;
            animation: float3d 8s infinite;
            z-index: 2;
        }

        @keyframes float3d {
            0% { transform: translateZ(0) rotateX(0) rotateY(0) scale(1); opacity: 0.5; }
            50% { transform: translateZ(100px) rotateX(180deg) rotateY(180deg) scale(1.5); opacity: 0.8; }
            100% { transform: translateZ(0) rotateX(360deg) rotateY(360deg) scale(1); opacity: 0.5; }
        }

        /* SPLASH SCREEN */
        .magic-splash {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--purple-gradient);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: magicFade 2.5s ease-in-out 2.5s forwards;
            pointer-events: none;
        }

        @keyframes magicFade {
            0% { opacity: 1; clip-path: circle(150% at 50% 50%); }
            100% { opacity: 0; clip-path: circle(0% at 50% 50%); }
        }

        .magic-circle {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            animation: magicPulse 2s infinite;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        @keyframes magicPulse {
            0%,100% { transform: scale(1); box-shadow: 0 0 50px rgba(255,255,255,0.5); }
            50% { transform: scale(1.1); box-shadow: 0 0 100px rgba(255,255,255,0.8); }
        }

        .magic-text {
            font-family: 'Great Vibes', cursive;
            font-size: 60px;
            color: white;
            text-shadow: 0 0 20px rgba(255,255,255,0.8);
            animation: glowText 2s infinite;
        }

        @keyframes glowText {
            0%,100% { text-shadow: 0 0 30px #fff, 0 0 50px #ff4d8d; }
            50% { text-shadow: 0 0 50px #fff, 0 0 80px #ff4d8d; }
        }

        /* FLOATING CHARACTERS */
        .love-characters {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 3;
        }

        .character-3d {
            position: absolute;
            animation: characterMove 15s infinite;
            transform-style: preserve-3d;
        }

        @keyframes characterMove {
            0% { transform: translateX(-100px) rotateY(0); opacity: 0; }
            20% { opacity: 0.8; }
            80% { opacity: 0.8; }
            100% { transform: translateX(100vw) rotateY(720deg); opacity: 0; }
        }

        .floating-message {
            position: absolute;
            background: white;
            padding: 8px 20px;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            animation: messageFloat 4s infinite;
            z-index: 5;
            white-space: nowrap;
            font-weight: 500;
        }

        @keyframes messageFloat {
            0%,100% { transform: translate(0, 0) rotate(0); }
            25% { transform: translate(15px, -15px) rotate(3deg); }
            75% { transform: translate(-15px, 15px) rotate(-3deg); }
        }

        /* MAIN CONTAINER */
        .main-container {
            position: relative;
            z-index: 10;
            padding: 30px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* MAIN CARD */
        .main-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            border-radius: 70px;
            box-shadow: 0 30px 60px rgba(255, 77, 141, 0.3);
            border: 3px solid white;
            overflow: hidden;
            margin: 40px auto;
            transition: transform 0.3s;
        }

        .main-card:hover {
            transform: perspective(1000px) rotateX(2deg) rotateY(2deg);
        }

        .card-header {
            background: linear-gradient(45deg, #ff0844, #ff4568, #ff7b89);
            padding: 40px 30px 30px;
            text-align: center;
            border-bottom: 3px dashed white;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 50% 100%, 0 85%);
        }

        h1 {
            font-family: 'Great Vibes', cursive;
            font-size: 5.5rem;
            color: white;
            text-shadow: 0 0 20px #fff, 0 0 40px #ff4d8d;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            h1 { font-size: 3.5rem; }
        }

        .love-counter {
            background: rgba(255,255,255,0.2);
            border-radius: 50px;
            padding: 12px 25px;
            display: inline-block;
            border: 2px solid white;
            color: white;
            font-size: 1.3rem;
            margin-top: 15px;
        }

        /* QUOTE SECTION */
        .quote-section {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(5px);
            border-radius: 60px;
            padding: 40px;
            border: 3px solid white;
            margin: 30px 0;
            text-align: center;
        }

        .quote-text {
            font-family: 'Poppins';
            font-size: 2rem;
            color: black;
            margin-bottom: 15px;
            min-height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quote-author {
            color: #ffd700;
            font-size: 1.3rem;
            margin-bottom: 20px;
        }

        .quote-dots {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .quote-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255,255,255,0.3);
            border: 2px solid white;
            cursor: pointer;
            transition: 0.3s;
        }

        .quote-dot.active {
            background: #ff4d8d;
            transform: scale(1.3);
            box-shadow: 0 0 15px #ff4d8d;
        }

        /* CARD GRID */
        .section-title {
            font-family: 'cursive';
            font-size: 3rem;
            color: white;
            text-shadow: 2px 2px 0 #ff4d8d;
            text-align: center;
            margin: 50px 0 30px;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin: 30px 0;
        }

        .flower-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 40px;
            padding: 25px 15px;
            text-align: center;
            border: 3px solid white;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 10px 25px rgba(255,77,141,0.2);
        }

        .flower-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 40px rgba(255,77,141,0.4);
        }

        .flower-emoji {
            font-size: 70px;
            margin-bottom: 15px;
            animation: float 3s infinite;
        }

        @keyframes float {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .flower-title {
            font-family: 'Great Vibes' cursive;
            font-size: 2rem;
            color: white;
            text-shadow: 2px 2px 0 #ff4d8d;
            margin-bottom: 10px;
        }

        .flower-desc {
            color: #ff4d8d;
            font-size: 0.9rem;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .btn-card {
            background: #ff4d8d;
            color: white;
            border: 2px solid white;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        .flower-card:hover .btn-card {
            background: white;
            color: #ff4d8d;
        }

        /* LOVE METER */
        .love-meter {
            background: rgba(255,255,255,0.2);
            border-radius: 100px;
            padding: 5px;
            margin: 30px 0;
            border: 2px solid white;
        }

        .meter-fill {
            height: 25px;
            border-radius: 100px;
            background: linear-gradient(90deg, #ff4d8d, #ffb6c1);
            width: 100%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%,100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        /* BUTTON */
        .btn-magic {
            background: linear-gradient(145deg, #ff4d8d, #ff85b3);
            color: white;
            border: 3px solid white;
            padding: 15px 40px;
            border-radius: 60px;
            font-size: 1.3rem;
            font-weight: bold;
            box-shadow: 0 10px 0 #b34167;
            transition: 0.1s;
            margin: 30px 0;
        }

        .btn-magic:active {
            transform: translateY(5px);
            box-shadow: 0 5px 0 #b34167;
        }

        /* STATISTICS */
        .stat-card {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(5px);
            border-radius: 30px;
            padding: 25px;
            text-align: center;
            border: 3px solid white;
            color: white;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 10px 0;
        }

        /* MODAL */
        .modal-content {
            border-radius: 50px;
            border: 5px solid #ff4d8d;
            background: linear-gradient(135deg, #fff9f9, #ffe4e4);
        }

        .modal-header {
            background: #ff4d8d;
            color: white;
            border-radius: 45px 45px 0 0;
            border-bottom: 3px solid white;
        }

        .modal-header h5 {
            font-family: 'Dancing Script', cursive;
            font-size: 2rem;
        }

        .modal-body {
            padding: 30px;
            text-align: center;
        }

        .modal-emoji {
            font-size: 80px;
            margin-bottom: 20px;
            animation: heartbeat 1.5s infinite;
        }

        @keyframes heartbeat {
            0%,100% { transform: scale(1); }
            25% { transform: scale(1.1); }
            50% { transform: scale(1); }
            75% { transform: scale(1.1); }
        }

        .modal-message {
            font-size: 1.1rem;
            color: #5e2e44;
            line-height: 1.8;
            text-align: justify;
            margin: 20px 0;
        }

        .modal-signature {
            font-family: 'Dancing Script', cursive;
            font-size: 2rem;
            color: #ff4d8d;
            margin-top: 20px;
        }

        /* FOOTER */
        footer {
            text-align: center;
            color: white;
            padding: 20px;
            margin-top: 40px;
            background: rgba(255,255,255,0.15);
            border-radius: 100px;
            border: 2px solid white;
        }

        /* NAVIGATION */
        .nav-buttons {
            position: fixed;
            bottom: 30px;
            right: 30px;
            display: flex;
            gap: 10px;
            z-index: 100;
        }

        .nav-button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #ff4d8d;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            border: 3px solid white;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(255,77,141,0.4);
        }

        .nav-button:hover {
            transform: scale(1.1);
            background: #ff85b3;
        }

        /* SPARKLE */
        @keyframes sparkleFloat {
            0% { transform: translateY(0) rotate(0) scale(1); opacity: 1; }
            100% { transform: translateY(-100px) rotate(360deg) scale(0); opacity: 0; }
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .card-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 576px) {
            .card-grid { grid-template-columns: 1fr; }
            .nav-buttons { bottom: 15px; right: 15px; }
            .nav-button { width: 40px; height: 40px; font-size: 16px; }
        }
    </style>
</head>
<body>
    <!-- Canvas Background -->
    <canvas id="particle-canvas"></canvas>

    <!-- Splash Screen -->
    <div class="magic-splash">
        <div class="magic-circle">
            <div class="magic-text">Love</div>
            <div class="magic-text" style="font-size: 40px;">is in the air</div>
            <i class="fa-solid fa-heart" style="color: white; font-size: 60px; animation: heartbeat 1s infinite;"></i>
        </div>
    </div>

    <!-- Floating Elements -->
    <?php
    $icons = ['fa-heart', 'fa-heart-pulse', 'fa-crown', 'fa-gem', 'fa-star'];
    for ($i = 0; $i < 15; $i++):
        $icon = $icons[array_rand($icons)];
        $left = rand(1, 98);
        $top = rand(1, 95);
        $delay = rand(0, 30) / 10;
        $duration = rand(6, 12);
    ?>
        <i class="fa-solid <?= $icon ?> floating-heart-3d" 
           style="left: <?= $left ?>%; top: <?= $top ?>%; 
                  animation-duration: <?= $duration ?>s; 
                  animation-delay: <?= $delay ?>s;
                  color: <?= rand(0,1) ? '#ff4d8d' : '#ff85b3' ?>;">
        </i>
    <?php endfor; ?>

    <div class="love-characters">
        <div class="character-3d" style="top: 20%;"><i class="fa-solid fa-crown" style="color: gold; font-size: 40px;"></i></div>
        <div class="character-3d" style="top: 50%; animation-delay: 4s;"><i class="fa-solid fa-rings-wedding" style="color: silver; font-size: 40px;"></i></div>
        <div class="character-3d" style="top: 80%; animation-delay: 8s;"><i class="fa-solid fa-heart" style="color: #ff4d8d; font-size: 40px;"></i></div>
    </div>

    <div class="floating-message" style="top: 15%; left: 5%;">❤️ I Love You ❤️</div>
    <div class="floating-message" style="top: 85%; right: 5%; animation-delay: 2s;">💕 Be Mine 💕</div>
    <div class="floating-message" style="top: 45%; left: 10%; animation-delay: 4s;">🌹 Forever 🌹</div>

    <!-- Main Content -->
    <div class="main-container">
        <div class="main-card">
            <!-- Header -->
            <div class="card-header">
                <h1>
                    <i class="fa-solid fa-heart-circle-plus"></i>
                    Valentine
                    <i class="fa-solid fa-heart-circle-plus"></i>
                </h1>
                <p class="text-white fs-4">14 Februari 2026</p>
                
                <?php
                $days = ceil((strtotime('2025-02-14') - time()) / 86400);
                ?>
                <div class="love-counter">
                    <i class="fa-regular fa-clock me-2"></i>
                    <?= $days > 0 ? "$days Hari Menuju Valentine" : "Selamat Hari Valentine!" ?>
                </div>
            </div>

            <!-- Body -->
            <div class="p-4 p-md-5">
                <!-- Greeting -->
                <?php
                $hour = date('H');
                $greeting = $hour < 11 ? ['🌅 Selamat Pagi, Cinta!', 'Semangat memulai hari dengan cinta'] :
                           ($hour < 15 ? ['☀️ Selamat Siang, Sayang!', 'Tetap semangat!'] :
                           ($hour < 18 ? ['🌆 Selamat Sore, Sweetheart!', 'Hari ini indah karena kamu'] :
                                         ['🌙 Selamat Malam, My Love!', 'Mimpi indah tentang kita']));
                ?>
                
                <div class="text-center mb-5" data-aos="zoom-in">
                    <h2 style="font-family: 'Revert'; font-size: 3rem; color:#dc3545;">
                        <?= $greeting[0] ?>
                    </h2>
                    <p class="text-#dc3545 fs-5"><?= $greeting[1] ?></p>
                </div>

                <!-- Quote Section -->
                <div class="quote-section" data-aos="fade-up">
                    <div id="active-quote">
                        <div class="quote-text">"<?= $quotes[0]['text'] ?>"</div>
                        <div class="quote-author">— <?= $quotes[0]['author'] ?></div>
                    </div>
                    <div class="quote-dots" id="quote-dots">
                        <?php foreach($quotes as $i => $q): ?>
                        <div class="quote-dot <?= $i == 0 ? 'active' : '' ?>" onclick="changeQuote(<?= $i ?>)"></div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Cards Title -->
                <h2 class="section-title" data-aos="fade-up">
                    <i class="fa-solid fa-seedling me-2"></i>
                    Spesial Untukmu
                    <i class="fa-solid fa-seedling ms-2"></i>
                </h2>

                <!-- Cards Grid -->
                <div class="card-grid">
                    <!-- Mawar -->
                    <div class="flower-card" data-aos="flip-left" onclick="showFlower(1)">
                        <div class="flower-emoji">🌹</div>
                        <h3 class="flower-title">Mawar Merah</h3>
                        <p class="flower-desc">Cinta abadi & romantisme</p>
                        <button class="btn-card"><i class="fa-regular fa-heart me-1"></i>Baca Surat</button>
                    </div>
                    
                    <!-- Tulip -->
                    <div class="flower-card" data-aos="flip-left" data-aos-delay="100" onclick="showFlower(2)">
                        <div class="flower-emoji">🌷</div>
                        <h3 class="flower-title">Tulip Pink</h3>
                        <p class="flower-desc">Kasih sayang yang tulus</p>
                        <button class="btn-card"><i class="fa-regular fa-heart me-1"></i>Baca Surat</button>
                    </div>
                    
                    <!-- Sakura -->
                    <div class="flower-card" data-aos="flip-left" data-aos-delay="200" onclick="showFlower(3)">
                        <div class="flower-emoji">🌸</div>
                        <h3 class="flower-title">Bunga Sakura</h3>
                        <p class="flower-desc">Keindahan di hati</p>
                        <button class="btn-card"><i class="fa-regular fa-heart me-1"></i>Baca Surat</button>
                    </div>
                    
                    <!-- Surat Cinta -->
                    <div class="flower-card" data-aos="flip-left" data-aos-delay="300" onclick="showLoveLetter()">
                        <div class="flower-emoji">💌</div>
                        <h3 class="flower-title">Surat Cinta</h3>
                        <p class="flower-desc">Pesan spesial dari hati</p>
                        <button class="btn-card"><i class="fa-regular fa-envelope me-1"></i>Buka Surat</button>
                    </div>
                </div>

                <!-- Love Meter -->
                <div class="love-meter" data-aos="fade-up">
                    <div class="meter-fill"></div>
                </div>
                <p class="text-center text-white fs-5">❤️ Cinta kita 100% tulus ❤️</p>

                <!-- Magic Button -->
                <form method="POST" class="text-center">
                    <button type="submit" name="magic" class="btn-magic">
                        <i class="fa-solid fa-wand-magic-sparkles me-2"></i>
                        Magic Surprise
                        <i class="fa-solid fa-wand-magic-sparkles ms-2"></i>
                    </button>
                </form>

                <!-- Magic Result -->
                <?php
                if (isset($_POST['magic'])):
                    $surprises = [
                        '🎉 Kamu adalah keajaiban dalam hidupku!',
                        '💖 Aku mencintaimu lebih dari apapun!',
                        '✨ Kamu membuat dunia ini indah!',
                        '🌟 Bersamamu adalah keajaiban!',
                        '💫 Cinta kita abadi selamanya!'
                    ];
                    $msg = $surprises[array_rand($surprises)];
                ?>
                <div class="alert text-center p-3 mt-4" style="background: #ff4d8d; color: white; border: 3px solid white; border-radius: 50px;">
                    <i class="fa-solid fa-heart-circle-check me-2"></i><?= $msg ?>
                </div>
                <?php endif; ?>

                <!-- Statistics -->
                <div class="row g-3 mt-5">
                    <?php
                    $stats = [
                        ['fa-heart', rand(365, 3650), 'Hari Bahagia'],
                        ['fa-star', '∞', 'Kenangan Indah'],
                        ['fa-face-smile', '100%', 'Cinta Tulus']
                    ];
                    foreach($stats as $i => $s):
                    ?>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="<?= $i*100 ?>">
                        <div class="stat-card">
                            <i class="fa-regular <?= $s[0] ?> fa-3x"></i>
                            <div class="stat-number"><?= $s[1] ?></div>
                            <div><?= $s[2] ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Footer -->
            <footer>
                <i class="fa-regular fa-heart me-2"></i>
                Made with Love for You
                <i class="fa-regular fa-heart ms-2"></i>
            </footer>
        </div>
    </div>

    <!-- Navigation -->
    <div class="nav-buttons">
        <div class="nav-button" onclick="changeQuote(currentQuote - 1)"><i class="fas fa-chevron-left"></i></div>
        <div class="nav-button" onclick="changeQuote(currentQuote + 1)"><i class="fas fa-chevron-right"></i></div>
    </div>

    <!-- Modals -->
    <div class="modal fade" id="flowerModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="flowerModalTitle">🌹 Mawar Merah</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="flowerModalEmoji" class="modal-emoji">🌹</div>
                    <div id="flowerModalMessage" class="modal-message"></div>
                    <div id="flowerModalSignature" class="modal-signature"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="loveModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">💌 Surat Cinta</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-emoji">💌</div>
                    <div class="modal-message">
                        Untukmu yang selalu di hati,<br><br>
                        Setiap detik bersamamu adalah anugerah terindah. 
                        Senyummu adalah matahariku, tawamu adalah musik terindah.<br><br>
                        Di hari Valentine ini, aku ingin kamu tahu 
                        bahwa kamu adalah segalanya bagiku.
                    </div>
                    <div class="modal-signature">
                        I Love You
                        <div style="font-size: 1rem;">- Dari hatiku -</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({ duration: 1000, once: false });

        // Flower Data
        const flowerData = {
            1: {
                title: '🌹 Mawar Merah',
                emoji: '🌹',
                message: 'Setiap kelopak mawar merah ini mengingatkanku padamu. Merahnya seperti cinta yang membara di hatiku. Seperti mawar yang selalu mekar, cintaku padamu akan abadi selamanya.',
                signature: 'I Love You Forever'
            },
            2: {
                title: '🌷 Tulip Pink',
                emoji: '🌷',
                message: 'Tulip pink ini adalah simbol kasih sayangku yang tulus. Warnanya yang lembut mengingatkanku pada kelembutan hatimu. Bersamamu, aku merasa dicintai.',
                signature: 'Always Love You'
            },
            3: {
                title: '🌸 Bunga Sakura',
                emoji: '🌸',
                message: 'Sakura mengajarkan bahwa keindahan sejati itu singkat, tapi cinta kita abadi. Setiap musim semi, sakura mengingatkanku pada senyummu.',
                signature: 'Forever Yours'
            }
        };
        
        // Show Flower Modal
        function showFlower(type) {
            const d = flowerData[type];
            document.getElementById('flowerModalTitle').innerHTML = d.title;
            document.getElementById('flowerModalEmoji').innerHTML = d.emoji;
            document.getElementById('flowerModalMessage').innerHTML = d.message;
            document.getElementById('flowerModalSignature').innerHTML = d.signature;
            new bootstrap.Modal(document.getElementById('flowerModal')).show();
        }
        
        // Show Love Letter
        function showLoveLetter() {
            new bootstrap.Modal(document.getElementById('loveModal')).show();
        }

        // Particle Canvas
        const canvas = document.getElementById('particle-canvas');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 3 + 1;
                this.speedX = Math.random() * 2 - 1;
                this.speedY = Math.random() * 2 - 1;
                this.color = `rgba(255, ${Math.random()*100+77}, ${Math.random()*100+141}, 0.3)`;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.x > canvas.width) this.x = 0;
                if (this.x < 0) this.x = canvas.width;
                if (this.y > canvas.height) this.y = 0;
                if (this.y < 0) this.y = canvas.height;
            }
            draw() {
                ctx.fillStyle = this.color;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI*2);
                ctx.fill();
            }
        }

        let particles = [];
        for (let i = 0; i < 50; i++) particles.push(new Particle());
        
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => { p.update(); p.draw(); });
            requestAnimationFrame(animate);
        }
        animate();

        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });

        // Quote Carousel
        const quotes = <?= json_encode($quotes) ?>;
        let currentQuote = 0;
        const quoteText = document.querySelector('#active-quote .quote-text');
        const quoteAuthor = document.querySelector('#active-quote .quote-author');
        const dots = document.querySelectorAll('.quote-dot');
        
        function changeQuote(index) {
            if (index < 0) index = quotes.length - 1;
            if (index >= quotes.length) index = 0;
            
            quoteText.innerHTML = `"${quotes[index].text}"`;
            quoteAuthor.innerHTML = `— ${quotes[index].author}`;
            
            dots.forEach((d, i) => {
                d.classList.toggle('active', i === index);
            });
            
            currentQuote = index;
        }
        
        setInterval(() => changeQuote(currentQuote + 1), 5000);

        // Keyboard Navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') changeQuote(currentQuote - 1);
            if (e.key === 'ArrowRight') changeQuote(currentQuote + 1);
        });

        // Sparkle Effect
        function createSparkle() {
            const s = document.createElement('div');
            s.innerHTML = '✨';
            s.style.cssText = `
                position: fixed; left: ${Math.random()*100}%; top: ${Math.random()*100}%;
                font-size: ${Math.random()*20+10}px; color: ${['#ffd700','#ff4d8d','#fff'][Math.floor(Math.random()*3)]};
                z-index: 9999; pointer-events: none; animation: sparkleFloat ${Math.random *2+2}s linear forwards`;
            document.body.appendChild(s);
            setTimeout(() => s.remove(), 3000);
        }
        
        setInterval(createSparkle, 2000);
    </script>
</body>
</html>