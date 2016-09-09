<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="panel panel-primary">
    	<div class="panel-heading"><h4>Search By......<span class="glyphicon glyphicon-search"></span></h4></div>
    		<div class="panel-body">
				<div class="row">
  				<div class="col-sm-3"><label ><h4>First name</label></h4>
  				</div>
  				<div class="col-sm-3"> 
	          <input type="text"  id="fname" pattern=".{3,}"  placeholder="enter first name	">
		      </div>
		   	</div>
		   	<div class="row">
  				<div class="col-sm-3"><label ><h4>Last name</label></h4>
  				</div>
  				<div class="col-sm-3"> 
						<input type="text"  id="lname" minlength="3" maxlength="25" pattern=".{3,}" placeholder="enter last name">
		      </div>
		   	</div>
		   	<div class="row" id="results">
		   		<div class="col-sm-3"></div>
		   		<div class="col-sm-3">
		   			<input type="submit" id='submit' class="btn btn-default btn-xs" value="Search">
		   		</div>
		   	</div>
		   	<div class="row"></div>
		   	<div class="row" id="results">
		   		<div class="col-sm-3">Results :</div>
		   		<div class="col-sm-6">
				   		<table id="table" class="hidden table border striped">
						    <thead>
									<tr>
						        <th>First Name</th>
						        <th>Last Name</th>
						    	</tr>
						    </thead>
						    <tbody>

						    </tbody>
						</table>
					</div>
		   	</div>
			</div>
		</div>
	<div>

</body>
<script type="text/javascript">
	$( "#submit" ).click(function() {
  	//console.log($('#fname').val());
  	//console.log($('#lname').val());
  	var myKeyVals = { 'fname' : $('#fname').val() ,'lname' : $('#lname').val() };
		var saveData = $.ajax({
		    type: 'POST',
		    url: "test.php?action=submit",
		    data: myKeyVals,
		    dataType: "json",
		    success: function(data) { 
		    	console.log(data);
		    	$("#table tbody").remove();
		    	if(data){
                var len = data.length;
                console.log('length : '+len);
                var txt = "<tbody>";
                if(len > 0){
                    for(var i=0;i<len;i++){
                        if(data[i].first_name && data[i].last_name){
                            txt += "<tr><td>"+data[i].first_name+"</td><td>"+data[i].last_name+"</td></tr>";
                            //console.log(txt);
                        }
                    }
                    if(txt != ""){
                    		txt+='</tbody>';
                        $("#table").append(txt).removeClass("hidden");
                    }
                }
            }
		     }
		});
		saveData.error(function() { alert("Something went wrong"); });
	});
</script>
</html>
