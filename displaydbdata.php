<!DOCTYPE html>
<html>
  <head>
    <title>FORM FOR PRATICE</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
  </head>

  <body>
	<a href="submit.php" style="margin-left:30px ;text-decoration: none;">Create</a>
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
		echo '<tr>'.'<td style="border:1px solid" class="emp">'.$rows["emp_id"].'</td>'.'<td style="border:1px solid">'.$rows['user_name'].'</td>'.'<td style="border:1px solid">'.$rows['password'].'</td>'.'<td style="border:1px solid">'.$rows['emp_number'].'</td>'.'<td style="border:1px solid">'.$rows["website"].'</td>'.'<td style="border:1px solid">'.$rows['gender'].'<td style="border:1px solid">'.$rows["movie"].'</td>'.'<td>'.'<a text-decoration: "none"; href="updatedb.php?id='.$rows["emp_id"].' ">'.'Update'.'</a>'.'<td>'.'<a text-decoration: "none"; href="deletingselectedrows.php?id='.$rows["emp_id"].'">'.'Delete'.'</a>'.'<td>'.'</tr>';
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