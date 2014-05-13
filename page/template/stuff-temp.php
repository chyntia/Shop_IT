<script id="stuff-temp" type="text/template">
	<div class="stuff" data-id="<%= id %>">
		<div class="layer"><img src="img/promo.png" alt="" class="ribbon"/></div>
		<span class="small success button add">Add to Cart</span>
		<div class="fig">			
			<img class="img" src="<%= img %>" alt=""/>
		</div>
		<div class="caption">
			<a href="#" data-reveal-id="stuff-modal" class="stuff-modal-trigger"><strong class="name"><%= name %></strong></a>
			<p class="desc"><%= desc %></p>
			<strong class="price">$ <%= price %></strong>
			<strong class="price-new">$ <%= priceNew %></strong>
		</div>
	</div>
</script>