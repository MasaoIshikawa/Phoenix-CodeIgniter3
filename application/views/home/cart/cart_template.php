
<div id="page-body">
<div class="container">
<h1>My Shopping Cart</h1>

<div id="fc" class="table-responsive borderless-table">
{% set cart_is_fullpage = true %}
<div class="fc-context--cart-fullpage" data-fc-container="cart">
    {% embed 'cart.inc.twig' %}
    {% endembed %}
</div>

</div>	<!-- end table container -->

</div>
</div>
