<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Place Your Order</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('https://images.unsplash.com/photo-1600891963935-cde1803c1e4e');
      background-size: cover;
      background-position: center;
      backdrop-filter: blur(2px);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .order-form {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 15px;
      width: 100%;
      max-width: 500px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }

    .order-form h2 {
      text-align: center;
      margin-bottom: 25px;
      font-weight: bold;
      color: #d35400;
    }

    .btn-order {
      background-color: #d35400;
      border: none;
      width: 100%;
      padding: 10px;
      font-size: 16px;
      color: white;
    }

    .btn-order:hover {
      background-color: #e67e22;
    }
  </style>
</head>
<body>
  <?php
    $id=$_REQUEST['id'];
    session_start();
    $sesid=$_SESSION['user'];
    $conn=mysqli_connect("localhost","root","","fooddb");
    $sel="select * from signup where email='$sesid'";
    $r=mysqli_query($conn,$sel);
    $fetch=mysqli_fetch_array($r,MYSQLI_BOTH);
  ?>
  <form class="order-form" action="submit_order.php" method="POST">
    <h2>Place Your Order</h2>
     <!-- <input type="hidden" name="id" value="<?php echo $id ?>>" -->
    <div class="mb-3">
      <label class="form-label">User ID</label>
      <input type="text" name="userid" class="form-control" required value="<?php echo $fetch['email'] ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Food ID</label>
      <input type="text" name="foodid" class="form-control" required value="<?php echo $id ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" name="username" class="form-control" required value="<?php echo $fetch['fname'] ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Full Address</label>
      <textarea name="fulladdress" class="form-control" rows="3" required></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">City</label>
      <input type="text" name="city" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-order">Order Now</button>
  </form>

</body>
</html>
