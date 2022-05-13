<aside class="main-sidebar sidebar-dark-primary">
	<div class="text-center">
		<a href="#" class="logo-image">
			<img src="<?php echo base_url('assets/backend/images/saba.png')?>" alt="Saber Logo" class="brand-image" />
		</a>
	</div>
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?php echo base_url('assets/uploads/admins/'.$user['image'])?>"
					class="img-circle mt-2" alt="User" />
			</div>
			<div class="info mt-3">
				<a href="<?php echo base_url("profile"); ?>" class="d-block"><?php echo $user['username'];?></a>
			</div>
		</div>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-header">DASHBOARD</li>
				<li class="nav-item">
					<a href="<?php echo base_url("dashboard"); ?>"
						class="nav-link  <?php echo (current_url() == base_url("dashboard"))?"active":"";?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url("members"); ?>"
						class="nav-link <?php echo (current_url() == base_url("members"))?"active":"";?>">
						<i class="nav-icon fas fa-users"></i>
						<p>
							Members
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url("circles"); ?>"
						class="nav-link <?php echo (current_url() == base_url("circles"))?"active":"";?>">
						<i class="nav-icon fas fa-people-carry"></i>
						<p>
							Circles
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url("admins"); ?>"
						class="nav-link <?php echo (current_url() == base_url("admins"))?"active":"";?>">
						<i class="nav-icon fas fa-user"></i>
						<p>
							Admins
						</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
