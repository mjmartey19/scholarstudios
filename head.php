<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Scholar Profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

   <!-- aos css link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

   <!--=============== REMIX ICONS ===============-->
   <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/lean-slider.css">
    <link rel="stylesheet" href="css/sample-styles.css">
	<link rel="shortcut icon" href="images/Logo2.png" type="image/x-icon">
  
   <!-- external sortable link-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.2/Sortable.min.js"></script>
 
  <!-- recaptcha link -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
 
  <!-- jquery link -->
  <script src="js/jquery.js"></script>
 
  <!-- form script -->
  <script type="text/javascript" >
	   $(document).ready(function()
	   {
			$('#ContactForm').on('submit', function(e){
				e.preventDefault();
				$("#feedback").hide();
				$("#animation").show();
				var formData = new FormData($(this)[0]);
				$.ajax({
					url : $(this).attr('action') || window.location.pathname,
					type: 'POST',
					data: formData,
					success: function (data) {
						$("#animation").hide();
						var obj = $.parseJSON(data);
						var feedback = obj['feedback'];
						var response = obj['response'];
						if(feedback==1)
						{
								var recaptcha = $("#g-recaptcha-response").val();
								if (recaptcha === "") {
									$("#feedback").show();
								$("#feedback").html("<div class='error'><p> Check the recaptcha</p></div>");
									alert("Please verify that you are a Human");	
								}else{
									alertBox = document.querySelector(".alert-container");
									alertBox.classList.add("active");
									setTimeout(()=>{
									window.location = "index.php";
									},8000);
							}
						}else{
							if(response!=""){
								$("#feedback").show();
								$("#feedback").html("<div class='error'><p>"+response+"</p></div>");
								}
							}
							
					},
					cache: false,
					contentType: false,
					processData: false
				});
			});
	   });
	</script>
</head>
