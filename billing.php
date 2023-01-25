<?php
include("header.php");
include("dbconnection.php");
if(isset($_POST['submit']))
{
	$servicetypeid= $_POST['servicetypeid'];
	$billtype = "Service Charge";
	include("insertbillingrecord.php");
}
?>
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Add Service Charge</li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <h1>Add new Service Charge records</h1>
     <form method="post" action="" name="frmbill" onSubmit="return validateform()">

    <table width="342" border="3">
      <tbody>
        <tr>
          <td width="34%">Date </td>
          <td width="66%"><input min="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>" type="date" name="date" id="date"></td>
        </tr>
        <tr>
         
         
          </select>
          </td>
        </tr>
        <tr>
          <td>Extra charges</td>
          <td><input type="text" name="amount" id="amount"></td>
        </tr>
         
        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Add Service charge" /></td>
        </tr>
      </tbody>
    </table>
    </form>
<?php
$billappointmentid = $_GET['appointmentid'];
include("viewbilling.php");
?>
<table width="342" border="3">
<thead>
  <tr>
          <td colspan="2" align="center"><a href='patientreport.php?patientid=<?php echo $_GET['patientid']; ?>'><strong>View Patient Report>></strong></a></td>
        </tr>
      </thead>
    </table>
    <p>&nbsp;</p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("footer.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmbill.treatment.value == "")
	{
		alert("Treatment Type Should Not Be Empty.");
		document.frmbill.treatment.focus();
		return false;
	}
	else if(!document.frmbill.treatment.value.match(alphaspaceExp))
	{
		alert("Treatment Type Not Valid.");
		document.frmbill.treatment.focus();
		return false;
	}
	else if(document.frmbill.date.value == "")
	{
		alert("Billing Date Should Not Be Empty.");
		document.frmbill.date.focus();
		return false;
	}
	else if(document.frmbill.time.value == "")
	{
		alert("Billing Time Should Not Be Empty.");
		document.frmbill.time.focus();
		return false;
	}
	else if(document.frmbill.amount.value == "")
	{
		alert("Amount Should Not Be Empty.");
		document.frmbill.amount.focus();
		return false;
	}
	else if(!document.frmbill.amount.value.match(numericExpression))
	{
		alert("Amount Not Valid.");
		document.frmbill.amount.focus();
		return false;
	}
	else if(document.frmbill.discount.value == "")
	{
		alert("Discount Should Not Be Empty.");
		document.frmbill.discount.focus();
		return false;
	}
	else if(!document.frmbill.discount.value.match(numericExpression))
	{
		alert("Discount  Not Valid.");
		document.frmbill.discount.focus();
		return false;
	}
	else if(document.frmbill.tax.value == "")
	{
		alert("Tax Amount Should Not Be Empty.");
		document.frmbill.tax.focus();
		return false;
	}
	else if(!document.frmbill.tax.value.match(numericExpression))
	{
		alert("Tax Amount Not Valid.");
		document.frmbill.tax.focus();
		return false;
	}
	else if(document.frmbill.bill.value == "")
	{
		alert("Bill Amount Should Not Be Empty.");
		document.frmbill.bill.focus();
		return false;
	}
	else if(!document.frmbill.bill.value.match(numericExpression))
	{
		alert("Bill Amount Not Valid.");
		document.frmbill.bill.focus();
		return false;
	}
	else if(document.frmbill.textarea.value == "")
	{
		alert("Discount Reason Should Not Be Empty.");
		document.frmbill.textarea.focus();
		return false;
	}
	else if(!document.frmbill.textarea.value.match(alphaspaceExp))
	{
		alert("Discount Reason  Not Valid.");
		document.frmbill.textarea.focus();
		return false;
	}
	else if(document.frmbill.paid.value == "")
	{
		alert("Paid Amount Should Not Be Empty.");
		document.frmbill.paid.focus();
		return false;
	}
	else if(!document.frmbill.paid.value.match(numericExpression))
	{
		alert("Paid Amount Not Valid.");
		document.frmbill.paid.focus();
		return false;
	}
	else if(document.frmbill.Dtime.value == "")
	{
		alert("Discharge Time Should Not Be Empty.");
		document.frmbill.Dtime.focus();
		return false;
	}
	else if(document.frmbill.Ddate.value == "")
	{
		alert("Discharge Date Should Not Be Empty.");
		document.frmbill.Ddate.focus();
		return false;
	}
	else
	{
		return true;
	}
	
}
</script>