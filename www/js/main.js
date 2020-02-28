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