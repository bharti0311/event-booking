<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organiser Management System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/notyf/3.10.0/notyf.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-dark: #333333;
            --white: #ffffff;
            --gray-light: #f5f5f5;
            --gray-medium: #e0e0e0;
            --gray-text: #666666;
            --border-color: #dddddd;
            --hover-bg: #f9f9f9;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--white);
            color: var(--primary-dark);
        }

        .app-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: var(--primary-dark);
            padding: 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 20px;
            font-weight: 600;
            color: var(--white);
        }

        .logo-icon {
            width: 36px;
            height: 36px;
            background: var(--white);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-dark);
        }

        .nav-menu {
            padding: 16px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 14px 16px;
            margin-bottom: 4px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s ease;
            cursor: pointer;
            font-size: 15px;
        }

        .nav-item i {
            width: 20px;
            margin-right: 12px;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
        }

        .nav-item.active {
            background: var(--white);
            color: var(--primary-dark);
            font-weight: 500;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            flex: 1;
            background: var(--white);
        }

        .top-bar {
            background: var(--white);
            border-bottom: 1px solid var(--border-color);
            padding: 20px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-profile .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
        }

        .user-details h3 {
            color: var(--primary-dark);
            margin-bottom: 2px;
            font-size: 15px;
        }

        .user-details p {
            color: var(--gray-text);
            font-size: 13px;
        }

        /* Page Content */
        .page-content {
            padding: 32px;
            display: none;
        }

        .page-content.active {
            display: block;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: var(--gray-text);
            margin-bottom: 32px;
            font-size: 15px;
        }

        /* Cards */
        .card {
            background: var(--white);
            border-radius: 12px;
            border: 1px solid var(--border-color);
            margin-bottom: 24px;
        }

        .card-header {
            padding: 24px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--primary-dark);
        }

        .card-body {
            padding: 24px;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .stat-card {
            padding: 28px;
            border-radius: 12px;
            background: var(--primary-dark);
            color: var(--white);
            border: 2px solid var(--primary-dark);
            transition: transform 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
        }

        .stat-icon {
            font-size: 36px;
            margin-bottom: 16px;
            opacity: 0.9;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 14px;
            opacity: 0.85;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 14px;
        }

        .btn-primary {
            background: var(--primary-dark);
            color: var(--white);
        }

        .btn-primary:hover {
            background: #1a1a1a;
        }

        .btn-outline {
            background: transparent;
            color: var(--primary-dark);
            border: 2px solid var(--primary-dark);
        }

        .btn-outline:hover {
            background: var(--primary-dark);
            color: var(--white);
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 13px;
        }

        /* Table */
        .table-container {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .table th {
            background: var(--gray-light);
            color: var(--primary-dark);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
        }

        .table td {
            color: var(--primary-dark);
        }

        .table tr:hover {
            background: var(--hover-bg);
        }

        /* Status Badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }

        .status-confirmed {
            background: #d1fae5;
            color: #065f46;
        }

        .status-active {
            background: #d1fae5;
            color: #065f46;
        }

        .status-draft {
            background: #fef3c7;
            color: #92400e;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-completed {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Loading and Empty States */
        .loading-spinner {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .spinner {
            border: 3px solid var(--gray-medium);
            border-top: 3px solid var(--primary-dark);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--gray-text);
        }

        .empty-state i {
            font-size: 64px;
            margin-bottom: 16px;
            opacity: 0.3;
            color: var(--gray-text);
        }

        .empty-state h3 {
            color: var(--primary-dark);
            margin-bottom: 8px;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--gray-text);
            transition: all 0.2s ease;
        }

        .action-btn:hover {
            background: var(--primary-dark);
            color: var(--white);
            border-color: var(--primary-dark);
        }

        /* Refresh Button */
        .refresh-btn {
            background: var(--primary-dark);
            color: var(--white);
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            transition: all 0.2s ease;
            font-weight: 500;
        }

        .refresh-btn:hover {
            background: #1a1a1a;
        }

        .refresh-btn.loading i {
            animation: spin 1s linear infinite;
        }

        /* Create Event Page Styles */
        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            color: var(--primary-dark);
        }

        .form-control, .form-select, textarea {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background: var(--white);
            color: var(--primary-dark);
            font-size: 14px;
        }

        .form-control:focus, .form-select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 3px rgba(51, 51, 51, 0.1);
        }

        .form-control::placeholder, textarea::placeholder {
            color: var(--gray-text);
        }

        .row {
            display: flex;
            gap: 16px;
            margin-bottom: 16px;
        }

        .col-md-4 {
            flex: 1;
        }

        .col-md-2 {
            flex: 0 0 120px;
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        .upload-box {
            border: 2px dashed var(--border-color);
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            color: var(--gray-text);
            cursor: pointer;
            background: var(--gray-light);
            transition: all 0.2s;
        }

        .upload-box:hover {
            border-color: var(--primary-dark);
            background: var(--white);
        }

        .list-group {
            list-style: none;
            padding: 0;
        }

        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            margin-bottom: 8px;
            background: var(--white);
        }

        .avatar-sm {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-dark);
            color: var(--white);
            font-weight: 600;
            font-size: 13px;
            margin-right: 8px;
        }

        .input-group {
            display: flex;
            gap: 8px;
            margin-bottom: 12px;
        }

        .input-group .form-control {
            flex: 1;
        }

        .form-check-inline {
            display: inline-flex;
            align-items: center;
            margin-right: 16px;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            margin-right: 6px;
            cursor: pointer;
        }

        .form-check-label {
            cursor: pointer;
            color: var(--primary-dark);
        }

        /* Settings Page Styles */
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .form-grid {
            display: grid;
            gap: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .toggle-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .toggle-item:last-child {
            border-bottom: none;
        }

        .toggle-info {
            display: flex;
            flex-direction: column;
        }

        .toggle-title {
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 4px;
        }

        .toggle-description {
            font-size: 13px;
            color: var(--gray-text);
        }

        .toggle-switch {
            width: 44px;
            height: 24px;
            border-radius: 12px;
            background: var(--gray-medium);
            position: relative;
            cursor: pointer;
            transition: background 0.3s;
        }

        .toggle-switch::before {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 18px;
            height: 18px;
            background: var(--white);
            border-radius: 50%;
            transition: left 0.3s;
        }

        .toggle-switch.active {
            background: var(--primary-dark);
        }

        .toggle-switch.active::before {
            left: 23px;
        }

        .save-btn {
            margin-top: 16px;
            padding: 12px 24px;
            border-radius: 8px;
            border: none;
            background: var(--primary-dark);
            color: var(--white);
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .save-btn:hover {
            background: #1a1a1a;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }

            .page-content {
                padding: 16px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .top-bar {
                padding: 16px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .row {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <span>BookMyVenue</span>
                </div>
            </div>

            <nav class="nav-menu">
                <div class="nav-item active" data-page="dashboard">
                    <i class="fas fa-chart-bar"></i>
                    Dashboard
                </div>
                <div class="nav-item" data-page="myEvents">
                    <i class="fas fa-calendar"></i>
                    My Events
                </div>
                <div class="nav-item" data-page="createEvent">
                    <i class="fas fa-plus"></i>
                    Create Event
                </div>
                <div class="nav-item" data-page="attendees">
                    <i class="fas fa-users"></i>
                    Attendees
                </div>
                <div class="nav-item" data-page="settings">
                    <i class="fas fa-cog"></i>
                    Settings
                </div>
                <div class="nav-item" data-page="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="top-bar">
                <div></div>
                <div class="user-profile">
                    <div class="user-info">
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-details">
                            <h3>John Organizer</h3>
                            <p>Event Manager</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="page-content active" id="dashboard-page">
                <h1 class="page-title">Dashboard</h1>
                <p class="page-subtitle">Welcome back! Here's what's happening with your events.</p>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-calendar-alt"></i></div>
                        <div class="stat-value" id="totalEvents">0</div>
                        <div class="stat-label">Total Events</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-users"></i></div>
                        <div class="stat-value" id="totalBookings">0</div>
                        <div class="stat-label">Total Bookings</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-envelope"></i></div>
                        <div class="stat-value" id="totalEmails">0</div>
                        <div class="stat-label">Email Bookings</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                        <div class="stat-value" id="confirmedBookings">0</div>
                        <div class="stat-label">Confirmed</div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Recent Bookings</h2>
                        <div style="display: flex; gap: 12px; align-items: center;">
                            <button class="refresh-btn" id="refreshBtn" onclick="loadBookings()">
                                <i class="fas fa-sync-alt"></i>
                                Refresh
                            </button>
                            <button class="btn btn-primary btn-sm" onclick="showPage('createEvent')">
                                <i class="fas fa-plus"></i>
                                Create Event
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Event Details</th>
                                        <th>Date & Time</th>
                                        <th>Location</th>
                                        <th>User Email</th>
                                        <th>Status</th>
                                        <th>Booking Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="bookingsTable">
                                    <tr>
                                        <td colspan="7">
                                            <div class="loading-spinner">
                                                <div class="spinner"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- My Events Page -->
            <div class="page-content" id="myEvents-page">
                <h1 class="page-title">Events Management</h1>
                <p class="page-subtitle">View and manage all your events</p>

                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">All Events</h2>
                        <button class="btn btn-primary btn-sm" onclick="showPage('createEvent')">
                            <i class="fas fa-plus"></i>
                            Create Event
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Duration</th>
                                        <th>Location</th>
                                        <th>Description</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="eventsTable">
                                    <tr>
                                        <td colspan="9">
                                            <div class="loading-spinner">
                                                <div class="spinner"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Create Event Page -->
            <div class="page-content" id="createEvent-page">
                <h1 class="page-title">Create Event</h1>
                <p class="page-subtitle">Set up a new event</p>

                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
                    <!-- Left Form -->
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" placeholder="Event Title" id="title">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="3" placeholder="Event description..." id="description"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" id="event_date">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Hour</label>
                                    <input type="number" class="form-control" id="hour" min="0" max="23" value="10">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Minute</label>
                                    <input type="number" class="form-control" id="minute" min="0" max="59" value="15">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Duration</label>
                                    <select class="form-select" id="duration">
                                        <option>30m</option>
                                        <option>1h</option>
                                        <option>2h</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" placeholder="Event Location">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Attachments</label>
                                <input type="file" class="form-control mb-2" id="fileInput" multiple style="display:none;">
                                <ul class="list-group mb-2" id="fileList"></ul>
                                <div class="upload-box" onclick="document.getElementById('fileInput').click()">
                                    <i class="fas fa-cloud-upload-alt" style="font-size: 32px; margin-bottom: 8px;"></i>
                                    <p>Drop files here or click to upload</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Sidebar -->
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Team Members</label>
                                <div id="teamMembers" class="mb-2">
                                    <span class="avatar-sm">LA</span>
                                    <span class="avatar-sm">AM</span>
                                </div>
                                <button class="btn btn-outline btn-sm" onclick="addMember()">
                                    <i class="fas fa-plus"></i> Add Member
                                </button>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Guests</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="guestEmail" placeholder="Email invitation">
                                    <button class="btn btn-outline btn-sm" onclick="addGuest()">Send</button>
                                </div>
                                <ul class="list-group mt-2" id="guestList"></ul>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Notify via</label><br>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="slack">
                                    <label class="form-check-label" for="slack">Slack</label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="hipchat">
                                    <label class="form-check-label" for="hipchat">HipChat</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Reminder</label>
                                <select class="form-select" id="reminder">
                                    <option>30 minutes before</option>
                                    <option>1 hour before</option>
                                    <option>2 hours before</option>
                                </select>
                            </div>

                            <button class="btn btn-primary" style="width: 100%;" onclick="submitEvent()">
                                <i class="fas fa-check"></i> Create Event
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendees Page -->
     <!-- Attendees Page -->
<div class="page-content" id="attendees-page">
    <h1 class="page-title">Attendees</h1>
    <p class="page-subtitle">View and manage event attendees</p>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">All Users</h2>
            <button class="refresh-btn" id="refreshUsersBtn" onclick="loadUsers()">
                <i class="fas fa-sync-alt"></i>
                Refresh
            </button>
        </div>
        <div class="card-body">
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody id="usersTable">
                        <tr>
                            <td colspan="6">
                                <div class="loading-spinner">
                                    <div class="spinner"></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
            <!-- Settings Page -->
            <div class="page-content" id="settings-page">
                <h1 class="page-title">Settings</h1>
                <p class="page-subtitle">Manage your account and preferences</p>

                <div class="grid">
                    <!-- Profile Settings Card -->
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Profile Settings</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" value="John Organizer">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="john@example.com">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Organization</label>
                                    <input type="text" class="form-control" value="EventPro Inc.">
                                </div>
                                <button class="save-btn" onclick="saveProfile()">Save Profile</button>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Preferences Card -->
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Notification Preferences</h2>
                        </div>
                        <div class="card-body">
                            <div class="toggle-item">
                                <div class="toggle-info">
                                    <div class="toggle-title">Email Notifications</div>
                                    <div class="toggle-description">Receive email updates for new bookings</div>
                                </div>
                                <div class="toggle-switch active" onclick="toggleSwitch(this)"></div>
                            </div>
                            <div class="toggle-item">
                                <div class="toggle-info">
                                    <div class="toggle-title">SMS Notifications</div>
                                    <div class="toggle-description">Get SMS alerts for urgent updates</div>
                                </div>
                                <div class="toggle-switch" onclick="toggleSwitch(this)"></div>
                            </div>
                            <div class="toggle-item">
                                <div class="toggle-info">
                                    <div class="toggle-title">Weekly Reports</div>
                                    <div class="toggle-description">Receive weekly event performance reports</div>
                                </div>
                                <div class="toggle-switch active" onclick="toggleSwitch(this)"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/notyf/3.10.0/notyf.min.js"></script>
    <script>
        const notyf = new Notyf({
            duration: 4000,
            position: { x: 'right', y: 'top' }
        });

        let allBookings = [];
        let isLoading = false;
        const token = localStorage.getItem('token') || 'demo-token';

        function transformBookingsData(bookingsData) {
            return bookingsData.map(booking => ({
                id: booking.id,
                eventId: booking.event_id,
                eventTitle: booking.event_title || 'Untitled Event',
                eventDate: booking.event_date,
                eventTime: booking.event_time,
                eventLocation: booking.event_location || 'Location TBD',
                eventDuration: booking.event_duration || '30m',
                bookingDate: booking.booking_date,
                bookingTime: booking.booking_time,
                status: booking.status || 'pending',
                userEmail: booking.user_email || 'No email provided'
            }));
        }

        function updateStatistics(bookings) {
            const uniqueEvents = new Set(bookings.map(b => b.eventId)).size;
            document.getElementById('totalEvents').textContent = uniqueEvents;
            document.getElementById('totalBookings').textContent = bookings.length;
            document.getElementById('totalEmails').textContent = bookings.filter(b => b.userEmail && b.userEmail !== 'No email provided').length;
            document.getElementById('confirmedBookings').textContent = bookings.filter(b => b.status === 'confirmed').length;
        }

        function formatDate(dateString) {
            if (!dateString) return 'TBD';
            return new Date(dateString).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
        }

        function formatTime(timeString) {
            if (!timeString) return 'TBD';
            return new Date(`2000-01-01 ${timeString}`).toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', hour12: true });
        }

        function truncateText(text, maxLength = 30) {
            return text && text.length > maxLength ? text.substring(0, maxLength) + '...' : text || '';
        }
         
        // Add this variable at the top with other variables
let isLoadingUsers = false;

// Add this function
async function loadUsers() {
    if (isLoadingUsers) return;
    
    isLoadingUsers = true;
    const refreshBtn = document.getElementById('refreshUsersBtn');
    if (refreshBtn) refreshBtn.classList.add('loading');
    
    const tbody = document.getElementById('usersTable');
    tbody.innerHTML = `<tr><td colspan="6"><div class="loading-spinner"><div class="spinner"></div></div></td></tr>`;

    try {
        const response = await fetch('http://127.0.0.1:8000/attendees', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        });

        if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

        const users = await response.json();
        console.log('API Response:', users);
        
        if (users && users.length > 0) {
            tbody.innerHTML = users.map(user => `
                <tr>
                    <td><strong>${user.id}</strong></td>
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td><span class="status-badge status-${user.role === 'organiser' ? 'confirmed' : 'pending'}">${user.role.charAt(0).toUpperCase() + user.role.slice(1)}</span></td>
                    <td>${new Date(user.created_at).toLocaleString('en-US', { month: 'short', day: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit' })}</td>
                    <td>${new Date(user.updated_at).toLocaleString('en-US', { month: 'short', day: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit' })}</td>
                </tr>
            `).join('');
            notyf.success(`Loaded ${users.length} attendees successfully!`);
        } else {
            tbody.innerHTML = `<tr><td colspan="6"><div class="empty-state"><i class="fas fa-users"></i><h3>No attendees found</h3><p>There are currently no attendees to display.</p></div></td></tr>`;
            notyf.info('No attendees found');
        }
    } catch (error) {
        console.error('Error:', error);
        tbody.innerHTML = `<tr><td colspan="6"><div class="empty-state"><i class="fas fa-exclamation-circle"></i><h3>Error loading attendees</h3><p>${error.message}</p></div></td></tr>`;
        notyf.error('Failed to load attendees: ' + error.message);
    } finally {
        isLoadingUsers = false;
        if (refreshBtn) refreshBtn.classList.remove('loading');
    }
}

// Make sure loadUsers is accessible globally
window.loadUsers = loadUsers;


document.addEventListener('DOMContentLoaded', () => {
    loadUsers();
});
        function renderBookings(bookings) {
            const tbody = document.getElementById('bookingsTable');
            
            if (!bookings || bookings.length === 0) {
                tbody.innerHTML = `<tr><td colspan="7"><div class="empty-state"><i class="fas fa-calendar-times"></i><h3>No bookings found</h3><p>There are currently no bookings to display.</p></div></td></tr>`;
                return;
            }

            tbody.innerHTML = bookings.map(booking => `
                <tr>
                    <td>
                        <div style="font-weight: 500;">${truncateText(booking.eventTitle, 25)}</div>
                        <div style="font-size: 12px; color: var(--gray-text);">ID: ${booking.eventId} • ${booking.eventDuration}</div>
                    </td>
                    <td>
                        <div>${formatDate(booking.eventDate)}</div>
                        <div style="font-size: 12px; color: var(--gray-text);">${formatTime(booking.eventTime)}</div>
                    </td>
                    <td><div style="max-width: 150px;">${truncateText(booking.eventLocation, 20)}</div></td>
                    <td><div style="font-size: 13px; max-width: 180px; word-break: break-all;">${booking.userEmail}</div></td>
                    <td><span class="status-badge status-${booking.status}">${booking.status.charAt(0).toUpperCase() + booking.status.slice(1)}</span></td>
                    <td>
                        <div>${formatDate(booking.bookingDate)}</div>
                        <div style="font-size: 12px; color: var(--gray-text);">${formatTime(booking.bookingTime)}</div>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <button class="action-btn" title="View Details" onclick="viewBooking(${booking.id})"><i class="fas fa-eye"></i></button>
                            <button class="action-btn" title="Edit" onclick="editBooking(${booking.id})"><i class="fas fa-edit"></i></button>
                            <button class="action-btn" title="Delete" onclick="deleteBooking(${booking.id})"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        async function loadBookings() {
            if (isLoading) return;
            
            isLoading = true;
            const refreshBtn = document.getElementById('refreshBtn');
            refreshBtn.classList.add('loading');
            
            const tbody = document.getElementById('bookingsTable');
            tbody.innerHTML = `<tr><td colspan="7"><div class="loading-spinner"><div class="spinner"></div></div></td></tr>`;

            try {
                const response = await fetch('http://127.0.0.1:8000/api/bookings', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${token}`
                    }
                });

                if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

                const apiResponse = await response.json();
                let bookingsData = [];
                
                if (apiResponse.booking?.success) {
                    const { success, message, ...bookingInfo } = apiResponse.booking;
                    bookingsData = [bookingInfo];
                } else if (Array.isArray(apiResponse)) {
                    bookingsData = apiResponse;
                } else if (apiResponse.bookings) {
                    bookingsData = apiResponse.bookings;
                } else if (apiResponse.data) {
                    bookingsData = apiResponse.data;
                }
                
                if (bookingsData.length > 0) {
                    const transformedBookings = transformBookingsData(bookingsData);
                    allBookings = transformedBookings;
                    renderBookings(transformedBookings);
                    updateStatistics(transformedBookings);
                    notyf.success(`Loaded ${bookingsData.length} bookings successfully!`);
                } else {
                    allBookings = [];
                    renderBookings([]);
                    updateStatistics([]);
                    notyf.info('No bookings found');
                }
            } catch (error) {
                console.error('Error:', error);
                allBookings = [];
                renderBookings([]);
                updateStatistics([]);
                notyf.error('Failed to load bookings');
            } finally {
                isLoading = false;
                refreshBtn.classList.remove('loading');
            }
        }

        function loadEvents() {
            fetch("/api/events")
                .then(res => res.json())
                .then(events => {
                    const tableBody = document.getElementById('eventsTable');
                    tableBody.innerHTML = "";

                    if (!events || events.length === 0) {
                        tableBody.innerHTML = `<tr><td colspan="9"><div class="empty-state"><i class="fas fa-calendar-times"></i><h3>No events found</h3><p>Create your first event to get started.</p></div></td></tr>`;
                        return;
                    }

                    events.forEach((event, index) => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${index + 1}</td>
                            <td>${event.title}</td>
                            <td>${event.event_date}</td>
                            <td>${event.event_time}</td>
                            <td>${event.duration}</td>
                            <td>${event.location}</td>
                            <td>${truncateText(event.description || '', 30)}</td>
                            <td><button class="btn btn-primary btn-sm">Edit</button></td>
                            <td><button class="btn btn-sm" style="background: var(--danger); color: white;">Delete</button></td>`;
                        tableBody.appendChild(tr);
                    });
                })
                .catch(err => {
                    console.error('Error loading events:', err);
                    notyf.error('Failed to load events');
                });
        }

        function viewBooking(bookingId) {
            const booking = allBookings.find(b => b.id === bookingId);
            if (booking) alert(`Booking Details:\n\nEvent: ${booking.eventTitle}\nDate: ${formatDate(booking.eventDate)}\nTime: ${formatTime(booking.eventTime)}\nLocation: ${booking.eventLocation}\nUser: ${booking.userEmail}\nStatus: ${booking.status}`);
        }

        function editBooking(bookingId) {
            notyf.info(`Edit functionality for booking ID ${bookingId}`);
        }

        function deleteBooking(bookingId) {
            if (confirm('Are you sure you want to delete this booking?')) {
                allBookings = allBookings.filter(b => b.id !== bookingId);
                renderBookings(allBookings);
                updateStatistics(allBookings);
                notyf.success('Booking deleted successfully');
            }
        }

        // Create Event Functions
        document.getElementById('fileInput').addEventListener('change', function() {
            const list = document.getElementById('fileList');
            list.innerHTML = "";
            [...this.files].forEach(file => {
                let li = document.createElement('li');
                li.className = "list-group-item";
                li.textContent = file.name;
                let removeBtn = document.createElement('button');
                removeBtn.className = "btn btn-sm";
                removeBtn.style.background = "var(--danger)";
                removeBtn.style.color = "white";
                removeBtn.textContent = "Remove";
                removeBtn.onclick = () => li.remove();
                li.appendChild(removeBtn);
                list.appendChild(li);
            });
        });

        function addMember() {
            let initials = prompt("Enter member initials (e.g. JD)");
            if(initials) {
                let span = document.createElement('span');
                span.className = "avatar-sm";
                span.textContent = initials;
                document.getElementById('teamMembers').appendChild(span);
            }
        }

        function addGuest() {
            let email = document.getElementById('guestEmail').value;
            if(email) {
                let li = document.createElement('li');
                li.className = "list-group-item";
                li.textContent = email;
                let removeBtn = document.createElement('button');
                removeBtn.className = "btn btn-sm";
                removeBtn.style.background = "var(--danger)";
                removeBtn.style.color = "white";
                removeBtn.textContent = "Remove";
                removeBtn.onclick = () => li.remove();
                li.appendChild(removeBtn);
                document.getElementById('guestList').appendChild(li);
                document.getElementById('guestEmail').value = "";
            }
        }

        function collectFormData() {
            return {
                title: document.getElementById('title').value,
                description: document.getElementById('description').value,
                event_date: document.getElementById('event_date').value,
                event_time: document.getElementById('hour').value.padStart(2,'0') + ":" + document.getElementById('minute').value.padStart(2,'0'),
                duration: document.getElementById('duration').value,
                location: document.getElementById('location').value,
                attachments: [...document.getElementById('fileInput').files].map(f => f.name),
                team_members: [...document.getElementById('teamMembers').children].map(e => e.textContent),
                guests: [...document.getElementById('guestList').children].map(e => e.textContent.replace('Remove','').trim()),
                notify: [
                    document.getElementById('slack').checked ? "Slack": null,
                    document.getElementById('hipchat').checked ? "HipChat": null
                ].filter(Boolean),
                reminder: document.getElementById('reminder').value
            };
        }

        function submitEvent() {
            const formData = collectFormData();

            fetch("http://127.0.0.1:8000/api/events", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(formData)
            })
            .then(res => res.json())
            .then(data => {
                notyf.success(data.message || "Event Created Successfully");
                showPage('myEvents');
            })
            .catch(err => {
                notyf.error("Error: " + err.message);
            });
        }

        // Settings Functions
        function toggleSwitch(el) {
            el.classList.toggle('active');
        }

        function saveProfile() {
            notyf.success('Profile saved successfully!');
        }

        // Navigation
        function showPage(pageName) {
            document.querySelectorAll('.page-content').forEach(page => page.classList.remove('active'));
            document.querySelectorAll('.nav-item').forEach(nav => nav.classList.remove('active'));
            
            document.getElementById(`${pageName}-page`).classList.add('active');
            document.querySelector(`[data-page="${pageName}"]`).classList.add('active');
            
            if (pageName === 'dashboard') loadBookings();
            if (pageName === 'myEvents') loadEvents();
        }

        document.addEventListener('DOMContentLoaded', function() {
            loadBookings();

            document.querySelectorAll('.nav-item').forEach(item => {
                item.addEventListener('click', function() {
                    const page = this.getAttribute('data-page');
                    
                    if (page === 'logout') {
                        if(confirm('Are you sure you want to logout?')) {
                            localStorage.removeItem('token');
                            window.location.href = '/logout';
                        }
                    } else {
                        showPage(page);
                    }
                });
            });

            setInterval(() => !isLoading && loadBookings(), 30000);
        });

        window.loadBookings = loadBookings;
        window.loadEvents = loadEvents;
        window.viewBooking = viewBooking;
        window.editBooking = editBooking;
        window.deleteBooking = deleteBooking;
        window.showPage = showPage;
    </script>
</body>
</html>