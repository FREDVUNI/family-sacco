<div class="content-wrapper" style="min-height:540.031px">
	<div class="content-header">
		<div class="container-fluid">
			<section class="content">
				<div class="card card-earnings">
					<div class="p-2 card">
						<form class="user" id="validate" method="post" novalidate="novalidate"
							action="<?php echo base_url('member');?>">
							<div class="form-group">
								<label htmlFor="name">Name</label>
								<input type="text"
									class="form-control form-control-user <?php if(form_error('name')): echo "is-invalid"; endif;?>"
									id="name" name="name" required placeholder="Enter name"
									value="<?php echo set_value('name');?>" />
								<span class="is-invalid"><?php echo form_error('name');?></span>
							</div>
							<div class="form-group">
								<label htmlFor="email">Email</label>
								<input type="email"
									class="form-control form-control-user <?php if(form_error('email')): echo "is-invalid"; endif;?>"
									id="email" name="email" required placeholder="Enter email address"
									value="<?php echo set_value('email');?>" />
								<span class="is-invalid"><?php echo form_error('email');?></span>
							</div>
							<div class="form-group">
								<label htmlFor="phone">Phone</label>
								<input type="text"
									class="form-control form-control-user <?php if(form_error('phone')): echo "is-invalid"; endif;?>"
									id="phone" name="phone" required placeholder="Enter phone address"
									value="<?php echo set_value('phone');?>" />
								<span class="is-invalid"><?php echo form_error('phone');?></span>
							</div>
							<div class="form-group">
								<label for="referred_by">Referred by </label>
								<select name="referred_by" id="referred_by"
									class="form-control input-user-referred_by <?php if(form_error('referred_by')): echo "is-invalid"; endif;?>"
									required>
									<option value="">Choose referrer</option>
									<?php foreach($members as $row):?>
									<option value="<?php echo $row['name']?>">
										<?php echo $row['name'];?>
									</option>
									<?php endforeach ;?>
								</select>
								<span class="is-invalid"><?php echo form_error('referred_by');?></span>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-teal btn-sm">
									create
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
			phone: {
				required: true,
			},
			name: {
				required: true,
			},
			email: {
				required: true,
				email: true
			},

		},
		messages: {
			name: {
				required: "The name field is required",
			},
			email: {
				required: "The email field is required",
				email: "The email is invalid"
			},
			phone: {
				required: "The phone number field is required",
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
