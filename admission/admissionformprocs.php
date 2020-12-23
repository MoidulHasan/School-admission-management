<?php
    
    include("../conn.php");
    
    if(isset($_POST['submit'])){

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$father_name=$_POST['father_name'];
	$mather_name=$_POST['mather_name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$blood_group=$_POST['blood_group'];
	$religion=$_POST['religion'];
	$class=$_POST['class'];
	$shift=$_POST['shift'];
	$photo = $_POST['photo'];


        // Get image name
        $destination = "images/".$_FILES['photo']['name'];
        $filename = $_FILES['photo']['tmp_name'];
        move_uploaded_file($filename, $destination);


$query="insert into admission_form(fname, lname, father_name, mather_name, email, phone, gender, dob, blood_group, religion, class, shift, photo) values('$fname', '$lname', '$father_name', '$mather_name', '$email', '$phone', '$gender', '$dob', '$blood_group', '$religion', '$class', '$shift', '$destination')";

if(mysqli_query($con, $query))
	{
			echo '<script type="text/javascript">alert("Admission Form Data Inserted Successfully!!");history.go(-1);</script>';
	}
	 else{
    echo "ERROR: Could not able to execute $res. " . mysqli_error($con);
	}

        	

     }
 
?>