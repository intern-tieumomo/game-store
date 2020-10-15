$(".selection-1").select2({
	minimumResultsForSearch: 20,
	dropdownParent: $('#dropDownSelect1')
});

$(".selection-2").select2({
	minimumResultsForSearch: 20,
	dropdownParent: $('#dropDownSelect2')
});

$(".selection-1").change(function() {
	window.location.replace("change-language/" + $('.selection-1 option:selected').val());
});