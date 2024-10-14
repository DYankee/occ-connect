<header>
	<nav class="navbar">
		<ul role="list" class="navbar-links" style="margin: 0px;">
			<li><a href="index.php">Home</a></li>
			<li><a href="new-thread.php">New Thread</a></li>
			<li><a href="update-profile.php">Update Profile</a></li>
			<li><?php if(!isset($_SESSION['user_name'])) {include('components/login.html');}?></li>
			<li><?php if(isset($_SESSION['user_name'])) {include('components/logout.php');}?></li>
		</ul>
		<img id="logo" src="data/img/occ-logo.jpg" alt="logo">
	</nav>
</header>