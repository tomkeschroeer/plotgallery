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
    <link href="css/table.css" rel="stylesheet">

    <!-- Fancybox Gallery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />

    <?php
    function console_log( $data ){
      echo '<script>';
      echo 'console.log('. json_encode( $data ) .')';
      echo '</script>';
    }
    ?>

  </head>

  <body>


   <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse" id=ignorePDF>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Plots v0.1</a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" name="filter" placeholder="Filter (regular expression)">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>


    <div class='container'>
        <div class="jumbotron" id='object'>
        <?php
          $relPath = "./content/";
          $table = array();
          $ignore = array(".", "..");
          $files = scandir($relPath);
          foreach ($files as $file) {
          // display all non-hidden directories
            if(!in_array($file, $ignore)) {
              $fullPath = $relPath . $file;
              $displayPath = "displaySubstructure.php?collection=" . $file;
              $row = array("name"=>$file, "modified"=>date("d F Y H:i:s",filectime($relPath . $file)), "displayPath"=>$displayPath);
              array_push($table, $row);
            }   
          }

         // print result
          echo "<h1>Sample plots</h1>";
          echo "&nbsp;";
          echo "&nbsp;";
          echo "<table>";
          echo "<tr>";
          echo "<th>Sample name</th>";
          echo "<th>Plot folder</th>";
          echo "<th>Description</th>";
          echo "</tr>";
          echo "<td>user.toschroe:user.toschroe.36470x.btagTraining.<br/>e7142_s3681_r13144_r13146_p4931.EMPFlow.<br/>2022-03-04-T174645.22-03-04_dijets_output.h5</td>";
          echo "<td>Plots_philipp_36470x_dijets</td>";
          echo "<td>dijets samples without leptonic<br/>decay variables";
          echo "</tr>";
          echo "<tr>";
          echo "<td>user.toschroe.410470.btagTraining.e6337_s3681<br/>_r13144_p4931.EMPFlowAll.2022-03-28-T115935<br/>.22-03-28_tau_dec_and_ghost_output.h5</td>";
          echo "<td>plots_ttbar_410470_20220328</br>_Tau_Ghost</td>";
          echo "<td>ttbar samples including the</br>leptonic decay variables but</br>with failed tau detection</td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td>user.toschroe.410470.e6337_s3681_r13167<br/>_p4931.tdd.EMPFlow.22_2_68.22-04-28<br/>_fixed_taus_output.h5</td>";
          echo "<td>plots_ttbar_410470_20220428_fixed_taus</td>";
          echo "<td>updated ttbar samples including taus. </br>LeptonDecyLabel is therefore updated </br>and LepsFromTau added</i></td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td>user.pgadow.410470.btagTraining.e6337_s3681_r13144<br/>_p4931.EMPFlowAll.2022-03-15-T213006_output.h5</td>";
          echo "<td>plots_ttbar_410470_philipp_20220315</td>";
          echo "<td> ttbar samples from the production<br/>from the 15.03.2022 without<br/>leptonic decay variables</td>";
          echo "</tr>";
          echo "<tr>";
          echo "<tr>";
          echo "<td>user.pgadow.410470.btagTraining.e6337_s3681<br/>_r1314x_p4931.EMPFlowAll.2022-03-15-T213006_<br/>output.h5 <i>and</i> user.pgadow.800030.btagTraining<br/>.e7954_s3681_r13144_p4931.EMPFlowAll.2022-03-15-<br/>T213006_output.h5</td>";
          echo "<td>plots_ttbar_r22</td>";
          echo "<td>latest r22 ttbar samples stored here:<br/><i>/srv/beegfs/scratch/groups/dpnc/atlas/<br/>FTag/samples/r22/p4931_leptonic_labels</i></td>";
          echo "</tr>";  
           
          echo "</table>";
          echo "&nbsp;";
          echo "&nbsp;";
          echo "<h1>Choose an entry</h1>";
          echo "&nbsp;";
          echo "<table>";
          echo "<tr>";
          echo "<th>Content name</th>";
          echo "<th>Last modified</th>";
          echo "</tr>";
          $samples = array("plots_philipp_36470x_dijets"=>"user.toschroe:user.toschroe.36470x.btagTraining.e7142_s3681_r13144_r13146_p4931.EMPFlow.2022-03-04-T174645.22-03-04_dijets_output.h5", 
                  "plots_ttbar_410470_philipp_20220315"=>"user.pgadow.410470.btagTraining.e6337_s3681_r13144_p4931.EMPFlowAll.2022-03-15-T213006_output.h5",
                  "plots_ttbar_410470_20220328_Tau_Ghost"=>"user.toschroe.410470.btagTraining.e6337_s3681_r13144_p4931.EMPFlowAll.2022-03-28-T115935.22-03-28_tau_dec_and_ghost_output.h5",
                  "plots_ttbar_r22"=>"user.pgadow.410470.btagTraining.e6337_s3681_r1314x_p4931.EMPFlowAll.2022-03-15-T213006_output.h5/user.pgadow.800030.btagTraining.e7954_s3681_r13144_p4931.EMPFlowAll.2022-03-15-T213006_output.h5",
                  "plots_ttbar_410470_20220428_fixed_taus"=>"user.toschroe.410470.e6337_s3681_r13167_p4931.tdd.EMPFlow.22_2_68.22-04-28_fixed_taus_output.h5");
          foreach ($table as $row){
            echo "<tr>";
            $thisLinkPath = $row['displayPath'] . "&sample=" . $samples[$row['name']];
            $thisLinkName = $row['name'];
            $thisModified = $row['modified'];
            echo "<td><a href=$thisLinkPath>$thisLinkName</a></td>";
            echo "<td>$thisModified</td>";
            echo "</tr>";
          }
          echo "</table>";
        ?>

        </div>
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
