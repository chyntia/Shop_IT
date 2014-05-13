<script id="cart-temp" type="text/template">
	<div class="large-12 columns stuff cart-item" data-id="<%= id %>">
		<div class="medium-4 columns">
			<div class="fig">
				<img class="img half" src="<%= img %>" alt=""/>
			</div>
			<div class="large-12 columns caption">
				<a data-reveal-id="stuff-modal" class="stuff-modal-trigger"><strong class="name"><%= name %></strong></a>
				<strong class="price">$ <%= priceNew %></strong>
			</div>
		</div>
		<div class="medium-4 columns">	
			<div class="large-12 columns">
				<label>Quantity :</label>
				<span class="small success button minus">-</span>
				<input type="text" value="<%= quantity %>" readonly class="quantity"/>
				<span class="small success button plus">+</span>	
			</div>	
		</div>
		<div class="medium-4 columns">
			<div class="large-12 columns"><label>Subtotal :</label><input type="text" value="$ 0.00" readonly class="subtotal"/></div>
		</div>		
	</div>
</script>