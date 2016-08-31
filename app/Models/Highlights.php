<?php

namespace App\Models;

use SimpleCrud\Table;
use Embed\Embed;

class Highlights extends Table
{
    public function dataToDatabase(array $data, $new)
    {
        if (empty($data['isEmbed'])) {
            $data['code'] = '';
        } elseif (empty($data['code'])) {
            if ($embed = Embed::create($data['url'])) {
                $data['code'] = $embed->code;
            }
        }

        return $data;
    }
}