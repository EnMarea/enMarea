<li class="event is-list">
	<time class="event-time"><?= $event->hour ?></time>

	<div class="event-content">
		<address class="event-address">
			<strong class="event-person"><?= implode('</strong>, <strong class="event-person">', explode(',', $event->person)) ?></strong>
			<p>
				<strong><?= $event->city ?></strong>, <?= $event->place ?>
			</p>
		</address>

		<?php if (!empty($event->intro)): ?>
		<div class="event-intro">
			<?= $event->intro ?>
		</div>
		<?php endif ?>
	</div>
</li>