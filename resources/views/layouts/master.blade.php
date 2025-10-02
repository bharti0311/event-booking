<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Event Management System')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-orange: #f97316;
            --primary-green: #047857;
            --page-bg: #1c1f26;
            --card-bg: #2a2f3a;
            --text-light: #e6e6e6;
            --text-muted: #9ca3af;
            --border-dark: #374151;
            --hover-bg: #374151;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Google Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--page-bg);
            color: var(--text-light);
        }

        .app-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: var(--card-bg);
            border-right: 1px solid var(--border-dark);
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 0 24px 24px;
            border-bottom: 1px solid var(--border-dark);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 20px;
            font-weight: 500;
            color: var(--text-light);
        }

        .logo-icon {
            width: 32px;
            height: 32px;
            background: var(--primary-orange);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .nav-menu {
            padding: 16px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            margin-bottom: 8px;
            color: var(--text-light);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .nav-item i {
            width: 20px;
            margin-right: 12px;
        }

        .nav-item:hover {
            background: var(--hover-bg);
            color: var(--primary-orange);
        }

        .nav-item.active {
            background: var(--primary-orange);
            color: white;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            flex: 1;
        }

        .top-bar {
            background: var(--card-bg);
            border-bottom: 1px solid var(--border-dark);
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: var(--page-bg);
            border: 1px solid var(--border-dark);
            border-radius: 24px;
            padding: 8px 16px;
            width: 400px;
        }

        .search-bar input {
            border: none;
            background: none;
            outline: none;
            margin-left: 8px;
            flex: 1;
            color: var(--text-light);
        }

        .search-bar input::placeholder {
            color: var(--text-muted);
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
            background: var(--primary-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .user-details h3 {
            color: var(--text-light);
            margin-bottom: 2px;
        }

        .user-details p {
            color: var(--text-muted);
            font-size: 12px;
        }

        /* Page Content */
        .page-content {
            padding: 32px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-orange);
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: var(--text-muted);
            margin-bottom: 32px;
        }

        /* Cards */
        .card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: var(--shadow);
            margin-bottom: 24px;
        }

        .card-header {
            padding: 24px;
            border-bottom: 1px solid var(--border-dark);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--primary-orange);
        }

        .card-subtitle {
            color: var(--text-muted);
            font-size: 14px;
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
            padding: 24px;
            border-radius: 12px;
            text-align: center;
            color: white;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 14px;
            opacity: 0.9;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: var(--primary-green);
            color: white;
        }

        .btn-orange {
            background: var(--primary-orange);
            color: white;
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
            border-bottom: 1px solid var(--border-dark);
        }

        .table th {
            background: var(--page-bg);
            color: var(--primary-orange);
            font-weight: 500;
            text-transform: uppercase;
            font-size: 12px;
        }

        .table td {
            color: var(--text-light);
        }

        .table tr:hover {
            background: var(--hover-bg);
        }

        /* Status Badges */
        .status-badge {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-active {
            background: rgba(16, 185, 129, 0.2);
            color: var(--success);
        }

        .status-draft {
            background: rgba(245, 158, 11, 0.2);
            color: var(--warning);
        }

        .status-completed {
            background: rgba(59, 130, 246, 0.2);
            color: #3b82f6;
        }

        .status-cancelled {
            background: rgba(239, 68, 68, 0.2);
            color: var(--danger);
        }

        /* Progress Bar */
        .progress-container {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .progress-bar {
            width: 80px;
            height: 6px;
            background: var(--border-dark);
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--success);
        }

        .progress-text {
            font-size: 12px;
            color: var(--text-muted);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 50%;
            background: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--text-muted);
        }

        .action-btn:hover {
            background: var(--hover-bg);
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
        }

        @yield('extra-css')
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
                    <span>TrueBlueEvents</span>
                </div>
            </div>

            <nav class="nav-menu">
                <a href="{{ route('organiser.dashboard') }}" class="nav-item {{ request()->routeIs('organiser.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-bar"></i>
                    Dashboard
                </a>
                <a href="{{ route('organiser.myEvents') }}" class="nav-item {{ request()->routeIs('organiser.myEvents') ? 'active' : '' }}">
                    <i class="fas fa-calendar"></i>
                    My Events
                </a>
                <a href="{{ route('organiser.createEvent') }}" class="nav-item {{ request()->routeIs('organiser.createEvent') ? 'active' : '' }}">
                    <i class="fas fa-plus"></i>
                    Create Event
                </a>
                <a href="{{ route('organiser.attendees') }}" class="nav-item {{ request()->routeIs('organiser.attendees') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    Attendees
                </a>
                <a href="{{ route('organiser.settings') }}" class="nav-item {{ request()->routeIs('organiser.settings') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i>
                    Settings
                </a>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-item" style="border: none; background: none; width: 100%;" onclick="return confirm('Are you sure you want to logout?')">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Bar -->
            <div class="top-bar">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Find an event, booking...">
                </div>
                <div class="user-profile">
                    <div class="user-info">
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-details">
                            <h3>{{ auth()->user()->name ?? 'John Organizer' }}</h3>
                            <p>Event Manager</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            @yield('content')
        </main>
    </div>

    @yield('extra-js')
</body>
</html>