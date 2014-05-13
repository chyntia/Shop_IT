<?php
	include "page/partial/top.php";
?>

<div id="fb-root"></div>
<script>
	(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	//js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=257781267581967";
	js.src = "js/all.js#xfbml=1&appId=257781267581967";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<div class="off-canvas-wrap">
	<div class="inner-wrap">
<?php
	include "page/partial/aside.php";
?>
		<title>Shop IT! </title>
<?php
	include "page/partial/nav.php";
?>
		<br class="clear"><br/>
		<div id="main-box">

		</div>
	</div>
	


<div id="sign-up-modal" class="reveal-modal large" data-reveal>
	<h2>Sign Up</h2>
	<div class="row global">
		<div class="medium-6 columns">
			<div class="large-12 columns">				
				<div class="txtcenter title-dark">
					<img src="img/logo.png" class="half">
					<h1>Shop IT!</h1><h5>IT Stuffs Available</h5>					
				</div>
			</div>
		</div>			
		<div class="medium-6 columns">
			<div class="large-12 columns">
				<div data-alert id="sign-up-alert" class="alert-box alert radius">
					Incorrect username or password.
					<a href="#" class="close">&times;</a>
				</div>
				<br/>
			</div>		
			<br/><br/><br/><br/><br/>
			<div class="large-6 columns"><label>First Name</label><input type="text" class="fname" placeholder="First Name"/></div>
			<div class="large-6 columns"><label>Last Name</label><input type="text" class="lname" placeholder="Last Name"/></div>
			<div class="large-12 columns"><label>Email</label><input type="text" class="email" placeholder="Email"/></div>
			<div class="large-12 columns"><label>Password</label><input type="password" class="pass" placeholder="Password"/></div>					
			<div class="large-12 columns">
				<br/><a href="#" class="small button right sign-up">Sign Up</a>			
			</div>	
			<br class="clear"/><br/>
		</div>	
	</div>
	<a class="close-reveal-modal">&#215;</a>
</div>	
<div id="sign-in-modal" class="reveal-modal large" data-reveal>
	<h2>Sign In</h2>
	<div class="row global">
		<div class="medium-6 columns">
			<div class="large-12 columns">				
				<div class="txtcenter title-dark">
					<img src="img/logo.png" class="half">
					<h1>Shop IT!</h1><h5>IT Stuffs Available</h5>					
				</div>
			</div>
		</div>			
		<div class="medium-6 columns">			
			<div class="large-12 columns">
				<div data-alert id="cart-alert" class="alert-box alert radius">
					Cart feature is only available after sign in.
					<a href="#" class="close">&times;</a>
				</div>
				<div data-alert id="sign-in-alert" class="alert-box alert radius">
					Incorrect username or password.
					<a href="#" class="close">&times;</a>
				</div>
				<br/>
			</div>	
			<br/><br/><br/><br/><br/>
			<div class="large-12 columns"><label>Email</label><input type="text" class="email" placeholder="Email"/></div>
			<div class="large-12 columns"><label>Password</label><input type="password" class="pass" placeholder="Password"/></div>					
			<div class="large-12 columns">
				<br/><a href="#" class="small button right sign-in">Sign In</a>	
			</div>	
			<br class="clear"/><br/>
		</div>	
	</div>
	<a class="close-reveal-modal">&#215;</a>
</div>		
<div id="stuff-modal" class="reveal-modal large" data-reveal>
	<div class="thumb">	
		<div class="stuff">		
			<div class="medium-6 small-12 columns">
			<?php
				if(isset($daily['image'])&&$daily['image']!=""){
			?>
				<img class="img" src="img/<?php echo $daily['image'];?>" alt=""/>
			<?php
				}else{
			?>
				<img class="img" src="img/noimage.jpg" alt=""/>
			<?php
				}
			?>
			</div>
			<div class="medium-6 small-12 columns">	
				<h2><a><strong class="name">Computer</strong></a></h2>						
				<p class="desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
				<strong class="price">$ 5.00</strong>
				<strong class="price-new">$ 4.00</strong>
				<br/>
				<a href="#" class="small success button add-daily right">Add to Cart</a>
			</div>
		</div>
	</div>
	<a class="close-reveal-modal">&#215;</a>
</div>	
<div id="history-modal" class="reveal-modal large" data-reveal>
	<h2>Transaction</h2>
	<strong class="date">7 May 2014</strong>
	<br class="clear"/>
	<br/>
	<div class="row global">
		<div class="transaction-detail"></div>
		<div class="large-12 columns detail-row" style="border:none !important;">
			<div class="medium-3 columns">&nbsp;</div>
			<div class="medium-3 columns"><br/><h4 class="right">Total: </h4></div>
			<div class="medium-6 columns">
				<br/>
				<div class="large-12 columns"><input type="text" class="total" value="$ 0.00" readonly /></div>
			</div>	
		</div>
	</div>
	
	<a class="close-reveal-modal">&#215;</a>
</div>	
<?php
	include "page/partial/footer.php";
?>	
	
<a class="exit-off-canvas"></a>
 
</div>   

<?php	
	include "page/template/stuff-temp.php";
	include "page/template/slider-temp.php";
	include "page/template/cart-temp.php";
	include "page/template/history-temp.php";
	include "page/template/history-detail-temp.php";
	include "page/partial/bottom.php";
?>