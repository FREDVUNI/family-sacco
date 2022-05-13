 <div class="content-wrapper" style="min-height:540.031px">
 	<div class="content-header">
 		<div class="container-fluid">
 			<section class="content">
 				<div class="card card-earnings">
 					<div class="p-2 card">
 						<form class="user" id="validate" method="post" novalidate="novalidate"
 							action="<?php echo base_url('circle/'.$circ->slug);?>">
 							<div class="form-group">
 								<input type="hidden" value=<?php echo $circ->circle_id;?> name="id" />
 								<label htmlFor="water">Water</label>
 								<input type="text"
 									class="form-control form-control-user <?php if(form_error('water')): echo "is-invalid"; endif;?>"
 									id="water" name="water" required placeholder="Enter water"
 									value="<?php echo $circ->water;?>" />
 								<span class="is-invalid"><?php echo form_error('water');?></span>
 							</div>
 							<div class="form-group">
 								<label htmlFor="earth1">Earth</label>
 								<input type="text"
 									class="form-control form-control-user <?php if(form_error('earth1')): echo "is-invalid"; endif;?>"
 									id="earth1" name="earth1" required placeholder="Enter earth 1"
 									value="<?php echo $circ->earth1;?>" />
 								<span class="is-invalid"><?php echo form_error('earth1');?></span>
 							</div>
 							<div class="form-group">
 								<label htmlFor="wind1">Wind</label>
 								<select name="wind1" id="wind1"
 									class="form-control input-user-wind1 <?php if(form_error('wind1')): echo "is-invalid"; endif;?>"
 									required>
 									<option value="<?php echo $circ->wind1;?>">
 										<?php echo ($circ->wind1 ?$circ->wind1 :"choose wind");?>
 									</option>
 									<?php foreach($member as $row):?>
 									<option value="<?php echo $row['name']?>">
 										<?php echo $row['name'];?>
 									</option>
 									<?php endforeach ;?>
 								</select>
 								<span class="is-invalid"><?php echo form_error('wind1');?></span>
 							</div>
 							<div class="form-group">
 								<label htmlFor="wind2">Wind</label>
 								<select name="wind2" id="wind2"
 									class="form-control input-user-wind2 <?php if(form_error('wind2')): echo "is-invalid"; endif;?>"
 									required>
 									<option value="<?php echo $circ->wind2;?>">
 										<?php echo ($circ->wind2 ?$circ->wind2 :"choose wind");?>
 									</option>
 									<?php foreach($member as $row):?>
 									<option value="<?php echo $row['name']?>">
 										<?php echo $row['name'];?>
 									</option>
 									<?php endforeach ;?>
 								</select>
 								<span class="is-invalid"><?php echo form_error('wind2');?></span>
 							</div>
 							<div class="form-group">
 								<label htmlFor="earth2">Earth</label>
 								<input type="text"
 									class="form-control form-control-user <?php if(form_error('earth2')): echo "is-invalid"; endif;?>"
 									id="earth2" name="earth2" required placeholder="Enter earth 2"
 									value="<?php echo $circ->earth2;?>" />
 								<span class="is-invalid"><?php echo form_error('earth2');?></span>
 							</div>
 							<div class="form-group">
 								<label htmlFor="wind3">Wind</label>
 								<select name="wind3" id="wind3"
 									class="form-control input-user-wind3 <?php if(form_error('wind3')): echo "is-invalid"; endif;?>"
 									required>
 									<option value="<?php echo $circ->wind3;?>">
 										<?php echo ($circ->wind3 ?$circ->wind3 :"choose wind");?>
 									</option>
 									<?php foreach($member as $row):?>
 									<option value="<?php echo $row['name']?>">
 										<?php echo $row['name'];?>
 									</option>
 									<?php endforeach ;?>
 								</select>
 								<span class="is-invalid"><?php echo form_error('wind3');?></span>
 							</div>
 							<div class="form-group">
 								<label htmlFor="wind4">Wind</label>
 								<select name="wind4" id="wind4"
 									class="form-control input-user-wind4 <?php if(form_error('wind4')): echo "is-invalid"; endif;?>"
 									required>
 									<option value="<?php echo $circ->wind4;?>">
 										<?php echo ($circ->wind4 ?$circ->wind4 :"choose wind");?>
 									</option>
 									<?php foreach($member as $row):?>
 									<option value="<?php echo $row['name']?>">
 										<?php echo $row['name'];?>
 									</option>
 									<?php endforeach ;?>
 								</select>
 								<span class="is-invalid"><?php echo form_error('wind4');?></span>
 							</div>
 							<div class="form-group">
 								<button type="submit" class="btn btn-teal btn-sm">
 									update
 								</button>
 							</div>
 						</form>
 					</div>
 				</div>
 			</section>
 		</div>
 	</div>
 </div>
 <script src="<?php echo base_url("assets/backend/plugins/jquery/jquery.min.js");?>"></script>
 <script src="<?php echo base_url("assets/backend/plugins/jquery/jquery.validate.min.js");?>"></script>
 <script src="<?php echo base_url("assets/backend/plugins/jquery/additional-methods.min.js");?>"></script>
 <script>
 	$('#validate').validate({
 		rules: {
 			water: {
 				required: true,
 			},
 			wind1: {
 				required: true,
 			},
 			wind2: {
 				required: true,
 			},
 			wind3: {
 				required: true,
 			},
 			wind4: {
 				required: true,
 			},
 			earth1: {
 				required: true,
 			},
 			earth2: {
 				required: true,
 			},

 		},
 		messages: {
 			water: {
 				required: "The water field is required",
 			},
 			earth1: {
 				required: "The earth 1 by field is required",
 			},
 			earth2: {
 				required: "The earth 2 by field is required",
 			},
 			wind1: {
 				required: "The wind 1 by field is required",
 			},
 			wind2: {
 				required: "The wind 2 by field is required",
 			},
 			wind3: {
 				required: "The wind 3 by field is required",
 			},
 			wind4: {
 				required: "The wind 4 by field is required",
 			},
 		},
 		errorElement: 'span',
 		errorPlacement: function (error, element) {
 			error.addClass('invalid-feedback');
 			element.closest('.form-group').append(error);
 		},
 		highlight: function (element, errorClass, validClass) {
 			$(element).addClass('is-invalid');
 		},
 		unhighlight: function (element, errorClass, validClass) {
 			$(element).removeClass('is-invalid');
 		}
 	});

 </script>
