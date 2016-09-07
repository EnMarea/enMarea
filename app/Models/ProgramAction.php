<?php

namespace App\Models;

use SimpleCrud\Table;
use Cocur\Slugify\Slugify;

class ProgramAction extends Table
{
    public function dataToDatabase(array $data, $new)
    {
        if (isset($data['slug'])) {
            $slugify = new Slugify();

            $data['slug'] = $slugify->slugify($data['slug']);
        }

        return $data;
    }
}
