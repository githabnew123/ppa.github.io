<?php include 'head.php'; ?>
<form class="col-12" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="form-group justify-content-center">
    <label for="exampleInputEmail1">Employee Name</label>
    <input type="name" class="form-control" required="required" name="name" aria-describedby="emailHelp" placeholder="Enter Name">  </div>
    <label for="exampleInputEmail1">Employee Phone Number</label>
    <input type="name" class="form-control" required="required" name="ip" aria-describedby="emailHelp" placeholder="Enter Phone Number">  </div>
  <br>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
<?php 
	session_start();
	if (isset($_SESSION['name'])) {
		header("Location:index.php");
	}
	if (isset($_POST['submit'])) {
		include 'dbcon.php';
		$name = $_POST['name'];
		$ip = $_POST['ip'];
		//$data = $_SERVER['HTTP_USER_AGENT'];
		// $sql = "INSERT into user(name,ip) values ((:name),(:ip))";
		// $stmt = $connection->prepare($sql);
		// $stmt ->bindParam(':name',$name);
		// $stmt ->bindParam(':ip',$ip);
		// $stmt ->execute();
		session_start();
		$_SESSION["name"] = $name;
		$_SESSION["ip"] = $ip;
		header("Location:index.php");
	}
?>