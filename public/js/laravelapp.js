$('document').ready(function() {
	$('div.alert').not('.alert-important').delay(3000).slideUp(300);
	
	$('#form-pencarian').submit(function() {
		$('#id_kelas option[value=""]').attr('disabled', 'disabled');
		$('#jenis_kelamin option[value=""]').attr('disabled', 'disabled');
		if($('#kata_kunci').val() == ''){
			$('#kata_kunci').attr('disabled', 'disabled');
		}

		return true;
	});	
});
