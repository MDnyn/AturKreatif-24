<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Express Flight Tracking</title>
  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <br>
    <br>
    <div class="col-md-12 text-center">
      <img src="https://clipart-library.com/img/1708016.jpg" style="height: 200px; width: 220px" alt="">
      <h1>Flight Tracking Express</h1>
    </div>
    <form action="index.php" method="POST">
      <div class="col-md-12 text-center">
        <div class="mb-3">
          <label for="id" class="form-label">Please insert the tracking number of your ticket:</label>
          <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <button type="submit" class="btn btn-primary">Track My Flight</button>
      </div>
    </form>
  </div>

  <?php

  if (isset($_POST['id']) && filter_var($_POST['id'])) {

    require "conn.php";

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Get the ID from the form input
    $id = $_POST['id'];
    // Query the database using the ID
    $sql = "SELECT id, status, company, ticket, type, flight_from, flight_to FROM flight WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
      // Loop through the results and output the data
      while ($row = mysqli_fetch_array($result)) {

  ?>
        <div class="container">
          <article class="card">
            <div class="card-body">
              <h6>Tracking Result For : <?php echo "$row[0]" ?></h6>
              <article class="card">
                <div class="card-body row">
                  <div class="col"> <strong>Flight From:</strong> <br><?php echo "$row[5]" ?></div>
                  <div class="col"> <strong>Flight To:</strong> <br> <?php echo "$row[6]" ?> </div>
                  <div class="col"> <strong>No. Flight:</strong> <br> <?php echo "$row[3]" ?> </div>
                  <div class="col"> <strong>Company</strong> <br> <?php echo "$row[2]" ?> </div>
                  <div class="col"> <strong>Plane Type</strong> <br> <?php echo "$row[4]" ?> </div>
                </div>
              </article>
              <div class="container">
                <strong>Status :</strong>
                <div class="track">
                  <?php
                  $status_flight = $row[1];
                  if ($status_flight == "Boarding") {
                  ?>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Boarding </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa-solid fa-plane-lock"></i> </span> <span class="text"> Departure </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa-solid fa-jet-fighter"></i> </span> <span class="text"> On my way </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa-solid fa-plane-circle-check"></i> </span> <span class="text"> Arrival </span> </div>

                  <?php
                  }
                  ?>
                  <?php
                  $status_flight = $row[1];
                  if ($status_flight == "Departure") {
                  ?>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Boarding</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Departure </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa-solid fa-jet-fighter"></i> </span> <span class="text"> On my way </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa-solid fa-plane-circle-check"></i> </span> <span class="text"> Arrival </span> </div>
                  <?php
                  }
                  ?>
                  <?php
                  $status_flight = $row[1];
                  if ($status_flight == "On my way") {
                  ?>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Boarding</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Departure </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> On my way </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa-solid fa-plane-circle-check"></i> </span> <span class="text"> Arrival </span> </div>
                  <?php
                  }
                  ?>
                  <?php
                  $status_flight = $row[1];
                  if ($status_flight == "Arrival") {
                  ?>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Boarding</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Departure </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> On my way </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Arrival </span> </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </article>
        </div>
  <?php
      }
    } else {

      if (!filter_var($_POST['id'], FILTER_VALIDATE_INT)) {
        echo "<div class='container'>";
        echo "  <div class='col-md-12 text-center'>
                  <h4>Please input number only</h4>
                </div>";
        echo "</div>";
      } else {
        echo "<div class='container'>";
        echo "  <div class='col-md-12 text-center'>
                <h4>No result found</h4>
              </div>";
        echo "</div>";
      }
    }

    // Close the database connection
    mysqli_close($conn);
  }

  ?>
</body>

</html>