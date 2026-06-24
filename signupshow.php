<?php
session_start();
$sesid=$_SESSION['user'];
$conn = mysqli_connect("localhost", "root", "", "fooddb");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch users from signup table
$sql = "SELECT * FROM signup where email='$sesid'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manage Account | Food Delivery</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background-color: #f9f9f9;
      font-family: 'Segoe UI', sans-serif;
    }
    .container {
      margin-top: 50px;
    }
    .table th {
      background-color: #dc3545;
      color: white;
    }
    .btn-sm {
      font-size: 0.8rem;
      padding: 4px 10px;
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="header">
    <h3 class="text-danger"><i class="fas fa-user-cog"></i> Manage Accounts</h3>
    <p class="text-muted">View, delete or recycle registered users</p>
  </div>

  <table class="table table-bordered table-hover table-striped text-center">
    <thead>
      <tr>
        <th>ID</th>
        <th>First</th>
        <th>Last</th>
        <th>Username</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if(mysqli_num_rows($result) > 0): ?>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= $row['id']; ?></td>
            <td><?= htmlspecialchars($row['fname']); ?></td>
            <td><?= htmlspecialchars($row['lname']); ?></td>
            <td><?= htmlspecialchars($row['uname']); ?></td>
            <td><?= htmlspecialchars($row['mob']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['pass']); ?></td>
            <td>
              <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
              <!-- <a href="recycle.php?id=<?= $row['id']; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-recycle"></i> Recycle</a> -->
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="8">No users found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>



  <div class="header">
    <h3 class="text-danger"><i class="fas fa-user-cog"></i>Recycle Manage Accounts</h3>
    <!-- <p class="text-muted">View, delete or recycle registered users</p> -->
  </div>

  <table class="table table-bordered table-hover table-striped text-center">
    <thead>
      <tr>
        <th>ID</th>
        <th>First</th>
        <th>Last</th>
        <th>Username</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $sql = "SELECT * FROM recycle where email='$sesid'";
$result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0): ?>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= $row['id']; ?></td>
            <td><?= htmlspecialchars($row['fname']); ?></td>
            <td><?= htmlspecialchars($row['lname']); ?></td>
            <td><?= htmlspecialchars($row['uname']); ?></td>
            <td><?= htmlspecialchars($row['mob']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['pass']); ?></td>
            <td>
              <!-- <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a> -->
              <a href="recycle.php?id=<?= $row['id']; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-recycle"></i> Recycle</a>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="8">No users found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</body>
</html>
