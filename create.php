<?php
  include "connection.php";
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $conn->query("INSERT INTO crud1 (name, email, phone, join_date) VALUES ('$name', '$email', '$phone', NOW())");
    header("Location: index.php");
    exit();
  }
?>

<!doctype html>
<html>
<head>
  <title>Create Member</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="index.php">PHP CRUD</a>
  </nav>

  <div class="container my-5">
    <div class="col-md-6 mx-auto">
      <div class="card">
        <div class="card-header bg-primary text-white text-center">
          <h4>Create New Member</h4>
        </div>
        <div class="card-body">
          <form method="post">
            <div class="form-group mb-3">
              <label>Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group mb-3">
              <label>Phone</label>
              <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between">
              <button type="submit" name="submit" class="btn btn-success">Submit</button>
              <a href="index.php" class="btn btn-secondary">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

