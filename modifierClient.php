<!DOCTYPE html>
<html lang="en">
<head>
	<title>Modifier client</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="container-contact100">
		<div class="wrap-contact100">
            <a href="Gestions%20des%20clients.php"> <input type="button" value="retour" style="float: left;width:85px;
	height:85px;
	background:#fafafa;
	box-shadow:2px 2px 8px #aaa;
	font:bold 13px Arial;
	border-radius:50%;
	color:#555;"> </a>
           
			
 <?PHP 
 include "../entities/client.php";
include "../core/clientC.php";
if (isset($_GET['nom'])){
	$client1C=new clientC();
    $result=$client1C->recuperer($_GET['nom']);
	foreach($result as $row){
		$nom=$row['nom'];
		$email=$row['email'];
		$num=$row['num'];
		$datee=$row['datee'];
		$adresse=$row['adresse'];
        
?>
<form class="contact100-form validate-form" method="POST" >
				<span class="contact100-form-title">
					Modifier client 
				</span>
    
<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">Nom et prenom *</span>
    <input class="input100" type="text" name="name" placeholder="Enter Your Name" value="<?PHP echo $nom ?>"> </div>

<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
					<span class="label-input100">Email *</span>
    <input class="input100" type="text" name="email" placeholder="Enter Your Email " value="<?PHP echo $email ?>"> </div>

<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Tel_Num</span>
    <input class="input100" type="text" name="phone" placeholder="Enter Number Phone" value="<?PHP echo $num ?>"> </div>

 <div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">Date*</span>
     <input class="input100" type="date" name="date" placeholder="Enter Your Name" value="<?PHP echo $datee ?>"> </div>

     <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
					<span class="label-input100">Adresse *</span>
					<input class="input100" type="text" name="adresse" placeholder="Enter Your Email " value="<?PHP echo $adresse ?>"> </div>
<div class="container-contact100-form-btn">
<input type="submit" name="modifier" value="modifier" class="contact100-form-btn">
<input type="hidden" name="cin_ini" value="<?PHP echo $_GET['nom'];?>">
					
					
				</div>
</form>
<?PHP
	}
    }
if (isset($_POST['modifier'])){
	$client1=new client($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['date'],$_POST['adresse']);
	$client1C->modifier($client1,$_POST['cin_ini']);
	header('location: Gestions des clients.php');
}
?> 

 


<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script> 

</body>
</html>

