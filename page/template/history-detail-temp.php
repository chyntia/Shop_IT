<script id="history-detail-temp" type="text/template">
	<div class="large-12 columns history-detail-item detail-row" data-id="<%= id %>">
		<div class="medium-3 columns">	
			<div class="large-12 columns"><br/><b><%= name %></b></div>
		</div>
		<div class="medium-3 columns">	
			<div class="large-12 columns"><label>Price :</label><input type="text" value="$ <%= quantity %>" readonly /></div>
		</div>
		<div class="medium-3 columns">	
			<div class="large-12 columns"><label>Quantity :</label><input type="text" value="<%= price %>" readonly /></div>
		</div>
		<div class="medium-3 columns">
			<div class="large-12 columns"><label>Subtotal :</label><input type="text" value="$ <%= subtotal %>" readonly /></div>
		</div>		
	</div>
</script>