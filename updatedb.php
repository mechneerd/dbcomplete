<!DOCTYPE html>
<html>

<head>

</head>

<body>




<?php 


$id = $_GET['id'];


$servername = "localhost";
$username="root";
$password="";
$dbname="prasanthdb";

$con = new mysqli($servername,$username,$password,$dbname);

if($con->connect_error){
	die('connection failed'.$con->error);}

$sql = "SELECT * FROM formdata WHERE emp_id = $id ";

$result = $con->query($sql);

if($result->num_rows > 0){
	while ($rows = $result->fetch_assoc()){
		  $name = $rows['user_name'];
		  $pass = $rows['password'];
		  $emp = $rows['emp_number'];
		  $web= $rows['website'];
		  $gen = $rows['gender'];
		  $mov = $rows['movie'];
			
		  
		  
			
	}

}else{
	echo '0 result';	
	}



$con->close();


?>


<h1 style="color:#A9A9A9; margin-left:300px; margin-top:50px;'">update form </h1>
<div id="cont" style="background-color:#00cc99;display:flex;width:250px;height:300px;margin-left:300px;margin-top:20px;padding-left:10px;padding-top:10px;border-radius:10px;">
	<form method="POST">
		<lable>username</label>
		<input type="Text"  name='username' value="<?php echo($name); ?>" ></input><br>

		<lable>password</label>
		<input type="password" name="password" value="<?php echo($pass); ?>"></input><br>
	

	
	<lable>Employee number</label>
	<input type="number" name='employ' value="<?php echo($emp); ?>" min="1" max="99999"></input><br>
	

	<lable>which website you want to log in to? </label>
	<select name="website" id="web" style="background-color:#6699ff;color:#ff9900">
		<option  value='google' <?php if($web == 'google') { ?> selected="selected"<?php } ?> >google</option>
		<option value='facebook' <?php if($web == 'facebook') { ?> selected="selected"<?php } ?>>facebook</option>
		<option value='twitter'<?php if($web == 'twitter') { ?> selected="selected"<?php } ?> >twitter</option>
		<option value='quora' <?php if($web == 'quora') { ?> selected="selected"<?php } ?>>quora</option>
	</select>
	<br>
	

	<label>Gender:</label><br>
		<input type="radio"  name = "gender" class="gender" value="Male"<?php echo ($gen== 'Male') ?  "checked" : "" ;  ?> name="g" style="margin-left:105px;"></input>
		<label>Male</label><br>
		<input type="radio"  name = "gender" class="gender" value="Female" <?php echo ($gen== 'Female') ?  "checked" : "" ;  ?> name="g" style="margin-left:105px;"></input>
		<label>Female</label><br>
	

	<lable>MovieWatched:</label>
		<input type="checkbox" name='movies[]'  value='BB' <?php echo ($mov == 'BB') ?  "checked" : "" ;  ?> >BB</input><br>
		<input type="checkbox" name='movies[]'  value='RRR' <?php echo ($mov == 'RRR') ?  "checked" : "" ;  ?> style="margin-left:105px;">RRR</input><br>
		<input type="checkbox" name='movies[]'  value='KGF' <?php echo ($mov == 'KGF') ?  "checked" : "" ;  ?> style="margin-left:105px;">KGF</input><br>
	
		
	<input type="submit" id='submit' style="background-color:#00cc00;" ></input><br>
	
</form>



<?php

$name =$pass =$web =$emp =$gen='';
$usererr=$passerr=$weberr= $emperr='';


if($_SERVER['REQUEST_METHOD']=='POST'){

	if(empty($_POST['username'])){
	$usererr = 'username is empty';
	
	}else{
		$name = sanitize($_POST['username']);
		if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){ $usererr='only letters and whitespace allowed';
		
		}
	}

	
	
	if(empty($_POST['password'])){
	$passerr = 'password is empty';
	
	}else{
		$pass = sanitize($_POST['password']);
		if(!preg_match("[0-9]",$pass)){ $passerr='only number are allowed';
		
		}
	}
	


	if(empty($_POST['employ'])){
		$emperr = 'employee id is empty';
		}else{
			$emp = sanitize($_POST['employ']);


	
	if(empty($_POST['gender'])){
		$generr = 'please choose one';
		}else{
			$gen = sanitize($_POST['gender']);}
	


	
	if(empty($_POST['website'])){
		$weberr = 'please choose a website';
		}else{
			$web = sanitize($_POST['website']);}



}	
}


function sanitize($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}





if($_SERVER['REQUEST_METHOD']=='POST'){
echo $name.'<br>';
echo $pass.'<br>';
echo $emp .'<br>';
echo $web.'<br>';
echo $gen.'<br>';


$servername = 'localhost';
$username='root';
$password='';
$dbname='prasanthdb';

$con = new mysqli($servername,$username,$password,$dbname);

if($con->connect_error){
	die( 'failed connection'.$con->connect_error);}

$sql = "UPDATE formdata SET user_name = '$name',password ='$pass',emp_number = '$emp',website = '$web',gender = '$gen' WHERE emp_id =$id";

if($con->query($sql)===TRUE){
	
	header("Location:displaydbdata.php ");
	}else{
	echo 'error updating';}
}
?>



</body>

</html>