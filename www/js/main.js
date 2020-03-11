//JS File for Cubemarket. AJAX

function getData(obj_form) {
    var hData = {};
    $('input, textarea', obj_form).each(function() {
        if (this.name && this.name != '') {
            hData[this.name] = this.value;
            console.log('hData()');
        }
    });

    return hData;
}

function addToCart(productId) {
	$.ajax({
		type: 'POST',
		dataType: 'json',
		async: false,
		url: '/cart/addtocart/'+productId,
		success: function (data) {
			if (data['success']) {
				$('#addToCart_'+productId).hide();
				$('#removeFromCart_'+productId).show();
			} else {
				alert(data['message']);				
			}

		},
		error: function (request, status, error) {
			alert(request.responseText);
		}
	});
}

function removeFromCart(productId) {
	$.ajax({
		type: 'POST',
		dataType: 'json',
		async: false,
		url: '/cart/removefromcart/'+productId,
		success: function (data) {
			if (data['success']) {
				$('#addToCart_'+productId).show();
				$('#removeFromCart_'+productId).hide();
			} else {
				alert(data['message']);				
			}

		},
		error: function (request, status, error) {
			alert(request.responseText);
		}
	});
}

function addOneToCart(productId) {
	addToCart(productId);
	prodPrice = $('#prodPrice_'+productId);
	prodTruePrice = $('#prodTruePrice_'+productId);
	prodCount = $('#prodCount_'+productId);
	prodCount.text(parseInt(prodCount.text(), 10)+1);
	prodPrice.text(parseInt(prodCount.text(), 10)*parseInt(prodTruePrice.text(), 10));
}

function removeOneFromCart(productId) {
	if (parseInt($('#prodCount_'+productId).text(), 10) > 1) {
		removeFromCart(productId);
		prodPrice = $('#prodPrice_'+productId);
		prodTruePrice = $('#prodTruePrice_'+productId);
		prodCount = $('#prodCount_'+productId);
		prodCount.text(parseInt(prodCount.text(), 10)-1);
		prodPrice.text(parseInt(prodCount.text(), 10)*parseInt(prodTruePrice.text(), 10));
	}
}


function resetModal() {
	let reg_error = document.getElementsByClassName("reg_error")[0];
	reg_error.style.display = 'none';
	reg_error.innerHTML = '';
	let log_error = document.getElementsByClassName("log_error")[0];
	log_error.style.display = 'none';
	log_error.innerHTML = '';
}


function showLogreg() {
	var modal = document.getElementsByClassName("log_modal")[0];
	modal.style.display = "block";


	var close = document.getElementById('logClose');
	close.onclick = function() {
		var modal = document.getElementsByClassName("log_modal")[0];
		modal.style.display = 'none';
		resetModal()
	}

	window.onclick = function(event) {
		var modal = document.getElementsByClassName("log_modal")[0];
		if (event.target == modal) {
			modal.style.display = 'none';
			resetModal()
		}
	}
}

function showReg() {
	let log_modal = document.getElementsByClassName("log_modal")[0];
	log_modal.style.display = "none";

	let modal = document.getElementsByClassName("reg_modal")[0];
	modal.style.display = "block";

	var close = document.getElementById('regClose');
	close.onclick = function() {
		let modal = document.getElementsByClassName("reg_modal")[0];
		modal.style.display = 'none';
		resetModal()
	}

	window.onclick = function(event) {
		let modal = document.getElementsByClassName("reg_modal")[0];
		if (event.target == modal) {
			modal.style.display = 'none';
			resetModal()
		}
	}
}


function register() {
	postData = getData('.reg_modal_content');
	console.log(postData);
	$.ajax({
		dataType: 'json',
		type: 'POST',
		data: postData,
		url: 'user/register',
		success: function (data) {
			if (data['success']) {
				let modal = document.getElementsByClassName("reg_modal")[0];
				modal.style.display = 'none';
			} else {
				let reg_error = document.getElementsByClassName("reg_error")[0];
				reg_error.style.display = 'block';
				reg_error.innerHTML = data['message'];
			}
		},
		error: function (request, status, error) {
			alert(request.responseText);
		}
	});
}


function login() {
	postData = getData('.log_modal_content');
	console.log(postData);
	$.ajax({
		dataType: 'json',
		type: 'POST',
		data: postData,
		url: 'user/login',
		success: function (data) {
			if (data['success']) {
				let modal = document.getElementsByClassName("log_modal")[0];
				modal.style.display = 'none';
				let userCabinet = document.getElementById('userCabinet');
				console.log(userCabinet);
				userCabinet.innerHTML = data['email'];
			} else {
				let log_error = document.getElementsByClassName("log_error")[0];
				log_error.style.display = 'block';
				log_error.innerHTML = data['message'];
			}

		},
		error: function (request, status, error) {
			alert(request.responseText);
		}
	});
}

function showUserDropDown() {
	let user_menu = document.getElementsByClassName("user_menu")[0];
	if (user_menu.style.opacity == '0') {
		user_menu.style.opacity = '1';
		user_menu.style.marginTop = '18px';
		user_menu.style.top = '100%';	
	} else {
		user_menu.style.opacity = '0';			
		user_menu.style.marginTop = '0';
		user_menu.style.bottom = '100%';
	}
}