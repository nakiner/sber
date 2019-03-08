<?php

namespace App;

use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use ElasticquentTrait;
    protected $fillable = ['name', 'description', 'counter'];

    protected $mappingProperties = array(
        'name' => [
            'type' => 'text',
            "analyzer" => "standard",
        ],
        'description' => [
            'type' => 'text',
            "analyzer" => "standard",
        ],
        'counter' => [
            'type' => 'integer'
        ],
        'created_at' => [
            'type' => 'text',
            "analyzer" => "standard",
            "fielddata"=> true,
        ],
        'updated_at' => [
            'type' => 'text',
            "analyzer" => "standard",
        ],
    );

}
