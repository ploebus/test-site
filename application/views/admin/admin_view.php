

<div class="container-fluid" style="margin-top:80px">
<div class="row">
	<div class="col-md-10">
	<h4>Admin panel</h4>
	Please use this area to enter children into the system and to assign them to an agency. You will be able to monitor their progress in the 'View' window for each child.
	
	<div class='col-md-5'>
		<h5><a href="archived_children"><i class="glyphicon glyphicon-th-list"></i> Click here to see inactive or closed clients</a></h5>
	</div>
	<div class='col-md-5'>
		<h5 id="downloadData"><a href="#" ><i class="glyphicon glyphicon-save"></i> Click here to download all records</a></h5>
	</div>
	</div>
	<hr />
</div>
<div class="row">
	
		<div class="col-md-6">
			<h4><a href ='#packetSent' data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample"><span class='glyphicon glyphicon-check'></span>    Needs to have initial packet sent</a></h4>
			<hr />
			<div class="row collapse" id="packetSent">
			<table class="table table-striped">
				<thead>
					<th>NAME</th>
					<th>AGENCY</th>
					<th>DATE ENROLLED</th>
					
					
				</thead>
					
						<?php foreach ($needs_packets as $np):?>
							<tr>
								<td><?php echo $np->fullname; ?></td>
								<td><?php echo $np->AssignedTo; ?></td>
								<td><?php echo date_format(date_create($np->date_created),'m/d/Y');; ?></td>
							</tr>
						<?php endforeach; ?>
			
					

			</table>
		</div>
		</div>
		<div class="col-md-6">
			<h4><a href ='#packetReturned' data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample"><span class='glyphicon glyphicon-check'></span>    Needs to have initial packet returned</a></h4>
			<hr />
			<div class="row collapse" id="packetReturned">
			<table class="table table-striped">
				<thead>
					<th>NAME</th>
					<th>AGENCY</th>
					<th>PACKET SENT</th>
					
				</thead>
					<?php foreach ($returns_packets as $rp):?>
							<tr>
								<td><?php echo $rp->fullname; ?></td>
								<td><?php echo $rp->AssignedTo; ?></td>
								<td><?php echo date_format(date_create($rp->status_date),'m/d/Y');; ?></td>
							</tr>
						<?php endforeach; ?>

			</table>
		</div>
		</div>
</div>
<div class="row">
<div class="col-md-10">
<h4>Children</h4>
<a href="add_child"> <span class='glyphicon glyphicon-plus '></span> Add a Child</a>
<hr />
<table class='table table-striped' id="childTable">
	<thead>
	<th>NAME</th>
	<th>DATE ENROLLED</th>
	<th>LAST COMPLETED STATUS</th>
	<th>HMG ID</th>
	<th data-class-name="priority">ASSIGNED TO</th>
	<th>ACTIONS</th>
	</thead>
	<?php foreach ($children as $child):?>
		<?php if($child->AssignedTo != 'Agency 1' ):?>
			<?php if($child->AssignedTo != 'admin' ):?>
	<tr>
		<td><?php echo $child->child_firstname. " " . $child->child_lastname ;?></td>
		<td><?php echo date_format(date_create($child->date_created),'m/d/Y'); ?></td>
		<td><?php echo $child->description ;?></td>
		<td><?php echo $child->hmg_referral_id; ?></td>
		<td><?php echo $child->AssignedTo ;?></td>
		<td style='font-size:.9em'><a href ="view_child/<?php echo $child->child_id ;?>" class="recordView">VIEW</a> | <a class="remove_child_start" data-kid="<?php echo $child->child_id; ?>" href="do_something">REMOVE RECORD</a> </td>
	</tr>
	<?php endif; ?>
<?php endif; ?>
	<?php endforeach;?>
</table>

</div>
</div>

<!-- Confirm Delete Modal -->
<div id="removeChildModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">CONFIRM DELETE</h4>
	      	</div>
	      	<div class="modal-body">
	      
		      	<h5>Please confirm you would like to remove this client</h5>
	      		<a href="" id="removeChild">Confirm Removal</a>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
		
		var selectedChild;

		$(document).ready( function () {
    $('#childTable').DataTable();
} );		
	
		$('.remove_child_start').click(function(event){
			event.preventDefault();
			selectedChild = $(this).attr('data-kid');
			console.log(selectedChild);
			$('#removeChildModal').modal('toggle');
		});
		
		$('#removeChild').click(function(event){
			//console.log('hello')
			event.preventDefault();
			//console.log(selectedChild);
			var theData = {
				'child_id':selectedChild
			};
			$.post('remove_child',theData, function(data){
				
				window.location.href="<?php echo base_url(); ?>admin/home_page";

			});
		


		})
		$('#downloadData').click(function(event){
			event.preventDefault();
			console.log('Success')
			<?php
			$fp = fopen('file.csv','w');
			foreach($children as $child){
				fputcsv($fp, get_object_vars($child));
			}
			fclose($fp)
			?>
		});

	</script>
	<!---END MODAL-->
</div>




