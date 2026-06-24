<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up | Delight Bites</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
  font-family: 'Segoe UI', sans-serif;
  background: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092') no-repeat center center/cover;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
  </style>
</head>
<body>

  <div class="container-fluid signup-bg d-flex justify-content-center align-items-center">
    <div class="card signup-form shadow-lg">
      <div class="card-body p-5">
        <h2 class="text-center mb-4 text-gradient">Welcome to Foodie World</h2>
        <p class="text-center mb-4 text-muted">Create your account and start exploring delicious food.</p>

        <form action="signupcode.php" method="post">

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label"><i class="fas fa-user"></i> First Name</label>
              <input type="text" name="fname" class="form-control" required />
            </div>
            <div class="col-md-6">
              <label class="form-label"><i class="fas fa-user"></i> Last Name</label>
              <input type="text" name="lname" class="form-control" required />
            </div>
          </div>

          <div class="mt-3">
            <label class="form-label"><i class="fas fa-user-tag"></i> Username</label>
            <input type="text" name="uname" class="form-control" required />
          </div>

          <div class="mt-3">
            <label class="form-label"><i class="fas fa-phone"></i> Mobile</label>
            <input type="tel" name="mob" class="form-control" required pattern="[0-9]{10}" />
          </div>

          <div class="mt-3">
            <label class="form-label"><i class="fas fa-envelope"></i> Email</label>
            <input type="email" name="email" class="form-control" required />
          </div>

          <div class="mt-3">
            <label class="form-label"><i class="fas fa-lock"></i> Password</label>
            <input type="password" name="pass" class="form-control" required />
          </div>

          <div class="mt-4 d-grid">
            <button type="submit" class="btn btn-primary btn-lg" >Sign Up</button>
          </div>

          <div class="text-center mt-3">
            <p>Already have an account? <a href="login.php">Login here</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
