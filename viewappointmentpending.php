<?php

include("adformheader.php");
include("dbconnection.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM appointment WHERE appointmentid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('appointment record deleted successfully..');</script>";
	}
}
if(isset($_GET['approveid']))
{
	$sql ="UPDATE patient SET status='Active' WHERE patientid='$_GET[patientid]'";
	$qsql=mysqli_query($con,$sql);
	
	$sql ="UPDATE appointment SET status='Approved' WHERE appointmentid='$_GET[approveid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Appointment record Approved successfully..');</script>";
		echo "<script>window.location='viewappointmentpending.php';</script>";
	}	
}
?>
<div class="container-fluid">
<div class="block-header">
        <h2 class="text-center">View Pending Appointments</h2>
    </div>


<div class="card">
	<section class="container">
		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
			<thead>

				<tr>

					<th style="text-align: center;">Patient Detail</th>
					<th style="text-align: center;">Date & Time</th>
					<th style="text-align: center;">Department</th>
					<th style="text-align: center;">Doctor</th>
					<th style="text-align: center;">Appointment Reason</th>
					<th style="text-align: center;">Status</th>
					<th width="15%" style="text-align: center;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql ="SELECT * FROM appointment WHERE (status='Pending' OR status='Inactive')";
				if(isset($_SESSION['patientid']))
				{
					$sql  = $sql . " AND patientid='$_SESSION[patientid]'";
				}
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{
					$sqlpat = "SELECT * FROM patient WHERE patientid='$rs[patientid]'";
					$qsqlpat = mysqli_query($con,$sqlpat);
					$rspat = mysqli_fetch_array($qsqlpat);


					$sqldept = "SELECT * FROM department WHERE departmentid='$rs[departmentid]'";
					$qsqldept = mysqli_query($con,$sqldept);
					$rsdept = mysqli_fetch_array($qsqldept);

					$sqldoc= "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
					$qsqldoc = mysqli_query($con,$sqldoc);
					$rsdoc = mysqli_fetch_array($qsqldoc);
					echo "<tr>

					<td style='text-align: center;'>$rspat[patientname]<br>$rspat[mobileno]</td>		 
					<td style='text-align: center;'>" . date("d-M-Y",strtotime($rs['appointmentdate'])) . " <br>" . date("H:i A",strtotime($rs['appointmenttime'])) . "</td> 
					<td style='text-align: center;'>$rsdept[departmentname]</td>
					<td style='text-align: center;'>$rsdoc[doctorname]</td>
					<td style='text-align: center;'>$rs[app_reason]</td>
					<td style='text-align: center;'>$rs[status]</td>
					<td style='text-align: center;'>";
					if($rs['status'] != "Approved")
					{
						if(!(isset($_SESSION['patientid'])))
						{
							echo "<a href='appointmentapproval.php?editid=$rs[appointmentid]&patientid=$rs[patientid]' class='btn btn-sm btn-raised g-bg-cyan'>Approve</a>";
						}
						echo "  <a href='viewappointment.php?delid=$rs[appointmentid]' class='btn btn-sm btn-raised g-bg-blush2'>Delete</a>";
					}
					else
					{
						echo "<a href='patientreport.php?patientid=$rs[patientid]&appointmentid=$rs[appointmentid]' class='btn btn-raised'>View Report</a>";
					}
					echo "</td></tr>";
				}
				?>
			</tbody>
		</table>
	</section>

</div>
</div>

<?php
include("adformfooter.php");
?>