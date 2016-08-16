<!doctype html>
<html>
<head>
<title>Tauqeer Cart</title>
<link href="{{ config.css_file }}" rel="stylesheet" media="all">
</head>
<body>
<div id="page-body">
<div class="container">
<h1>My Shopping Cart</h1>

<div id="fc" class="table-responsive borderless-table">
{% include 'svg.inc.twig' %}
 
 {% import "utils.inc.twig" as utils %}
 {% embed 'checkout.inc.twig' %}
 {% endembed %}
</div>	<!-- end table container -->

</div>
</div>

</div>
</div>	
</body>

</html>
