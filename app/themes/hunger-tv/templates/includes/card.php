<div class="card">

	<img src="https://via.placeholder.com/360x540" alt="" />

	<div class="card__content">
		{% include 'includes/cats.twig' %}
		<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
	</div>

</div>
