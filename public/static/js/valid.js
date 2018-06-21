$(document).ready(function(){
	$(".solonumeros").validCampo("1234567890");
	$(".sololetras").validCampo("abcdefghijklmnñopqrstuvwxyz ");
	$(".todoletras").validCampo("abcdefghijklmnñopqrstuvwxyz._#/1234567890 ");
	$(".todofecha").validCampo("1234567890 ");
    
});