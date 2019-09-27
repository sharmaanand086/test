<!DOCTYPE html>
<html>
<head>

	<title>Time k saath majak </title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
   	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
 <div class="container">
 	<div class="col-md-6">
	<form action = "insert.php"  method = "POST">
	<label>Coach Id</label>	 
	<select name="coachid" class="form-control">
		<option  ></option>
		<?php   $a = 1 ; while($a < 50 ) {  ?>
		<option   value="<?php echo $a; ?>" ><?php echo $a; ?> </option>
		<?php $a++; } ?>
	</select>
	 <label>Date </label>
	 <input class="form-control" type="date" name="date">	

	  <label>Date Id</label>	 
	 <select name="dateid" class="form-control">
		<option   ></option>
		<?php   $b = 1 ; while($b < 10 ) {  ?>
		<option    value="<?php echo $b; ?>" ><?php echo $b; ?> </option>
		<?php $b++; } ?>
	</select> 

	<label>Interval between time </label>	 
	<select name="interval" class="form-control">
		<option  ></option>
		<option value="15" >15</option>
		<option value="20" >20</option>
		<option value="25" >25</option>
		<option value="30" >30</option>
		<option value="40" >40</option>
	</select>
	<label>Time Slot From </label>	 
	<input name="timeform" class="timepicker timepicker-with-dropdown text-center form-control">
	<label>Time Slot To </label>	 
	<input  name="timeto" class="timepicker timepicker-with-dropdown text-center form-control"><br>
	<input type="submit" class="btn btn-success" name="submit" value="submit">
	</form>
	</div>
	</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

	<script >
		 
    $('input.timepicker').timepicker({
    timeFormat: 'HH:mm:ss p',
    interval: 60,    
    maxTime: '23:00:00',     
    startTime: '08:00:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
    });
 
	</script>
	 
</body>