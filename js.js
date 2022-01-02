


function send_mail() {
	console.log('send_mail')
	var email = $("#email").val()
	var email = "quyseo.ictu@gmail.com";
	var btc_price = $("#btc-price").text()
	console.log(btc_price)
	$.post("send_mail.php",{email:email,btc_price:btc_price},function(data){
		console.log(data)
	})
}

$( document ).ready(function() {
	
	send_mail();
	console.log('auto load')
})