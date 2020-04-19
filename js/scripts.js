document.addEventListener("DOMContentLoaded", () => {
	(document.querySelectorAll(".notification .delete") || []).forEach(
		($delete) => {
			$notification = $delete.parentNode;

			$delete.addEventListener("click", () => {
				$notification.parentNode.removeChild($notification);
			});
		}
	);
});

function changePrice(p) {
	var quantity = document.getElementById("quantity").value;
	if (quantity >= 1 && quantity < 10) {
		var result = p * quantity;
		document.getElementById("currentPrice").innerHTML = result + "€";
	}
}
