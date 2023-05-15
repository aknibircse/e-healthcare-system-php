<?php
include("adheader.php");
include("dbconnection.php");
if(isset($_POST['submit']))
{
		$sql ="UPDATE patient SET patientname='$_POST[patientname]',admissiondate='$_POST[admissiondate]',admissiontime='$_POST[admissiontme]',address='$_POST[address]',mobileno='$_POST[mobilenumber]',method='$_POST[method]',pincode='$_POST[pincode]',loginid='$_POST[loginid]',bloodgroup='$_POST[select2]',gender='$_POST[select3]',dob='$_POST[dateofbirth]' WHERE patientid='$_SESSION[patientid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('patient record updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
}
if(isset($_SESSION['patientid']))
{
	$sql="SELECT * FROM patient WHERE patientid='$_SESSION[patientid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>



<div class="container-fluid">
        <div class="block-header">
            <h2 class="text-center">Patient Profile</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
				<form method="post" action="" name="frmpatprfl" onSubmit="return validateform()">
					<div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                	<label for="">Patient Name</label>
                                    <div class="form-line">
                                    	
                                        <input class="form-control" type="text" name="patientname" id="patientname"  value="<?php echo $rsedit['patientname']; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                	<label for="">Enrolment Date</label>
                                    <div class="form-line">
                                    	
                                        <input class="form-control" type="date" name="admissiondate" id="admissiondate" value="<?php echo $rsedit['admissiondate']; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                	<label for="admissiontme">Enrolment Time</label>
                                    <div class="form-line">                                 	
                                    	
                                        <input class="form-control" type="time" name="admissiontme" id="admissiontme" value="<?php echo $rsedit['admissiontime']; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group ">
                                	<label for="">Address</label>
                                	<div class="form-line">
                                    <input class="form-control" name="address" id="address" value="<?php echo $rsedit['address']; ?>" /> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                	<label for="">Mobile Number</label>
                                	<div class="form-line">
                                    <input class="form-control" type="text" name="mobilenumber" id="mobilenumber" value="<?php echo $rsedit['mobileno']; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                    	<label for="method">Method</label>
                                    	<div class="form-line">											
										<select name="method" id="method" class="form-control show-tick">
                                    		<option value="" selected="" hidden="">Select</option>
                                    		<?php
                                    		$arr = array("Online","Offline");
                                    		foreach($arr as $val)
                                    		{
                                    			if($val == $rsedit['method'])
                                    			{
                                    				echo "<option value='$val' selected>$val</option>";
                                    			}
                                    			else
                                    			{
                                    				echo "<option value='$val'>$val</option>";			  
                                    			}
                                    		}
                                    		?>
                                    	</select>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                    	<label for="">ZIP Code</label>
                                    	<div class="form-line">
                                        <input class="form-control" type="text" name="pincode" id="pincode" value="<?php echo $rsedit['pincode']; ?>" />
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                    	<label for="">Login ID</label>
                                    	<div class="form-line">
                                        <input class="form-control" type="text" name="loginid" id="loginid"  value="<?php echo $rsedit['loginid']; ?>"/>
                                    </div>
                                    </div>
                                </div>
                            </div>
							
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                    	<label for="blood group">Blood Group</label>
                                    	<div class="form-line">
                                    	<select name="select2" id="select2" class="form-control show-tick">
                                    		<option value="" selected hidden="">Select</option>
                                    		<?php
                                    		$arr = array("A+","A-","B+","B-","O+","O-","AB+","AB-");
                                    		foreach($arr as $val)
                                    		{
                                    			if($val == $rsedit['bloodgroup'])
                                    			{
                                    				echo "<option value='$val' selected>$val</option>";
                                    			}
                                    			else
                                    			{
                                    				echo "<option value='$val'>$val</option>";			  
                                    			}
                                    		}
                                    		?>
                                    	</select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                    	<label for="">Gender</label>
                                    	<div class="form-line">
                                    	<select name="select3" id="select3" class="form-control show-tick">
                                    		<option value="" selected="" hidden="">Select</option>
                                    		<?php
                                    		$arr = array("MALE","FEMALE");
                                    		foreach($arr as $val)
                                    		{
                                    			if($val == $rsedit['gender'])
                                    			{
                                    				echo "<option value='$val' selected>$val</option>";
                                    			}
                                    			else
                                    			{
                                    				echo "<option value='$val'>$val</option>";			  
                                    			}
                                    		}
                                    		?>
                                    	</select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                    	<label for="">Date of Birth</label>
                                    	<div class="form-line">
                                       <input class="form-control" type="date" name="dateofbirth" id="dateofbirth"  value="<?php echo $rsedit['dob']; ?>"/>
                                   </div>
                                    </div>
                                </div>
                            </div>                          
                            <div class="col-sm-12" style="text-align: center">                                
                                <input type="submit" class="btn btn-raised g-bg-cyan" name="submit" id="submit" value="Submit" />
                            </div>
                        </div>
                    </div>
                </form>    
				</div>
			</div>
		</div>
    </div>



<?php
include("adfooter.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 


function validateform()
{
	if(document.frmpatprfl.patientname.value == "")
	{
		alert("Patient Name Should Not Be Empty.");
		document.frmpatprfl.patientname.focus();
		return false;
	}
	else if(!document.frmpatprfl.patientname.value.match(alphaspaceExp))
	{
		alert("Patient Name Not Valid.");
		document.frmpatprfl.patientname.focus();
		return false;
	}
	else if(document.frmpatprfl.admissiondate.value == "")
	{
		alert("Admission Date Should Not Be Empty.");
		document.frmpatprfl.admissiondate.focus();
		return false;
	}
	else if(document.frmpatprfl.admissiontme.value == "")
	{
		alert("Admission Time Should Not Be Empty.");
		document.frmpatprfl.admissiontme.focus();
		return false;
	}
	else if(document.frmpatprfl.address.value == "")
	{
		alert("Address Should Not Be Empty.");
		document.frmpatprfl.address.focus();
		return false;
	}
	else if(document.frmpatprfl.mobilenumber.value == "")
	{
		alert("Mobile Number Should Not Be Empty.");
		document.frmpatprfl.mobilenumber.focus();
		return false;
	}
	else if(!document.frmpatprfl.mobilenumber.value.match(numericExpression))
	{
		alert("Mobile Number Not Valid.");
		document.frmpatprfl.mobilenumber.focus();
		return false;
	}
	else if(document.frmpatprfl.method.value == "")
	{
		alert("Method Should Not Be Empty.");
		document.frmpatprfl.method.focus();
		return false;
	}
	else if(!document.frmpatprfl.method.value.match(alphaspaceExp))
	{
		alert("Method Not Valid.");
		document.frmpatprfl.method.focus();
		return false;
	}
	else if(document.frmpatprfl.pincode.value == "")
	{
		alert("ZIP Code Should Not Be Empty.");
		document.frmpatprfl.pincode.focus();
		return false;
	}
	else if(!document.frmpatprfl.pincode.value.match(numericExpression))
	{
		alert("ZIP Code Not Valid.");
		document.frmpatprfl.pincode.focus();
		return false;
	}
	else if(document.frmpatprfl.loginid.value == "")
	{
		alert("Login ID Should Not Be Empty.");
		document.frmpatprfl.loginid.focus();
		return false;
	}
	/*else if(!document.frmpatprfl.loginid.value.match(emailExp))
	{
		alert("Login ID Not Valid.");
		document.frmpatprfl.loginid.focus();
		return true;
	} */
	else if(document.frmpatprfl.password.value == "")
	{
		alert("Password Should Not Be Empty.");
		document.frmpatprfl.password.focus();
		return false;
	}
	else if(document.frmpatprfl.password.value.length < 8)
	{
		alert("Password Length Should Be More Than 8 Characters.");
		document.frmpatprfl.password.focus();
		return false;
	}
	else if(document.frmpatprfl.password.value != document.frmpatprfl.confirmpassword.value )
	{
		alert("Confirm Password First.");
		document.frmpatprfl.confirmpassword.focus();
		return false;
	}
	else if(document.frmpatprfl.select2.value == "")
	{
		alert("Blood Group Should Not Be Empty.");
		document.frmpatprfl.select2.focus();
		return false;
	}
	else if(document.frmpatprfl.select3.value == "")
	{
		alert("Gender Should Not Be Empty.");
		document.frmpatprfl.select3.focus();
		return false;
	}
	else if(document.frmpatprfl.dateofbirth.value == "")
	{
		alert("Date Of Birth Should Not Be Empty.");
		document.frmpatprfl.dateofbirth.focus();
		return false;
	}
	else if(document.frmpatprfl.select.value == "" )
	{
		alert("Kindly Select The Status.");
		document.frmpatprfl.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>