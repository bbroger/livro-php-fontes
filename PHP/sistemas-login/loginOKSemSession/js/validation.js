$(function(){
	$("#register_form").validate({
		rules:{
			username:{
				required:true,
				minlength:3,
				maxlength:20

			},
			email:{
				required:true,
				email:true

			},
			password:{
				required:true

			}
		},

			messages:{
				username:{
					required:'<span style="color:red" style="font-style:bold">Please create your username!</span>',
					minlength:'<span style="color:red" style="font-style:bold">Use 3 or more characters!</span>',
					maxlength:'<span style="color:red" style="font-style:bold">Username too long!</span>'
				},
				email:{
					required:'<span style="color:red" style="font-style:bold">Place your active email account!</span>',
					email:'<span style="color:red" style="font-style:bold">Place correct email format</span>'
				},
				password:{
					required:'<span style="color:red" style="font-style:bold">Create your password please!</span>'
				}
			}
	});

});

