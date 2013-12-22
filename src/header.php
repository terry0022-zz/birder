<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="brand" href="./">
				<small>
					<img class="nav-user-photo" src="img/birderwhite.png" alt="The Birder" width="20px">
					The Birder
				</small>
			</a><!--/.brand-->

			<ul class="nav ace-nav pull-right">
				<li class="green">
					<a href="./<?php echo $_SESSION['user'] ?>" class="dropdown-toggle">
						<span>
							<i class="icon-tasks"></i>
							<strong>Profile</strong>
						</span>
					</a>
				</li>
				<li class="other-blue1">
					<a class="dropdown-toggle" href="#" data-toggle="dropdown">
						<img alt="<?php echo $_SESSION['user']; ?>" src="<?php echo $_SESSION['avatar']; ?>" class="nav-user-photo">
						<span class="user-info">
							<small>Bienvenido,</small>
							<?php echo $_SESSION['user']; ?>
						</span>
						<i class="icon-caret-down"></i>
					</a>
					<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
						<li>
							<a onclick="recargar();">
								<i class="icon-cog"></i>
								Editar
							</a>
						</li>

						<li>
							<a href="#">
								<i class="icon-user"></i>
								Bandada
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="src/salir.php">
								<i class="icon-off"></i>
								Salir
							</a>
						</li>
					</ul>
				</li>
			</ul><!--/.ace-nav-->
		</div><!--/.container-fluid-->
	</div><!--/.navbar-inner-->
</div>