<?php include('config/database.php') ?>

<?php
$query = "SELECT * FROM feedback";

$result = mysqli_query($conn, $query);

$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Feedback</title>
  <!-- bootstrap link -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
</head>

<body>
  <!-- nav -->
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <img src="./logo.png" style="height: 6vh;" alt="" srcset="">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./feedback.php">Feedback</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./about.php">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <h1 class="text-center">Kenswed vocational Technical College</h1>
    <p class="text-center"></p>
  </div>

  <section class="mb-3 container d-flex justify-content-center flex-column">
    <?php foreach ($feedback as $item) : ?>

      <div class="card bg-dark text-white mb-3">
        <div class="card-body">
          <h5 class="card-title text-center">
            Name:
            <?php echo $item["name"] ?>
          </h5>

          <p class="text-center mt-3">
            Email:
            <?php echo $item["email"] ?>
          </p>

          <p class="text-center">
            Comment:
            <?php echo $item["comment"] ?>
          </p>
        </div>
      </div>

    <?php endforeach  ?>
  </section>
</body>

</html>