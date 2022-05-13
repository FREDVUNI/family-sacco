<div class="content-wrapper" style="min-height:540.031px">
	<div class="content-header">
		<div class="container-fluid">
			<section class="content">
				<?php echo $this->session->flashdata('message');?>
				<div class="card card-earnings">
					<div class="p-2 card">
						<div class="mb-3">
							<a href="<?php echo base_url('circle');?>">
								<button class="btn btn-teal btn-sm float-right">
									Add circle
								</button>
							</a>
						</div>
						<table id="example1" class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Start</th>
									<th>End</th>
									<th>Water</th>
									<th>Earth 1</th>
									<th>Earth 2</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($circle as $key=>$row): ?>
								<tr>
									<td><?php echo $key + 1; ?></td>
									<td><?php echo $row['start_date']; ?></td>
									<td><?php echo $row['close_date']; ?></td>
									<td><?php echo $row['water']; ?></td>
									<td><?php echo $row['earth1']; ?></td>
									<td><?php echo $row['earth2']; ?></td>
									<td class="d-flex">
										<?php if($row['close_date'] == "0000-00-00"):?>
										<form method="POST" action="<?php echo 'circle/'.$row['slug'].'/complete'; ?>">
											<input type="hidden" name="id" value="<?php echo $row['circle_id']; ?>" />
											<input type="hidden" name="water" value="<?php echo $row['water']; ?>" />
											<input type="hidden" name="water1" value="<?php echo $row['earth1']; ?>" />
											<input type="hidden" name="water2" value="<?php echo $row['earth2']; ?>" />
											<input type="hidden" name="earth1" value="<?php echo $row['wind1']; ?>" />
											<input type="hidden" name="earth2" value="<?php echo $row['wind2']; ?>" />
											<input type="hidden" name="earth3" value="<?php echo $row['wind3']; ?>" />
											<input type="hidden" name="earth4" value="<?php echo $row['wind4']; ?>" />
											<button type="submit" class="btn btn-light btn-sm">
												<i class="fa fa-check"></i>
											</button> 
										</form>
										<?php endif;?>
										<a class="btn btn-light btn-sm" href="<?php echo 'circle/'.$row['slug']; ?>">
											<i class="fa fa-pencil-alt"></i>
										</a>
										<button class="btn btn-light btn-sm" data-toggle="modal"
											data-target="#delete<?php print $row['circle_id']; ?>">
											<i class="fa fa-trash"></i>
										</button>
									</td>
								</tr>
								<?php endforeach;?>
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>Start</th>
									<th>End</th>
									<th>Water</th>
									<th>Earth 1</th>
									<th>Earth 2</th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<?php foreach($circle as $key=>$row): ?>
<div class="modal" id="delete<?php echo $row['circle_id'];?>">
	<div class="modal-dialog modal-confirm" role="document">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="fa fa-exclamation"></i>
				</div>
				<h4 class="modal-title w-100">Are you sure?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>
					Do you really want to delete <strong>circle </strong>?
					<br>
					This process cannot be undone.
				</p>
			</div>
			<div class="modal-footer justify-content-center mb-3">
				<?php echo form_open_multipart('circle/'.$row['circle_id'].'/delete');?>
				<input type="hidden" name="id" value="<?php echo $row['circle_id'];?>">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Delete</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>
