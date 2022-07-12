<?php include 'config/database.php' ?>


<?php
$name = $email = $comment = "";
// errors variable
$nameErr = $emailErr = $commentErr = "";
if (isset($_POST["submit"])) {
  // variable



  // check if the inputs are empty

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    // sanitize the input
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
  }
  if (empty($_POST["comment"])) {
    $commentErr = "comment is required";
  } else {
    $comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_EMAIL);
  }


  if (empty($nameErr) && empty($emailErr) && empty($commentErr)) {
    // submit the form
    $sql = "INSERT INTO feedback (name,email,comment) VALUES ('$name','$email','$comment')";

    // if query execute
    if (mysqli_query($conn, $sql)) {
      // redirect the user to the feedback page
      header("Location:feedback.php");
    } else {
      // error
      echo 'Error' . mysqli_error($conn);
    }
  }
}

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
      <!-- <a class="navbar-brand" href="index.php">Kvtc</a> -->
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
    <p class="text-center">Tell us About Your experience</p>
  </div>

  <section class="mt-3 container d-flex justify-content-center flex-column">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" class="">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" />
        <span class="text-danger"><?php if ($nameErr) : ?>
            <?php echo $nameErr ?>
          <?php endif; ?>
        </span>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" />
        <span class="text-danger"><?php if ($emailErr) : ?>
            <?php echo $emailErr ?>
          <?php endif; ?>
        </span>
      </div>

      <div class="mb-3">
        <label for="body" class="form-label">Feedback</label>
        <textarea class="form-control" id="comment" name="comment" placeholder="Enter your feedback"></textarea>
        <span class="text-danger">
          <?php if ($commentErr) : ?>
            <?php echo $commentErr ?>
          <?php endif; ?>
        </span>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100" />
      </div>
    </form>
  </section>



  <script>
    document.getElementById("execute") = (e) => {
      e.preventDefault()
    }
  </script>
</body>

</html>