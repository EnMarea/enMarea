<?php $comun = $app->get('texts')['comun']; ?>

<footer class="navfooter">
	<div class="navfooter-content">
		<span class="navfooter-logo">
			<?= $this->svg('logo-enmarea-simbolo') ?>
			<strong>
				Hai marea!
			</strong>
		</span>

		<nav role="navigation" class="navfooter-links">
			<ul>
				<li class="is-twitter">
					<a href="<?= $comun->rrss->twitter->url ?>">
						<?= $this->svg('ico-twitter')->withA11y($comun->rrss->twitter->title) ?>
					</a>
				</li>
				<li class="is-facebook">
					<a href="<?= $comun->rrss->facebook->url ?>">
						<?= $this->svg('ico-facebook')->withA11y($comun->rrss->facebook->title) ?>
					</a>
				</li>
				<li class="is-telegram">
					<a href="<?= $comun->rrss->telegram->url ?>">
						<?= $this->svg('ico-telegram')->withA11y($comun->rrss->telegram->title) ?>
					</a>
				</li>
				<li class="is-youtube">
					<a href="<?= $comun->rrss->youtube->url ?>">
						<?= $this->svg('ico-youtube')->withA11y($comun->rrss->youtube->title) ?>
					</a>
				</li>
				<li class="is-section">
					<a href="<?= $this->url('contact') ?>">
						Contacto
					</a>
				</li>
				<li class="is-section">
					<a href="<?= $this->url('privacy') ?>">
						Privacidade
					</a>
				</li>
			</ul>
		</nav>
	</div>
</footer>