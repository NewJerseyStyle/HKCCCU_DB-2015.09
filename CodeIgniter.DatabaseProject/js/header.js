
function submit_search() {
	var query = document.getElementById('search_autocomplete').value;
	var keyword = query;
	//window.location.href = "search?keyword=" + keyword;
	location = 'http://localhost/codeigniter.databaseproject/index.php/home/search/'+query;
	/*location.search = 'q=' + query;*/
	return false;
}

function menuShow () {
	if (document.getElementById('menuBar').style.left == '0px') {
		document.getElementById('menuBar').style.left = '-20em';
	}else{
		document.getElementById('menuBar').style.left = '0px';
	}
}

function menuHide(){
	document.getElementById('menuBar').style.left = '-20em';
}

function loginFunc () {
	var w = 480, h = 340;

	if (window.screen) {
		w = screen.availWidth;
		h = screen.availHeight;
	}

	var popW = 300, popH = 150;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;

	var login_prompt = window.open('popup.htm','windowName','width=' + popW + ',height=' + popH + ',top=' + topPos + ',left=' + leftPos);
	login_prompt.onbeforeunload = function(){ location.reload();}
}

function signUpFunc () {
	var w = 480, h = 340;

	if (window.screen) {
		w = screen.availWidth;
		h = screen.availHeight;
	}

	var popW = 300, popH = 150;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;

	var login_prompt = window.open('signUp.htm','windowName','width=' + popW + ',height=' + popH + ',top=' + topPos + ',left=' + leftPos);
	login_prompt.onbeforeunload = function(){ location.reload();}
}

function cartShow () {
	var w = 480, h = 340;

	if (window.screen) {
		w = screen.availWidth;
		h = screen.availHeight;
	}

	var popW = w/2, popH = h*0.7;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;

	var login_prompt = window.open('cart.htm','windowName','width=' + popW + ',height=' + popH + ',top=' + topPos + ',left=' + leftPos);
	login_prompt.onbeforeunload = function(){ location.reload();}
}

function acMan () {
	var w = 480, h = 340;

	if (window.screen) {
		w = screen.availWidth;
		h = screen.availHeight;
	}

	var popW = 300, popH = 150;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;

	var login_prompt = window.open('account.htm','windowName','width=' + popW + ',height=' + popH + ',top=' + topPos + ',left=' + leftPos);
	login_prompt.onbeforeunload = function(){ location.reload();}
}