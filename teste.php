
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

      <!-- Scrolling Nav JavaScript -->
    <script src="bootstrap/js/jquery.easing.min.js"></script>
    <script src="bootstrap/js/scrolling-nav.js"></script>

    <script>

 var arr =  <?php
  require_once('NetController.php');
  $NetController = new NetController();
  $weightArray = $NetController->weightData(); // array com os pesos
  $data = $NetController->weightCordinates(); // array onde cada elemento é um array com latitude e longitude
  for($i = 0; $i < sizeof($weightArray); $i++){
  array_push($data[$i],$weightArray[$i]);
  } 
  echo json_encode($data);
  ?> ; 

  alert("blz");

</script>

<?php
  require_once('NetController.php');
  $NetController = new NetController();
  $weightArray = $NetController->weightData(); // array com os pesos
  $data = $NetController->weightCordinates(); // array onde cada elemento é um array com latitude e longitude
  for($i = 0; $i < sizeof($weightArray); $i++){
    array_push($data[$i],$weightArray[$i]);
  } 
  echo json_encode($data);
?>