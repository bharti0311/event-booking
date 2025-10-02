<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Settings - Focus</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    margin: 0;
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #1c1f26; /* dark dashboard background */
    color: #e6e6e6;      /* light text */
}
.page {
    padding: 24px;
}
.page-header h1.page-title {
    font-size: 2em;
    margin: 0 0 4px 0;
    color: #f97316; /* orange highlight */
}
.page-header p.page-subtitle {
    color: #cbd5e1;
    margin: 0 0 24px 0;
}
.grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 32px;
}
@media (max-width: 768px){
    .grid {
        grid-template-columns: 1fr;
    }
}

/* Card */
.card {
    background: #2a2f3a; /* dark card */
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.4);
    display: flex;
    flex-direction: column;
    overflow: hidden;
}
.card-header {
    background: #1f2530; /* slightly darker for header */
    padding: 16px 24px;
}
.card-header .card-title {
    margin: 0;
    font-size: 1.2em;
    color: #f97316;
}
.card-body {
    padding: 24px;
}

/* Form */
.form-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 16px;
}
.form-group {
    display: flex;
    flex-direction: column;
}
.form-label {
    font-weight: 600;
    margin-bottom: 6px;
    color: #e6e6e6;
}
.form-input {
    padding: 10px 12px;
    border-radius: 10px;
    border: 1px solid #444;
    font-size: 1em;
    outline: none;
    background: #1c1f26;
    color: #e6e6e6;
    transition: border 0.2s, box-shadow 0.2s;
}
.form-input::placeholder {
    color: #9ca3af;
}
.form-input:focus {
    border-color: #047857;
    box-shadow: 0 0 0 2px #04785733;
}

/* Toggle */
.toggle-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #444;
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
}
.toggle-description {
    font-size: 0.9em;
    color: #cbd5e1;
    margin-top: 2px;
}
.toggle-switch {
    width: 40px;
    height: 20px;
    border-radius: 12px;
    background: #444;
    position: relative;
    cursor: pointer;
    transition: background 0.3s;
}
.toggle-switch::before {
    content: '';
    position: absolute;
    top: 2px;
    left: 2px;
    width: 16px;
    height: 16px;
    background: #f1f5f9;
    border-radius: 50%;
    transition: left 0.3s;
}
.toggle-switch.active {
    background: #047857;
}
.toggle-switch.active::before {
    left: 22px;
}

/* Save Button */
.save-btn {
    margin-top: 24px;
    padding: 12px;
    width: 200px;
    border-radius: 26px;
    border: none;
    background: #047857; /* green button */
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.2s;
}
.save-btn:hover {
    background: #036549;
}

/* Decorative separators for empty space */
.card-body::after {
    content: '';
    display: block;
    height: 16px;
    background: #1f2530;
    border-radius: 8px;
    margin-top: 16px;
}
</style>
</head>
<body>

<div class="page" id="settings-page">
    <div class="page-content">
        <div class="page-header">
            <h1 class="page-title">Settings</h1>
            <p class="page-subtitle">Manage your account and preferences</p>
        </div>

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
                            <input type="text" class="form-input" value="John Organizer">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-input" value="john@example.com">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Organization</label>
                            <input type="text" class="form-input" value="EventPro Inc.">
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
</div>

<script>
// Toggle switch functionality
function toggleSwitch(el){
    el.classList.toggle('active');
}

// Dummy save profile function
function saveProfile(){
    alert('Profile saved successfully!');
}
</script>

</body>
</html>
