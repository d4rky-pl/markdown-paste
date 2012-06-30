document.addEventListener("DOMContentLoaded", function()
{
	var converter = new Showdown.converter();
	md_pre = document.getElementById("markdown");
	md_div = document.createElement("div");
	parent = md_pre.parentNode;

	md_div.innerHTML = converter.makeHtml(md_pre.innerHTML).replace( /\&amp;/g, '&');
	parent.appendChild(md_div);
	parent.removeChild(md_pre);
}, false);  
