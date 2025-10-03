<?php
// contact.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us | TrueBlue Events</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
body, html {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background: #f1f3f6;
}

/* Hero Section (half screen) */
.hero {
    height: 50vh;
    width: 100%;
    background: url('https://www.wellingtonhog.co.nz/client_images/2109961.jpg') no-repeat center center/cover;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    color: #fff;
}

.hero::before {
    content:"";
    position: absolute;
    inset:0;
    background: rgba(0,0,0,0.45);
}

.hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    max-width: 800px;
    padding: 0 15px;
}

.hero-content h1 {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 10px;
    background: linear-gradient(to right, #6a2cd9, #2e0066);
    -webkit-background-clip: text;
    color: transparent;
}

.hero-content p {
    font-size: 1.1rem;
    max-width: 500px;
    margin: 0 auto;
    color: #f3f3f3;
}

/* Section styles */
.section {
    padding: 60px 0;
}

/* Section Title */
.section-title {
    text-align: center;
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 35px;
    color: #2d2d2d;
}

/* Contact Info Cards */
.contact-info .card {
    border: none;
    border-radius: 1rem;
    background:#fff;
    box-shadow: 0 3px 12px rgba(0,0,0,0.05);
    transition: transform 0.3s;
    padding: 20px;
}
.contact-info .card:hover { transform: translateY(-3px); }
.contact-info .card-body {
    display: flex;
    align-items: center;
    gap: 12px;
}
.icon-box {
    width: 50px;
    height: 50px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius: 12px;
    background: #e0e0e0;
    color: #4f46e5;
    font-size:1.2rem;
}
.contact-info h6 { margin:0; font-weight:600; font-size:1rem; }
.contact-info p { margin:0; font-size:.9rem; color:#555; }

/* Contact Form */
.contact-form {
    background: #fff;
    border-radius: 1.5rem;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    padding: 35px;
}
.contact-form h3 {
    font-weight:700;
    font-size:1.5rem;
    margin-bottom:20px;
}
.form-control:focus {
    box-shadow: none;
    border-color: #4f46e5;
}
.btn-submit {
    background: linear-gradient(to right, #4f46e5, #7c3aed);
    color: #fff;
    font-weight:600;
    border-radius:50px;
    transition: all 0.3s;
}
.btn-submit:hover { transform: scale(1.03); }

/* Extra Info / Social Media */
.extra-info {
    background:#fff;
    border-radius:1rem;
    padding:25px 20px;
    box-shadow:0 3px 12px rgba(0,0,0,0.05);
    text-align:center;
    height:100%;
    display:flex;
    flex-direction:column;
    justify-content:center;
}
.social-links a {
    width:40px; height:40px; display:inline-flex; align-items:center; justify-content:center;
    border-radius:50%; background:#e0e0e0; margin:0 6px; color:#333; transition: all .3s;
}
.social-links a:hover { background:#4f46e5; color:#fff; }
.extra-info p { margin-top:15px; color:#555; font-style:italic; }

/* Responsive */
@media(max-width:1200px) {
    .hero-content h1 { font-size:2.3rem; }
}
@media(max-width:992px) {
    .hero-content h1 { font-size:2rem; }
    .contact-form { padding:25px; margin-bottom:30px; }
    .extra-info { margin-bottom:30px; }
}
@media(max-width:768px) {
    .contact-info .card-body { flex-direction: column; gap:10px; text-align:center; }
    .hero { height:45vh; }
}
@media(max-width:576px) {
    .hero { height:40vh; }
    .hero-content h1 { font-size:1.8rem; }
    .hero-content p { font-size:1rem; }
    .contact-form, .extra-info { padding:20px; }
}
</style>
</head>
<body>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        
    </div>
</section>

<!-- Contact Info Section -->
<section class="section contact-info">
    <div class="container">
        <h2 class="section-title">Get in Touch</h2>
        <div class="row g-4 justify-content-center text-center">
            <div class="col-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="icon-box"><i class="far fa-clock"></i></div>
                        <div>
                            <h6>Business Hours</h6>
                            <p>Mon-Fri, 9am-6pm</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="icon-box"><i class="fas fa-phone"></i></div>
                        <div>
                            <h6>Call Us</h6>
                            <p>+91 63030 08654</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="icon-box"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h6>Email</h6>
                            <p>info@trueblueevents.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h6>Location</h6>
                            <p>Hyderabad, India</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form + Social Info -->
<section class="section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="contact-form">
                    <h3>Send a Message</h3>
                    <form method="post" action="#">
                        <div class="mb-2">
                            <input type="text" class="form-control" name="name" placeholder="Full Name *">
                        </div>
                        <div class="mb-2">
                            <input type="email" class="form-control" name="email" placeholder="Email *">
                        </div>
                        <div class="mb-2">
                            <input type="tel" class="form-control" name="contact" placeholder="Contact Number *">
                        </div>
                        <div class="mb-2">
                            <textarea class="form-control" name="message" rows="4" placeholder="Your Message *"></textarea>
                        </div>
                        <button type="submit" class="btn btn-submit w-100 py-2 mt-2">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="extra-info">
                    <h3>Connect with Us</h3>
                    <p>Follow TrueBlue Events for updates and inspiration.</p>
                    <div class="social-links mt-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <p>"Creating unforgettable experiences, one event at a time."</p>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
