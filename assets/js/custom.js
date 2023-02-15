if (document.readyState == 'loading') {
	document.addEventListener('DOMContentLoaded',ready)
}else{
	ready()
}
function ready(){
	var x = document.getElementsByClassName('table-body')[0]
	var y = x.getElementsByClassName('items-row')
	console.log(x)
	var total = 0
	for (var i =0; i < y.length ; i++) {
	var z = y[i]
	var priceElements = z.getElementsByClassName('price')[0]
	var price = parseFloat(priceElements.innerText.replace('৳','')) 
	var quantityElement = z.getElementsByClassName('item-quantity')[0]
	var quantity = quantityElement.value
	total = total + (price * quantity)
	}
	var quantityInputs = document.getElementsByClassName('item-quantity')
	for (var i = 0; quantityInputs.length > i; i++) {
		var input = quantityInputs[i]
		input.addEventListener('change',quantityChanged)
	}
	document.getElementsByClassName('total-price')[0].innerText = '৳'+ total

}

function quantityChanged(event){
	var input = event.target
	if(isNaN(input.value) || input.value<0){
		input.value =1
	}
	ready()
}



