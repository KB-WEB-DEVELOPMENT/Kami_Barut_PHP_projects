$(document).ready(function($)	{
	
	var div = document.createElement("div");

	// neues div für dialog Variable

	div.setAttribute("id","addcommentdialog");

	var body = document.getElementByTagName("body").item(0);

	// neues div auf Seite hingefügt

	body.appendChild(div);

	// dialog Initializierung

	$dialog = $("#addcommentdialog").html("").dialog({

		modal:false,
		autoOpen:false,
		show:"slide";
		hide:"slide"
	});

});

function addCommentDialog(movieid, moviename)	{

	$dialog.dialog("option","title", "Add comment for movie");
	$dialog.dialog("option","width", 500);
	$dialog.dialog("option","height", 400);
	$dialog.load("add_comment.php?id="+movieid+"&moviename="+moviename);
	$dialog.dialog("open");
	return false;

}

function closedialog()	{

	$("#addcommentdialog").dialog("close");

}

function submitcomment()	{

	var callback="processcomment.php";
	$.post(callback.$("#commentform").serialize(), function(data)	{

	});

closedialog();

}
