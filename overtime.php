<?php include 'head.php'; ?>
<h1 class="text-info">Overtime Form</h1>
<form class="col-12 container bg-info" method="post" action="functions.php">
	<div class="form-group">
	    <label for="dot" style="font-size:15px;">Time From</label>
	    <div class="container row">
	      <select class="form-select w-50 form-control" aria-label="Default select example" name="from_hr">
	      <option>Hour</option>
	      <?php for($i=1; $i<25; $i++): ?>
	        <?php if($i<10): ?>
	          <option value="0<?php echo $i;?>">0<?php echo $i;?>&nbsp;&nbsp;hr</option>
	        <?php endif;?>
	        <?php if($i>9): ?>
	          <option value="<?php echo $i;?>"><?php echo $i;?>&nbsp;&nbsp;hr</option>
	        <?php endif;?>
	      <?php endfor; ?>
	    </select>
	    <select class="form-select w-50 form-control" aria-label="Default select example" name="from_min">
	      <option>Minute</option>
	      <?php for($i=0; $i<59; $i++): ?>
	        <?php if($i<10): ?>
	          <option value="0<?php echo $i;?>">0<?php echo $i;?>&nbsp;&nbsp;min</option>
	        <?php endif;?>
	        <?php if($i>9): ?>
	          <option value="<?php echo $i;?>"><?php echo $i;?>&nbsp;&nbsp;min</option>
	        <?php endif;?>
	      <?php endfor; ?>
	    </select>
	    </div>
	  </div><div class="form-group">
	    <label for="dot" style="font-size:15px;">Time To</label>
	    <div class="container row">
	      <select class="form-select w-50 form-control" aria-label="Default select example" name="to_hr">
	      <option>Hour</option>
	      <?php for($i=1; $i<25; $i++): ?>
	        <?php if($i<10): ?>
	          <option value="0<?php echo $i;?>">0<?php echo $i;?>&nbsp;&nbsp;hr</option>
	        <?php endif;?>
	        <?php if($i>9): ?>
	          <option value="<?php echo $i;?>"><?php echo $i;?>&nbsp;&nbsp;hr</option>
	        <?php endif;?>
	      <?php endfor; ?>
	    </select>
	    <select class="form-select w-50 form-control" aria-label="Default select example" name="to_min">
	      <option>Minute</option>
	      <?php for($i=0; $i<59; $i++): ?>
	        <?php if($i<10): ?>
	          <option value="0<?php echo $i;?>">0<?php echo $i;?>&nbsp;&nbsp;min</option>
	        <?php endif;?>
	        <?php if($i>9): ?>
	          <option value="<?php echo $i;?>"><?php echo $i;?>&nbsp;&nbsp;min</option>
	        <?php endif;?>
	      <?php endfor; ?>
	    </select>
	    </div>
	  </div>
	 <div class="form-group">
	    <label for="phno" style="font-size:15px;">Remark</label>
	    <input type="text" style="font-size:15px;" class="form-control" id="phno" name="remark">
	  </div>
	  <button type="submit" name="overtime_form" class="btn btn-primary col-6" style="font-size:15px;">Save Overtime</button>
</form>