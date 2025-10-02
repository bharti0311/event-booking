<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign In - Focus</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      overflow: hidden; /* Prevent scroll */
      font-family: 'Segoe UI', Arial, sans-serif;
      background: #f0f2f5;
    }

    .main-container {
      display: flex;
      width: 100%;
      height: 100vh; /* Full viewport height */
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
      max-width: 360px;
      background: #fff;
      padding: 40px 35px;
      border-radius: 16px;
      box-shadow: 0 6px 24px rgba(0, 0, 0, 0.1);
    }

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

    input, button {
      border: none;
      outline: none;
    }

    input[type="email"], input[type="password"] {
      display: block;
      width: 100%;
      margin-bottom: 16px;
      padding: 12px;
      background: #f5f5f5;
      border-radius: 8px;
      font-size: 1em;
      color: #333;
      box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
      transition: box-shadow 0.25s;
    }

    input:focus {
      box-shadow: 0 0 0 2px #b0b0b0;
    }

    button {
      width: 100%;
      padding: 12px;
      background: #555;
      color: #fff;
      border-radius: 26px;
      font-size: 1.05em;
      font-weight: bold;
      margin-top: 8px;
      cursor: pointer;
      transition: background 0.18s;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    }

    button:hover {
      background: #333;
    }

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
        box-shadow: none;
        border-radius: 0;
      }
    }
  </style>
</head>
<body>

  <div class="main-container">
    <div class="illustration">
      <img src="https://st2.depositphotos.com/7867872/10618/i/450/depositphotos_106183914-stock-photo-dj-at-night-club-party.jpg" alt="Login Illustration" />
    </div>
    <div class="form-section">
      <div class="form-box">
        <div class="signin-link">
          Don't have an account? <a href="/register">Sign Up</a>
        </div>
        <h1>Welcome Back!</h1>
        <p>Sign in to your account</p>

        <form id="loginForm">
          <input type="email" name="email" placeholder="Email" required>
          <input type="password" name="password" placeholder="Password" required>
          <button type="submit">Sign In</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
  <script>
    const notyf = new Notyf({ duration: 3000, position: { x:'right', y:'top' } });

    document.getElementById('loginForm').addEventListener('submit', async function(e){
      e.preventDefault();
      const form = e.target;
      const data = {
        email: form.email.value,
        password: form.password.value
      };

      try {
        const res = await fetch("{{ route('login') }}", {
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
          localStorage.setItem('token', result.token);
          localStorage.setItem('email', data.email);
          notyf.success(result.message || 'Login successful');
          setTimeout(() => {
            window.location.href = result.redirect_url || '/';
          }, 500);
        } else if(res.status === 401){
          notyf.error(result.error || 'Invalid credentials');
        } else {
          let msg = result.message || JSON.stringify(result.errors);
          notyf.error(msg);
        }
      } catch(err){
        console.error(err);
        notyf.error('Something went wrong!');
      }
    });
  </script>
</body>
</html>
    