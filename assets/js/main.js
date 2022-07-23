$(function(){

	$("#form").submit(function(e){
		e.preventDefault()
		let form = $(this);
		var values = {};
		$.each($(this).serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		$.ajax({
			type: "POST",
			url: $(this).attr("action"),
			data: form.serialize(),
			beforeSuccess: function() {
				form.find("button").prop("disabled", true);
			},
			success: function(json) {
				form.find("button").prop("disabled", false);
				if(json.error) {
					$("#form .note-status").removeClass("invisible").find(".alert").text(json.error);
				} else{
					if($(".table tbody tr").length == 0) {
						$.ajax({
						  url: "/",
						  data: {},
						  success: function(html){
							  $("#table-list").html($(html).find("#table-list").html())
						  },
						  dataType: "html"
						});
					} else {
						if($(".table tbody tr").length >= 4) {
							$(".table tbody tr").last().remove();
						}
						$("#form .note-status").addClass("invisible").find(".alert").text("");
						$(".table tbody").prepend(
							"<tr>" +
							"<td>"+values["name"]+"</td>\n" +
							"<td>"+values["email"]+"</td>\n" +
							"<td>"+values["body"]+"</td>\n" +
							"</tr>");
					}
				}
			},
			error: function (jqXHR, exception) {
				var msg = '';
				if (jqXHR.status == 500) {
					msg = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {
					msg = 'Requested JSON parse failed.';
				} else if (exception === 'timeout') {
					msg = 'Time out error.';
				} else if (exception === 'abort') {
					msg = 'Ajax request aborted.';
				} else {
					msg = 'Uncaught Error.\n' + jqXHR.responseText;
				}
				$("#form .note-status").removeClass("invisible").find(".alert").text(msg);
			},
			dataType: "json"
		});
	})
})