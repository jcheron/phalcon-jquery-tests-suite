<div class="container">
<h1>ButtonsToolbar page</h1>
	{% for element in q %}
	{{ element }}&nbsp;
	{% endfor %}
<div id="message" class="alert alert-info"></div>
<div id="creation"></div>
</div>
{{script_foot}}