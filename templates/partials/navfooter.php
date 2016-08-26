<?php $comun = $app->get('texts')['comun']; ?>

<footer class="navfooter">
	<div class="navfooter-content">
		<span class="navfooter-logo">
			<?= $this->svg('logo-enmarea-simbolo') ?>
			<strong>
				Xente común.
			</strong>
		</span>

		<nav role="navigation" class="navfooter-links">
			<ul>
				<li class="is-twitter">
					<a href="<?= $comun->rrss->twitter ?>">
						<?= $this->svg('ico-twitter') ?>
					</a>
				</li>
				<li class="is-facebook">
					<a href="<?= $comun->rrss->facebook ?>">
						<?= $this->svg('ico-facebook') ?>
					</a>
				</li>
				<li class="is-youtube">
					<a href="<?= $comun->rrss->youtube ?>">
						<?= $this->svg('ico-youtube') ?>
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