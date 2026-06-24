<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About Us | Foodie Duniya</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f9f9f9;
      color: #333;
      line-height: 1.6;
    }

    .about-hero {
      background: linear-gradient(to right, #ff4e00, #ec9f05);
      color: white;
      text-align: center;
      padding: 60px 20px;
    }

    .about-hero h1 {
      font-size: 3rem;
      margin-bottom: 10px;
    }

    .about-hero p {
      font-size: 1.2rem;
      max-width: 700px;
      margin: 0 auto;
    }

    .about-content {
      display: flex;
      flex-direction: column;
      padding: 50px 20px;
      max-width: 1100px;
      margin: auto;
    }

    .about-block {
      display: flex;
      flex-wrap: wrap;
      gap: 40px;
      align-items: center;
      margin-bottom: 50px;
    }

    .about-block img {
      max-width: 100%;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      flex: 1 1 300px;
    }

    .about-text {
      flex: 1 1 400px;
    }

    .about-text h2 {
      color: #ff4e00;
      font-size: 2rem;
      margin-bottom: 15px;
    }

    .about-text p {
      font-size: 1.1rem;
    }

    @media (max-width: 768px) {
      .about-block {
        flex-direction: column;
      }

      .about-hero h1 {
        font-size: 2.2rem;
      }
    }
  </style>
</head>
<body>

  <section class="about-hero">
    <h1>Welcome to Foodie Duniya</h1>
    <p>Connecting hearts through taste – one dish at a time. Explore flavors, traditions, and modern delights with us.</p>
  </section>

  <section class="about-content">
    <div class="about-block">
      <div class="about-text">
        <h2>Our Story</h2>
        <p>
          Founded with a passion for food and technology, Foodie Duniya is a vibrant platform where food meets innovation. From humble beginnings to becoming a trusted companion in millions of food journeys, we aim to deliver joy with every bite.
        </p>
      </div>
      <img src="https://source.unsplash.com/500x400/?restaurant,food" alt="Our Story">
    </div>

    <div class="about-block">
      <img src="https://source.unsplash.com/500x400/?delivery,fastfood" alt="Our Mission">
      <div class="about-text">
        <h2>Our Mission</h2>
        <p>
          To make quality food accessible and enjoyable for everyone, while empowering local businesses, chefs, and delivery heroes. At Foodie Duniya, your satisfaction is our success.
        </p>
      </div>
    </div>

    <div class="about-block">
      <div class="about-text">
        <h2>Why Choose Us?</h2>
        <p>
          From seamless browsing to lightning-fast delivery, we combine delicious experiences with trusted service. Whether you’re craving local flavors or global cuisines, Foodie Duniya brings them to your doorstep with love.
        </p>
      </div>
      <img src="https://source.unsplash.com/500x400/?chef,kitchen" alt="Why Choose Us">
    </div>
  </section>

</body>
</html>
