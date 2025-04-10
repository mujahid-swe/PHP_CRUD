<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>index</title>
</head>


<body>
  <nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="index.php">PHP CRUD</a>
  </nav>

  <div class="container my-4">
    <div class="d-flex justify-content-end mb-3">
      <a class="btn btn-primary" href="create.php">Add New</a>
    </div>

    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Joining Date</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        <?php
          include "connection.php";
          $result = $conn->query("SELECT * FROM crud1");
          if (!$result) die("Query failed!");
          
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['name']}</td>
              <td>{$row['email']}</td>
              <td>{$row['phone']}</td>
              <td>{$row['join_date']}</td>
              <td>
                <a class='btn btn-success btn-sm' href='edit.php?id={$row['id']}'>Edit</a>
                <a class='btn btn-danger btn-sm' href='delete.php?id={$row['id']}'>Delete</a>
              </td>
            </tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
