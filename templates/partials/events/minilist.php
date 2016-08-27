<li class="event is-minilist" data-folk="events,<?= $event->id ?>">
	<time class="event-time"><?= $event->hour ?></time>

	<address class="event-address">
		<strong class="event-person"><?= implode('</strong>, <strong class="event-person">', explode(',', $event->person)) ?></strong>
		<p>
			<strong><?= $event->city ?></strong>, <?= $event->place ?>
		</p>
	</address>
</li>