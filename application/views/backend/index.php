<div class="content-wrapper" style="min-height:540.031px">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0 text-muted">Dashboard</h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item">
							<a href="/">Home</a>
						</li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<section class="content">
				<div class="row font-1">
					<div class="col-lg-4">
						<div class="card card-body flex-row align-items-center">
							<h5 class="m-0"><i class="material-icons align-middle text-muted md-18"></i><i
									class="nav-icon fas fa-male fa-2x"></i> Admins</h5>
							<h1 class="font-primary ml-auto"><?php echo $admins;?></h1>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card card-body flex-row align-items-center">
							<h5 class="m-0"><i class="material-icons align-middle text-muted md-18"></i><i
									class="nav-icon fas fa-users fa-2x"></i> Members</h5>
							<h4 class="font-primary ml-auto"><?php echo $members;?></h4>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card card-body flex-row align-items-center">
							<h5 class="m-0"><i class="material-icons align-middle text-muted md-18"></i><i
									class="nav-icon fas fa-people-carry fa-2x"></i> Circles</h5>
							<h4 class="font-primary ml-auto"><?php echo $circles;?></h4>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="card card-body align-items-center">
							<div class="row">
								<?php foreach($c as $key=>$row):?>
								<?php if($row['close_date'] == "0000-00-00"):?>
								<div class="col-lg-3 m-4">
									<div class="circle1">
										<div class="verticle-line"></div>
										<div class="horizintal-line"></div>
										<p class="wind1">
											<?php echo $row['wind1'];?>
										</p>
										<p class="wind2">
											<?php echo $row['wind2'];?>
										</p>
										<p class="wind3">
											<?php echo $row['wind3'];?>
										</p>
										<p class="wind4">
											<?php echo $row['wind4'];?>
										</p>
										<div class="circle2">
											<div class="horizintal-line"></div>
											<p class="earth1">
												<?php echo $row['earth1'];?>
											</p>

											<p class="earth2">
												<?php echo $row['earth2'];?>
											</p>
											<div class="circle3">
												<p>
													<?php echo $row['water'];?>
												</p>
											</div>
										</div>
									</div>
								</div>
								<?php else:?>
								<div class="alert alert-danger col-lg-12 text-center">
									Make sure you add winds where necessary by editing circles without them.
								</div>
								<?php endif;?>
								<?php endforeach;?>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
