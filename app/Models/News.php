<?php

namespace App\Models;

use SimpleCrud\Table;
use SimpleCrud\Fields\File;
use Cocur\Slugify\Slugify;

class News extends Table
{
    public function dataToDatabase(array $data, $new)
    {
        if (isset($data['slug'])) {
            $slugify = new Slugify();

            $data['slug'] = $slugify->slugify($data['slug']);
        }

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
