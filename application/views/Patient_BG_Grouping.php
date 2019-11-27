<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
    <title>sainath</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome-all.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awesome.min.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/Navigation-Clean.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>


    <script>
function getdate(){

	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = today.getFullYear();

	var newtoday = yyyy + '-' + mm + '-' + dd;


    document.getElementById("req_date").value = newtoday;
    document.getElementById("to_date").value = newtoday;
    document.getElementById("test_date").value = newtoday;
}
</script>

</head>
<body onload="getdate()" style="overflow-x : hidden";>
    <?php include_once 'nav.php'; ?>
<div class="container-fluid">
    <button class="btn btn-primary back" style="margin-top : 1%"; type="button" ><a href="home" style="color:white";><i class="fa fa-arrow-left" style="color:white";></i> Back</a></button>
    
    <div class="form-row" style="margin-top : 2%";>
        <div class="form-group col-md-6">
        <div class="form-group" style="margin-right: 0px;"><label>Name : </label>
					<div class="form-row">
						<!-- <div class="form-group col-md-1.5">
      						<select class="form-control" id="sel1">
        						<option id="mr">Mr.</option>
        						<option id="mrs">Mrs.</option>
        						<option id="ms">Ms.</option>
      						</select>
    					</div>  -->
					    <div class="form-group col-md-4"><input type="text" class="form-control" id="fname" name="fname" placeholder="FirstName" required/></div><div id='ff_name';></div>
                        <div class="form-group col-md-4"><input type="text" class="form-control" id="mname" name="mname" placeholder="MiddleName"/></div>
    					<div class="form-group col-md-4"><input type="text" class="form-control" id="lname" name="lname" placeholder="LastName" required/></div><div id='fl_name';></div>
                    </div>
                    </div>
                        <div class="row">
						    <div class="form-group col-md-4"><label>Request date :</label><input type="date" class="form-control" id="req_date" name="req_date" /></div><div id='date_req'></div>
						    <div class="form-group col-md-4"><label>To : </label><input type="date" class="form-control" id="to_date" name="to_date" /></div><div id='date_to'></div>
                            <div class="form-group col-md-4"><label>Patient Barcode :</label><input type="text" class="form-control" id="patient_bar" name="patient_bar" /></div><div id='bar_patient'></div>
                        </div>
                    <br>            
            <!-- Table of Existing Donors -->
			<div>
                <div class="form-group pull-left"><input type="text" class="search form-control" placeholder="What you looking for?" /></div><span class="counter pull-right"></span>
                    <table class="table table-hover table-bordered results">
                        <thead>
                            <tr>
                                <th>Sr no</th>
                                <th>ID</th>
                                <th>Patient Req Time</th>
                                <th>Patient Name</th>
                                <th>B Group</th>
                                <th>Sex</th>
                            </tr>
                            <tr class="warning no-result">
                                <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                            </tr>
                        </thead>
                        <tbody>
			                <?php $i=1; foreach($recipients as $row): ?>
                            <tr onclick="enterdetails('<?=$row->patient_name?>','<?=$row->bgrp?>')">
                                <td><?=$i?></td>
                                <td><?=$row->rec_id;?></td>
                                <td><?=$row->date;?></td>
                                <td><?=$row->patient_name;?></td>
                                <td><?=$row->bgrp;?></td>
                                <td><?=$row->sex;?></td>
                            </tr>
			                <?php $i++; endforeach;?>
                        </tbody>
                    </table>
                    </div>

                </div>

            
        <div class="col-md-6">
            
        <div id="user-form" style="display:block;">
			<div id="user">    
                <div class="row">
					<div class="form-group col-md-6"><label>Patient : </label><input type="text" class="form-control" id="patient" name="patient"/></div><div id='patient_id'></div>
					<div class="form-group col-md-6"><label>Request BG : </label><input type="text" class="form-control" id="req_bg" name="req_bg"/></div><div id='bg_req'></div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3"><label>Method : </label>
      					<select class="form-control" id="sel1">
        					<option id="mr">+</option>
        					<option id="mrs">-</option>
      					</select>
                    </div>

                    <div class="form-group col-md-3"><label>Forward Group : </label>
      					<select class="form-control" id="sel2">
        					<option id="mr">+</option>
        					<option id="mrs">-</option>
      					</select>
                    </div>

                    <div class="form-group col-md-3"><label>Reverse Group : </label>
      					<select class="form-control" id="sel3">
        					<option id="mr">+</option>
        					<option id="mrs">-</option>
      					</select>
                    </div>
                    
                    <div class="form-group col-md-3"><label>Confirmed BG : </label>
      					<select class="form-control" id="sel4">
        					<option id="mr">+</option>
        					<option id="mrs">-</option>
      					</select>
                    </div>

                    <div class="form-group col-md-6"><label>Sample Type : </label><input type="text" class="form-control" id="sam_type" name="sam_type"/></div><div id='type_sam'></div>
                    <div class="form-group col-md-6"><label>Admission Status : </label><input type="text" class="form-control" id="sam_type" name="sam_type"/></div><div id='type_sam'></div>
                </div>
                <table width="100%">
                    <tr>
                        <td><button class="accordion"   >Forward Grouping</button>
                            <div class="panel">
                            <!-- Forward -->
                            <div class="row">
                            <div class="form-group col-md-2 offset-1"><label>Anti A</label>
                              
                            <select class="form-control" id="anti_a">
        						<option id="anti_a+">+</option>
        						<option id="anti_a-">-</option>
      						</select>
                            </div>

                            <div class="form-group col-md-2">
                            <label>Anti B</label>
      						<select class="form-control" id="anti_b">
        						<option id="anti_b+">+</option>
        						<option id="anti_b-">-</option>
                            </select>
                            </div>
                            
                            <div class="form-group col-md-2">
                            <label>Anti AB</label>
      						<select class="form-control" id="anti_ab">
        						<option id="anti_ab+">+</option>
        						<option id="anti_ab-">-</option>
                            </select>
                            </div>
                            <div class="form-group col-md-2">
                            <label>Ig G</label>
      						<select class="form-control" id="ig_g">
        						<option id="ig_g+">+</option>
        						<option id="ig_g-">-</option>
                            </select>
                            </div>
                            <div class="form-group col-md-2">
                            <label>Ig M</label>
      						<select class="form-control" id="ig_m">
        						<option id="ig_m+">+</option>
        						<option id="ig_m-">-</option>
                            </select>
                            </div>
                            </div> 
                            </div>
                        </div></td>
                    </tr>

                    
                    <tr>
                        <td><button class="accordion">Weak 'D' Test</button>
                            <div class="panel">
                            <!-- Forward -->
                            <div class="row">
                            <div class="form-group col-md-2 offset-1"><label>Anti A1</label>
                              
                            <select class="form-control" id="sel5">
        						<option id="mr">+</option>
        						<option id="mrs">-</option>
      						</select>
                            </div>

                            <div class="form-group col-md-2">
                            <label>Anti H</label>
      						<select class="form-control" id="sel4">
        						<option id="mr">+</option>
        						<option id="mrs">-</option>
                            </select>
                            </div>
                            
                            <div class="form-group col-md-2">
                            <label>Ig G + M</label>
      						<select class="form-control" id="sel4">
        						<option id="mr">+</option>
        						<option id="mrs">-</option>
                            </select>
                            </div>

                            <div class="form-group col-md-2">
                            <label>Ig G + M(2)</label>
      						<select class="form-control" id="sel4">
        						<option id="mr">+</option>
        						<option id="mrs">-</option>
                            </select>
                            </div>

                            <div class="form-group col-md-2">
                            <label>Ig G</label>
      						<select class="form-control" id="sel4">
        						<option id="mr">+</option>
        						<option id="mrs">-</option>
                            </select>
                            </div>
                            </div> 
                            </div>
                        </div></td>
                    </tr>

                    <tr>
                        <td><button class="accordion">Reverse Grouping</button>
                            <div class="panel">
                            <!-- Forward -->
                            <div class="row">
                            <div class="form-group col-md-2 offset-1"><label>Acell</label>
                              
                            <select class="form-control" id="sel5">
        						<option id="mr">+</option>
        						<option id="mrs">-</option>
      						</select>
                            </div>

                            <div class="form-group col-md-2">
                            <label>Bcell</label>
      						<select class="form-control" id="sel4">
        						<option id="mr">+</option>
        						<option id="mrs">-</option>
                            </select>
                            </div>
                            
                            <div class="form-group col-md-2">
                            <label>Ocell</label>
      						<select class="form-control" id="sel4">
        						<option id="mr">+</option>
        						<option id="mrs">-</option>
                            </select>
                            </div>
                            </div> 
                            </div>
                        </div></td>
                    </tr>
                </table> 

                    <div class="row">
                        <div class="form-group col-md-4"><label>Test Date : </label><input type="date" class="form-control" id="test_date" name="test_date"/></div><div id='date_test'></div>
                        <div class="form-group col-md-4"><label>Tested By : </label>
                        <select class="form-control" id="sel2">
        						<option id="mr">A</option>
                                <option id="mrs">B</option>
                                <option id="mrs">C</option>
                                <option id="mrs">D</option>
                                <option id="mrs">E</option>
                              </select>
                        </div>
                        <div class="form-group col-md-4"><label>Remarks : </label><input type="text" class="form-control" id="sam_type" name="sam_type"/></div><div id='type_sam'></div>
                    </div>
				</div>
            </div>
        </div>
    </div>
    <div align ="center">
    <div><button class="btn btn-danger" type="add" style="float:right; margin:1%">Exit</button></div>
    <div><button class="btn btn-warning" type="add" style="float:right; margin:1%">Cancel</button></div>
    <div><button class="btn btn-success"  style="float:right; margin:1%">Add</button></div>
    <!-- <div><button class="btn btn-danger" type="save">Save</button></div> -->
    
