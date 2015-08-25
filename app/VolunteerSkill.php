<?php

namespace App;

use Conner\Tagging\TaggableTrait;
use Illuminate\Database\Eloquent\Model;

class VolunteerSkill extends Model {

    use TaggableTrait;

    public function tags() {
        return $this->morphToMany('App\Tag', 'taggable');
    }

}
