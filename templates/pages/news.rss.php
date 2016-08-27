<?php
use Suin\RSSWriter\Feed;
use Suin\RSSWriter\Channel;
use Suin\RSSWriter\Item;

$feed = new Feed();
$channel = new Channel();
$channel
	->title('En Marea - Actualidade')
	->description('O cambio día a día')
	->url($this->url('news'))
	->language('gl')
	->pubDate(time())
	->lastBuildDate(time())
	->ttl(60)
	->appendTo($feed);

foreach ($news as $new) {
	(new Item)
		->title($new->title)
		->description($new->intro)
		->url($this->url('new', ['slug' => $new->slug]))
		->appendTo($channel);
}

echo $feed;