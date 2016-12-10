<?php $comun = $app->get('texts')['comun']; ?>

<div class="navbar">
	<div class="navbar-content">
		<a href="<?= $this->url('home') ?>" class="navbar-logo">
			<?= $this->svg('logo-enmarea') ?>
		</a>

		<nav role="navigation" class="navbar-links js-navigation">
			<ul class="is-desktop">
				<li class="is-rrss">
					<a href="<?= $comun->rrss->twitter->url ?>">
						<?= $this->svg('ico-twitter')->withA11y($comun->rrss->twitter->title) ?>
					</a>
					<a href="<?= $comun->rrss->facebook->url ?>">
						<?= $this->svg('ico-facebook')->withA11y($comun->rrss->facebook->title) ?>
					</a>
					<a href="<?= $comun->rrss->telegram->url ?>">
						<?= $this->svg('ico-telegram')->withA11y($comun->rrss->telegram->title) ?>
					</a>
					<a href="<?= $comun->rrss->instagram->url ?>">
						<?= $this->svg('ico-instagram')->withA11y($comun->rrss->instagram->title) ?>
					</a>
					<a href="<?= $comun->rrss->youtube->url ?>">
						<?= $this->svg('ico-youtube')->withA11y($comun->rrss->youtube->title) ?>
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
				<li class="is-section">
					<a href="<?= $this->url('program') ?>"<?= $menu === 'program' ? ' class="is-actived"' : '' ?>>
						Programa
					</a>
				</li>
				<li class="is-section">
					<a href="https://achegas.enmarea.gal">
						Achegas
					</a>
				</li>
				<li class="is-section">
					<a href="<?= $this->url('apoderadas') ?>"<?= $menu === 'apoderadas' ? ' class="is-actived"' : '' ?>>
						Apoderadas
					</a>
				</li>
				<li class="is-section">
					<a href="<?= $this->url('about') ?>"<?= $menu === 'about' ? ' class="is-actived"' : '' ?>>
						En marea
					</a>
				</li>
				<li class="is-section">
					<a href="http://congreso.enmarea.gal">
						Congreso
					</a>
				</li>
				<li class="is-section">
					<a href="<?= $this->url('repository') ?>"<?= $menu === 'repository' ? ' class="is-actived"' : '' ?>>
						Descargas
					</a>
				</li>
			</ul>
			<span class="navbar-toggle js-toggle-focus" tabindex="-1">
				<?= $this->svg('ico-menu') ?>
			</span>
			<ul class="is-mobile">
				<li class="is-rrss">
					<a href="<?= $comun->rrss->twitter->url ?>">
						<?= $this->svg('ico-twitter')->withA11y($comun->rrss->twitter->title) ?>
					</a>
					<a href="<?= $comun->rrss->facebook->url ?>">
						<?= $this->svg('ico-facebook')->withA11y($comun->rrss->facebook->title) ?>
					</a>
					<a href="<?= $comun->rrss->telegram->url ?>">
						<?= $this->svg('ico-telegram')->withA11y($comun->rrss->telegram->title) ?>
					</a>
					<a href="<?= $comun->rrss->instagram->url ?>">
						<?= $this->svg('ico-instagram')->withA11y($comun->rrss->instagram->title) ?>
					</a>
					<a href="<?= $comun->rrss->youtube->url ?>">
						<?= $this->svg('ico-youtube')->withA11y($comun->rrss->youtube->title) ?>
					</a>
				</li>
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
				<li>
					<a href="<?= $this->url('program') ?>">
						Programa
					</a>
				</li>
				<li>
					<a href="https://achegas.enmarea.gal">
						Achegas
					</a>
				</li>
				<li>
					<a href="<?= $this->url('apoderadas') ?>">
						Apoderadas
					</a>
				</li>
				<li>
					<a href="<?= $this->url('about') ?>">
						En marea
					</a>
				</li>
				<li>
					<a href="http://congreso.enmarea.gal">
						Congreso
					</a>
				</li>
				<li>
					<a href="<?= $this->url('repository') ?>">
						Descargas
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
