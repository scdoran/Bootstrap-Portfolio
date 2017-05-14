$(document).ready(function(){
	// Page Entry Code

	var done = false;

	function welcome(){
	    
		if((done === false) && (on_index === true)) {
	        $("#welcome").show();
			$('nav').hide();
			$('.container').hide();
			$('footer').hide();
			done = true;
		} else if ((done === true) || (on_index === false)) {
			$("#welcome").hide();
			$('nav').show();
			$('.container').show();
			$('footer').show();
		}

	}

	function fadeOut(){
		$("#welcome").fadeOut();
		$('nav').fadeIn(2000);
		$('.container').fadeIn(2000);
		$('footer').fadeIn(2000);
	}

	function session() {
	    if (document.cookie.indexOf("visited") >= 0) {
	        $('#welcome').hide();
	    } else {
			welcome();	
	        document.cookie = "visited";
	    }
	}

	session();

	$("#logo").on("click", fadeOut);
	
	// Carousel Bootstrap Code

	$(".carousel").carousel();

	$(".carousel-caption").hide()

	$(".item").hover(function(){
		$(".carousel-caption").show()
	}, 
	function() {
		$(".carousel-caption").hide()
	});

	// Form submission Code

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

	$(formSub.form).submit(function(e){
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