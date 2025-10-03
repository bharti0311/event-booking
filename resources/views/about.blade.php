<?php
// about.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About TrueBlue Events</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    body { font-family: 'Poppins', sans-serif; background: #f8fafc; color: #1e293b; margin: 0; padding: 0;}
    
    /* Hero Section */
    .hero {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        padding: 80px 5%;
        background: url('https://www.fitpro.com/blog/wp-content/uploads/2024/01/iStock-1324006497.jpg') center/cover no-repeat;
        position: relative;
        color: #fff;
        border-radius: 0;
    }
    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.5); /* Dark overlay for readability */
        z-index: 1;
        border-radius: 0;
    }
    .hero .hero-text {
        position: relative;
        z-index: 2;
        max-width: 600px;
    }
    .hero .highlight { 
        display: inline-block; 
        background: linear-gradient(92.25deg, #F8BD00 16.85%, #FFE182 79.24%); 
        padding: 8px 20px; 
        border-radius: 6px; 
        font-weight: 700; 
        color: #fff; 
        transform: rotate(3deg); 
        margin-bottom: 20px; 
    }
    .hero h2 { font-size: 2rem; line-height: 1.5; }
    .hero img { max-width: 100%; border-radius: 12px; position: relative; z-index:2; }

    .nav-bar { background: #003399; color: #fff; display: flex; flex-wrap: wrap; justify-content: center; gap: 25px; padding: 15px 0; font-weight: 500; }
    .nav-bar a { color: #fff; text-decoration: none; padding: 0 10px; border-right: 1px solid rgba(255,255,255,0.5); }
    .nav-bar a:last-child { border-right: none; }

    .section { max-width: 1200px; margin: 60px auto; padding: 0 20px; }
    .section h1 { font-size: 2.5rem; margin-bottom: 25px; }
    .section h1 .gold { color: gold; font-weight: bold; }

    .buttons-bar { display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 50px; }
    .buttons-bar .btn { border-radius: 6px; padding: 8px 18px; font-weight: 500; }

    .info-cards { display: flex; flex-wrap: wrap; gap: 30px; }
    .info-card { flex: 1 1 300px; background: #fff; border-radius: 12px; padding: 25px; box-shadow: 0 8px 20px rgba(0,0,0,0.05); transition: transform 0.3s; }
    .info-card:hover { transform: translateY(-5px); }
    .info-card .icon { font-size: 36px; margin-right: 12px; vertical-align: middle; }
    .info-card h6 { display: inline-block; font-weight: 700; font-size: 1.2rem; vertical-align: middle; margin: 0; }
    .info-card p { margin-top: 15px; color: #475569; line-height: 1.6; }

    footer { background: #003399; color: #fff; padding: 60px 5%; }
    footer h5 { font-weight: 700; margin-bottom: 20px; }
    footer a { color: #fff; text-decoration: none; display: block; margin-bottom: 8px; }
    footer a:hover { text-decoration: underline; }
    footer .footer-top { display: flex; flex-wrap: wrap; gap: 40px; justify-content: space-between; }
    footer .footer-col { flex: 1 1 200px; }
    footer .footer-bottom { text-align: center; margin-top: 40px; font-size: 0.9rem; color: #dbeafe; }
</style>
</head>
<body>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-text">
        <div class="highlight">TrueBlue Events</div>
        <h2>The complete event guide, <br>so you can experience more and plan less.</h2>
    </div>
  
</section>

<!-- Navigation Bar -->
<nav class="nav-bar">
    <?php
    $navItems = ['Events', 'Workshops', 'Competitions', 'Webinars', 'Showcases', 'Exhibitions'];
    foreach($navItems as $index => $item) {
        echo "<a href='#'>$item</a>";
    }
    ?>
</nav>

<!-- Main Section -->
<section class="section">
    <!-- Buttons -->
    <div class="buttons-bar">
        <button class="btn btn-primary">About</button>
        <button class="btn btn-outline-light">Terms & Conditions</button>
        <button class="btn btn-outline-light">Privacy Policy</button>
        <button class="btn btn-outline-light">Contact Us</button>
    </div>

    <!-- Who We Are -->
    <div class="who-we-are mb-5">
        <h1><span class="gold">WHO</span> WE ARE</h1>
        <p>At TrueBlue Events, we believe that learning goes far beyond the classroom. We're building India’s first AI-powered platform dedicated to extracurricular and skill-based events—a one-stop ecosystem where event organizers and participants thrive.</p>
        <p>From seamless registration and marketing tools to personalized organizer pages and a smart discovery experience, TrueBlue Events simplifies how students, clubs, and private organizers connect, collaborate, and grow.</p>
    </div>

    <!-- Info Cards -->
    <div class="info-cards">
        <?php
        $infoCards = [
            ['title'=>'OUR BELIEF','icon'=>'<i class="fa-solid fa-rocket" style="color:#1abc9c"></i>','description'=>'TrueBlue connects students with enriching events and streamlines management for organizers—making it easy to discover, join, and host impactful experiences beyond the classroom.'],
            ['title'=>'OUR MISSION','icon'=>'<i class="fa-solid fa-lightbulb" style="color:#2979ff"></i>','description'=>'To create a dynamic platform where students can access events that fuel personal and professional growth, while event organizers can efficiently engage with their ideal participants.'],
            ['title'=>'OUR VISION','icon'=>'<i class="fa-solid fa-eye" style="color:#f4b400"></i>','description'=>'To become the go-to platform for educational and skill-building events, fostering a vibrant community where students and organizers thrive together.']
        ];
        foreach($infoCards as $card){
            echo '<div class="info-card">';
            echo '<div>'.$card['icon'].' <h6>'.$card['title'].'</h6></div>';
            echo '<p>'.$card['description'].'</p>';
            echo '</div>';
        }
        ?>
    </div>
</section>

</body>
</html>
