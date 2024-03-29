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

    // document.getElementById("req_date").value = newtoday;
    // document.getElementById("to_date").value = newtoday;
    // document.getElementById("exp_date").value = newtoday;
}
</script>
<script>
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = today.getFullYear();
  today = mm + '/' + dd + '/' + yyyy;										
</script>

</head>
<body onload="getdate()" style="overflow-x : hidden";>
    
<div class="container-fluid">
    <button class="btn btn-primary back" style="margin-top : 1%"; type="button" ><a href="home" style="color:white";><i class="fa fa-arrow-circle-left" style="color:white";></i> &nbsp;Back</a></button>
    
    <form style="padding-right: 0px;margin-right: 0px;margin-left: 0px;" method="post" action="../addRejDetails">

        <div class="form-row">
            <div class="form-group col-md-5"></div>
            <div class="form-group col-md-2"><input type="text" class="form-control" name="search" id="search"  autofocus placeholder="Enter the Recipient's Barcode" /></div>
            <div class="form-group col-md-1"><button class="btn btn-primary" type="button" onclick="searchip()">Go</button></div>
        </div>

        <div id="summary" style="display:block;">
        <div class="form-row" style="margin-top : 1%";>
        <!-- <?php foreach($user as $row):?><?=$row->blood_gr;?><?php endforeach;?> -->
            <div class="form-group col-md-3" style="margin-right: 0px;"><label>First Name :</label> <input style="border:none;" id="fname" readonly/></div>
            <div class="form-group col-md-3" style="margin-right: 0px;"><label>Middle Name :</label> <input style="border:none;" id="mname" readonly/></div>
            <div class="form-group col-md-3" style="margin-right: 0px;"><label>Last Name :</label> <input style="border:none;" id="lname" readonly/></div>
            <div class="form-group col-md-3" style="margin-right: 0px;"><label>Gender :</label> <input style="border:none;" id="gender" readonly/></div>
            <div class="form-group col-md-3" style="margin-right: 0px;"><label>Blood Group :</label> <input style="border:none;" id="bgrp" readonly/></div>
            <div class="form-group col-md-3" style="margin-right: 0px;"><label>Age :</label> <input style="border:none;" id="age" readonly/></div>
            <div class="form-group col-md-3" style="margin-right: 0px;"><label>Mobile Number :</label> <input style="border:none;" id="phno" readonly/></div>
            <div class="form-group col-md-3" style="margin-right: 0px;"><label>Barcode :</label> <input style="border:none;" id="" readonly/></div>
            <div class="form-group col-md-3" style="margin-right: 0px;"><label>City :</label> <input style="border:none;" id="" readonly/></div>
            <div class="form-group col-md-3" style="margin-right: 0px;"><label>Type of Request :</label> <input style="border:none;" id="tor" readonly/></div>
        </div>

        
    <div align ="center">
    <div><button class="btn btn-danger" type="button" style="float:right; margin:1%"><a href="home" style="color:white";><i class="fas fa-arrow-left" style="color:white";></i> &nbsp;Exit</a></button></div>
    <div><button class="btn btn-warning" type="reset" style="float:right; margin:1%"><i class="fas fa-close" style="color:red; font-size:18px;"></i> &nbsp;Cancel</button></div>
    <div><button class="btn btn-success" type="button"  data-toggle="modal" data-target="#existing" style="float:right; margin:1%"><i class="fas fa-plus" style="color:white";></i> &nbsp;Add</button></div>
    </div>
    </div>
    </form>


    <!-- Modal -->
    <div id="existing" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Choose Recipient</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <div class="form-group pull-right"><input type="text" class="search form-control" placeholder="What you looking for?" /></div><span class="counter pull-right"></span>

        <table class="table table-hover table-bordered results">
            <thead>
                <tr>
                    <th>Sr no</th>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Blood Group</th>
                    <th>Age</th>
                    <th>Sex</th>
                </tr>
                <tr class="warning no-result">
                    <td colspan="6"><i class="fa fa-warning"></i> No result</td>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($recipient as $row):?>
                    <tr onclick="enterdetails('<?=$row->rec_id?>', '<?=$row->patient_name?>', '<?=$row->bgrp?>', '<?=$row->sex?>', '<?=$row->age?>', '<?=$row->type_of_req?>')">
                        <td><?=$i?></td>
                        <td><?=$row->rec_id;?></td>
                        <td><?=$row->patient_name;?></td>
                        <td><?=$row->bgrp;?></td>
                        <td><?=$row->age;?></td>
                        <td><?=$row->sex;?></td>
                    </tr>
                <?php $i++; endforeach;?>                
            </tbody>
        </table>                    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <!-- Modal End -->
</div>
</div>
</body>
</html>

<script>

function enterdetails(id,name,bgrp,sex,age,type_of_req){
    // document.getElementById("fname").value = name;
    document.getElementById("search").value = id;
    // document.getElementById("bgrp").value = bgrp;
    var fullname = name.split(" ");
    document.getElementById("fname").value = fullname[0];
    document.getElementById("mname").value = fullname[1];
    document.getElementById("lname").value = fullname[2];
    document.getElementById("bgrp").value = bgrp;
    document.getElementById("gender").value = sex;
    document.getElementById("age").value = age;
    document.getElementById("tor").value = type_of_req;
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

<script>
  function searchip(){
    var search_ip = document.getElementById('search').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var info = this.responseText;
        // var array = info.split(" ");
        if(info === "Data Not Found\nEnter a Valid ID"){
            alert(info);
        }
        else{
            var array = info.split("^");
            var fullname = array[0];
            name = fullname.split(" ");
            var final_name = name.split(',');
            document.getElementById('fname').value = final_name[0];
            document.getElementById('mname').value = final_name[1];
            document.getElementById('lname').value = final_name[2];
            document.getElementById('bgrp').value = array[1];
            document.getElementById('age').value = array[2];
            document.getElementById('gender').value = array[3];
            document.getElementById("tor").value = array[4];
        }
      }
    };
    xhttp.open("GET", "getRecipientInfo?id="+search_ip, true);
    xhttp.send();
  }

function summary(){
    document.getElementById("summary").style.display = "block";
    document.getElementById("testResult").style.display = "none";
    document.getElementById("").style.display = "none";
    document.getElementById("").style.display = "none";
    document.getElementById("").style.display = "none";
    document.getElementById("").style.display = "none";
}

function testResult(){
    document.getElementById("summary").style.display = "none";
    document.getElementById("testResult").style.display = "block";
    document.getElementById("").style.display = "none";
    document.getElementById("").style.display = "none";
    document.getElementById("").style.display = "none";
    document.getElementById("").style.display = "none";
}
</script>
