<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
    <title>GSK-Blood reports QC</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome-all.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awesome.min.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/Navigation-Clean.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css');?>">
    <script src="<?php echo base_url("assets\bootstrap\js\bootstrap.min.js");?>"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<?php include_once "application/views/nav.php"?>
	<form method="post" style="padding:30px;">
	<div class="form-group row">	
	<div class="col-md-4">
		<label  class="col-form-label">Blood Component:</label>
					
						<select type="text" class="form-control" id="component">
							<option></option>
							<option>..</option>
						</select>
					</div>
					<div class="col-md-4">
		<label  class="col-form-label">Blood Component:</label>
			
				<input type="text" class="form-control" id="barcode">

		</div>
		</div>
		<div class="form-group row">
		<div class="col-md-4">	
	<label class="col-form-label">Sample Received Date from:</label> 
                    
                    	<input type="date" id="today" name="my_date" class="form-control" >
                    </div>
					<div class="col-md-4">
					<label class="col-form-label">To</label> 
                    
                    	<input type="date" id="today1" name="my_date" class="form-control" >
                    </div>
					<div class="col-md-4">
					<button type="button" class="btn btn-success" style="margin:40px;">Go</button>
					</div>

	</div>

	<div class="card-new">
                    
                <div class="card text-center" >
                    
                <div class="card-body">
                        
                    
					<table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Sr No</th>
                                <th scope="col">QCDate</th>
                                <th scope="col">BBarCode</th>
                                <th scope="col">Component</th>
                                <th scope="col"> Expiry Date</th>
                               
                                </tr>
                            </thead>
						</table>

					
				</div>
			</div>
		</div>

		<div class="but" style="text-align:center; margin:30px;">
		<button type="button" class="btn btn-success">Add</button>
                <button type="button" class="btn btn-danger" style="">Save</button>
                <button type="button" class="btn btn-warning">Cancel</button>
                <button type="button" class="btn btn-primary">Exit</button>
				<button type="button" class="btn btn-secondary">Edit</button>
            </div>

</form>

<script>
           let today = new Date().toISOString().substr(0, 10);
            document.querySelector("#today").value = today;
            document.querySelector("#today1").value = today;
            document.querySelector("#today2").valueAsDate= new Date();

        </script>




</body>
</html>
