var key = document.currentScript.getAttribute('key');
switch(key) {
	case "no-game-in-cart":
		swal("No game in cart, come back to games page to buy !").then((value) => {
			window.location.href = "/games";
		});
}