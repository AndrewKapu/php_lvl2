{% extends "layouts/twigMain.php" %}
{% block content %}
<div class='wrapper' style='display: flex ;justify-content: space-around'>
    {% for product in products %}
    <div class='product-wrapper' style='border: 1px solid blue'><h1>{{ product.name }}</h1>
<p>{{ product.description }}</p></div>
    {% endfor %}
</div>
{% endblock %}

