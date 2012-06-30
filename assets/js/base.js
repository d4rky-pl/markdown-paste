document.addEventListener("DOMContentLoaded", function()
{
	var template = document.getElementById("template");
	var path = template.href.replace(/\/([^\/]*)\.css$/, '');
	var selector = document.getElementById("style");

	var cookie_template = cookie.get('template');
	if(typeof cookie_template != "undefined")
	{
		template.href = path + "/" + cookie_template;
		selector.value = cookie_template;
	}

	selector.addEventListener("change", function()
	{
		template.href = path + "/" + this.value;
		cookie.set('template', this.value);
	}, false);

}, false);  
