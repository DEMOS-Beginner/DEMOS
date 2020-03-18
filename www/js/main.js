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
	modal.style.visibility = "visible";
	modal.style.opacity = 1;


	var close = document.getElementById('logClose');
	close.onclick = function() {
		var modal = document.getElementsByClassName("log_modal")[0];
		modal.style.visibility = "hidden";
		modal.style.opacity = 0;
		resetModal()
	}

	window.onclick = function(event) {
		var modal = document.getElementsByClassName("log_modal")[0];
		if (event.target == modal) {
			modal.style.visibility = "hidden";
			modal.style.opacity = 0;
			resetModal()
		}
	}
}

function showReg() {
	let log_modal = document.getElementsByClassName("log_modal")[0];
	log_modal.style.visibility = "hidden";
	log_modal.style.opacity = 0;

	let modal = document.getElementsByClassName("reg_modal")[0];
	modal.style.visibility = "visible";
	modal.style.opacity = 1;

	var close = document.getElementById('regClose');
	close.onclick = function() {
		let modal = document.getElementsByClassName("reg_modal")[0];
		modal.style.visibility = "hidden";
		modal.style.opacity = 0;

		resetModal()
	}

	window.onclick = function(event) {
		let modal = document.getElementsByClassName("reg_modal")[0];
		if (event.target == modal) {
			modal.style.visibility = "hidden";
			modal.style.opacity = 0;
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
	//Выполняет AJAX Запрос для логина
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
				userCabinet.innerHTML = data['email'];
				userCabinet.onclick = showUserDropDown;
				let toUserPage = document.getElementById('toUserPage');
				toUserPage.innerHTML = data['email'];
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
	//Отвечает за показ выпадающего списка в меню пользователя
	let user_menu = document.getElementsByClassName("ma_user_menu")[0];
	if (user_menu.style.opacity == 0) {
		user_menu.style.visibility = 'visible';
		user_menu.style.opacity = 1;
		user_menu.style.marginTop = '18px';
		user_menu.style.top = '100%';	
		user_menu.style.height = '250px';
	} else {
		user_menu.style.opacity = 0;			
		user_menu.style.height = '50px';
		user_menu.style.visibility = 'hidden';
	}
}

function showOrders() {
	//Показывает или скрывает все завершенные заказы
	let oldOrders = document.getElementById('oldOrdersTable');
	let newOrders = document.getElementById('newOrdersTable');
	let oldOrdersLink = document.getElementById('oldOrdersLink');
	let newOrdersLink = document.getElementById('newOrdersLink');
	if (oldOrders.style.display == 'none') {
		oldOrders.style.display = 'block';
		newOrders.style.display = 'none';
		oldOrdersLink.className += ' active'
		newOrdersLink.className = 'user_orders_switch';
	} else {
		oldOrders.style.display = 'none';
		newOrders.style.display = 'block';
		oldOrdersLink.className = 'user_orders_switch';
		newOrdersLink.className += ' active'
	}

}
