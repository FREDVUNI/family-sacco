<div class="content-wrapper" style="min-height:540.031px">
	<div class="content-header">
		<div class="container-fluid">
			<section class="content">
				<div class="card card-earnings">
					<div class="p-2 card">
						<form class="user" id="validate" method="post" novalidate="novalidate"
							action="<?php echo base_url('circle');?>">
							<div class="form-group">
								<label htmlFor="water">Water</label>
								<input type="text"
									class="form-control form-control-user <?php if(form_error('water')): echo "is-invalid"; endif;?>"
									id="water" name="water" required placeholder="Enter water"
									value="<?php echo set_value('water');?>" />
								<span class="is-invalid"><?php echo form_error('water');?></span>
							</div>
							<div class="form-group">
								<label htmlFor="earth1">Earth</label>
								<input type="text"
									class="form-control form-control-user <?php if(form_error('earth1')): echo "is-invalid"; endif;?>"
									id="earth1" name="earth1" required placeholder="Enter earth"
									value="<?php echo set_value('earth1');?>" />
								<span class="is-invalid"><?php echo form_error('earth1');?></span>
							</div>
							<div class="form-group">
								<label htmlFor="wind1">Wind</label>
								<input type="text"
									class="form-control form-control-user <?php if(form_error('wind1')): echo "is-invalid"; endif;?>"
									id="wind1" name="wind1" required placeholder="Enter wind " value="<?php echo set_value('wind1');?>" />
								<span class="is-invalid"><?php echo form_error('wind1');?></span>
							</div>
							<div class="form-group">
								<label htmlFor="wind2">Wind</label>
								<input type="text"
									class="form-control form-control-user <?php if(form_error('wind2')): echo "is-invalid"; endif;?>"
									id="wind2" name="wind2" required placeholder="Enter wind" value="<?php echo set_value('wind2');?>" />
								<span class="is-invalid"><?php echo form_error('wind2');?></span>
							</div>
							<div class="form-group">
								<label htmlFor="earth2">Earth</label>
								<input type="text"
									class="form-control form-control-user <?php if(form_error('earth2')): echo "is-invalid"; endif;?>"
									id="earth2" name="earth2" required placeholder="Enter earth"
									value="<?php echo set_value('earth2');?>" />
								<span class="is-invalid"><?php echo form_error('earth2');?></span>
							</div>
							<div class="form-group">
								<label htmlFor="wind3">Wind</label>
								<input type="text"
									class="form-control form-control-user <?php if(form_error('wind3')): echo "is-invalid"; endif;?>"
									id="wind3" name="wind3" required placeholder="Enter wind"
									value="<?php echo set_value('wind3');?>" />
								<span class="is-invalid"><?php echo form_error('wind3');?></span>
							</div>
							<div class="form-group">
								<label htmlFor="wind4">Wind</label>
								<input type="text"
									class="form-control form-control-user <?php if(form_error('wind4')): echo "is-invalid"; endif;?>"
									id="wind4" name="wind4" required placeholder="Enter wind"
									value="<?php echo set_value('wind4');?>" />
								<span class="is-invalid"><?php echo form_error('wind4');?></span>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-teal btn-sm">
									create circle
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
			referred_by: {
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
			referred_by: {
				required: "The referred by field is required",
			},
			earth1: {
				required: "The earth  by field is required",
			},
			earth2: {
				required: "The earth  by field is required",
			},
			wind1: {
				required: "The wind  by field is required",
			},
			wind2: {
				required: "The wind  by field is required",
			},
			wind3: {
				required: "The wind  by field is required",
			},
			wind4: {
				required: "The wind by field is required",
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
		$('#category').on('change', function () {
		$("#subcategoryList").attr('disabled', false); //enable subcategory select
		$("#subcategoryList").val("");
		$(".subcategory").attr('disabled', true); //disable all category option
		$(".subcategory").hide(); //hide all subcategory option
		$(".parent-" + $(this).val()).attr('disabled', false); //enable subcategory of selected category/parent
		$(".parent-" + $(this).val()).show();
		});
	});

</script>
