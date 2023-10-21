<html>

<head>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <title>Login & Logout PHP</title>
  <style>
  body {
    background-color: royalblue;
  }
  </style>
</head>

<body>
  <div class="container">

    <div class="row">
      <div class="col-md-4 offset-md-4">

        <div class="card mt-5">
          <div class="card-title text-center">
            <h1>Login Form</h1>
          </div>
          <div class="card-body">
            <form action="logindb.php" method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Username">

              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
              </div>
              <input type="submit" value="Login" class="btn btn-primary btn-block mt-2" name="login">
            </form>
          </div>
        </div>
      </div>

    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script>
  new DataTable('#example');
  </script>
</body>

</html>