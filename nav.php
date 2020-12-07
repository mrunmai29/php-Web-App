<nav class="nv navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php"><img src="style/images/TQ_logo.png" style="width: 50px; height: 50px;" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <div class="input-group my-2 my-lg-0 mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></span>
        </div>
        <input type="text" class="form-control" placeholder="Search" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <?php
      if (isset($_SESSION['loggedin']) == true) {
        echo '<button class="btn btn-outlined-light my-2 my-sm-0 ml-2" type="submit"><a class="text-dark" href="logout.php">Log out</a></button>';
      }else{
      $url=$_SERVER['REQUEST_URI'];
      $login_url = "/php_project/login.php";
      if ($url === $login_url || $url === $login_url.'?') {
        echo '<button class="btn btn-outlined-light my-2 disabled my-sm-0 ml-2" type="submit">Login</button>';
    }else{
        echo '<button class="btn btn-outlined-light my-2 my-sm-0 ml-2" type="submit"><a class="text-dark" href="login.php">Login</a></button>';
    }
      $sign_url = "/php_project/signup.php";
      if ($url === $sign_url || $url === $sign_url.'?') {
          echo '<button class="btn btn-secondary my-2 my-sm-0 ml-2 disabled" type="submit">Sign up</button>';
      }else{
          echo '<button class="btn btn-secondary my-2 my-sm-0 ml-2" type="submit"><a class="text-light" href="signup.php">Sign up</a></button>';
      }
    }
      ?>
    </form>
  </div>
</nav>