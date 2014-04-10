/*
 the main javascript applicaiton
 */
jQuery(document).ready(function() {
	var feedbackdata = {
		incorrectlogin : "<div id='incorrectlogindata' class='alert-error alert-block'>Login Failed,Please enter the correct credentials</div>",
		emptyfields : "<div id='emptyfields' class='alert alert-block'>Enter A username and password</div>"
	};
	//programming the menu links
	$("#menuelements li").click(function() {
		$("#menuelements li").removeClass("active");
		$(this).addClass("active");
	});
	$("#bank").click(function() {
		$("#contentloader").load("ideaform.php");
	});
	$("#viewall").click(function() {
		displayAllIdeas();
	});
	$("#loginbutton").click(function() {
		var username = $("#username").val();
		var password = $("#password").val();
		$.post("login.php", {
			username : username,
			password : password
		}, function(data) {
			if(data == "empty fields") {
				$("#screen").html(feedbackdata.emptyfields).hide();
				$("#screen").show("slow");
			} else if(data == "login fail") {
				$("#screen").html(feedbackdata.incorrectlogin).hide();
				$("#screen").show("slow");
			} else {
				window.location.href = "home.php";
			}
		});
	});
	$("#createaccount").click(function() {
		$("#loginformdiv").empty(function() {
			$("#formholder").fadeOut("slow");
		}).load("createaccount.php");
	});
});
function saveIdea() {
	var title = $("#title").val();
	var description = $("#description").val();
	var rqid = 1;
	var data = title + "," + description + "." + rqid;
	//send to processor for saving
	if(title == '' || description == '') {
		$("#conv").html("<div class='alert alert-warning'><b>Fill in all fields</b></div>");
	} else {
		$.post("controller.php", {
			rqid : rqid,
			title : title,
			description : description

		}, function(data) {
			if( data = "saved") {
				$("#conv").html("<div class='alert alert-success'>data saved</div>")
			} else if( data = "error saving") {
				$("#conv").html("<div class='alert alert-error'>idea not saved,please try again later.</div>");
			} else {
				$("#conv").html("<div class='alert alert-error'>idea not saved,please try again later.</div>")
			}
		});
	}
}
function displayAllIdeas() {
	$.ajax({
		url : "controller.php",
		data : "rqid=" + 2,
		cache : false,
		type : "post",
		ajaxError : function() {
			$("#contentloader").html("<div class='alert alert-error'>Something bad happened,try again later</div>");
		},
		success : function(data) {
			$("#contentloader").html(data);
		}
	});
}

/*
 function to alert the user that the ajax request has failed

 */
function execErrorHandle() {
	$("#errordiag").dialog('open');
	$("#errordiag").dialog({
		autoOpen : false,
		title : "error",
		show : "fade",
		open : function() {
			$(this).html("<div class='alert alert-error'></div>");
		}
	});
}
/*
 the function to edit the idea
 */
function editIdea(id) {
	$.post('controller.php', {
		rqid : 3,
		id : id
	}, function(data) {
		// create dialog to delete the data
		$("#editdiag").dialog('open');
		$("#editdiag").dialog({
			autoOpen : false,
			title : "Edit",
			show : "fade",
			width : 400,
			height : 300,
			resizable : false,
			open : function() {
				$(this).html(data);
			},
			buttons : {
				"Save" : function() {
					var id = $("#id").val();
					var title = $("#title").val();
					var desc = $("#description").val();

					$.post('controller.php', {
						rqid : 3.1,
						title : title,
						id : id,
						desc : desc
					}, function(data) {
						window.alert(data);
					});
				},
				"Cancel" : function() {
					$(this).dialog('close');
				}
			}

		});

	});
}
function deleteIdea(id) {
	$.post("controller.php", {
		id : id,
		rqid : 4
	}, function(data) {
		window.alert(data);
	});
}






