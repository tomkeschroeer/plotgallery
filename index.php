<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Plots">
    <meta name="author" content="Philipp Gadow">
    <link rel="icon" href="./css/favicon.ico">
    <title>Plots v0.1</title>

     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

     <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">

    <!-- Fancybox Gallery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />


  </head>

  <body>


    <!-- Start PHP session -->
    <?php
    session_start();
    if (isset($_GET['collection'])) {
            $_SESSION['collection'] = $_GET["collection"];
      }
     ?>

   <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse" id=ignorePDF>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Plots v0.1</a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" name="filter" placeholder="Filter (regular expression)">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>


    <div class="container">
    <div class="jumbotron">

    <!-- Display content -->
    <?php
        if (isset($_SESSION['collection'])) {
            $collection = $_SESSION["collection"];
        }

        # Generate heading
        echo "<p>\n";
        echo "<h2>".$collection."</h2>\n";
        echo "<h4>".date("F d Y", filectime("content/".$collection))." - MPI Munich</h4>\n";
        echo "</p>\n";

        # Display filtered gallery
        $dirname = "content/".$collection;
        $filter = $_GET['filter'];;
        $images = preg_grep('/'.$filter.'/', scandir($dirname));
        $ignore = array(".", "..");
        foreach($images as $curimg){

            if(!in_array($curimg, $ignore)) {
                echo "<a data-fancybox=\"gallery\" data-caption=\"$curimg\" title=\"$curimg\" href=\"$dirname/$curimg\"><img src='php/img.php?src=$dirname/$curimg&w=300&zc=1'> <figcaption width=200px  style=\"word-wrap: break-word; word-break: break-all;\">$curimg</figcaption> </a>";
            }
        }
    ?>
    </div>
    </div>


  <!-- Scripts -->
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <!-- Gallery Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="js/showtitle.js"></script>

  </body>
</html>