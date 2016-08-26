<li class="event is-minilist">
	<time class="event-time"><?= $event->hour ?></time>

	<address class="event-address">
		<strong class="event-person"><?= $event->person ?></strong>
		<p>
			<strong><?= $event->city ?></strong>, <?= $event->place ?>
		</p>
	</address>
</li>