
<nav class="tab-bar show-for-small">
	<a class="left-off-canvas-toggle menu-icon left">
		<span><strong>Shop&nbsp;IT!</strong></span>
	</a>  		
	<!--<a href="https://cas.unpar.ac.id/login" class="small button right">Sign In</a>
	<br/>-->
	
		<div class="search-small">
			<a href="#" class="small button right viewer" data-page="search"  data-path="stuff"><img src="img/appbar.magnify.png" class="logo-icon"></a>
			<input type="text" class="right" placeholder="Search"/>			
		</div>
	
</nav>


<nav class="top-bar hide-for-small" data-topbar>
	<ul class="title-area">
		<li class="name">
			<h1><a href="index.php"><img src="img/icon.png" class="logo-icon">Shop IT!</a></h1> 
		</li>	
	</ul>
	<span class="breadcrumbs"></span><a class="page" href="#"></a>
	<section class="top-bar-section">		
		<ul class="right">
			<li class="divider"></li>
			<li class="has-input">
				<div class="search">
					<a href="#" class="small button right"><img src="img/appbar.magnify.png" class="logo-icon viewer" data-page="search"  data-path="stuff"></a>
					<input type="text" placeholder="Search">					
				</div>
			</li>
			<li class="divider"></li>
			<li class="has-dropdown">
				<a href="#" class="" onclick="getFeature()">Stuff</a>
				<ul class="dropdown">
					<li><a href="#" class="viewer" data-page="all"  data-path="stuff">All</a></li>
					<li><a href="#" class="viewer" data-page="promo"  data-path="stuff">Promo</a></li>
				</ul>
			</li>
		
		
			<li class="divider user"></li>
			<li class="has-dropdown user">
				<a href="#" class=""> User <img src="img/user.png" class="logo-icon"></a>
				<ul class="dropdown">
					<li><a href="#" class="viewer" data-page="cart"  data-path="user">Cart</a></li>
					<li><a href="#" class="viewer" data-page="history"  data-path="user">History</a></li>
					<li><a href="#" class="viewer" data-page="profile"  data-path="user">Profile</a></li>
					<li><a href="#" class="sign-out" data-page="sign-out" data-path="">Sign Out</a></li>
				</ul>
			</li>			
		
			
			<li class="divider no-user"></li>
			<li class="has-dropdown no-user">
				<a href="#" data-reveal-id="sign-in-modal">Sign In</a>
			</li>			
			<li class="divider no-user"></li>
			<li class="has-form no-user">
				<a href="#" class="small button" data-reveal-id="sign-up-modal">Sign Up</a>
			</li>
		
		
		
		</ul>		
	</section>
</nav>