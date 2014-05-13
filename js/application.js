var api = "http://10.100.70.104/ws/rest/";
var tplStuff = _.template($('#stuff-temp').html());
var tplSlider = _.template($('#slider-temp').html());
var tplCart = _.template($('#cart-temp').html());
var tplHistory = _.template($('#history-temp').html());
var tplHistoryDetail = _.template($('#history-detail-temp').html());

$(document).ready(function() {		
	open(false,"home");
	setListener();
	$.getJSON("data/user.php")
	.done(function(data){
		if(data.signedin){
			signInAction();
		}else{
			signOut();
		}
	});
});

function setBreadcrumbs(path,page){
	var text="";
	if(path!=false){
		text+=path+"&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;";
	}
	$(".breadcrumbs").html(text);
	$(".page").html(page.replace("-"," "));
}

function open(path, page){
	if(path=="stuff"){
		$.post('page/box/stuff.php',function(data){
			$('#main-box').html(data);
			if(page=="all"){
				getStuffAll();
			}else if(page=="promo"){
				getStuffPromo();
			}else if(page=="search"){
				getStuffSearch();
			}
		});	
	}else{
		$.post('page/box/'+page+'.php',function(data){
			$('#main-box').html(data);	
			if(page=="home"){
				getStuffHome();
			}else if(page=="cart"){
				getStuffCart();
			}else if(page=="history"){
				getHistory();
			}else if(page=="profile"){
				getProfile();
			}
		});
	}


	
	setBreadcrumbs(path,page);
}

function setListener(){
	$(document).on('click', '.viewer', function(){
		var page=$(this).data("page");
		var path=$(this).data("path");
		open(path, page);
	});
	
	$(document).on('click', '.sign-up', function() {
		signUp();
	});	
	$(document).on('click', '.sign-in', function() {
		signIn();
	});		
	$(document).on('click', '.sign-out', function() {
		signOut();
	});		
	$(document).on('click', '.buy-button', function() {
		buy();
	});
	$(document).on('click', '.plus', function() {
		plus(this);
	});	
	$(document).on('click', '.minus', function() {
		minus(this);
	});		
	$(document).on('click', '.currency-chooser', function() {
		var param={"to":$(".currency-chooser").val()};
		updateCartGlobal();
		$.post("data/currency.php",param,function(data){
			data=$.parseJSON(data);			
			$(".convert-result").val(($(".cart-total .total").data("total")*data.rate).toFixed(2));
			$(".cart-total .currency-symbol").html(data.to);
		});	
	});
	$(document).on('click', '.add', function() {
		addToCart(this);
	});	
	$(document).on('click', '.add-daily', function() {
		addToCart(this);
	});
	$(document).on('close', '[data-reveal]', function () {
		$(".alert").hide();
	});
	$(document).on('click', '.stuff-modal-trigger', function () {
		var stuff=$(this).closest(".stuff");
		var modal=$("#stuff-modal");
		
		modal.find(".name").html(stuff.find(".name").text());
		modal.find(".desc").html(stuff.find(".desc").text());
		modal.find(".price").html(stuff.find(".price").text());
		modal.find(".price-new").html(stuff.find(".price-new").text());
		modal.find(".img").attr("src",stuff.find(".img").attr("src"));
		if(stuff.parent().hasClass("promo")){
			modal.parent().addClass("promo");
		}
	});
	$(document).on('click', '.history-modal-trigger', function () {
		var param={"id":$(this).closest(".history-item").data("id")};
		
		$.post("data/history-detail.php",param,function(data){
			data=JSON.parse(data);
			var result="";
			_.each(data.item, function(stuff){		
				if(stuff){	
					result = result+tplHistoryDetail(stuff);					
				}	
			});
			$(".transaction-detail").html(result);
			$("#history-modal .total").val("$ "+data.total);			
		});
		
	});
	$(document).on('click', '.edit', function() {
		$(".view-phase").hide();
		$(".edit-phase").show();
	});
	$(document).on('click', '.save', function() {
		$(".view-phase").show();
		$(".edit-phase").hide();
		var user={	"fname":$("input.profile-fname").val(),
					"lname":$("input.profile-lname").val(),
					"email":$("input.profile-email").val()
		};		
		
		$("h3.profile-fname").text(user.fname);
		$("input.profile-fname").val(user.fname);
		$("h3.profile-lname").text(user.lname);
		$("input.profile-lname").val(user.lname);
		$("h3.profile-email").text(user.email);
		$("input.profile-email").val(user.email);
	});
	$(document).on('click', '.cancel', function() {
		$(".view-phase").show();
		$(".edit-phase").hide();
		getProfile();
	});
}

