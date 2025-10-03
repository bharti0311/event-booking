<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Australian Events - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <style>
        :root {
            --primary-color: #2c5aa0;
            --secondary-color: #f8f9fa;
            --accent-color: #28a745;
            --text-dark: #2c3e50;
            --text-muted: #6c757d;
            --border-light: #e9ecef;
            --shadow-light: 0 2px 10px rgba(0,0,0,0.08);
            --shadow-hover: 0 4px 20px rgba(0,0,0,0.12);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: #ffffff;
        }

        .navbar {
            background: #ffffff;
            box-shadow: var(--shadow-light);
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-light);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary-color) !important;
        }

        .navbar-nav .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            transition: color 0.2s ease;
        }

        .navbar-nav .nav-link:hover {
            color:  "blue" !important;
        }

        /* .navbar-nav .nav-link.active {
            color: var(--primary-color) !important;
            font-weight: 600;
        } */

        .dropdown-menu {
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-light);
            border-radius: 8px;
            padding: 0.5rem 0;
        }

        .dropdown-item {
            color: var(--text-dark);
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            transition: background-color 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: var(--secondary-color);
            color: var(--primary-color);
        }

        .main-header {
            background: linear-gradient(rgba(0, 180, 170, 0.85), rgba(0, 120, 180, 0.85)),
                        url('https://images.pexels.com/photos/625644/pexels-photo-625644.jpeg') center/cover;
            color: #fff;
            padding: 4rem 1rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at center, rgba(255,255,255,0.1), rgba(0,0,0,0.5));
            z-index: 1;
            animation: pulse 8s infinite alternate;
        }

        .main-header .container {
            position: relative;
            z-index: 2;
            max-width: 800px;
        }

        .main-header h1 {
            font-size: 3.8rem;
            font-weight: 900;
            margin-bottom: 1rem;
            text-shadow: 3px 3px 10px rgba(0,0,0,0.4);
            letter-spacing: -1px;
            animation: fadeInDown 1.5s ease-in-out;
        }

        .main-header p {
            font-size: 1.5rem;
            font-weight: 500;
            opacity: 0.95;
            margin-bottom: 0;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.3);
            animation: fadeInUp 1.8s ease-in-out;
        }

        /* Animations */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            from { opacity: 0.6; }
            to { opacity: 0.9; }
        }

        .content-section {
            padding: 3rem 0;
            background-color: var(--secondary-color);
        }

        .section-title {
            font-size: 2.2rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 2rem;
            text-align: center;
        }

        .events-header {
            background: white;
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--border-light);
            margin-bottom: 2rem;
        }

        .events-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .events-count {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        .filter-select {
            border: 1px solid var(--border-light);
            border-radius: 6px;
            padding: 0.5rem 1rem;
            background: white;
            color: var(--text-dark);
            font-weight: 500;
            min-width: 150px;
        }

        .event-card {
            background: white;
            border: 1px solid var(--border-light);
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-light);
            height: 100%;
            display: flex;
            flex-direction: column;
            max-width: 100%;
        }

        .event-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
            border-color: var(--primary-color);
        }

        .event-image {
            height: 160px;
            background-size: cover;
            background-position: center;
            background-color: #f8f9fa;
            position: relative;
        }

        .event-status {
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            background: var(--accent-color);
            color: white;
            padding: 0.2rem 0.6rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .card-body {
            padding: 1.2rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
      .shadow-text {
    font-size: 150px;
    font-weight: 800;
    text-align: center;
    background: linear-gradient(to bottom, #6a2cd9, #2e0066);
    -webkit-background-clip: text;
    color: transparent;

    /* Sharper white + dark shadow */
    text-shadow: 
        0px 0px 4px rgba(255, 255, 255, 0.95),  /* clear white edge */
        0px 6px 14px rgba(0, 0, 0, 0.5);        /* strong dark depth */
    
    letter-spacing: -5px;
}

.bottom-shadow {
    width: 400px;
    height: 40px;
    background: rgba(0, 0, 0, 0.6);
    filter: blur(25px);
    border-radius: 50%;
    margin: 0 auto;
    margin-top: -20px;
}

        .event-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.8rem;
            line-height: 1.3;
            height: 2.6rem;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .event-title a {
            color: inherit;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .event-title a:hover {
            color: var(--primary-color);
        }

        .event-details {
            margin-bottom: 1rem;
            flex: 1;
        }

        .event-detail {
            display: flex;
            align-items: flex-start;
            margin-bottom: 0.5rem;
            color: var(--text-muted);
            font-size: 0.85rem;
            line-height: 1.4;
        }

        .event-detail i {
            width: 16px;
            color: var(--primary-color);
            margin-right: 0.6rem;
            font-size: 0.8rem;
            margin-top: 0.1rem;
            flex-shrink: 0;
        }

        .event-detail strong {
            color: var(--text-dark);
        }

        .event-detail span {
            word-break: break-word;
        }

        .btn-view-event {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 0.6rem 1.2rem;
            font-weight: 500;
            font-size: 0.85rem;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.2s ease;
            margin-top: auto;
        }

        .btn-view-event:hover {
            background: #1e3a72;
            color: white;
            transform: translateY(-1px);
        }

        .pagination-wrapper {
            padding: 2rem 0;
            background: white;
            border-top: 1px solid var(--border-light);
        }

        .pagination {
            justify-content: center;
            margin-bottom: 0;
        }

        .page-link {
            color: var(--primary-color);
            border: 1px solid var(--border-light);
            padding: 0.75rem 1rem;
            margin: 0 0.25rem;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .page-link:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .page-item.active .page-link {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .page-item.disabled .page-link {
            color: var(--text-muted);
            background: var(--secondary-color);
        }

        .no-events {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-muted);
        }

        .no-events i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--border-light);
        }

        /* Footer General Styles */
        .footer {
            background-color: #333333;
            color: #ffffff;
            padding: 60px 20px 30px 20px;
            font-family: "Segoe UI", sans-serif;
            position: relative;
        }
        .footer-container {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: space-between;
        }
        .footer-column {
            flex: 1 1 220px;
            min-width: 220px;
        }
        .footer-column h3, .footer-column h4 {
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
        }
        .footer-column h3::after, .footer-column h4::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 40px;
            height: 3px;
            background: #ffffff;
            border-radius: 2px;
        }
        .footer-column p, .footer-column li, .footer-column a {
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.875rem;
            line-height: 1.6;
            text-decoration: none;
        }
        .footer-column ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-column li {
            margin-bottom: 0.5rem;
        }
        .footer-column a:hover {
            color: #ffffff;
            text-decoration: underline;
        }
        .footer-features span {
            display: inline-block;
            margin: 0.25rem 0.5rem 0.25rem 0;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            font-size: 0.75rem;
        }
        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            margin-right: 0.5rem;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.3s ease;
        }
        .footer-social a:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }
        .footer-bottom {
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.2);
            padding-top: 1rem;
            margin-top: 2rem;
            font-size: 0.75rem;
            color: rgba(255,255,255,0.7);
        }

        .carousel-container {
            max-width: 1300px;
            margin: 40px auto;
            padding: 0 20px;
            font-family: "Segoe UI", sans-serif;
        }

        .carousel-heading {
            text-align: center;
            font-weight: 700;
            color: #333333;
            margin-bottom: 20px;
        }

        .carousel-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .carousel {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            gap: 16px;
            padding: 10px 0;
        }

        .carousel::-webkit-scrollbar {
            display: none;
        }

        .card {
            min-width: 310px;
            flex: 0 0 auto;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            background: #fff;
        }

        .card iframe {
            width: 100%;
            height: 180px;
            display: block;
        }

        .nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: #0d6efd;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .nav-button:hover {
            background: #0b5ed7;
        }

        .nav-left { left: -20px; }
        .nav-right { right: -20px; }

        .nav-button.disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .booking-card {
            background: #f5f5fb;
            padding: 16px;
            margin-bottom: 12px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        /* Auth related styles */
        .auth-dropdown {
            position: relative;
        }

       .user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%; /* makes it circular */
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ddd; /* fallback color */
}

