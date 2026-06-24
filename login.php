<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - FoodieExpress</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="style.css" />

  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', sans-serif;
  background: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092') no-repeat center center/cover;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.login-container {
  background-color: rgba(255, 255, 255, 0.9);
  padding: 40px 30px;
  border-radius: 12px;
  width: 100%;
  max-width: 400px;
  box-shadow: 0 5px 20px rgba(0,0,0,0.2);
}

.login-box h2 {
  color: #ff6600;
  margin-bottom: 10px;
  text-align: center;
}

.login-box p {
  color: #444;
  text-align: center;
  margin-bottom: 30px;
}

.input-group {
  margin-bottom: 20px;
}

.input-group label {
  display: block;
  margin-bottom: 6px;
  font-weight: 600;
  color: #333;
}

.input-group input {
  width: 100%;
  padding: 12px 14px;
  border: 1px solid #ccc;
  border-radius: 8px;
  outline: none;
  font-size: 14px;
}

.password-wrapper {
  position: relative;
}

.toggle-password {
  position: absolute;
  right: 12px;
  top: 12px;
  cursor: pointer;
  color: #555;
}

.login-btn {
  background-color: #ff6600;
  color: white;
  width: 100%;
  padding: 12px;
  border: none;
  font-size: 16px;
  border-radius: 8px;
  font-weight: bold;
  cursor: pointer;
  transition: background 0.3s ease;
}

.login-btn:hover {
  background-color: #e65c00;
}

.signup-link {
  text-align: center;
  margin-top: 20px;
  font-size: 14px;
}

.signup-link a {
  color: #ff6600;
  text-decoration: none;
  font-weight: 600;
}

  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h2>Welcome Back!</h2>
      <p>Login to continue your food adventure 🍽️</p>
      <form action="logincode.php" method="POST">
        <div class="input-group">
          <label for="email"><i class="fas fa-envelope"></i> Email</label>
          <input type="email" id="email" name="email" placeholder="example@email.com" required />
        </div>

        <div class="input-group">
          <label for="password"><i class="fas fa-lock"></i> Password</label>
          <div class="password-wrapper">
            <input type="password" id="password" name="pass" placeholder="Enter your password" required />
            <span class="toggle-password" onclick="togglePassword()">
              <i class="fas fa-eye" id="toggleIcon"></i>
            </span>
          </div>
        </div>

        <button type="submit" class="login-btn">Login</button>
        <p class="signup-link">New to FoodieWorld? <a href="signup.php">Create Account</a></p>
      </form>
    </div>
  </div>

  <script>
    function togglePassword() {
      const password = document.getElementById("password");
      const icon = document.getElementById("toggleIcon");
      if (password.type === "password") {
        password.type = "text";
        icon.classList.replace("fa-eye", "fa-eye-slash");
      } else {
        password.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
      }
    }
  </script>
</body>
</html>