function signUp(){
    var param = {
		fname:$('#sign-up-modal .fname').val(),
		lname:$('#sign-up-modal .lname').val(),
        email:$('#sign-up-modal .email').val(),
        pass:$('#sign-up-modal .pass').val()
    };
	$.post('data/sign-up.php',param,function(data){
		$.getJSON("data/user.php")
		.done(function(data){
			if(data.signedin){
				signInAction();
			}else{
				$("#sign-in-alert").show();
			}
		});	
	});	
}

function signIn(){	
    var param = {
        email:$('#sign-in-modal .email').val(),
        pass:$('#sign-in-modal .pass').val()
    };
	$.post('data/sign-in.php',param,function(data){
		$.getJSON("data/user.php")
		.done(function(data){
			if(data.signedin){
				signInAction();
			}else{
				$("#sign-in-alert").show();
			}
		});		
	});			
}

function signInAction(){
	open(false, "home");		
	$(".reveal-modal").hide();
	$(".reveal-modal-bg").hide();
	
	$(".no-user").hide();	
	$(".user").show();
}

function signOut(){
	$.get("data/sign-out.php")
	.done(function(){
		open(false, "home");
		$(".user").hide();	
		$(".no-user").show();		
	});
	
}

function plus(caller){
	var item = $(caller).closest(".cart-item");
	var quantity = parseInt(item.find(".quantity").val());
	quantity=quantity+1;
	item.find(".quantity").val(quantity);
	updateCart(item.data("id"),quantity);
}

function minus(caller){
	var item = $(caller).closest(".cart-item");
	var quantity = parseInt(item.find(".quantity").val());
	if(quantity>0){
		quantity=quantity-1;
	}
	item.find(".quantity").val(quantity);
	updateCart(item.data("id"),quantity);
}

function updateCart(id, quantity){
	$.ajax({
		url: 'data/cart.php',
		type: 'PUT',
		data: { "id" : id, "quantity" : quantity },
		success: function(data) {
		}
	});	
	updateCartGlobal();
}

function updateCartGlobal(){
	var items = $(".cart-box").find(".cart-item");
	var total=0;
	for(var i=0;i<items.length;i++){
		var item=items[i];
		var quantity = +$(items[i]).find(".quantity").val();
		var price = parseFloat($(items[i]).find(".price").text().substring(2));
		var subtotal=quantity*price;
		total=total+subtotal;
		$(items[i]).find(".subtotal").val("$ "+subtotal.toFixed(2));		
	}
	$(document).find(".cart-total .total").data("total",total);
	$(document).find(".cart-total .total").val("$ "+total.toFixed(2));
	$(document).find(".cart-total .convert-result").val(total.toFixed(2));
	$(document).find(".cart-total .currency-symbol").html("USD");
	
}

function buy(){
	updateCartGlobal();
	$.getJSON("data/user.php")
	.done(function(data){
		$.getJSON("data/user.php")
		.done(function(data){
			if(data.signedin){
				var text='{ "userId":"'+data.userId+'", "datetime":"'+getCurrentDate()+'", "total":"'+(parseFloat($(document).find(".cart-total .total").data("total")))+'", "shipmentNo":"';
				var text2='", "items":[';
				
				var items = $(".cart-box").find(".cart-item");
				for(var i=0;i<items.length;i++){
					var item=items[i];
					text2+='{ "0":"'+(+$(items[i]).data("id"))+'", "1":"'+(+$(items[i]).find(".quantity").val())+'", "2":"'+(parseFloat($(items[i]).find(".price").text().substring(2)))+'" }';
					if(i<items.length-1){
						text2+=",";
					}
				}
				text2+='] }';
				var param={"text":text,"text2":text2,"address":$(".address").val()};	
				$.post("data/transaction.php",param,function(data){	
					console.log(data);
					setBreadcrumbs("user", "history");
					$.post('page/box/history.php',function(data){
						$('#main-box').html(data);
						$('#shipment-alert').show();
						getHistory();							
					});						
				});
			}
		});	
	});	
}