.user-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* ensures image fills circle without distortion */
}

        .d-none {
            display: none !important;
        }

        #bookEventBtn {
    background-color: #6c757d; /* gray */
    color: #fff;
    border-radius: 8px;
    transition: background 0.2s;
}
#bookEventBtn:hover {
    background-color: #5a6268; /* darker gray on hover */
}


        .bookEventBtn {
    background-color: #6c757d; /* gray */
    color: #fff;
    border-radius: 8px;
    transition: background 0.2s;
}

.bookEventBtn:hover {
    background-color: #5a6268; /* darker gray on hover */
}
        .loading {
            text-align: center;
            padding: 2rem;
            color: var(--text-muted);
        }

        .brand-text {
  color: #333333 !important; /* Bootstrap's gray */
  font-weight: bold;
}
        /* Responsive Design */
        @media (max-width: 1200px) {
            .col-xl-3 {
                flex: 0 0 25%;
                max-width: 25%;
            }
        }
        
        @media (max-width: 992px) {
            .col-lg-3 {
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }
            
            .event-image {
                height: 140px;
            }
            
            .event-title {
                font-size: 1rem;
            }
            
            .event-detail {
                font-size: 0.8rem;
            }
        }

        @media (max-width: 768px) {
            .main-header {
                padding: 2rem 0;
            }
            
            .main-header h1 {
                font-size: 2.4rem;
            }
            
            .main-header p {
                font-size: 1.1rem;
            }
            
            .events-meta {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-select {
                width: 100%;
            }
            
            .content-section {
                padding: 2rem 0;
            }
            
            .col-md-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }
            
            .event-image {
                height: 120px;
            }

            .card { min-width: 250px; }
            .nav-left { left: -10px; }
            .nav-right { right: -10px; }
        }

        @media (max-width: 576px) {
            .main-header {
                padding: 1.5rem 0;
            }
            
            .main-header h1 {
                font-size: 2rem;
                letter-spacing: -0.3px;
            }
            
            .main-header p {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .col-sm-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }
            
            .event-card {
                margin-bottom: 1rem;
            }
            
            .event-image {
                height: 100px;
            }
            
            .card-body {
                padding: 1rem;
            }
            
            .event-title {
                font-size: 0.95rem;
                margin-bottom: 0.6rem;
            }
            
            .event-detail {
                font-size: 0.75rem;
                margin-bottom: 0.4rem;
            }
            
            .btn-view-event {
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 480px) {
            .col-12 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            
            .row.g-3 {
                --bs-gutter-x: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
           <a class="navbar-brand brand-text" href="/">
  <i class="fas fa-calendar-alt me-2"></i>BookMyVenue
</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                    
                    <!-- Guest Navigation (shown when not logged in) -->
                    <li class="nav-item" id="registerLink">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                    
                    <!-- Authenticated Navigation (shown when logged in) -->
                 <li class="nav-item dropdown auth-dropdown d-none" id="userDropdown" style="position: relative;">
    <a class="nav-link dropdown-toggle" href="#" role="button" id="userDropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="user-avatar" id="userAvatar">
            <img src="https://tse4.mm.bing.net/th/id/OIP.OYbzbbyzogwtriubL2pP0AHaHa?pid=Api&P=0&h=180" alt="" style="width:40px; height:40px; border-radius:50%;">
        </div>
    </a>

    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdownMenu" style="background:#fff; box-shadow:0 4px 12px rgba(0,0,0,0.15); min-width:180px;">
        <li>
            <a class="dropdown-item" href="/bookings" id="myBookingsLink">
                <i class="fas fa-calendar me-2"></i>My Bookings
            </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <a class="dropdown-item" href="#" id="logoutLink">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </a>
        </li>
    </ul>
</li>

                        </ul>
                    </li>
<!--                     
                    <li>
                        <div id="bookingContainer"></div>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Header -->
    <header class="main-header">
        <div class="container">
            <h1>Upcoming Events in Australia</h1>
            <p>Discover exciting events happening across the country</p>
        </div>
    </header>

    <!-- Events Section -->
    <section class="content-section">
        <div class="container">
            <div class="events-header">
                <div class="events-meta">
                   <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                    <!-- Events Count -->
                    <div class="events-count" id="eventsCount">
                        Loading events...
                    </div>

                    <!-- Search Bar -->
                    <div class="flex-grow-1 w-100">
                        <div class="input-group w-100">
                            <input type="text" id="searchInput" 
                                   class="form-control form-control-lg" 
                                   placeholder="Search events...">
                            <button class="btn px-4" type="button" id="searchBtn" style="background-color: #2c5aa0; color: white;">
                                Search
                            </button>
                        </div>
                    </div>
                </div>

                    <select class="filter-select" id="filterSelect">
                        <option value="all">All Events</option>
                        <option value="tech">Technology</option>
                        <option value="music">Music & Arts</option>
                        <option value="business">Business</option>
                        <option value="food">Food & Wine</option>
                        <option value="sports">Sports</option>
                    </select>
                </div>
            </div>

            <div id="eventsContainer">
                <div class="loading">
                    <i class="fas fa-spinner fa-spin fa-2x"></i>
                    <p>Loading events...</p>
                </div>
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper d-none" id="paginationWrapper">
                <nav aria-label="Events pagination">
                    <ul class="pagination" id="paginationContainer">
                        <!-- Pagination will be generated by JavaScript -->
                    </ul>
                </nav>
            </div>
        </div>
    </section>

    <!-- Event Details Modal -->
    <div class="modal fade" id="eventDetailsModal" tabindex="-1" aria-labelledby="eventDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventDetailsModalLabel">Event Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="eventDetailsBody">
                    <!-- Event details will be populated here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn" id="bookEventBtn" onclick="bookEvent()">Book Event</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Confirmation Modal -->
    <div class="modal fade" id="bookingConfirmModal" tabindex="-1" aria-labelledby="bookingConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title "  id="bookingConfirmModalLabel">Confirm Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to book this event?</p>
                    <div id="bookingEventSummary">
                        <!-- Event summary will be shown here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn bookEventBtn" id="confirmBookingBtn">Confirm Booking</button>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container py-5">
            <div class="row align-items-center">
                <!-- Text content -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <h2 class="fw-bold text-warning">Significance of TRUE BLUE EVENTS</h2>
                    <p>
                        Event booking in India has become increasingly important due to the rapid growth of the country's event industry. 
                        With a diverse population and a rising middle class, there is a strong demand for a wide variety of events—ranging 
                        from birthdays, weddings, and corporate conferences to music festivals and cultural celebrations.
                    </p>
                    <p>
                        An event booking platform provides a convenient and efficient way to manage and organize events, attracting 
                        a large market of planners, organizers, and attendees. As the Indian market continues to expand, such platforms 
                        play a vital role in streamlining processes, optimizing resources, and enhancing the overall event experience, 
                        helping the industry grow even further.
                    </p>
                </div>

                <!-- Single image -->
                <div class="col-md-6 text-center">
                    <img src="https://www.shata.in/significance.jpg" class="img-fluid rounded shadow-sm" alt="Significance of TRUE BLUE EVENTS">
                </div>
            </div>
        </div>
    </section>


    
    <div class="carousel-container">
        <h2 class="carousel-heading">Our Blogs</h2>
        <div class="carousel-wrapper">
            <button class="nav-button nav-left"><i class="fa fa-chevron-left"></i></button>
            <div class="carousel">
                <div class="card">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="card">
                    <iframe src="https://www.youtube.com/embed/3tmd-ClpJxA" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="card">
                    <iframe src="https://www.youtube.com/embed/L_jWHffIx5E" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="card">
                    <iframe src="https://www.youtube.com/embed/IcrbM1l_BoI" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="card">
                    <iframe src="https://www.youtube.com/embed/V-_O7nl0Ii0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <button class="nav-button nav-right"><i class="fa fa-chevron-right"></i></button>
        </div>
    </div>
]



<section>
    <!-- Questions & Answers Section -->
<div class="container my-5">
    <div class="row align-items-center">
        <!-- Left Side -->
        <div class="col-md-5 mb-4">
            <h2 class="fw-bold">Questions & Answers</h2>
            <p class="text-muted">
                Can’t find your questions in the FAQs? Reach out to us. 
                We’ll do our best to help you out!
            </p>
            <a href="#contact" class="btn btn-light border-0 shadow-sm text-primary fw-bold">
                I Have More Questions →
            </a>
        </div>

        <!-- Right Side Accordion -->
        <div class="col-md-7">
            <div class="accordion" id="faqAccordion">
                <!-- Q1 -->
                <div class="accordion-item border-0 mb-2 shadow-sm rounded">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold text-dark" 
                                type="button" data-bs-toggle="collapse" 
                                data-bs-target="#faq1">
                            How do I book tickets on BookMyVenue Events?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            Simply browse events, choose your desired event, select the number of tickets, 
                            and complete your purchase using our secure checkout.
                        </div>
                    </div>
                </div>

                <!-- Q2 -->
                <div class="accordion-item border-0 mb-2 shadow-sm rounded">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold text-dark" 
                                type="button" data-bs-toggle="collapse" 
                                data-bs-target="#faq2">
                            Can I get a refund if I can’t attend?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            Refunds depend on the event organizer’s policy. Some events allow refunds 
                            or ticket transfers, while others may not. Please check the event details page.
                        </div>
                    </div>
                </div>

                <!-- Q3 -->
                <div class="accordion-item border-0 mb-2 shadow-sm rounded">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold text-dark" 
                                type="button" data-bs-toggle="collapse" 
                                data-bs-target="#faq3">
                            Does BookMyVenue  support group bookings?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            Yes!BookMyVenue allows group ticket purchases. Discounts may apply 
                            for bulk bookings, depending on the organizer.
                        </div>
                    </div>
                </div>

                <!-- Q4 -->
                <div class="accordion-item border-0 mb-2 shadow-sm rounded">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold text-dark" 
                                type="button" data-bs-toggle="collapse" 
                                data-bs-target="#faq4">
                            What payment methods are available?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            We support credit/debit cards, UPI, net banking, and popular digital wallets 
                            for a seamless payment experience.
                        </div>
                    </div>
                </div>

                <!-- Q5 -->
                <div class="accordion-item border-0 shadow-sm rounded">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold text-dark" 
                                type="button" data-bs-toggle="collapse" 
                                data-bs-target="#faq5">
                            How do I contact support if I face issues?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            Our support team is available 24/7. You can contact us via live chat, email, 
                            or through the “Help & Support” section on our website.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Contact Us Section -->
<div class="container my-5">
    <div class="row align-items-center">
        <!-- Left Side -->
        <div class="col-md-5 mb-4">
            <h2 class="fw-bold">Contact Us</h2>
            <p class="text-muted">
                If you still have questions we are happy to clarify anything that’s on your mind.
            </p>
            <p class="text-muted">
                We offer regular support <br>
                <span class="fw-bold text-primary">from 8am to 5pm (AEST - 7 days a week)</span>
            </p>
            <a href="#support" class="btn btn-outline-primary fw-bold rounded-pill px-4">
                Contact Us →
            </a>
        </div>

        <!-- Right Side Contact Info -->
  <!-- Right Side Contact Info -->
<div class="col-md-7">
    <div class="p-4 bg-light rounded shadow-sm">
        <div class="row g-4">
            <!-- Email -->
            <div class="col-md-6 d-flex align-items-center">
                <div class="me-3">
                    <i class="bi bi-envelope-fill fs-3 text-primary"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold">Email</h6>
                    <a href="mailto:support@trueblueevents.com" class="text-decoration-none text-dark fw-semibold">
                        support@bookmyvenue.com
                    </a>
                </div>
            </div>

            <!-- Phone -->
            <div class="col-md-6 d-flex align-items-center">
                <div class="me-3">
                    <i class="bi bi-telephone-fill fs-3 text-primary"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold">Phone</h6>
                    <a href="tel:+61234567890" class="text-decoration-none text-dark fw-semibold">
                        +61 2 3456 7890
                    </a>
                </div>
            </div>

            <!-- WhatsApp -->
            <div class="col-md-6 d-flex align-items-center">
                <div class="me-3">
                    <i class="bi bi-whatsapp fs-3 text-success"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold">WhatsApp (Text)</h6>
                    <a href="https://wa.me/61412345678" class="text-decoration-none text-dark fw-semibold">
                        +61 412 345 678
                    </a>
                </div>
            </div>

            <!-- Address -->
            <div class="col-md-6 d-flex align-items-start">
                <div class="me-3">
                    <i class="bi bi-geo-alt-fill fs-3 text-danger"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold">Address</h6>
                    <p class="mb-0 text-muted">
                       BookMyVenue HQ <br>
                        123 George Street, <br>
                        Sydney, NSW 2000, Australia
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</div>

</section>
    <!-- Why Choose TrueBlue Events Section -->
<div class="container my-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Why Choose BookMyVenue ?</h2>
        <p class="text-muted">
            The <span class="fw-bold">#1 Event Ticketing Website</span> for all event types. 
            Whether it’s concerts, events, retreats, amusement parks, trade shows, escape games, or marathons, 
            we’ve got you covered. Sell tickets online for any event effortlessly.
        </p>
        <div class="d-inline-block border-bottom border-2 border-primary mt-2"></div>
    </div>

    <div class="row g-4">
        <!-- Flexibility -->
        <div class="col-md-4">
            <div class="p-4 shadow-sm h-100 bg-white rounded">
                <div class="mb-3">
                    <i class="bi bi-aspect-ratio text-primary fs-1"></i>
                </div>
                <h5 class="fw-bold">Flexibility</h5>
                <p class="text-muted mb-0">
                    BookMyVenue  offers a user-friendly ticketing system designed with all the essential features 
                    to streamline both online and Box office ticket sales, ensuring a seamless and efficient 
                    ticketing experience.
                </p>
            </div>
        </div>


        

        <!-- 24/7 Expert Support -->
        <div class="col-md-4">
            <div class="p-4 shadow-sm h-100 bg-white rounded">
                <div class="mb-3">
                    <i class="bi bi-headset text-primary fs-1"></i>
                </div>
                <h5 class="fw-bold">24/7 Expert Support</h5>
                <p class="text-muted mb-0">
                    24/7 expert assistance to help event organizers set up, manage, and sell tickets effortlessly. 
                    Our dedicated customer support team ensures a seamless and hassle-free ticketing service. 
                    Designed to fit event organizer's unique needs.
                </p>
            </div>
        </div>

        <!-- Simplified Schedule Management -->
        <div class="col-md-4">
            <div class="p-4 shadow-sm h-100 bg-white rounded">
                <div class="mb-3">
                    <i class="bi bi-calendar-plus text-primary fs-1"></i>
                </div>
                <h5 class="fw-bold">Simplified Schedule Management</h5>
                <p class="text-muted mb-0">
                    Customize event schedules effortlessly, whether you’re scheduling a specific date range 
                    or a time slot. BookMyVenue Events simplifies event ticketing with a seamless experience 
                    through its flexible scheduling feature.
                </p>
            </div>
        </div>
    </div>
</div>

    
    <footer class="footer">
        <div class="footer-container">
            <!-- About -->
            <div class="footer-column">
                <h3>TrueBlueEvents Platform</h3>
                <p>
                    Organize and manage events effortlessly. Create events, send invitations, and track bookings all in one platform.
                </p>
                <div class="footer-features">
                    <span>Efficient</span>
                    <span>Secure</span>
                    <span>User-Friendly</span>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="footer-column">
                <h4>Contact Us</h4>
                <ul>
                    <li><strong>Address:</strong> 123 Event Street, Australia</li>
                    <li><strong>Phone:</strong> <a href="tel:+919876543210">+91 9876543210</a></li>
                    <li><strong>Email:</strong> <a href="mailto:support@eventbooking.com">support@eventbooking.com</a></li>
                </ul>
                <div class="footer-social mt-3">
                    <a href="#" aria-label="Facebook">F</a>
                    <a href="#" aria-label="Twitter">T</a>
                    <a href="#" aria-label="LinkedIn">L</a>
                    <a href="#" aria-label="Instagram">I</a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-column">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/my-events">My Events</a></li>
                    <li><a href="/create-event">Create Event</a></li>
                    <li><a href="/pricing">Pricing</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>

            <!-- Policies -->
            <div class="footer-column">
                <h4>Policies</h4>
                <ul>
                    <li><a href="/privacy-policy">Privacy Policy</a></li>
                    <li><a href="/terms">Terms & Conditions</a></li>
                    <li><a href="/refund-policy">Refund Policy</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; 2025 Event Booking Platform. All rights reserved. |
            <a href="/privacy-policy">Privacy Policy</a> | 
            <a href="/terms">Terms of Service</a>
        </div>

            <h1 class="shadow-text"><p>
       BookMyVenue
    </p></h1>
    <div class="bottom-shadow"></div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script>
        // Global variables
        let allEvents = [];
        let filteredEvents = [];
        let currentPage = 1;
        const eventsPerPage = 8;
        let currentFilter = 'all';
        let searchQuery = '';
        let selectedEvent = null; // Store currently selected event for booking

        // Initialize notification system
        const notyf = new Notyf({ 
            duration: 4000, 
            position: { x: 'right', y: 'top' } 
        });

        // Default images for events
        const defaultImages = [
            'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=400&h=250&fit=crop',
            'https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=400&h=250&fit=crop',
            'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=400&h=250&fit=crop',
            'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=400&h=250&fit=crop',
            'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=250&fit=crop',
            'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=400&h=250&fit=crop',
            'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=400&h=250&fit=crop',
            'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=400&h=250&fit=crop',
            'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=400&h=250&fit=crop',
            'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400&h=250&fit=crop',
            'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=400&h=250&fit=crop',
            'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=400&h=250&fit=crop'
        ];

        // Sample events data
        function getSampleEvents() {
            const today = new Date();
            return [
                {
                    id: 1,
                    title: 'Melbourne Tech Summit 2025',
                    event_date: new Date(today.getTime() + 7 * 24 * 60 * 60 * 1000).toISOString().split('T')[0],
                    event_time: '09:00:00',
                    location: 'Melbourne Convention Centre, VIC',
                    description: 'Join us for the biggest tech event in Melbourne',
                    duration: '2 hours'
                },
                {
                    id: 2,
                    title: 'Sydney Music Festival',
                    event_date: new Date(today.getTime() + 12 * 24 * 60 * 60 * 1000).toISOString().split('T')[0],
                    event_time: '18:00:00',
                    location: 'Sydney Opera House, NSW',
                    description: 'Experience amazing music performances',
                    duration: '3 hours'
                },
                {
                    id: 3,
                    title: 'Brisbane Food & Wine Expo',
                    event_date: new Date(today.getTime() + 15 * 24 * 60 * 60 * 1000).toISOString().split('T')[0],
                    event_time: '11:00:00',
                    location: 'Brisbane Convention Centre, QLD',
                    description: 'Taste the best food and wine from Australia',
                    duration: '4 hours'
                },
                {
                    id: 4,
                    title: 'Perth Business Conference',
                    event_date: new Date(today.getTime() + 20 * 24 * 60 * 60 * 1000).toISOString().split('T')[0],
                    event_time: '09:30:00',
                    location: 'Perth Convention Centre, WA',
                    description: 'Network with business leaders',
                    duration: '6 hours'
                }
            ];
        }

        // Function to get default image based on index
        function getDefaultImage(index) {
            return defaultImages[index % defaultImages.length];
        }

        // Function to fetch events from API
        async function fetchEventsFromAPI() {
            try {
                const controller = new AbortController();
                const timeoutId = setTimeout(() => controller.abort(), 5000);

                const response = await fetch('http://127.0.0.1:8000/api/events', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    signal: controller.signal
                });

                clearTimeout(timeoutId);

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const apiEvents = await response.json();

                if (!Array.isArray(apiEvents)) {
                    throw new Error('Invalid API response format');
                }

                // Transform API data to match existing structure
                return apiEvents.map((event, index) => ({
                    id: event.id,
                    title: event.title,
                    date: event.event_date,
                    time: formatTime(event.event_time),
                    location: event.location,
                    organizer: 'Event Organizer',
                    image: getDefaultImage(index),
                    description: event.description || '',
                    duration: event.duration || '2 hours',
                    team_members: event.team_members || [],
                    guests: event.guests || [],
                    attachments: event.attachments || [],
                    reminder: event.reminder || ''
                }));

            } catch (error) {
                console.error('Error fetching events from API:', error);
                
                // Transform sample data to match structure
                return getSampleEvents().map((event, index) => ({
                    id: event.id,
                    title: event.title,
                    date: event.event_date,
                    time: formatTime(event.event_time),
                    location: event.location,
                    organizer: 'Event Organizer',
                    image: getDefaultImage(index),
                    description: event.description || '',
                    duration: event.duration || '2 hours',
                    team_members: [],
                    guests: [],
                    attachments: [],
                    reminder: ''
                }));
            }
        }

        // Date and time formatting functions
        function formatDate(date) {
            return new Date(date).toLocaleDateString('en-AU', {
                weekday: 'short',
                month: 'short',
                day: 'numeric',
                year: 'numeric'
            });
        }

        function formatTime(time) {
            if (time.includes(':')) {
                const [hours, minutes] = time.split(':');
                const hour = parseInt(hours);
                const ampm = hour >= 12 ? 'PM' : 'AM';
                const displayHour = hour % 12 || 12;
                return `${displayHour}:${minutes} ${ampm}`;
            }
            return time;
        }

        function isUpcoming(date, time) {
            const eventDateTime = new Date(`${date}T${time}`);
            return eventDateTime > new Date();
        }

        // Filter and search functions
        function filterEvents() {
            filteredEvents = allEvents.filter(event => {
                // Filter by category
                const matchesFilter = currentFilter === 'all' || 
                    event.title.toLowerCase().includes(currentFilter.toLowerCase());
                
                // Filter by search query
                const matchesSearch = searchQuery === '' || 
                    event.title.toLowerCase().includes(searchQuery.toLowerCase()) ||
                    event.location.toLowerCase().includes(searchQuery.toLowerCase()) ||
                    event.description.toLowerCase().includes(searchQuery.toLowerCase());
                
                // Only show upcoming events
                const isEventUpcoming = isUpcoming(event.date, event.time.replace(/[AP]M/, '').trim() + ':00');
                
                return matchesFilter && matchesSearch && isEventUpcoming;
            });

            currentPage = 1; // Reset to first page when filtering
            updateEventsDisplay();
            updatePagination();
        }

        // Event display functions
        function createEventCard(event) {
            return `
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="event-card">
                        <div class="event-image" style="background-image: url('${event.image}');">
                            ${isUpcoming(event.date, event.time) ? '<div class="event-status">Upcoming</div>' : ''}
                        </div>
                        <div class="card-body">
                            <h3 class="event-title">
                                <a href="#" onclick="showEventDetails(${event.id})" data-bs-toggle="modal" data-bs-target="#eventDetailsModal">
                                    ${event.title}
                                </a>
                            </h3>
                            
                            <div class="event-details">
                                <div class="event-detail">
                                    <i class="fas fa-calendar-alt"></i>
                                    <strong>${formatDate(event.date)}</strong>
                                </div>
                                <div class="event-detail">
                                    <i class="fas fa-clock"></i>
                                    <strong>${event.time}</strong>
                                </div>
                                <div class="event-detail">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>${event.location}</span>
                                </div>
                                <div class="event-detail">
                                    <i class="fas fa-users"></i>
                                    <span>${event.organizer}</span>
                                </div>
                            </div>
                            
                            <button onclick="showEventDetails(${event.id})" data-bs-toggle="modal" data-bs-target="#eventDetailsModal" class="btn-view-event">
                                View Details <i class="fas fa-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
        }

        function updateEventsDisplay() {
            const container = document.getElementById('eventsContainer');
            const countContainer = document.getElementById('eventsCount');
            
            const totalEvents = filteredEvents.length;
            const totalPages = Math.ceil(totalEvents / eventsPerPage);
            const startIndex = (currentPage - 1) * eventsPerPage;
            const endIndex = startIndex + eventsPerPage;
            const currentEvents = filteredEvents.slice(startIndex, endIndex);

            // Update events count
            countContainer.innerHTML = `
                <strong>${currentEvents.length}</strong> of 
                <strong>${totalEvents}</strong> upcoming events
                ${currentPage > 1 ? `(Page ${currentPage} of ${totalPages})` : ''}
            `;

            // Display events or no events message
            if (currentEvents.length === 0) {
                container.innerHTML = `
                    <div class="no-events">
                        <i class="fas fa-calendar-times"></i>
                        <h3>No upcoming events found</h3>
                        <p>Try adjusting your search or filter criteria!</p>
                    </div>
                `;
            } else {
                const eventsHTML = currentEvents.map(event => createEventCard(event)).join('');
                container.innerHTML = `<div class="row g-3">${eventsHTML}</div>`;
            }
        }

        // Pagination functions
        function updatePagination() {
            const totalPages = Math.ceil(filteredEvents.length / eventsPerPage);
            const paginationWrapper = document.getElementById('paginationWrapper');
            const paginationContainer = document.getElementById('paginationContainer');

            if (totalPages <= 1) {
                paginationWrapper.classList.add('d-none');
                return;
            }

            paginationWrapper.classList.remove('d-none');
            
            let paginationHTML = '';

            // Previous button
            paginationHTML += `
                <li class="page-item ${currentPage <= 1 ? 'disabled' : ''}">
                    <button class="page-link" ${currentPage > 1 ? `onclick="changePage(${currentPage - 1})"` : 'disabled'}>
                        <i class="fas fa-chevron-left me-1"></i>Previous
                    </button>
                </li>
            `;

            // Page numbers
            const startPage = Math.max(1, currentPage - 2);
            const endPage = Math.min(totalPages, currentPage + 2);

            if (startPage > 1) {
                paginationHTML += `<li class="page-item"><button class="page-link" onclick="changePage(1)">1</button></li>`;
                if (startPage > 2) {
                    paginationHTML += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
                }
            }

            for (let i = startPage; i <= endPage; i++) {
                paginationHTML += `
                    <li class="page-item ${i === currentPage ? 'active' : ''}">
                        <button class="page-link" onclick="changePage(${i})">${i}</button>
                    </li>
                `;
            }

            if (endPage < totalPages) {
                if (endPage < totalPages - 1) {
                    paginationHTML += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
                }
                paginationHTML += `<li class="page-item"><button class="page-link" onclick="changePage(${totalPages})">${totalPages}</button></li>`;
            }

            // Next button
            paginationHTML += `
                <li class="page-item ${currentPage >= totalPages ? 'disabled' : ''}">
                    <button class="page-link" ${currentPage < totalPages ? `onclick="changePage(${currentPage + 1})"` : 'disabled'}>
                        Next<i class="fas fa-chevron-right ms-1"></i>
                    </button>
                </li>
            `;

            paginationContainer.innerHTML = paginationHTML;
        }

        function changePage(page) {
            currentPage = page;
            updateEventsDisplay();
            updatePagination();
            
            // Scroll to top of events section
            document.querySelector('.content-section').scrollIntoView({ 
                behavior: 'smooth', 
                block: 'start' 
            });
        }

        // Authentication functions
        function checkAuthStatus() {
            const token = localStorage.getItem('token');
            const registerLink = document.getElementById('registerLink');
            const userDropdown = document.getElementById('userDropdown');
            const userAvatar = document.getElementById('userAvatar');

            if (token) {
                registerLink.classList.add('d-none');
                userDropdown.classList.remove('d-none');
                
                const userData = localStorage.getItem('user');
                if (userData) {
                    try {
                        const user = JSON.parse(userData);
                        userAvatar.textContent = user.name ? user.name.charAt(0).toUpperCase() : 'U';
                    } catch (e) {
                        userAvatar.textContent = 'U';
                    }
                } else {
                    userAvatar.textContent = 'U';
                }
            } else {
                registerLink.classList.remove('d-none');
                userDropdown.classList.add('d-none');
            }
        }

        function logout() {
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            notyf.success('Logged out successfully!');
            setTimeout(() => {
                window.location.href = '/login';
            }, 1000);
        }

        // Fetch user bookings
        async function fetchUserBookings() {
            const token = localStorage.getItem('token');
            
            if (!token) return;

            try {
                const controller = new AbortController();
                const timeoutId = setTimeout(() => controller.abort(), 5000);

                const response = await fetch('http://127.0.0.1:8000/api/events', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${token}`
                    },
                    signal: controller.signal
                });

                clearTimeout(timeoutId);

                if (response.status === 401) {
                    localStorage.removeItem('token');
                    localStorage.removeItem('user');
                    checkAuthStatus();
                    return;
                }

                const result = await response.json();
                
                if (response.ok) {
                    displayUserBookings(result.bookings || []);
                }
            } catch (error) {
                console.error('Error fetching bookings:', error);
            }
        }

        function displayUserBookings(bookings) {
            const container = document.getElementById('bookingContainer');
            container.innerHTML = '';

            if (bookings.length > 0) {
                bookings.forEach(booking => {
                    const div = document.createElement('div');
                    div.className = 'booking-card';
                    div.innerHTML = `
                        <h6>${booking.title}</h6>
                        <small>Date: ${booking.date}</small><br>
                        <small>Location: ${booking.location}</small>
                    `;
                    container.appendChild(div);
                });
            }
        }

        // Initialize carousel
        function initializeCarousel() {
            const carousel = document.querySelector('.carousel');
            const leftBtn = document.querySelector('.nav-left');
            const rightBtn = document.querySelector('.nav-right');
            const cardWidth = 326;

            leftBtn.addEventListener('click', () => {
                carousel.scrollBy({ left: -cardWidth, behavior: 'smooth' });
            });

            rightBtn.addEventListener('click', () => {
                carousel.scrollBy({ left: cardWidth, behavior: 'smooth' });
            });
        }

        // Event Details Modal Functions
        function showEventDetails(eventId) {
            const event = allEvents.find(e => e.id == eventId);
            if (!event) {
                notyf.error('Event not found');
                return;
            }

            selectedEvent = event;
            const modalBody = document.getElementById('eventDetailsBody');
            
            modalBody.innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <img src="${event.image}" class="img-fluid rounded mb-3" alt="${event.title}">
                    </div>
                    <div class="col-md-6">
                        <h4>${event.title}</h4>
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar-alt text-primary me-2"></i>
                                <strong>${formatDate(event.date)}</strong>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-clock text-primary me-2"></i>
                                <strong>${event.time}</strong>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                <span>${event.location}</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-users text-primary me-2"></i>
                                <span>${event.organizer}</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-hourglass-half text-primary me-2"></i>
                                <span>${event.duration}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h6>Description</h6>
                        <p>${event.description || 'Join us for this amazing event!'}</p>
                        
                        ${event.team_members && event.team_members.length > 0 ? `
                            <h6>Team Members</h6>
                            <div class="mb-3">
                                ${event.team_members.map(member => `<span class="badge bg-secondary me-1">${member}</span>`).join('')}
                            </div>
                        ` : ''}
                        
                        ${event.guests && event.guests.length > 0 ? `
                            <h6>Special Guests</h6>
                            <div class="mb-3">
                                ${event.guests.map(guest => `<span class="badge bg-info me-1">${guest}</span>`).join('')}
                            </div>
                        ` : ''}
                        
                        ${event.reminder ? `
                            <div class="alert alert-info">
                                <i class="fas fa-bell me-2"></i>
                                <strong>Reminder:</strong> ${event.reminder}
                            </div>
                        ` : ''}
                    </div>
                </div>
            `;

            // Check if user is logged in to show/hide book button
            const token = localStorage.getItem('token');
            const bookEventBtn = document.getElementById('bookEventBtn');
            
            if (!token) {
                bookEventBtn.style.display = 'none';
                modalBody.innerHTML += `
                    <div class="alert alert-warning mt-3">
                        <i class="fas fa-info-circle me-2"></i>
                        Please <a href="/login" class="alert-link">login</a> to book this event.
                    </div>
                `;
            } else {
                bookEventBtn.style.display = 'block';
            }
        }

        // Booking Functions
        function bookEvent() {
            if (!selectedEvent) {
                notyf.error('No event selected');
                return;
            }

            const token = localStorage.getItem('token');
            if (!token) {
                notyf.error('Please login to book an event');
                window.location.href = '/login';
                return;
            }

            // Show booking confirmation modal
            const bookingEventSummary = document.getElementById('bookingEventSummary');
            bookingEventSummary.innerHTML = `
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">${selectedEvent.title}</h6>
                        <p class="card-text mb-1">
                            <i class="fas fa-calendar-alt text-primary me-2"></i>
                            ${formatDate(selectedEvent.date)} at ${selectedEvent.time}
                        </p>
                        <p class="card-text mb-1">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>
                            ${selectedEvent.location}
                        </p>
                        <p class="card-text">
                            <i class="fas fa-hourglass-half text-primary me-2"></i>
                            Duration: ${selectedEvent.duration}
                        </p>
                    </div>
                </div>
            `;

            // Hide event details modal and show confirmation modal
            const eventDetailsModal = bootstrap.Modal.getInstance(document.getElementById('eventDetailsModal'));
            eventDetailsModal.hide();
            
            const bookingConfirmModal = new bootstrap.Modal(document.getElementById('bookingConfirmModal'));
            bookingConfirmModal.show();
        }

        async function confirmBooking() {
            if (!selectedEvent) {
                notyf.error('No event selected');
                return;
            }

            const token = localStorage.getItem('token');
            const userData = localStorage.getItem('email');
            console.log(userData, "userData" , token ,"token")
            
            if (!token ) {
                notyf.error('Authentication required');
                return;
            }

            try {
                // const user = JSON.parse(userData);
                const confirmBtn = document.getElementById('confirmBookingBtn');
                
                // Show loading state
                confirmBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Booking...';
                confirmBtn.disabled = true;

           const bookingData = {
    event_id: selectedEvent.id,
    // user_id: userData || "random",
    event_title: selectedEvent.title,
    event_date: selectedEvent.date,
    event_time: selectedEvent.time.replace(/[AP]M/, '').trim() + ':00',
    event_location: selectedEvent.location,
    event_duration: selectedEvent.duration,
    event_organizer: selectedEvent.organizer,
    booking_date: new Date().toISOString().split('T')[0],
    booking_time: new Date().toTimeString().split(' ')[0],
    status: 'confirmed',
    // user_name: user.name || 'Guest User',
    user_email: userData || null
};
                // Send booking request to API
                const response = await fetch('http://127.0.0.1:8000/api/bookings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${token}`
                    },
                    body: JSON.stringify(bookingData)
                });

                const result = await response.json();

                if (response.ok) {
                    notyf.success('Event booked successfully!');
                    
                    // Hide confirmation modal
                    const bookingConfirmModal = bootstrap.Modal.getInstance(document.getElementById('bookingConfirmModal'));
                    bookingConfirmModal.hide();
                    
                    // Refresh bookings
                    setTimeout(() => {
                        fetchUserBookings();
                    }, 1000);
                    
                } else {
                    throw new Error(result.message || 'Booking failed');
                }

            } catch (error) {
                console.error('Booking error:', error);
                notyf.error(error.message || 'Failed to book event. Please try again.');
            } finally {
                // Reset button state
                const confirmBtn = document.getElementById('confirmBookingBtn');
                confirmBtn.innerHTML = 'Confirm Booking';
                confirmBtn.disabled = false;
            }
        }

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', async function() {
            // Check authentication status
            checkAuthStatus();
            
            // Fetch events and initialize display
            allEvents = await fetchEventsFromAPI();
            filteredEvents = [...allEvents];
            updateEventsDisplay();
            updatePagination();

            // Initialize carousel
            initializeCarousel();

            // Event listeners
            document.getElementById('logoutLink').addEventListener('click', function(e) {
                e.preventDefault();
                logout();
            });

            document.getElementById('searchBtn').addEventListener('click', function() {
                searchQuery = document.getElementById('searchInput').value.trim().toLowerCase();
                filterEvents();
            });

            document.getElementById('searchInput').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    searchQuery = this.value.trim().toLowerCase();
                    filterEvents();
                }
            });

            document.getElementById('filterSelect').addEventListener('change', function() {
                currentFilter = this.value;
                filterEvents();
            });

            // Booking confirmation listener
            document.getElementById('confirmBookingBtn').addEventListener('click', function() {
                confirmBooking();
            });

            const profileLink = document.getElementById('profileLink');
            if (profileLink) {
                profileLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    notyf.info('Profile feature coming soon!');
                });
            }

            // Fetch bookings asynchronously
            setTimeout(() => {
                fetchUserBookings();
            }, 500);

            // Smooth scrolling for internal links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Listen for login success from other pages
            window.addEventListener('storage', function(e) {
                if (e.key === 'token' && e.newValue) {
                    checkAuthStatus();
                    fetchUserBookings();
                    notyf.success('Welcome back!');
                }
            });
        });
    </script>
</body>
</html>