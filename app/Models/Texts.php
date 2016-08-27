<?php

namespace App\Models;

use SimpleCrud\Table;
use SimpleCrud\Fields\File;

class Texts extends Table
{
    public function dataToDatabase(array $data, $new)
    {
        $imageField = new File($this, 'imageFile');

        if (isset($data['body'])) {
        	foreach ($data['body'] as &$section) {
        		if ($section['type'] === 'image') {
        			$section['imageFile'] = $imageField->dataToDatabase($section['imageFile']);
        		}
        	}
        }

        return $data;
    }
}