function getCurrentDate(){
	var d = new Date();
	var month=["January","February","March","April","May","June","July","August","September","October","November","December"];
	return d.getDate()+" "+month[d.getMonth()]+" "+d.getUTCFullYear();
}

function wrapStuff(data){
	var row = "";
	var i=0;
	_.each(data, function(stuff){
		if(stuff){		
			stuff.price=stuff.price.toFixed(2);
			stuff.priceNew=stuff.priceNew.toFixed(2);
			if(i==0){
				row = row + "<div class='row'>";
			}
			var cell = tplStuff(stuff);
			if(stuff.promo==1){	
				cell = '<div class="thumb promo">'+cell;
			}else{
				cell = '<div class="thumb">'+cell;
			}				
			cell = 	'<div class="medium-3 columns">'+cell+'</div></div>';	
			row = row + cell;
			if(i==3){
				i=0;
				row = row + "</div>";
			}else{
				i++;
			}
		}	
	});	
	$('.stuff-box').html(row);
}



function getStuffHome(){	
	$.getJSON("data/slider.php")
	.done(function(data){
		var row = "";
		_.each(data, function(stuff){
			if(stuff){			
				var cell = tplSlider(stuff);							
				row = row + cell;
			}	
		});	
		$('.orbit').html(row);
			$(document).foundation({
				orbit: {
					animation: 'slide',
					timer_speed: 3000,
					animation_speed: 500,
					pause_on_hover: false,
					navigation_arrows: true,
					bullets: false
				}
			});
	});		


	$.getJSON("data/feature.php")
	.done(function(data){
		wrapStuff(data);
	});
}

function getStuffAll(){
	$.getJSON("data/feature.php")
	.done(function(data){
		wrapStuff(data);
	});
}

function getStuffPromo(){
	$.getJSON("data/feature.php")
	.done(function(data){
		wrapStuff(data);
	});
}

function getStuffSearch(){
	$.getJSON("data/feature.php")
	.done(function(data){
		wrapStuff(data);
	});
}

function getStuffCart(){
	$.getJSON("data/cart.php")
	.done(function(data){
		var row = "";
		_.each(data, function(stuff){
			if(stuff){			
				var cell = tplCart(stuff);							
				row = row + cell;
			}	
		});	
		$('.cart-box').html(row);
		updateCartGlobal();
	});
}

function getHistory(){
	$.getJSON("data/history.php")
	.done(function(data){
		var row = "";
		_.each(data, function(transaction){
			transaction.total="$ "+transaction.total.toFixed(2);
			if(transaction){			
				var cell="";
				cell = tplHistory(transaction);							
				row = row + cell;
			}	
		});	
		$('.history-box').html(row);
	});
}

function getProfile(){
	$.getJSON("data/user.php")
	.done(function(data){
		$.getJSON("data/user.php")
		.done(function(data){
			if(data.signedin){
				$("h3.profile-fname").text(data.fname);
				$("input.profile-fname").val(data.fname);
				$("h3.profile-lname").text(data.lname);
				$("input.profile-lname").val(data.lname);
				$("h3.profile-email").text(data.email);
				$("input.profile-email").val(data.email);
			}
		});	
	});

}

function addToCart(caller){
	$.getJSON("data/user.php")
	.done(function(data){
		if(data.signedin){
			var param={"id":$(caller).closest(".stuff").data("id")};		
			$.post("data/cart.php",param);
		}else{
			$("#cart-alert").show();
			$('#sign-in-modal').foundation('reveal', 'open');
		}
	});	
}