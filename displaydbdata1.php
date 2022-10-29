<!DOCTYPE html>
<html>
  <head>
    <title>FORM FOR PRATICE</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
  </head>

  <body>
	<table style="border:1px solid;width:100%;text-align:center;">
	<tr style="border:1px solid">
	<th style="border:1px solid" >Emp_id</th>
	<th style="border:1px solid">User_name</th>
	<th style="border:1px solid">Password</th>
	<th style="border:1px solid">Emp_number</th>
	<th style="border:1px solid">Website</th>
	<th style="border:1px solid">Gender</th>
	<th style="border:1px solid">Movie</th>
	<th style="border:1px solid">Action</th>
	</tr>
<?php 

$servername="localhost";
$username="root";
$password="";
$dbname="prasanthdb";

$con = new mysqli($servername,$username,$password,$dbname);

$sql = "SELECT * FROM formdata";

$result = $con->query($sql);


if($result->num_rows>0){
	while($rows=$result->fetch_assoc()){
		echo '<tr>'.'<td style="border:1px solid" class="emp">'.'<div contentEditable="true" >'.$rows['emp_id'].'</div>'.'</td>'.'<td style="border:1px solid">'.'<div contentEditable="true">'.$rows['user_name'].'</div>'.'</td>'.'<td style="border:1px solid">'.'<div contentEditable="true">'.$rows['password'].'</div>'.'</td>'.'<td style="border:1px solid">'.'<div contentEditable="true">'.$rows['emp_number'].'</div>'.'</td>'.'<td style="border:1px solid">'.'<div contentEditable="true">'.$rows['website'].'</div>'.'</td>'.'<td style="border:1px solid">'.'<div contentEditable="true">'.$rows['gender'].'</div>'.'<td style="border:1px solid">'.'<div contentEditable="true">'.$rows['movie'].'</div>'.'</td>'.'<br>'.'<td>'.'<a href="updatedb.php?id='.$rows["emp_id"].' ">'.'Update'.'</a>'.'<td>'.'<a href="">'.'Delete'.'</a>'.'<td>'.'</tr>';
		}	
}

?>
	</table style="border:1px solid">

<script>
jq =$.noConflict(); 
let alldata = [];	

	jq('.updatebtn').on('click',function(){
		
		var jqrow = jq(this).closest('tr');
		var jqcolumn = jqrow.find('td');
		//console.log(jqrow);
		//console.log(jqcolumn);
		jq(jqcolumn).each(function(){
			let data = jq(this).find('div').text();
				alldata.push(data);
	});
		console.log(alldata);


});



//href = "http://10.10.10.100/prasanth/form%20data%20to%20db/submit.php"
</script>




  </body>
</html>