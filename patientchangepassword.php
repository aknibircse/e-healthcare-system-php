<?php
include("adheader.php");


include("dbconnection.php");
if(isset($_POST['submit']))
{
	$sql = "UPDATE patient SET password='$_POST[newpassword]' WHERE password='$_POST[oldpassword]' AND patientid='$_SESSION[patientid]'";
	$qsql= mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<div class='alert alert-success'>
                            Password Has Been Updated Successfully
                        </div>
                        <script>alert('.');</script>";
	}
	else
	{
		echo "<div class='alert alert-danger'>
                            Update Failed.
                        </div>
                       ";		
	}
}
?>

<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center">Patient's Password</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
               <form method="post" action="" name="frmpatchange" onSubmit="return validateform()"
                    style="padding: 10px">
                    <div class="form-group">
                        <label>Old Password</label>
                        <div class="form-line">
                            <input class="form-control" type="password" name="oldpassword" id="oldpassword" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <div class="form-line">
                            <input class="form-control" type="password" name="newpassword" id="newpassword" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <div class="form-line">
                            <input class="form-control" type="password" name="password" id="password" />
                        </div>
                    </div>

                    <input class="btn btn-raised g-bg-cyan" type="submit" name="submit" id="submit" value="Submit" />


                </form>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
</div> 

<?php
include("adfooter.php");
?>
<script type="application/javascript">
function validateform()
{
	if(document.frmpatchange.oldpassword.value == "")
	{
		alert("Old Password Should Not Be Empty.");
		document.frmpatchange.oldpassword.focus();
		return false;
	}
	else if(document.frmpatchange.newpassword.value == "")
	{
		alert("New Password Should Not Be Empty.");
		document.frmpatchange.newpassword.focus();
		return false;
	}
	else if(document.frmpatchange.newpassword.value.length < 6)
	{
		alert("New Password Length Should Be More Than 6 Characters.");
		document.frmpatchange.newpassword.focus();
		return false;
	}
	else if(document.frmpatchange.newpassword.value != document.frmpatchange.password.value )
	{
		alert("Confirm Password First.");
		document.frmpatchange.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
