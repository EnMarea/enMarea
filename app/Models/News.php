<?php

namespace App\Models;

use SimpleCrud\Table;
use Cocur\Slugify\Slugify;

class News extends Table
{
    public function dataToDatabase(array $data, $new)
    {
        if (isset($data['slug'])) {
        	$slugify = new Slugify();

            $data['slug'] = $slugify->slugify($data['slug']);
        }

        if (isset($data['body'])) {
        	foreach ($data['body'] as &$section) {
        		if ($section['type'] === 'image') {
        			$section['imageFile'] = $this->fields['imageFile']->dataToDatabase($section['imageFile']);
        		}
        	}
        }

        return $data;
    }
}