<?php
$conn = mysqli_connect("localhost", "root", "", "fooddb");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM biryanis ORDER BY rand()";
$result = mysqli_query($conn, $sql);

$dishes = [];
while ($row = mysqli_fetch_assoc($result)) {
    $dishes[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Dishes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #f4f7f8, #eaf6f6);
      color: #333;
    }

    h1 {
      text-align: center;
      padding: 20px 0;
      font-size: 2.2rem;
      color: #2c3e50;
      background: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      margin-bottom: 10px;
    }

    nav {
      background: #1a1a1a;
      padding: 14px 5px;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 12px;
    }

    nav button {
      background: #34495e;
      color: #ecf0f1;
      border: none;
      padding: 10px 18px;
      border-radius: 50px;
      cursor: pointer;
      transition: all 0.3s ease;
      font-size: 0.9rem;
    }

    nav button:hover,
    nav button.active {
      background: #00c6ff;
      color: #fff;
      box-shadow: 0 0 10px rgba(0,198,255,0.6);
    }

    .search-bar {
      text-align: center;
      padding: 15px 10px;
      background: #ffffff;
    }

    .search-bar input {
      width: 300px;
      padding: 12px 18px;
      border-radius: 25px;
      border: 1px solid #ccc;
      font-size: 1rem;
      outline: none;
      transition: 0.3s;
    }

    .search-bar input:focus {
      border-color: #00c6ff;
      box-shadow: 0 0 8px rgba(0,198,255,0.4);
    }

    .search-bar button {
      padding: 11px 20px;
      margin-left: 10px;
      border: none;
      background: #00c6ff;
      color: #fff;
      border-radius: 25px;
      font-size: 1rem;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .search-bar button:hover {
      background: #0093c4;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      padding: 20px;
      max-width: 100%;
    }

    .card {
      background: #ffffff;
      width: 320px;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 8px 16px rgba(0,0,0,0.08);
      transition: all 0.3s ease;
      border: 1px solid #f0f0f0;
    }

    .card:hover {
      transform: translateY(-5px) scale(1.02);
      box-shadow: 0 14px 30px rgba(0,198,255,0.2);
    }

    .card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      transition: transform 0.3s ease-in-out;
    }

    .card:hover img {
      transform: scale(1.05);
    }

    .card-content {
      padding: 18px;
    }

    .card h3 {
      margin: 0 0 10px;
      font-size: 1.25rem;
      color: #2c3e50;
    }

    .card p {
      font-size: 0.95rem;
      color: #555;
      height: 45px;
      overflow: hidden;
    }

    .price {
      color: #27ae60;
      font-weight: bold;
      margin: 12px 0;
      font-size: 1.1rem;
    }

    .buttons {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      margin-top: 15px;
    }

    .buttons button,
    .buttons a button {
      flex: 1;
      padding: 10px 14px;
      border: none;
      border-radius: 12px;
      font-size: 0.9rem;
      color: white;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition: background 0.3s ease;
    }

    .buttons button:nth-child(1) {
      background: #3498db;
    }

    .buttons button:nth-child(1):hover {
      background: #2980b9;
    }

    .buttons button:nth-child(2) {
      background: #f39c12;
    }

    .buttons button:nth-child(2):hover {
      background: #d68910;
    }

    .buttons button::after {
      content: "";
      background: rgba(255, 255, 255, 0.4);
      position: absolute;
      border-radius: 50%;
      transform: scale(0);
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      opacity: 0;
      transition: transform 0.4s, opacity 0.4s;
    }

    .buttons button:active::after {
      transform: scale(2.5);
      opacity: 1;
      transition: 0s;
    }

    @media (max-width: 768px) {
      .card {
        width: 90%;
      }
    }
  </style>
</head>
<body>

<h1>🍽️ All Delicious Dishes</h1>

<nav>
  <button onclick="filterCategory('all')">All</button>
  <button onclick="filterCategory('Biryani')">Biryani</button>
  <button onclick="filterCategory('Pizza')">Pizza</button>
  <button onclick="filterCategory('Burger')">Burger</button>
  <button onclick="filterCategory('Dosa')">Dosa</button>
  <button onclick="filterCategory('icecream')">Ice Cream</button>
  <button onclick="filterCategory('thali')">Indian Thali</button>
  <button onclick="filterCategory('momos')">Momos</button>
</nav>

<div class="search-bar">
  <input type="text" id="searchInput" placeholder="Search dish by name...">
  <button onclick="searchDishes()">Search</button>
</div>

<div class="container" id="dishContainer">
  <?php foreach ($dishes as $row): ?>
    <div class="card" data-name="<?= strtolower($row['food_name']) ?>" data-category="<?= strtolower($row['category']) ?>">
      <img src="<?= $row['image'] ?>" alt="<?= $row['food_name'] ?>">
      <div class="card-content">
        <h3><?= $row['food_name'] ?></h3>
        <p><?= $row['description'] ?></p>
        <div class="price">₹<?= $row['offer_price'] ?></div>
        <div class="buttons">
          <button onclick="addToCart(<?= $row['id'] ?>)">Add to Cart</button>
          <a href="order.php?id=<?= $row['id'] ?>"><button>Order</button></a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<script>
function filterCategory(category) {
  const cards = document.querySelectorAll('.card');
  const buttons = document.querySelectorAll('nav button');
  category = category.toLowerCase();

  buttons.forEach(btn => btn.classList.remove('active'));
  [...buttons].find(btn => btn.innerText.toLowerCase().includes(category)).classList.add('active');

  cards.forEach(card => {
    const cat = card.getAttribute('data-category');
    card.style.display = (category === 'all' || cat === category) ? 'block' : 'none';
  });

  document.getElementById("searchInput").value = "";
}

function searchDishes() {
  const input = document.getElementById("searchInput").value.toLowerCase().trim();
  const cards = document.querySelectorAll(".card");
  const buttons = document.querySelectorAll('nav button');
  buttons.forEach(btn => btn.classList.remove('active'));

  cards.forEach(card => {
    const name = card.getAttribute('data-name');
    card.style.display = name.includes(input) ? "block" : "none";
  });
}

function addToCart(food_id) {
  fetch('add_to_cart.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'food_id=' + food_id
  })
  .then(response => response.text())
  .then(data => {
    if (data === 'not_logged_in') {
      alert("Please log in to add to cart!");
    } else {
      alert("Added to cart!");
    }
  });
}
</script>

</body>
</html>
