<?php
include_once 'header.php';
  ?>
<div class="container">
	<form id="register" class="row"  method="POST" action="register.inc.php" >
		<div class="col-md-6"><label>1.Jméno:<input type="text" name="jmeno"></label></div>
		<div class="col-md-6"><label>2.Příjmení:<input type="text" name="prijmeni"></label></div>
	<!-- unique-->	<div class="col-md-6"><label>3.Username:<input type="text" name="username"></label></div>
		<div class="col-md-6"><label>4.heslo:<input type="text" id="heslo" name="heslo"></label></div>
		<div class="col-md-6"><label>5.Kontrola hesla:<input type="text" name="hesloZnovu"></label></div>
		<!-- unique--><div class="col-md-6"><label>6.email:<input type="email" name="email"></label></div>
		<div class="col-md-6"><label>7.Kontrolní otázka:<input type="text" name="otazka"></label></div>
		<div class="col-md-6"><label>8.odpověď na otázku</label><input type="text" name="odpoved"></div>

		<div class="col-md-6"><label>9.poznámka</label><input type="text" name="poznamka"></div>
		<input type="submit" name="vyhodnot">
	</form>
	<script type="text/javascript">
		$(document).ready(function(){
$("#register").validate({
	rules:{
		jmeno: {
			required:true,
		},
		prijmeni:{
			required: true,
		},
		username:{
			required: true,
		},
		email:{
			required:true,
email: true,
		},
		heslo:{
			required: true,
		},
		hesloZnovu:{
			required: true,
			equalTo:"#heslo",
		},
		otazka:{
			required: true,
		},
		odpoved:{
			required: true,
		}
		
	}
});
		});
	</script>
	<?php
	if (isset($_GET['error'])) {
if ($_GET['error']==1) {
	echo "heslo nebo email je už zabraný";
	}
}
	  ?>
</div>
<?php
include_once 'footer.php';
  ?>
