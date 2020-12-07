

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="style/images/TQ_logo.png" type="image/gif" sizes="16x16">
    <title>Tweet Tweet | Quak Quak</title>
    <link rel="stylesheet" href="style/gyk.css">
    <!-- ******************************************************************************* -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/387d5ac1fe.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- ******************************************************************************* -->
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Caption&display=swap" rel="stylesheet">
</head>
<!-- ******************************************************************************* -->
<body>


<script>
$(document).ready(function(){
  $("#education").click(function(){
    <?php $stuff_name1 = "stuff1";
    setcookie($stuff_name1, "education",time() + (86400 * 30), "/");
    ?>
  });
});
$(document).ready(function(){
  $("#fashion").click(function(){
    <?php $stuff_name2 = "stuff2";
    setcookie($stuff_name2, "fashion",time() + (86400 * 30), "/");
    ?>
  });
  $("#celebs").click(function(){
    <?php $stuff_name3 = "stuff3";
    setcookie($stuff_name3, "celebs", time() + (86400 * 30), "/");
    ?>
  });
  $("#rel").click(function(){
    <?php $stuff_name4 = "stuff4";
    setcookie($stuff_name4, "rel", time() + (86400 * 30), "/");
    ?>
  });
  $("#trends").click(function(){
    <?php $stuff_name5 = "stuff5";
    setcookie($stuff_name5, "trends", time() + (86400 * 30), "/");
    ?>
  });
  $("#indmovi").click(function(){
    <?php $stuff_name6 = "stuff6";
    setcookie($stuff_name6, "indmovi", time() + (86400 * 30), "/");
    ?>
  });
});
</script>


<!-- ******************************************************************************* -->
<div class="bg-light text-center m-3 p-2 ">
<a href="home.php"><img class="mb-3" src="style/images/TQ_logo.png" style="width: 50px; height: 50px;"></a>
<span class="heading text-center">What're you into?</span>
<a  href="tq_pg.php"><button type="submit" value="Upload Image" name="submit" class="proceed btn btn-outline-dark btn-lg"><b>Proceed</b></button></a>
<p class="subtxt">Tell us what you like & we'll get you good stuff.</p>
<div>

<!-- ******************************************************************************* -->

<div class="container-fluid">
<div class="row ">
<div class="col-4"><div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="style/images/gyk_edu.jpg" class="img-fluid mt-2 ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="Avatar">
    </div>
    <div class="flip-card-back">
      <h1 class="mt-5 "><a id="education" class="text-light">Education</a></h1>
      <p>Tweet tweet Quack quack welcomes you!</p>
      <p>We love that you came so far!</p>
    </div>
  </div>
</div></div>
<div class="col-4">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="style/images/gyk_celeb.gif" class="img-fluid mt-2 ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="Avatar">
    </div>
    <div class="flip-card-back">
      <h1 class="mt-5 "><a id="celebs" class="text-light">Celebrities</a></h1>
      <p>Tweet tweet Quack quack welcomes you!</p>
      <p>We love that you came so far!</p>
    </div>
  </div>
</div></div>
<div class="col-4">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="style/images/gyk_fash.jpg" class="img-fluid mt-2 ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="Avatar">
    </div>
    <div class="flip-card-back">
      <h1 class="mt-5 "><a id="fashion" class="text-light">Fashion</a></h1>
      <p>Tweet tweet Quack quack welcomes you!</p>
      <p>We love that you came so far!</p>
    </div>
  </div>
</div></div>
<div class="col-4">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="style/images/gyk_trnd.jpg" class="img-fluid mt-2 ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="Avatar">
    </div>
    <div class="flip-card-back">
      <h1 class="mt-5 "><a id="trends" class="text-light">Trending</a></h1>
      <p>Tweet tweet Quack quack welcomes you!</p>
      <p>We love that you came so far!</p>
    </div>
  </div>
</div></div>
<div class="col-4">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="style/images/gyk_idnmovi.gif" class="img-fluid mt-2 ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="Avatar">
    </div>
    <div class="flip-card-back">
      <h1 class="mt-5 "><a id="indmovi" class="text-light">Indian Movies</a></h1>
      <p>Tweet tweet Quack quack welcomes you!</p>
      <p>We love that you came so far!</p>
    </div>
  </div>
</div></div>
<div class="col-4">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="style/images/gyk_rom.jpg" class="img-fluid mt-2 ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="Avatar">
    </div>
    <div class="flip-card-back">
      <h1 class="mt-5 "><a id="rel" class="text-light">Relationships</a></h1>
      <p>Tweet tweet Quack quack welcomes you!</p>
      <p>We love that you came so far!</p>
    </div>
  </div>
</div></div>
</div>
</div>
</body>
</html>