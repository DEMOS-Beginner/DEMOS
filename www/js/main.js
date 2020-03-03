//JS File for Cubemarket. AJAX


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