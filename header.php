		<?php error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); session_start(); ?>
		<header>
			<nav class="navbar navbar-static-top main-menu animated">
				<div class="navbar-header menu-logo">
					<a class="navbar-brand" href="/home.php">
						<img src="/img/face/logo.png">

					</a>
				</div>

				<div class="navbar-colllapse">
					
					<ul class="nav navbar-nav navbar-right menu-nav">
						<li><a href="/home.php">Home</a></li>
						<li><a>English <span class="caret"></span></a>
							<ul class="menu_1 list-unstyled">
								<li><a>Effortless English <span class="caret"></span></a>
									<ul class="menu_2 list-unstyled">
										<li><a href="/translist.php?dvd=1">DVD 1</a></li>
										<li><a href="/translist.php?dvd=2">DVD 2</a></li>
										<li><a href="/translist.php?dvd=3">DVD 3</a></li>
										<li><a href="/translist.php?dvd=4">DVD 4</a></li>
										<li><a href="/translist.php?dvd=5">DVD 5</a></li>
									</ul>
								</li>
								<li><a href="/storylist.php">Story</a></li>
								<li><a href="/draff-post.php?id=2">Method</a></li>
							</ul>
						</li>
						<li><a href="">Download <span class="caret"></span></a>
							<ul class="menu_1 list-unstyled">
								<li><a href="/draff-post.php?id=8">Effortless English</a></li>
								<li><a href="">Sách - Ebook</a></li>
							</ul>
						</li>
						<li><a href="/postlist.php">Blog <span class="caret"></span></a>
							<ul class="menu_1 list-unstyled">
								<li><a href="/postlist.php?k=1">Kiến thức</a></li>
								<li><a href="/postlist.php?k=2">Nghệ thuật sống</a></li>
								<li><a href="/postlist.php?k=3">Xã hội</a></li>
								<li><a href="/postlist.php?k=4">Sức khỏe</a></li>
								<li><a href="/postlist.php?k=5">Tình yêu</a></li>
								<li><a href="/postlist.php?k=6">Lập trình</a></li>
							</ul>
						</li>
						<li><a href="/introduction.php">Introduce</a></li>

						<?php if(empty($_SESSION['user'])){ ?>
						<li>
							<a href="/user/login.php" id="user" class="btn navbar-btn">Log in</a>
						</li>
						<?php } else{ ?>
						<li class="dropdown loged">
							<a data-toggle="dropdown" href="">Hi <?php echo $_SESSION['user']; ?>! <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="/user/logout.php"><i class="fa fa-sign-out"></i> Đăng xuất</a>
								<?php if($_SESSION['level'] < 3){ ?>
								<li><a href="/admin/index.php?url=home"><i class="fa fa-user"></i> Control Panel</a>
							</ul>
						</li>
						<?php } }?>
					</ul>
				</div>
			</nav>
		</header>
		

		