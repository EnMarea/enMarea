<?php

namespace App\Models;

use SimpleCrud\Table;
use SimpleCrud\Fields\File;

class Texts extends Table
{
    public function dataToDatabase(array $data, $new)
    {
        $imageField = new File($this, 'imageFile');
        $fileField = new File($this, 'file');

        if (isset($data['body'])) {
            foreach ($data['body'] as &$section) {
                if (isset($section['imageFile'])) {
                    $section['imageFile'] = $imageField->dataToDatabase($section['imageFile']);
                }

                if (isset($section['file'])) {
                    $section['file'] = $fileField->dataToDatabase($section['file']);
                }
            }
        }

        return $data;
    }
}
