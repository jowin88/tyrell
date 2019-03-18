<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Tyrell Test From Jowin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script>
$(document).ready(function(){
	// clear responses
	$("#test1-success,#test1-error").html('');
	// check on submit
	$("#test1").on("submit",function(){
		$.ajax({
			url:"process.php",
			method:"post",
			data:$(this).serialize(),
			success:function(result){
				$("#test1-success").html(result);
			},
			error:function(xhr, status, error){
				$("#test1-error").html('<div class="alert alert-danger alert-dismissible fade show">'+error+'</div>');
			}
		});
		return false;
	});
	
});
</script>
<style>
.main-line{padding:10px;max-width:80%}
</style>
</head>
<body>

	<div class="main-line"> 
		<h1>Programming Test</h1>
		<br/>
		<div id="test1-error"></div>
		<form id="test1" action="" method="post">
			<div class="form-group">
				<label for="email">Number of people:</label>
				<input required name="n" onkeyup="this.value = (this.value).match(/\d+/g)" placeholder="Number of people..." type="number" class="form-control" id="email">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<div id="test1-success"></div>
	</div>
</body>

</html>