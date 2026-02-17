<?php
session_start();

// Redirect to login if user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}
?>

<?php include('header.php'); ?>
<?php include('dbconnect.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - GM University</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>You are now logged in.</p>

<!-- Logout Form aligned to right -->
<div class="d-flex justify-content-end mb-3">
    <form method="post">
        <input type="submit" name="logout" value="Logout" class="btn btn-warning">
    </form>
</div>


    <hr>

    <h3 class="mt-4">Event Registration</h3>
    <div class="jumbotron col-md-8 mx-auto font-weight-bold">
        <form action='submit.php' method='post'>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label>Email address:</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label>Event:</label>
                <input type="text" class="form-control" name="title" placeholder="Enter event" required>
            </div>
            <div class="form-group">
                <label>Year:</label>
                <input type="number" class="form-control" name="Year" placeholder="Enter Year" required>
            </div>
            <div class="form-group">
                <label>Gender:</label><br>
                <input type="radio" name="gender" value="male" required> Male
                <input type="radio" name="gender" value="female" required> Female
            </div>
            <div class="form-group">
                <label>From Date:</label>
                <input type="date" class="form-control" name="fromdate" required>
            </div>
            <div class="form-group">
                <label>To Date:</label>
                <input type="date" class="form-control" name="todate" required>
            </div>
            <div class="form-group">
                <label>No. of People:</label>
                <input type="number" class="form-control" name="people" placeholder="Enter number of people" required>
            </div>

            <!-- Terms and Conditions Modal Trigger -->
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="agree" required>
                <label class="form-check-label" for="agree">
                    I agree to <a href="#" data-toggle="modal" data-target="#termsModal">terms and conditions</a>
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </div>
</div>

<!-- Terms and Conditions Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
      <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
      <p>Terms and Conditions are a set of rules and guidelines that a user must agree to in order to use this system. This acts as a legal contract between GM University and you, the user.</p>
      <ul>
        <li>You agree not to misuse the system.</li>
        <li>All data must be submitted truthfully.</li>
        <li>GM University reserves the right to revoke access for violations.</li>
      </ul>
    </div>
  </div>
</div>

<?php
// Logout logic
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: home.php");
    exit();
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include('footer.php'); ?>
