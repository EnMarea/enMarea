<?php

namespace App\Models;

use SimpleCrud\Table;
use Embed\Embed;

class Highlights extends Table
{
    public function init()
    {
        $this->setRowMethod('showOnlyCode', function () {
            if (!$this->isEmbed) {
                return false;
            }

            if (strpos($this->url, 'twitter') !== false) {
                return true;
            }

            if (strpos($this->url, 'facebook') !== false) {
                return true;
            }

            if (strpos($this->url, 'instagram') !== false) {
                return true;
            }
        });
    }

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