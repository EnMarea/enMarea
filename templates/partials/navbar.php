<div class="navbar">
	<div class="navbar-content">
		<a href="<?= $this->url('home') ?>" class="navbar-logo">
			<?= $this->svg('logo-enmarea') ?>
		</a>

		<nav role="navigation" class="navbar-links js-navigation">
			<ul class="is-desktop">
				<li class="is-twitter">
					<a href="#">
						<?= $this->svg('ico-twitter') ?>
					</a>
				</li>
				<li class="is-facebook">
					<a href="#">
						<?= $this->svg('ico-facebook') ?>
					</a>
				</li>
				<li class="is-youtube">
					<a href="#">
						<?= $this->svg('ico-youtube') ?>
					</a>
				</li>
				<li class="is-section">
					<a href="<?= $this->url('news') ?>"<?= $menu === 'news' ? ' class="is-actived"' : '' ?>>
						Novas
					</a>
				</li>
				<li class="is-section">
					<a href="<?= $this->url('events') ?>"<?= $menu === 'events' ? ' class="is-actived"' : '' ?>>
						Axenda
					</a>
				</li>
				<li class="is-section">
					<a href="<?= $this->url('candidates') ?>"<?= $menu === 'candidates' ? ' class="is-actived"' : '' ?>>
						Candidaturas
					</a>
				</li>
				<?php /*
				<li class="is-section">
					<a href="#">Programa</a>
				</li>
				*/ ?>
				<li class="is-section">
					<a href="#">En marea</a>
				</li>
				<li class="is-section">
					<a href="#">Repositorio</a>
				</li>
			</ul>
			<button class="navbar-toggle js-toggle">
				<?= $this->svg('ico-menu') ?>
			</button>
			<ul class="is-mobile">
				<li>
					<a href="<?= $this->url('news') ?>">
						Novas
					</a>
				</li>
				<li>
					<a href="<?= $this->url('events') ?>">
						Axenda
					</a>
				</li>
				<li>
					<a href="<?= $this->url('candidates') ?>">
						Candidaturas
					</a>
				</li>
				<?php /*
				<li>
					<a href="#">Programa</a>
				</li>
				*/ ?>
				<li>
					<a href="#">En marea</a>
				</li>
				<li>
					<a href="#">Repositorio</a>
				</li>
			</ul>
		</nav>
	</div>
</div>