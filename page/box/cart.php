<?php
	$currency=array();
	$currency[0]=array("symbol"=>"USD","name"=>"US Dollar");
	$currency[1]=array("symbol"=>"CNY","name"=>"Chinese Yuan Renminbi");
	$currency[2]=array("symbol"=>"EUR","name"=>"Euro");
	$currency[3]=array("symbol"=>"GBP","name"=>"British Pound");
	$currency[4]=array("symbol"=>"HKD","name"=>"Hong Kong Dollar");
	$currency[5]=array("symbol"=>"IDR","name"=>"Indonesian Rupiah");
	$currency[6]=array("symbol"=>"JPY","name"=>"Japanese Yen");
	$currency[7]=array("symbol"=>"KRW","name"=>"South Korean Won");
	$currency[8]=array("symbol"=>"XBT","name"=>"Bitcoin");
?>

<div class="row global">
	<div class="cart-box"></div>
	<div class="large-12 columns cart-total">
		<div class="medium-4 columns">
			&nbsp;
		</div>
		<div class="medium-4 columns">	
			<div class="large-12 columns txtright"><h2>Total : </h2></div>					
		</div>
		<div class="medium-4 columns">
			<div class="large-12 columns txtright">
				<input type="text" value="0.00" readonly class="total" data-total="0"/>
				
				<!--<br/><a href="#" class="small success button right cart-button">Continue</a>-->					
			</div>	
		</div>	
		<br class="clear"/><br/><br/>

		<div class="large-6 columns">
			<div class="large-6 columns">
				<label class="cart-label">Currency:</label>
				<select class="currency-chooser">
					<?php
						for($i=0;$i<count($currency);$i++){
							echo '<option value="'.$currency[$i]["symbol"].'">'.$currency[$i]["symbol"].'   -   '.$currency[$i]["name"].'</option>';
						}
					?>					
				</select>		
			</div>
			<div class="large-6 columns">
			<label class="cart-label">Total (<span class="currency-symbol">USD</span>):</label>
			<input type="text" value="0.00" readonly class="convert-result"/>
			</div>
			<div class="large-12 columns">
				<label class="cart-label">Card Type:</label>
				<select>
					<option>Visa</option>
					<option>Master Card</option>
				</select>		
			</div>
			<div class="large-12 columns"><label class="cart-label">Card Number:</label><input type="text" placeholder="Card Number"/></div>
			<div class="large-12 columns"><label class="cart-label">CVV Code:</label><input type="text" placeholder="CVV Code"/></div>		


		</div>		
		<div class="large-6 columns">
			<div class="large-12 columns"><label class="cart-label">Shipping Address:</label><textarea placeholder="Shipping Address" class="address"></textarea></div>
			<div class="large-12 columns"><br/><a href="#" class="medium success button right buy-button">Buy</a></div>
		</div>
	</div>	
		
	
	<!--<div class="large-4 columns">	
		<div class="large-12 columns">
			<select>
				<option disabled selected>Card Type</option>
				<option>Visa</option>
				<option>Master Card</option>
			</select>		
		</div>
		<div class="large-12 columns"><input type="text" placeholder="Card Number"/></div>
		<div class="large-12 columns"><input type="text" placeholder="CVV Code"/></div>		
		<div class="large-12 columns"><br/><a href="#" class="medium success button right">Buy</a></div>
		<hr/>
	</div>	-->
</div>