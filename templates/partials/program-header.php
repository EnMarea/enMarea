<div class="page-header-container">
	<header>
		<h1>
			<a href="<?= $this->url('program') ?>">
				Programa
			</a>
		</h1>
	</header>

	<nav class="page-navigation-main">
		<?php foreach ($blocks as $val): ?>
		<a href="<?= $this->url('program-block', ['block' => $val->slug]) ?>"<?= $val->id === $block->id ? ' class="is-active"' : '' ?>>
			<?= $val->title ?>
		</a>
		<?php endforeach ?>
	</nav>
</div>