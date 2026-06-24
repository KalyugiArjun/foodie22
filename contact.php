<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Support | Foodie Duniya</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f9f9f9;
      color: #333;
    }

    header {
      background: linear-gradient(to right, #f83600, #f9d423);
      color: white;
      padding: 40px 20px;
      text-align: center;
    }

    header h1 {
      font-size: 2.5rem;
      margin-bottom: 10px;
    }

    header p {
      font-size: 1.1rem;
    }

    .container {
      max-width: 800px;
      margin: 40px auto;
      background-color: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.07);
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
      color: #444;
    }

    input, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
    }

    textarea {
      resize: vertical;
      height: 120px;
    }

    button {
      background-color: #f83600;
      color: white;
      border: none;
      padding: 12px 25px;
      font-size: 1rem;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color: #d42e00;
    }

    .info {
      margin-top: 30px;
      font-size: 0.95rem;
      color: #555;
    }

    footer {
      background-color: #222;
      color: #aaa;
      text-align: center;
      padding: 20px;
      margin-top: 50px;
    }

    @media (max-width: 600px) {
      header h1 {
        font-size: 2rem;
      }

      .container {
        margin: 20px;
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <header>
    <h1>Contact Support</h1>
    <p>We're here to help! Fill out the form and we'll get back to you shortly.</p>
  </header>

  <div class="container">
    <form action="#" method="post">
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required placeholder="e.g. Arjun Vishwakarma" />
      </div>

      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required placeholder="e.g. arjun@email.com" />
      </div>

      <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" required placeholder="e.g. Order issue, Payment query" />
      </div>

      <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" required placeholder="Describe your issue or feedback..."></textarea>
      </div>

      <button type="submit">Send Message</button>
    </form>

    <div class="info">
      <p><strong>Email:</strong> support@foodieduniya.com</p>
      <p><strong>Phone:</strong> +91 8303319334</p>
      <p><strong>Support Hours:</strong> 9:00 AM - 8:00 PM (All Days)</p>
    </div>
  </div>

  <footer>
    &copy; 2025 Foodie Duniya | All rights reserved.
  </footer>

</body>
</html>
