<?php
session_start();
include("dbconnection.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM billing_records WHERE billingid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Billing Record Deleted Successfully.');</script>";
	}
}

?>
 <section class="container">
<?php
$sqlbilling_records ="SELECT * FROM billing WHERE appointmentid='billappointmentid'";
$qsqlbilling_records = mysqli_query($con,$sqlbilling_records);
$rsbilling_records = mysqli_fetch_array($qsqlbilling_records);
?>
 	<table class="table table-bordered table-striped">
      <tbody>
        <tr>
          <th scope="col"><div align="right">Bill Number &nbsp; </div></th>
          <td><?php echo $rsbilling_records['billingid']; ?></td>
          <td>Appointment Number &nbsp;</td>
          <td><?php echo $rsbilling_records['appointmentid']; ?></td>
        </tr>
        <tr>
          <th width="442" scope="col"><div align="right">Billing Date &nbsp; </div></th>
          <td width="413"><?php echo $rsbilling_records['billingdate']; ?></td>
          <td width="413">Billing Time &nbsp; </td>
          	<td width="413"><?php echo $rsbilling_records['billingtime'] ; ?></td>
        </tr>
         
		<tr>
          <th scope="col"><div align="right"></div></th>
          <td></td>
          <th scope="col"><div align="right">Bill Amount &nbsp; </div></th>
          <td> 
		<?php
		$sql ="SELECT * FROM billing_records where billingid='$rsbilling_records[billingid]'";
		$qsql = mysqli_query($con,$sql);
		$billamt= 0;
		while($rs = mysqli_fetch_array($qsql))
		{
			$billamt = $billamt +  $rs['bill_amount'];
		}
		?> 
  <?php echo $billamt; ?> <span>৳</span></td>
        </tr>
        <tr>
          <th width="442" scope="col"><div align="right"></div></th>
          <td width="413">&nbsp;</td>
          <th width="442" scope="col"><div align="right">Tax Amount (5%)</div></th>
          <td width="413">&nbsp;<?php echo $taxamt = 5 * ($billamt / 100); ?> <span style="color: orange;">৳</span></td>
       	</tr>
         
		<tr>
		  <th scope="col"><div align="right">Disount Reason</div></th>
		  <td rowspan="4" valign="top"><?php echo $rsbilling_records['discountreason']; ?></td>
		  <th scope="col"><div align="right">Discount</div></th>
		  <td>&nbsp;<?php echo $rsbilling_records['discount']; ?> <span style="color: violet;">৳</span>
		</td>
	    </tr>
        
		<tr>
		  <th rowspan="3" scope="col">&nbsp;</th>
		  <th scope="col"><div align="right">Grand Total</div></th>
		  <td>&nbsp;<?php echo $grandtotal = ($billamt + $taxamt)  - $rsbilling_records['discount'] ; ?> 
		  <span>৳</span></td>
	    </tr>
		<tr>
		  <th scope="col"><div align="right">Paid Amount</div></th>
		  <td><?php
		  	$sqlpayment ="SELECT sum(paidamount) FROM payment where appointmentid='billappointmentid'";
			$qsqlpayment = mysqli_query($con,$sqlpayment);
			$rspayment = mysqli_fetch_array($qsqlpayment);
			echo $rspayment[0];		  
		   ?> <span style="color: green;">  ৳</span></td>
	    </tr>
		<tr>
		  <th scope="col"><div align="right">Balance Amount</div></th>
		  <td><?php echo $balanceamt = $grandtotal - $rspayment[0]  ; ?> <span style="color: blue;">৳</span></td>
	    </tr>
      </tbody>
    </table>
   <strong>Payment Report :</strong> <br>
<?php
$sqlpayment = "SELECT * FROM payment where appointmentid='billappointmentid'";
$qsqlpayment = mysqli_query($con,$sqlpayment);
if(mysqli_num_rows($qsqlpayment) == 0)
{
	echo "<strong>No Transaction Details Found.</strong>";
}
else
{
?>
   <table class="table table-bordered table-striped">
     <tbody>
       <tr>
         <th scope="col"><strong>Paid Date</strong></th>
         <th scope="col"><strong>Paid Time</strong></th>
         <th scope="col"><strong>Paid Amount</strong></th>
       </tr>
<?php       
		while($rspayment = mysqli_fetch_array($qsqlpayment))
		{
		?>
			   <tr>
				 <td>&nbsp;<?php echo $rspayment['paiddate']; ?></td>
				 <td>&nbsp;<?php echo $rspayment['paidtime']; ?></td>
				 <td>&nbsp;<?php echo $rspayment['paidamount']; ?> <span style="color: green;">৳</span></td>
			   </tr>
		<?php
		}
?>

     </tbody>
   </table>
<?php
}
?>   
</section>