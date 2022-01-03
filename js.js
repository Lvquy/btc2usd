


function send_mail() {
	console.log('send_mail')
	var btc = $("#btc-price").text()
	var eth = $("#eth-price").text()
	var time = $("#time").text()
	console.log(btc,eth,time)
	$.post("send_mail.php",{btc:btc,eth:eth,time:time},function(data){
		console.log(data)
	})
}

$( document ).ready(function() {
	send_mail()
	
	console.log('auto load')
})


function register() {
	$("#modal_reg").modal('show');
	
}
function reg_data(){
	var email = $("#email").val()
	var top = $("#top").val()
	var pur = $("#pur").val()
	var bot = $("#bot").val()
	console.log(email, top, pur, bot)
	$.post("reg2db.php",{email:email,top:top,pur:pur,bot:bot},function(data){
		console.log(data)
	})
}