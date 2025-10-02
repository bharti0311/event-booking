<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sign Up - Focus</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Notyf CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

<style>
/* --- Reset & Base --- */
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    overflow: hidden; /* prevent scrollbars */
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f0f2f5;
}

/* --- Layout --- */
.main-container {
    display: flex;
    width: 100%;
    height: 100vh; /* full viewport */
}

.illustration {
    flex: 1;
    background: #e6e6e6;
}
.illustration img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.form-section {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ffffff;
}

.form-box {
    width: 100%;
    max-width: 380px;
    background: #fff;
    padding: 40px 35px;
    border-radius: 16px;
    box-shadow: 0 6px 24px rgba(0,0,0,0.1);
}

/* --- Typography --- */
.signin-link {
    text-align: right;
    margin-bottom: 18px;
    font-size: 0.9em;
}
.signin-link a {
    color: #444;
    text-decoration: none;
    font-weight: bold;
}
h1 {
    font-size: 1.8em;
    font-weight: 700;
    margin-bottom: 8px;
    color: #2d2d2d;
}
p {
    color: #6c6c6c;
    margin-bottom: 24px;
    font-size: 1em;
}

/* --- Form Fields --- */
input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 12px 14px;
    margin-bottom: 16px;
    border-radius: 8px;
    background: #f5f5f5;
    border: 1px solid #e0e0e0;
    font-size: 1em;
    color: #333;
    transition: box-shadow 0.25s, border 0.25s;
}
input:focus {
    box-shadow: 0 0 0 2px #b0b0b0;
    border-color: #999;
}

label {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.9em;
    color: #64667b;
    margin-bottom: 14px;
}

/* --- Button --- */
button {
    width: 100%;
    padding: 14px;
    background: #555;
    color: #fff;
    border-radius: 26px;
    font-size: 1.05em;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.2s;
    margin-top: 8px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}
button:hover {
    background: #333;
}

/* --- Responsive --- */
@media (max-width: 900px) {
    .main-container {
        flex-direction: column;
    }
    .illustration {
        flex: none;
        height: 40%;
    }
    .form-section {
        flex: none;
        height: 60%;
    }
    .form-box {
        max-width: 90%;
        border-radius: 8px;
        box-shadow: none;
    }
}
</style>
</head>
<body>

<div class="main-container">
    <!-- Left side illustration -->
    <div class="illustration">
        <img src="https://cdn.pixabay.com/photo/2017/12/08/11/53/event-party-3005668_1280.jpg" alt="Illustration">
    </div>

    <!-- Right side form -->
    <div class="form-section">
        <div class="form-box">
            <div class="signin-link">
                Already have an account? <a href="/login">Sign In</a>
            </div>
            <h1>Welcome to Focus!</h1>
            <p>Register your account</p>

            <form id="signupForm">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

                <label>
                    <input type="checkbox" name="agree" required>
                    I agree to the Privacy Policy & Terms
                </label>

                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>
</div>

<!-- Notyf JS -->
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<script>
// Initialize Notyf
const notyf = new Notyf({ duration: 3000, position: { x: 'right', y: 'top' } });

document.getElementById('signupForm').addEventListener('submit', async function(e){
    e.preventDefault();
    const form = e.target;
    const data = {
        name: form.name.value,
        email: form.email.value,
        password: form.password.value,
        password_confirmation: form.password_confirmation.value,
        agree: form.agree.checked ? 'on' : ''
    };

    try {
        const res = await fetch("{{ route('register') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(data)
        });

        const result = await res.json();

        if(res.ok){
            notyf.success(result.message || 'Registration successful');
            localStorage.setItem('token', result.token);
            setTimeout(()=> { window.location.href = result.redirect_url || '/'; }, 1500);
        } else {
            let msg = result.message || JSON.stringify(result.errors);
            notyf.error(msg);
        }

    } catch(err){
        notyf.error('Something went wrong!');
        console.error(err);
    }
});
</script>

</body>
</html>
