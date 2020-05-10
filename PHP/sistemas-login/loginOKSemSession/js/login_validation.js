$(function(){
	$("#login_form").validate({
		rules:{
			
			email:{
				required:true,
				email:true

			},
			password:{
				required:true

			}
		},

			messages:{
				
				email:{
					required:'<span style="color:red" style="font-style:bold">Use registered email account!</span>',
					email:'<span style="color:red" style="font-style:bold">HM! Correct email format please ;)</span>'
				},
				password:{
					required:'<span style="color:red" style="font-style:bold">Enter your password</span>'
				}
			}
	});

});

