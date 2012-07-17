ccmValidateBlockForm = function() {
	
	if ($('#orgName').val() == '' && $('#cardType').val() == '0') {
		ccm_addError('Enter an Organisation Name.');
	}
	
	if ($('#firstName').val() == '' && $('#lastName').val() == '' && $('#cardType').val() == '1') {
		ccm_addError('Enter a First or Last Name.');
	}
	
	return false;
}


refreshTypeControls = function() {
	var cardType = $('#cardType').val();
	$('#name').toggle(cardType == 0);
	$('#psnName').toggle(cardType == 1);
	$('#psnRole').toggle(cardType == 1);
}

$(document).ready(function() {
	$('#cardType').change(refreshTypeControls);
	refreshTypeControls();
});