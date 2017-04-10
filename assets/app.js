$(document).ready(function(){
	$(".carousel").carousel();

	$(".carousel-caption").hide()

	$(".item").hover(function(){
		$(".carousel-caption").show()
	}, 
	function() {
		$(".carousel-caption").hide()
	});

	var formSub = {
		form: $("#contact"),
		formValidation: function(){

			var name = $("#name").val().trim();
			var email = $("#email").val().trim();
			var message = $("#message").val().trim();

			if (name === " ") {
				alert("Please enter your name.");
			} else if (email === " ") {
				alert("Please enter your email address.");
			} else if (message === " ") {
				alert("Please enter a message");
			} else {
				return;
			}
		},
		clear: function(){
			$("#name").val("");
			$("#email").val("");
			$("#message").val("");
		}
	}

	$("#submit").on("click", function(e){
		e.preventDefault();
		formSub.formValidation();

		var formData = $(formSub.form).serialize();

		$.ajax({
			type: "POST",
			url: $(formSub.form).attr("action"),
			data: formData
		}).done(function(data){
			$(".modal").modal();
			formSub.clear();
		}).fail(function(data){
			alert("Oops! It looks like an error occurred and your message wasn't sent.");
		});
	});

});