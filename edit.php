<?php
include "connection.php";

$id = $name = $email = $phone = "";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit;
  }

  $id = $_GET["id"];
  $result = $conn->query("SELECT * FROM crud1 WHERE id=$id");

  if (!$result || $result->num_rows === 0) {
    header("Location: index.php");
    exit;
  }

  $row = $result->fetch_assoc();
  $name = $row["name"];
  $email = $row["email"];
  $phone = $row["phone"];

} else {
  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];

  $conn->query("UPDATE crud1 SET name='$name', email='$email', phone='$phone' WHERE id=$id");
  header("Location: index.php");
  exit;
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Update Member</title>
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
        <div class="card-header bg-warning text-white text-center">
          <h4>Update Member</h4>
        </div>
        <div class="card-body">
          <form method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" value="<?= $name ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" value="<?= $email ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Phone</label>
              <input type="text" name="phone" value="<?= $phone ?>" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between mt-3">
              <button type="submit" class="btn btn-success">Update</button>
              <a href="index.php" class="btn btn-secondary">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
