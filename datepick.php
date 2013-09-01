<link rel="stylesheet" href="ui/development-bundle/themes/base/jquery.ui.all.css">
	<script src="ui/development-bundle/jquery-1.7.2.js"></script>
	<script src="ui/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="ui/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="ui/development-bundle/ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="ui/development-bundle/demos/demos.css">
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	</script>	
<p>Date: <input type="text" id="datepicker"></p>