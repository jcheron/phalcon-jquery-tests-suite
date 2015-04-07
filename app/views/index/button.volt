<div class="container">
<h1>Button page</h1>
	{% for element in q %}
	{{ element }}&nbsp;
	{% endfor %}
<div id="message" class="alert alert-info"></div>
</div>
{{script_foot}}