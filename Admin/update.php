

    <?php
    
    include("../conn.php");
    
	$update="Update student_info set  fname=#insert.fname, lname='".$lname."',father_name='".$father_name."', mather_name='".$mather_name."', email='".$email."', phone='".$phone."'   where student_id='". $_POST["id"] ."'";

    mysqli_query($con, $update) or die(mysqli_error($update));


if(mysqli_query($con, $query) )
	{
			echo '<script type="text/javascript">alert("Admission Form Data Inserted Successfully!!");history.go(-2);</script>';
	}
	 else{
    echo "ERROR: Could not able to execute . " . mysqli_error($con);
	}

 
?>