</div>
</div>
</body>
</html>

<script>
function enterdetails(name,bgrp){
    document.getElementById("patient").value = name;
    document.getElementById("req_bg").value = bgrp;

    if(bgrp === "A+"){
            document.getElementById("anti_a").value = "+";
            document.getElementById("anti_b").value = "-";
            document.getElementById("anti_ab").value = "-";
            document.getElementById("ig_g").value = "-";
            document.getElementById("ig_m").value = "-";
    }else if(bgrp === "A-"){
            document.getElementById("anti_a").value = "+";
            document.getElementById("anti_b").value = "-";
            document.getElementById("anti_ab").value = "-";
            document.getElementById("ig_g").value = "-";
            document.getElementById("ig_m").value = "-";
    }
    else if(bgrp === "B+"){
            document.getElementById("anti_a").value = "+";
            document.getElementById("anti_b").value = "-";
            document.getElementById("anti_ab").value = "-";
            document.getElementById("ig_g").value = "-";
            document.getElementById("ig_m").value = "-";
    }
    else if(bgrp === "B-"){
            document.getElementById("anti_a").value = "+";
            document.getElementById("anti_b").value = "-";
            document.getElementById("anti_ab").value = "-";
            document.getElementById("ig_g").value = "-";
            document.getElementById("ig_m").value = "-";
    }
    else if(bgrp === "AB+"){
            document.getElementById("anti_a").value = "+";
            document.getElementById("anti_b").value = "-";
            document.getElementById("anti_ab").value = "-";
            document.getElementById("ig_g").value = "-";
            document.getElementById("ig_m").value = "-";
    }else if(bgrp === "AB-"){
            document.getElementById("anti_a").value = "+";
            document.getElementById("anti_b").value = "-";
            document.getElementById("anti_ab").value = "-";
            document.getElementById("ig_g").value = "-";
            document.getElementById("ig_m").value = "-";
    }
    else if(bgrp === "O+"){
            document.getElementById("anti_a").value = "+";
            document.getElementById("anti_b").value = "-";
            document.getElementById("anti_ab").value = "-";
            document.getElementById("ig_g").value = "-";
            document.getElementById("ig_m").value = "-";
    }else{
            document.getElementById("anti_a").value = "+";
            document.getElementById("anti_b").value = "-";
            document.getElementById("anti_ab").value = "-";
            document.getElementById("ig_g").value = "-";
            document.getElementById("ig_m").value = "-";
    }
}
</script>

<script>
		$(document).ready(function() {
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
		  });
});

	</script>
    <script src="<?php echo base_url("assets/js/jquery.min.js");?>"></script>
    <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js");?>"></script>
    <script src="<?php echo base_url("assets/js/bs-animation.js");?>"></script>


<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
