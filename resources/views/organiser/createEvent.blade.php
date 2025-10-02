<!DOCTYPE html> 
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Event - Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<style>
body {
    background: #1c1f26; /* dark dashboard background */
    min-height: 100vh;
    margin: 0;
    font-family: "Segoe UI", sans-serif;
    color: #e6e6e6;
}
.page-wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
.page-header {
    background: #2a2f3a; /* dark header */
    color: #f97316;       /* orange highlight */
    padding: 20px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 6px rgba(0,0,0,0.4);
}
.page-header h1 {
    margin: 0;
    font-weight: 700;
}
.content {
    flex: 1;
    padding: 30px 40px;
}
.card {
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    background: #2a2f3a; /* dark card background */
    color: #e6e6e6;
}
.form-control, .form-select, textarea {
    border-radius: 10px;
    background: #1c1f26;
    color: #e6e6e6;
    border: 1px solid #444;
}
.form-control::placeholder, textarea::placeholder {
    color: #9ca3af;
}
.btn-primary {
    border-radius: 10px;
    font-weight: 500;
    background: #047857;
    color: #fff;
    border: none;
}
.btn-primary:hover { background: #036549; }
.btn-light {
    background: #3a3f4a;
    color: #e6e6e6;
    border: none;
}
.btn-light:hover { background: #4b5260; }

.upload-box {
    border: 2px dashed #64748b;
    border-radius: 10px;
    padding: 25px;
    text-align: center;
    color: #64748b;
    cursor: pointer;
    background: #1c1f26;
}
.avatar-sm {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #3a3f4a;
    font-weight: 600;
    margin-right: 5px;
    color: #f97316;
}
.list-group-item {
    background: #1c1f26;
    color: #e6e6e6;
    border: 1px solid #444;
}
.form-check-input:checked {
    background-color: #047857;
    border-color: #047857;
}
.form-check-label {
    color: #e6e6e6;
}
</style>
</head>
<body>

<div class="page-wrapper">
    <div class="page-header">
        <h1>Create Event</h1>
        <a href="/organiser/dashboard" class="btn btn-light">Cancel</a>
    </div>

    <div class="content container-fluid">
        <div class="row g-4">
            <!-- Left Form -->
            <div class="col-lg-8">
                <div class="card p-4 h-100">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Title</label>
                        <input type="text" class="form-control" placeholder="Event Title" id="title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Event description..." id="description"></textarea>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Date</label>
                            <input type="date" class="form-control" id="event_date">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Hour</label>
                            <input type="number" class="form-control" id="hour" min="0" max="23" value="10">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Minute</label>
                            <input type="number" class="form-control" id="minute" min="0" max="59" value="15">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Duration</label>
                            <select class="form-select" id="duration">
                                <option>30m</option>
                                <option>1h</option>
                                <option>2h</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Location</label>
                        <input type="text" class="form-control" id="location" placeholder="Event Location">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Attachments</label>
                        <input type="file" class="form-control mb-2" id="fileInput" multiple>
                        <ul class="list-group mb-2" id="fileList"></ul>
                        <div class="upload-box" onclick="document.getElementById('fileInput').click()">Drop files here or click to upload</div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4">
                <div class="card p-4 h-100 d-flex flex-column justify-content-between">
                    <!-- Team Members -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Team Members</label>
                        <div id="teamMembers" class="mb-2">
                            <span class="avatar-sm">LA</span>
                            <span class="avatar-sm">AM</span>
                        </div>
                        <button class="btn btn-sm btn-outline-primary" onclick="addMember()">+ Add</button>
                    </div>

                    <!-- Guests -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Guests</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="guestEmail" placeholder="Email invitation">
                            <button class="btn btn-outline-primary" onclick="addGuest()">Send</button>
                        </div>
                        <ul class="list-group mt-2" id="guestList"></ul>
                    </div>

                    <!-- Notify & Reminder -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Notify via</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="slack">
                            <label class="form-check-label" for="slack">Slack</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="hipchat">
                            <label class="form-check-label" for="hipchat">HipChat</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Reminder</label>
                        <select class="form-select" id="reminder">
                            <option>30 minutes before</option>
                            <option>1 hour before</option>
                            <option>2 hours before</option>
                        </select>
                    </div>

                    <button class="btn btn-primary w-100 mt-3" onclick="submitEvent()">Create Event</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
document.getElementById('fileInput').addEventListener('change', function() {
    const list = document.getElementById('fileList');
    list.innerHTML = "";
    [...this.files].forEach(file => {
        let li = document.createElement('li');
        li.className = "list-group-item d-flex justify-content-between align-items-center";
        li.textContent = file.name;
        let removeBtn = document.createElement('button');
        removeBtn.className = "btn btn-sm btn-danger";
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
        li.className = "list-group-item d-flex justify-content-between align-items-center";
        li.textContent = email;
        let removeBtn = document.createElement('button');
        removeBtn.className = "btn btn-sm btn-danger";
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
        Toastify({ text: data.message || "Event Created Successfully", backgroundColor: "#4CAF50", duration:3000, gravity:"top", position:"right" }).showToast();
    })
    .catch(err => {
        Toastify({ text: "Error: " + err.message, backgroundColor: "#FF5252", duration:3000, gravity:"top", position:"right" }).showToast();
    });
}
</script>

</body>
</html>
