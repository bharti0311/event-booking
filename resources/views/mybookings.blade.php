<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - TrueBlueEvents</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <style>
        :root {
            --primary-color: #333333;
            --primary-light: #333333;
            --primary-dark: #333333;
            --white: #ffffff;
            --light-gray: #f8f9fa;
            --medium-gray: #e9ecef;
            --dark-gray: #6c757d;
            --text-dark: #212529;
            --shadow: 0 2px 15px rgba(44, 90, 160, 0.1);
            --shadow-hover: 0 5px 25px rgba(44, 90, 160, 0.15);
            --border-radius: 12px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: var(--white);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .navbar {
            background: var(--white);
            border-bottom: 1px solid var(--medium-gray);
            padding: 1rem 0;
            box-shadow: var(--shadow);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
        }

        .navbar-nav .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: var(--transition);
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--white) !important;
            background-color: var(--primary-color);
        }

        .page-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: var(--white);
            padding: 3rem 0 2rem;
            margin-bottom: 2rem;
        }

        .header-content h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .header-content p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .user-info {
            background: rgba(255, 255, 255, 0.1);
            padding: 0.75rem 1.25rem;
            border-radius: 8px;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .user-info i {
            margin-right: 0.5rem;
        }

        .stats-row {
            margin-top: 1.5rem;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        .stat-card.primary {
            background: var(--white);
            border: 2px solid var(--primary-color);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            display: block;
        }

        .stat-label {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-dark);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-desc {
            font-size: 0.85rem;
            color: var(--dark-gray);
            margin-top: 0.25rem;
        }

        .main-content {
            padding: 0 0 3rem;
        }

        .section-header {
            background: var(--white);
            padding: 1.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
            border-left: 4px solid var(--primary-color);
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .section-subtitle {
            color: var(--dark-gray);
            font-size: 0.95rem;
        }

        .booking-card {
            background: var(--white);
            border: 1px solid var(--medium-gray);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            margin-bottom: 1.5rem;
            transition: var(--transition);
            overflow: hidden;
        }

        .booking-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
            border-color: var(--primary-color);
        }

        .booking-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: var(--white);
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .event-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-right: 1rem;
        }

        .event-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .event-category {
            font-size: 0.85rem;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-badge {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: 2px solid currentColor;
        }

        .status-confirmed { 
            color: #28a745; 
            background: rgba(40, 167, 69, 0.1);
        }
        .status-pending { 
            color: #ffc107; 
            background: rgba(255, 193, 7, 0.1);
        }
        .status-cancelled { 
            color: #dc3545; 
            background: rgba(220, 53, 69, 0.1);
        }
        .status-completed { 
            color: #6c757d; 
            background: rgba(108, 117, 125, 0.1);
        }

        .booking-body {
            padding: 1.5rem;
        }

        .booking-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .detail-group h6 {
            color: var(--dark-gray);
            font-size: 0.8rem;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 0.25rem;
        }

        .detail-group .value {
            color: var(--text-dark);
            font-size: 1rem;
            font-weight: 500;
        }

        .detail-group .value.large {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .booking-timeline {
            background: var(--light-gray);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .timeline-progress {
            height: 4px;
            background: var(--medium-gray);
            border-radius: 2px;
            margin: 1rem 0;
            position: relative;
            overflow: hidden;
        }

        .timeline-fill {
            height: 100%;
            background: var(--primary-color);
            border-radius: 2px;
            width: 65%;
            transition: width 0.8s ease;
        }

        .timeline-steps {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            color: var(--dark-gray);
        }

        .timeline-step.completed {
            color: var(--primary-color);
            font-weight: 600;
        }

        .booking-actions {
            display: flex;
            gap: 0.75rem;
            justify-content: flex-end;
        }

        .btn-primary-custom {
            background: var(--primary-color);
            border: 2px solid var(--primary-color);
            color: var(--white);
            border-radius: 8px;
            padding: 0.6rem 1.2rem;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
            color: var(--white);
            transform: translateY(-1px);
        }

        .btn-outline-custom {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            border-radius: 8px;
            padding: 0.6rem 1.2rem;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
            text-decoration: none;
            display: inline-block;
        }

        .btn-outline-custom:hover {
            background: var(--primary-color);
            color: var(--white);
            transform: translateY(-1px);
        }

        .no-bookings {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .no-bookings i {
            font-size: 4rem;
            color: var(--medium-gray);
            margin-bottom: 1.5rem;
        }

        .no-bookings h3 {
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .no-bookings p {
            color: var(--dark-gray);
            margin-bottom: 2rem;
        }

        .loading-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
            border-radius: 8px;
            height: 20px;
            margin-bottom: 10px;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        .booking-row {
            margin-bottom: 1.5rem;
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 2rem 0 1.5rem;
            }

            .header-content h1 {
                font-size: 2rem;
            }

            .booking-details {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .booking-actions {
                justify-content: flex-start;
                flex-wrap: wrap;
            }

            .stat-card {
                margin-bottom: 1rem;
            }
        }

        @media (max-width: 576px) {
            .booking-header {
                padding: 1rem;
                flex-direction: column;
                text-align: center;
                gap: 0.75rem;
            }

            .booking-body {
                padding: 1rem;
            }

            .event-icon {
                margin-right: 0;
                margin-bottom: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="fas fa-calendar-alt me-2"></i>TrueBlueEvents</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/my-bookings">My Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login" id="logoutLink">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="header-content">
                <h1>My Event Bookings</h1>
                <p>Track and manage all your upcoming events in one place</p>
                <div class="user-info">
                    <i class="fas fa-user-circle"></i>
                    <span id="userEmailDisplay">Loading...</span>
                </div>
                <div class="row stats-row">
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <div class="stat-card">
                            <span class="stat-number" id="totalBookings">0</span>
                            <div class="stat-label">Total Bookings</div>
                            <div class="stat-desc">All time</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <div class="stat-card primary">
                            <span class="stat-number" id="upcomingBookings">0</span>
                            <div class="stat-label">Upcoming Events</div>
                            <div class="stat-desc">Next 30 days</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <div class="stat-card">
                            <span class="stat-number" id="completedBookings">0</span>
                            <div class="stat-label">Completed</div>
                            <div class="stat-desc">Past events</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <div class="stat-card">
                            <span class="stat-number" id="thisMonthBookings">0</span>
                            <div class="stat-label">This Month</div>
                            <div class="stat-desc">New bookings</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="section-header">
                <div class="section-title">
                    <i class="fas fa-list-ul me-2 text-primary"></i>
                    <span id="resultsCount">Loading bookings...</span>
                </div>
                <div class="section-subtitle">Your confirmed and pending event bookings</div>
            </div>

            <!-- Bookings List -->
            <div id="bookingsList">
                <!-- Loading skeleton -->
                <div class="row booking-row" id="loadingSkeleton">
                    <div class="col-md-6 mb-3">
                        <div class="booking-card">
                            <div class="booking-header" style="background: #e9ecef;">
                                <div class="loading-skeleton" style="width: 200px; height: 25px;"></div>
                                <div class="loading-skeleton" style="width: 80px; height: 30px; border-radius: 15px;"></div>
                            </div>
                            <div class="booking-body">
                                <div class="loading-skeleton" style="width: 100%; height: 15px; margin-bottom: 15px;"></div>
                                <div class="loading-skeleton" style="width: 70%; height: 15px; margin-bottom: 15px;"></div>
                                <div class="loading-skeleton" style="width: 90%; height: 4px; margin: 20px 0;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="booking-card">
                            <div class="booking-header" style="background: #e9ecef;">
                                <div class="loading-skeleton" style="width: 200px; height: 25px;"></div>
                                <div class="loading-skeleton" style="width: 80px; height: 30px; border-radius: 15px;"></div>
                            </div>
                            <div class="booking-body">
                                <div class="loading-skeleton" style="width: 100%; height: 15px; margin-bottom: 15px;"></div>
                                <div class="loading-skeleton" style="width: 70%; height: 15px; margin-bottom: 15px;"></div>
                                <div class="loading-skeleton" style="width: 90%; height: 4px; margin: 20px 0;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- No Bookings State -->
            <div class="no-bookings d-none" id="noBookings">
                <i class="fas fa-calendar-times"></i>
                <h3>No bookings found</h3>
                <p>You haven't booked any events yet. Start exploring amazing events and experiences!</p>
                <a href="/" class="btn-primary-custom"><i class="fas fa-search me-2"></i>Browse Events</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        const notyf = new Notyf({
            duration: 4000,
            position: { x: 'right', y: 'top' }
        });

        function transformBookingsData(bookingsData) {
            return bookingsData.map(booking => {
                const startTime = new Date(`2000-01-01T${booking.event_time}`);
                let endTime;

                if (booking.event_duration && booking.event_duration.includes('m')) {
                    const minutes = parseInt(booking.event_duration.replace('m', ''));
                    endTime = new Date(startTime.getTime() + minutes * 60000);
                } else if (booking.event_duration && booking.event_duration.includes('h')) {
                    const hours = parseInt(booking.event_duration.replace('h', ''));
                    endTime = new Date(startTime.getTime() + hours * 60 * 60000);
                } else {
                    endTime = new Date(startTime.getTime() + 2 * 60 * 60000);
                }

                const endTimeString = endTime.toTimeString().slice(0, 5);

                const category = getCategoryFromContent(booking.event_title, '');

                return {
                    id: booking.id || booking.event_id,
                    title: booking.event_title,
                    date: booking.event_date,
                    time: booking.event_time,
                    endTime: endTimeString,
                    location: booking.event_location,
                    category: category,
                    status: booking.status || "confirmed",
                    duration: booking.event_duration || "2 hours",
                    organizer: booking.event_organizer,
                    bookingDate: booking.booking_date,
                    bookingTime: booking.booking_time,
                    userEmail: booking.user_email,
                    createdAt: booking.created_at,
                    updatedAt: booking.updated_at
                };
            });
        }

        function getCategoryFromContent(title, description) {
            const content = (title + ' ' + (description || '')).toLowerCase();

            if (content.includes('tech') || content.includes('innovation') || content.includes('digital')) {
                return 'Technology';
            } else if (content.includes('music') || content.includes('concert') || content.includes('festival')) {
                return 'Music';
            } else if (content.includes('business') || content.includes('networking') || content.includes('conference')) {
                return 'Business';
            } else if (content.includes('food') || content.includes('wine') || content.includes('dining')) {
                return 'Food & Drink';
            } else if (content.includes('sport') || content.includes('game') || content.includes('championship')) {
                return 'Sports';
            } else if (content.includes('art') || content.includes('exhibition') || content.includes('culture')) {
                return 'Arts & Culture';
            } else {
                return 'General';
            }
        }

        function getCategoryIcon(category) {
            const icons = {
                'Technology': 'fas fa-laptop-code',
                'Music': 'fas fa-music',
                'Business': 'fas fa-briefcase',
                'Food & Drink': 'fas fa-utensils',
                'Sports': 'fas fa-football-ball',
                'Arts & Culture': 'fas fa-palette',
                'General': 'fas fa-calendar'
            };
            return icons[category] || 'fas fa-calendar';
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        }

        function formatTime(timeString) {
            return new Date(`2000-01-01T${timeString}`).toLocaleTimeString('en-US', {
                hour: 'numeric',
                minute: '2-digit',
                hour12: true
            });
        }

        function getEventStatus(date, status) {
            const eventDate = new Date(date);
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            if (status === 'cancelled') return 'cancelled';
            if (eventDate < today) return 'completed';
            if (status === 'pending') return 'pending';
            return 'confirmed';
        }

        function renderBooking(booking) {
            const status = getEventStatus(booking.date, booking.status);
            const statusClass = `status-${status}`;

            return `
                <div class="booking-card">
                    <div class="booking-header">
                        <div class="d-flex align-items-center">
                            <div class="event-icon">
                                <i class="${getCategoryIcon(booking.category)}"></i>
                            </div>
                            <div>
                                <div class="event-title">${booking.title}</div>
                                <div class="event-category">${booking.category}</div>
                            </div>
                        </div>
                        <div class="status-badge ${statusClass}">
                            ${status.charAt(0).toUpperCase() + status.slice(1)}
                        </div>
                    </div>

                    <div class="booking-body">
                        <div class="booking-details">
                            <div class="detail-group">
                                <h6>Date & Time</h6>
                                <div class="value">${formatDate(booking.date)}</div>
                                <div class="value">${formatTime(booking.time)} - ${formatTime(booking.endTime)}</div>
                            </div>
                            <div class="detail-group">
                                <h6>Location</h6>
                                <div class="value">${booking.location}</div>
                            </div>
                            <div class="detail-group">
                                <h6>Duration</h6>
                                <div class="value">${booking.duration}</div>
                            </div>
                        </div>

                        <div class="booking-timeline">
                            <div class="timeline-progress">
                                <div class="timeline-fill"></div>
                            </div>
                            <div class="timeline-steps">
                                <span class="timeline-step completed">Booked</span>
                                <span class="timeline-step completed">Confirmed</span>
                                <span class="timeline-step">Event Day</span>
                            </div>
                        </div>

                        <div class="booking-actions">
                            <a href="#" class="btn-outline-custom" onclick="viewDetails(${booking.id}); return false;">
                                <i class="fas fa-eye me-1"></i>View Details
                            </a>
                            <a href="#" class="btn-primary-custom" onclick="downloadTicket(${booking.id}); return false;">
                                <i class="fas fa-download me-1"></i>Get Ticket
                            </a>
                        </div>

                        <div class="mt-2">
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                Booked on ${formatDate(booking.bookingDate)} at ${formatTime(booking.bookingTime)}
                            </small>
                            ${booking.organizer ? `
                                <br><small class="text-muted">
                                    <i class="fas fa-user me-1"></i>
                                    Organized by ${booking.organizer}
                                </small>
                            ` : ''}
                        </div>
                    </div>
                </div>
            `;
        }

        function renderBookings(bookings) {
            const bookingsList = document.getElementById('bookingsList');
            const loadingSkeleton = document.getElementById('loadingSkeleton');
            const noBookings = document.getElementById('noBookings');
            const resultsCount = document.getElementById('resultsCount');

            if (loadingSkeleton) {
                loadingSkeleton.remove();
            }

            if (bookings.length === 0) {
                bookingsList.classList.add('d-none');
                noBookings.classList.remove('d-none');
                resultsCount.textContent = 'No bookings found';
                return;
            }

            let html = '';
            for (let i = 0; i < bookings.length; i += 2) {
                html += '<div class="row booking-row">';

                html += '<div class="col-lg-6 col-md-12 mb-3">';
                html += renderBooking(bookings[i]);
                html += '</div>';

                if (bookings[i + 1]) {
                    html += '<div class="col-lg-6 col-md-12 mb-3">';
                    html += renderBooking(bookings[i + 1]);
                    html += '</div>';
                }

                html += '</div>';
            }

            bookingsList.innerHTML = html;
            resultsCount.textContent = `${bookings.length} booking${bookings.length !== 1 ? 's' : ''} found`;

            updateStatistics(bookings);
        }

        function updateStatistics(bookings) {
            const total = bookings.length;
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            const upcoming = bookings.filter(b => {
                const eventDate = new Date(b.date);
                return eventDate >= today && b.status !== 'cancelled';
            }).length;

            const completed = bookings.filter(b => {
                const eventDate = new Date(b.date);
                return eventDate < today;
            }).length;

            const thisMonthBookings = bookings.filter(b => {
                const bookingDate = new Date(b.bookingDate);
                return bookingDate.getMonth() === today.getMonth() &&
                    bookingDate.getFullYear() === today.getFullYear();
            }).length;

            document.querySelector('#totalBookings').textContent = total;
            document.querySelector('#upcomingBookings').textContent = upcoming;
            document.querySelector('#completedBookings').textContent = completed;
            document.querySelector('#thisMonthBookings').textContent = thisMonthBookings;
        }

        function viewDetails(bookingId) {
            notyf.success(`Viewing details for booking #${bookingId}`);
            // Add modal or detailed page logic here
        }

        function downloadTicket(bookingId) {
            notyf.success(`Downloading ticket for booking #${bookingId}`);
            // Add download logic here
        }

        function logout() {
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            notyf.success('Successfully logged out');
            setTimeout(() => {
                window.location.href = '/login';
            }, 1000);
        }

        async function fetchUserBookings() {
            const token = localStorage.getItem('token');
            const userStr = localStorage.getItem('email');

            // if (!token) {
            //     notyf.error('Please login to view your bookings');
            //     setTimeout(() => {
            //         window.location.href = '/login';
            //     }, 1500);
            //     return;
            // }

            if (!userStr) {
                notyf.error('User information not found. Please login again.');
                setTimeout(() => {
                    window.location.href = '/login';
                }, 2000);
                return;
            }

            let user;
            try {
                user = userStr
            } catch (e) {
                console.error('Error parsing user data:', e);
                notyf.error('Invalid user data. Please login again.');
                setTimeout(() => {
                    window.location.href = '/login';
                }, 2000);
                return;
            }

            const userEmail = user;

            if (!userEmail) {
                notyf.error('User email not found. Please login again.');
                setTimeout(() => {
                    window.location.href = '/login';
                }, 2000);
                return;
            }

            // Display user email safely
            document.getElementById('userEmailDisplay').textContent = userEmail;

            try {
                const response = await fetch('http://127.0.0.1:8000/api/bookings', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${token}`
                    }
                });

                if (response.ok) {
                    const apiResponse = await response.json();

                    let bookingsData = [];
                    if (Array.isArray(apiResponse)) {
                        bookingsData = apiResponse;
                    } else if (apiResponse.bookings && Array.isArray(apiResponse.bookings)) {
                        bookingsData = apiResponse.bookings;
                    } else if (apiResponse.data && Array.isArray(apiResponse.data)) {
                        bookingsData = apiResponse.data;
                    } else {
                        console.error('Unexpected API response:', apiResponse);
                    }

                    // Filter bookings safely in case user_email is null
                    bookingsData = bookingsData.filter(booking =>
                        !booking.user_email || booking.user_email.toLowerCase() === userEmail.toLowerCase()
                    );

                    if (bookingsData.length > 0) {
                        const transformedBookings = transformBookingsData(bookingsData);
                        renderBookings(transformedBookings);
                        notyf.success(`Loaded ${bookingsData.length} booking${bookingsData.length !== 1 ? 's' : ''} successfully!`);
                    } else {
                        renderBookings([]);
                        notyf.info('No bookings found for your account');
                    }
                } else if (response.status === 404) {
                    renderBookings([]);
                    notyf.info('No bookings found for your account');
                } else if (response.status === 401) {
                    localStorage.removeItem('token');
                    localStorage.removeItem('user');
                    notyf.error('Session expired. Please login again.');
                    setTimeout(() => {
                        window.location.href = '/login';
                    }, 1500);
                } else {
                    const errorText = await response.text();
                    console.error('API error:', response.status, errorText);
                    renderBookings([]);
                    notyf.error('Failed to load your bookings');
                }
            } catch (error) {
                console.error('Fetch error:', error);
                renderBookings([]);
                notyf.error('Network error - please check your connection');
            }
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function () {
            const token = localStorage.getItem('token');
            const userStr = localStorage.getItem('email');

            if (!token || !userStr) {
                notyf.error('Please login to view your bookings');
                setTimeout(() => {
                    window.location.href = '/login';
                }, 1500);
                return;
            }

            document.getElementById('logoutLink').addEventListener('click', function (e) {
                e.preventDefault();
                logout();
            });

            fetchUserBookings();
        });
    </script>
</body>

</html>