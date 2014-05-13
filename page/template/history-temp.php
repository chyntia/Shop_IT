<script id="history-temp" type="text/template">
	<div class="large-12 columns history-item" data-id="<%= id %>">
		<div class="medium-4 columns">
			<div class="large-12 columns">
				<br/>
				<h4 class="date"><%= date %></h4>
			</div>
		</div>
		<div class="medium-4 columns">	
			<div class="large-12 columns txtright">
				<label>Total :</label>	
				<input type="text" value="<%= total %>" readonly class="subtotal"/>
			</div>
		</div>		
		<div class="medium-4 columns">	
			<span class="small button right history-modal-trigger" data-reveal-id="history-modal">View Items</span>
		</div>		
	</div>
</script>