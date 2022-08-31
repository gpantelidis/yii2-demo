<?php

namespace app\models;

use yii\db\ActiveRecord;

class Lessons extends ActiveRecord
{
    private $id;
    private $users_id;
    private $name;
    private $description;
    private $create_dt;
    private $inactive;

    public function rules(){
        return[
            [['users_id','name'],'required'],
            ['description', 'match', 'pattern'=>'/^(.{0,100})$/','message'=>'Description must be under 100 characters!']
        ];
    }
}
