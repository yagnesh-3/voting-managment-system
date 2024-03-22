<?php
// Start the session
session_start();

// Include the database connection file
require_once "conn.php";

// Check if email is set in the session
if (isset($_SESSION["email"])) {
    // Assign session email to $email variable
    print_r($_SESSION);
    $email = $_SESSION["email"];
    $user = $_SESSION['user'];
    // Escape the email to prevent SQL injection
    $email = $conn->real_escape_string($email);

    // SQL query to retrieve username based on email
    $sql = "SELECT username FROM users WHERE email = '$email'";

    // Execute query
    $result = $conn->query($sql);

    // Check if any rows were returned
    // if ($result->num_rows > 0) {
    //     // Output data of each row
    //     while($row = $result->fetch_assoc()) {
    //         $username = $row["username"];
    //         echo "Welcome back, $username!";
    //     }
    // } else {
    //     echo "No results found";
    // }
    $row = $result->fetch_assoc();
    $username = $row["username"];
    
} else {
    echo "Session variable 'email' not set.";
}

// Close database connection
$conn->close();
?>




<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Welcome to iCoder. A blog for coding enthusiasts">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">

  <title>iCoder - Heaven for Programmers</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Vote</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about.html">About</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Options
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="voting.html">Caste Vote</a>
            <a class="dropdown-item" href="#">Development</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Support</a>
            <a class="dropdown-item" href="#">Write for us</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact.html">Contact Us</a>
        </li>
        <li class="nav-item" >
        <a class="nav-link" href="#">Hello, <?php echo $username; ?></a>
</li>
<li class="nav-item" >
        <a class="nav-link" href="#">Hello, <?php echo $user; ?></a>
</li>


      </ul>
      <!-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
      </form> -->
      <div class="mx-2">
       
        <a href="./login.html" <button class="btn btn-danger"></button>Logout</button> </a>
       
      </div>
    </div>
    <!-- <div>
      <div class="btn btn-danger">Login</div>
      <div class="btn btn-danger">SignUp</div>
    </div>

    </div> -->


  </nav>



  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login to iCoder</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Sign Up Modal -->
  <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Get an iCoder Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
              <label for="cexampleInputPassword1">Confirm Password</label>
              <input type="password" class="form-control" id="cexampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">Creat Account</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./pics/3.jpg" class="main-pics" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2>Welcome to Apna Voter</h2>
          <p>Caste your vote, know the results</p>
          <button class="btn btn-primary">Voter</button>
          <button class="btn btn-danger">Administator</button>
          <button class="btn btn-success">Candidate</button>
        </div>
      </div>
      <div class="carousel-item">
        <img src="2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2>The Best Coding Blog</h2>
          <p>Caste your vote, know the results</p>
          <button class="btn btn-primary">Voter</button>
          <button class="btn btn-danger">Administator</button>
          <button class="btn btn-success">Candidate</button>
        </div>
      </div>
      <div class="carousel-item">
        <img src="3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <p>Caste your vote, know the results</p>
          
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="container my-4">
    <div class="row mb-2">
      <div class="col-md-6">
        <div
          class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Profiles</strong>
            <h3 class="mb-0">Candidate Profiles</h3>
            <div class="mb-1 text-muted">2 Days Ago</div>
            <p class="card-text mb-auto">Know the details of the candidates and their promises.</p>
            <a href="#" class="stretched-link">Click here to open</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="200" height="250" src="thumb1.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div
          class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">Voting Ballot</strong>
            <h3 class="mb-0">Caste Your Vote</h3>
            <div class="mb-1 text-muted">3 hrs 40 mins left</div>
            <p class="mb-auto">In the collage of democracy, your vote is the vibrant brushstroke that paints the future.
            </p>
            <a href="voting.html" class="stretched-link">Proceed to caste your vote</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="200" height="250"
              src="https://source.unsplash.com/500x700/?tech,code,laptop" alt="">

          </div>
        </div>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <div
          class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-danger">Regestration</strong>
            <h3 class="mb-0">Voter Registration</h3>
            <!-- <div class="mb-1 text-muted">Nov 12</div> -->
            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to
              additional content.</p>
            <a href="#" class="stretched-link">Continue to registration</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="200" height="250" src="thumb2.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div
          class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-warning">Results</strong>
            <h3 class="mb-0">Results of the polling</h3>
            <!-- <div class="mb-1 text-muted">Nov 11</div> -->
            <p class="mb-auto">Know the winner of the elections</p>
            <a href="#" class="stretched-link">Proceed</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="200" height="250" src="thumb3.jpg" alt="">

          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>© 2020-2021 iCoder, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
  </footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

</body>

</html>