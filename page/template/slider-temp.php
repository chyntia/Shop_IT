<script id="slider-temp" type="text/template">
	<li data-orbit-slide="headline-1"> 
		<div class="large-12 medium-12 columns"><br/>
			<div class="thumb-daily promo">
				<div class="stuff" data-id="<%= id %>">		
					<div class="medium-12 small-12 columns">
						<h5><a data-reveal-id="stuff-modal" class="stuff-modal-trigger"><strong class="name"><%= name %></strong></a></h5>
					</div>					
					<div class="medium-6 small-12 columns">
						<img class="img" src="<%= img %>" alt=""/>
					</div>
					<div class="medium-6 small-12 columns">							
						<p class="desc"><%= desc %></p>
						<strong class="price"><%= price %></strong>
						<strong class="price-new"><%= priceNew %></strong>
						<br/>
						<a href="#" class="small success button add-daily right">Add to Cart</a>
					</div>
				</div>
			</div>					
		</div>
	</li>
</script>