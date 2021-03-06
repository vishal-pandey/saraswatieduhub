<!DOCTYPE html>
<html>
<head>
	<title>Saraswati Class</title>
	<?php include './content/head.html'; ?>
			<script type="text/javascript">
				$(document).ready(function() {
			    var max_fields      = 10; //maximum input boxes allowed
			    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
			    var add_button      = $(".add_field_button"); //Add button ID
			    
			    var x = 1; //initlal text box count
			    $(add_button).click(function(e){ //on add input button click
			        e.preventDefault();
			        if(x < max_fields){ //max input box allowed
			            x++; //text box increment
			            $(wrapper).append('<div class="form-group"><input id="name" type="text" class="form-control" name="name[]" placeholder="name"><input id="class" type="text" class="form-control" name="class[]" placeholder="class"><input id="subject" type="text" class="form-control" name="subject[]" placeholder="subject"><input id="marks" type="text" class="form-control" name="marks[]" placeholder="marks"><input id="testdate" type="text" class="form-control" name="testdate[]" placeholder="testdate"><a href="#" class="remove_field">Remove</a></div>'); //add input box
			        }
			    });
			    
			    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
			        e.preventDefault(); $(this).parent('div').remove(); x--;
			    })
				});
			</script>
</head>
<body>
	<div class="main-wrapper">
		<?php include './content/header.html'; ?>
		
		<?php include './content/navigation.html';?>

		<section class="col-sm-12 main-section">
			<section class="col-sm-8 subsection">
				<div class="col-sm-12 yle">
					<h2>Results</h2>
					<form action="./content/resultprocess.php" method="post" class="form-inline">
						<div class="input_fields_wrap">
							
							<?php
								include '../secure/configuration.txt';
								$conn = new mysqli($server , $user , $pwd , $db);
								$sql = "SELECT * FROM result";
								$result = $conn->query($sql);
								while($row = $result->fetch_assoc())
								{
									
									echo '<div class="form-group"><input id="name" type="text" class="form-control" name="name[]" required="true" placeholder="name" value="'.$row['name'].'"><input id="class" type="text" class="form-control" name="class[]" required="true" placeholder="class" value="'.$row['class'].'"><input id="subject" type="text" class="form-control" name="subject[]" required="true" placeholder="subject" value="'.$row['subject'].'"><input id="marks" type="text" class="form-control" name="marks[]" required="true" placeholder="marks" value="'.$row['marks'].'"><input id="marks" type="text" class="form-control" name="testdate[]" required="true" placeholder="testdate" value="'.$row['testdate'].'"><a href="#" class="remove_field">Remove</a></div>';
								}			
							?>
						    <!-- <div><input type="text" name="mytext[]"></div> -->
						</div>
						<button class="add_field_button btn btn-default">Add More Fields</button>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
					<br>					
				</div>								
			</section>

			<?php include './content/aside.html'; ?>
		</section>
		
		<section class="col-sm-12"><br></section>

		<?php include '../content/footer.html' ?>
	</div>
</body>
</html>