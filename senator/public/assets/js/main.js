$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});



$(document).ready(function() {
    // Validate the form
    $(".form").validate({
        rules: {
            username: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 3
            },
            confirmPassword: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            username: {
                required: "Please enter your username",
                minlength: "Username must be at least 3 characters long"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please enter your password",
                minlength: "Password must be at least 6 characters long"
            },
            confirmPassword: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            }
        },
        errorElement: "span",
        errorPlacement: function(error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-outline").append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass("is-invalid").addClass("is-valid");
        }
    });
});