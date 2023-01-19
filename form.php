<?php 
  session_start();
  // $_SESSION['name'] = $_GET['name'];
  // $_SESSION['ip'] = $_GET['ip'];
   if (isset($_SESSION["name"])) {
   }else {
     header("Location:username.php");
   }
?>
<form class="container" method="post" action="functions.php">
  <h1>
    <?php
      include 'functions.php';
      date_default_timezone_set('Asia/Rangoon');
      $timestamp = date('H:i:s');
      $today = date("d-m-Y");
      $off_day = get_off_day($_SESSION["ip"]);
      $off_duty = explode(',', $off_day);
      echo $today;
    ?>
    <?php
      $ipaddress = getenv("REMOTE_ADDR") ;
    ?>
  </h1>
  <h1 id="span"></h1>
  <script type="text/javascript">
    var span = document.getElementById('span');
    function time() {
      var d = new Date();
      var s = d.getSeconds();
      var m = d.getMinutes();
      var h = d.getHours();
      span.textContent = ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
    }
    setInterval(time, 1000);
  </script>
  <?php 
    $duty_off = false;
    $data = $_SESSION["ip"];
    $user = get_name_with_ip($data);
    foreach ($off_duty as $key => $value) {
        if ($value."-".date("m-Y")==date("d-m-Y")) {
          echo("Congratulation for Your Holiday!!!");
          $duty_off = true;
        }
      }
  ?>
  <div class="col-12 row justify-content-between">
    <button type="submit" class="btn btn-primary col-6" disabled="disabled">
    <?php 
      foreach ($user as $key => $value) {
         echo $value[0];
       } 
    ?></button>
    <?php
      $duty = get_duty();
      if (($duty==null && $duty_off==false) || (isset($duty[sizeof($duty)-1]) && $duty[sizeof($duty)-1][4]!=null && !isset($duty[(sizeof($duty))][3]))) {
        echo '<button type="submit" class="btn btn-success col-2" name="d_in">In</button>';
      }else{
        echo '<button type="submit" class="btn btn-success col-2" name="d_in" disabled="disabled" hidden>In</button>';
      }
    ?>
    <?php
      $out_time = get_outtime_with_ip($_SESSION["ip"]);
      if (($timestamp>$out_time[0][0] && $duty!=null && $duty[0][4]==null) || (isset($duty[sizeof($duty)-1]) && ($duty[(sizeof($duty)-1)][4]==null) && isset($duty[(sizeof($duty)-1)][3]))) {
        echo '<button type="submit" name="d_out" class="btn btn-danger col-2">Out</button>';
      }else{
        echo '<button type="submit" class="btn btn-danger col-2" disabled="disabled" hidden>Out</button>';
      }
    ?>
    <?php
      if(!isset($_GET['overtime'])){
        if ($duty_off==true || $timestamp>"20:00:00") {
         echo '<button type="submit" name="overtime" class="btn btn-info col-2">Over Time</button>';
         echo '<button type="submit" name="dutyshift" class="btn btn-success col-2">Duty Shift</button>';
        } 
      }
    ?>
  </div>
  <?php
      if ($timestamp>$out_time[0][0] && $duty!=null && $duty[0][4]==null) {
        echo '<h1>Thanks For Your Service!!</h1>';
      }else{
        
      }
      if(isset($_GET['overtime'])){
        echo '<h1>Thanks For Your Overtime Service!!</h1>';
      }
    ?>
  <br>
  <i class="fa-solid fa-party-horn"></i>
  <div class="col-12">
    <?php
      $name = get_name_with_ip($_SESSION["ip"]);
      $data = data($name[0][0]);
     ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">IN_Time</th>
            <th scope="col">OUT_Time</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 0;
          foreach ($data as $key => $value) :
          ?>
        <tr>
            <th scope="row"><?php echo ++$i; ?></th>
            <td><?php echo $value[1]; ?></td>
            <td><?php echo $value[3]; ?></td>
            <td><?php echo $value[4]; ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</form>