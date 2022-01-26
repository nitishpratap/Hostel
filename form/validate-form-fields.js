$(document).ready(function(){
		
		//first name validation
		$("#fname").keyup(function(){	
			var letters = /^[A-Za-z' ']+$/;
			var value=$("#fname").val();
			if(value.match(letters))
			{
				$("#f-error").html("");
				$("#f-error").css("display","none");
				return true;
			}else{
				$("#f-error").css("display","inline");
				$("#f-error").html("*** For your name please use alphabets and space only ***");	
				$("#f-error").css("color","red");
				return false;
			}
		});
		//middle name validation
		$("#mname").keyup(function(){	
			var letters = /^[A-Za-z' ']+$/;
			var value=$("#mname").val();
			if(value.match(letters))
			{
				$("#m-error").html("");
				$("#m-error").css("display","none");
				return true;
			}else{
				$("#m-error").css("display","inline");
				$("#m-error").html("*** For your name please use alphabets and space only ***");	
				$("#m-error").css("color","red");
				return false;
			}
		});
		//last name validation
		$("#lname").keyup(function(){	
			var letters = /^[A-Za-z' ']+$/;
			var value=$("#lname").val();
			if(value.match(letters))
			{
				$("#l-error").html("");
				$("#l-error").css("display","none");
				return true;
			}else{
				$("#l-error").css("display","inline");
				$("#l-error").html("*** For your name please use alphabets and space only ***");	
				$("#l-error").css("color","red");
				return false;
			}
		});

		//Email validation
		$("#email").keyup(function(){
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			var email=$("#email").val();
			if (email.match(mailformat))
			 {
			 	$("#email-error").html("");
			 	$("#email-error").css("display","none");
			 	return true;
			 }else{
			 	$("#email-error").html("*** Please enter a valid email address ***");
			 	$("#email-error").css("color","red");
			 	$("#email-error").css("display","inline");
			 	$("#email").focus();
			 	return false;
			 }
			
		});

		//mobile number validation
		$("#mobile").keypress(function (e) {
			     //if the letter is not digit then display error and don't type anything
			     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			        //display error message
			      $("#mobile-error").html("Digits Only").show().fadeOut("slow");
			            return false;
				    }
		});

		//aadhar number validation
		$("#aadhar").keypress(function (e) {
			     //if the letter is not digit then display error and don't type anything
			     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			        //display error message
			      $("#aadhar-error").html("Digits Only").show().fadeOut("slow");
			            return false;
				    }
		});

		//father name validation
		$("#father-name").keyup(function(){	
			var letters = /^[A-Za-z' ']+$/;
			var value=$("#father-name").val();
			if(value.match(letters))
			{
				$("#father-error").html("");
				$("#father-error").css("display","none");
				return true;
			}else{
				$("#father-error").css("display","inline");
				$("#father-error").html("*** For father's name please use alphabets and space only ***");	
				$("#father-error").css("color","red");
				return false;
			}
		});

		// Occupation/Designation validation
		$("#designation").keyup(function(){	
			var letters = /^[A-Za-z' ']+$/;
			var value=$("#designation").val();
			if(value.match(letters))
			{
				$("#designation-error").html("");
				$("#designation-error").css("display","none");
				return true;
			}else{
				$("#designation-error").css("display","inline");
				$("#designation-error").html("*** please use alphabets and space only ***");	
				$("#designation-error").css("color","red");
				return false;
			}
		});

		//telephone/mobile (office) validation
		$("#telephone").keypress(function (e) {
			     //if the letter is not digit then display error and don't type anything
			     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			        //display error message
			      $("#telephone-error").html("Digits Only").show().fadeOut("slow");
			            return false;
				    }
		});

		//Annual Family Income(Approx)
		$("#income").keypress(function (e) {
			     //if the letter is not digit then display error and don't type anything
			     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			        //display error message
			        $("#income-error").css("color","red");
			        $("#income-error").html("Digits Only").show().fadeOut("slow");
			        return false;
				    }
		});

		//Name of Local Guardian(if any)
		$("#guardian").keyup(function(){	
			var letters = /^[A-Za-z' ']+$/;
			var value=$("#guardian").val();
			if(value.match(letters) || value=="")
			{
				$("#guardian-error").html("");
				$("#guardian-error").css("display","none");
				return true;
			}else{
				$("#guardian-error").css("display","inline");
				$("#guardian-error").html("*** please use alphabets and space only ***");	
				$("#guardian-error").css("color","red");
				return false;
			}
		});

		// telephone/mobile local guardian 
		$("#telephoneGU").keypress(function (e) {
			     //if the letter is not digit then display error and don't type anything
			     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			        //display error message
			      $("#telephoneGU-error").html("Digits Only").show().fadeOut("slow");
			            return false;
				    }
		});

		//add Hostel Name and Room Number field
		$("#hostlerY").click(function(){
			$("#HostelNameNumber").html('<div class="form-group"><label for="HostelNameNumber">Name And Room Number Of Hostel<span class="req">*</span>:</label><input type="text" name="HostelNameNumber" id="HostelNameNumber" class="form-control" placeholder="Enter Name of Hostel and room Number..." required ></div>');
		});
		//remove Hostel Name and Room Number field
		$("#hostlerN").click(function(){
			$("#HostelNameNumber").html("");
		});

		//select gender
		$("#submit").click(function(){
			if($("#gender").val() === ""){
				$("#gender-error").html("*** Please select an option ***");
				$("#gender-error").css("color","red");
				
				return false;
			}
			else{
				$("#gender-error").html("");
				
			}
		});
		//select institute
		$("#submit").click(function(){
			if($("#institute").val() === ""){
				$("#institute-error").html("*** Please select an option ***");
				$("#institute-error").css("color","red");
				
				return false;
			}
			else{
				$("#institute-error").html("");
				
			}
		});
		//select course 
		$("#submit").click(function(){
			if($("#course").val() === ""){
				$("#course-error").html("*** Please select an option ***");
				$("#course-error").css("color","red");
				
				return false;
			}
			else{
				$("#course-error").html("");
				
			}
		});
		//select year
		$("#submit").click(function(){
			if($("#year").val() === ""){
				$("#year-error").html("*** Please select an option ***");
				$("#year-error").css("color","red");
				
				return false;
			}
			else{
				$("#year-error").html("");
				
			}
		});


		//ajax technique for selection of course
		$("#institute").change(function(){
			var instituteId=$(this).val();
			$.ajax({
				url:"ajax.php",
				type:"post",
				data:{id:instituteId},
				datatype:"html",
				
				success:function(courseResult){
					$("#course").html(courseResult);
				}
			});
		});


		//ajax technique for selection of year
		$("#course").change(function(){
			var courseId=$(this).val();
			$.ajax({
				url:"ajax_year.php",
				type:"post",
				data:{courseid:courseId},
				datatype:"html",
				
				success:function(yearResult){
					$("#year").html(yearResult);
				}
			});
		});

});