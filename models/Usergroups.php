<?php

namespace app\models;

use yii\db\ActiveRecord;

class Usergroups extends ActiveRecord
{
    private $id;
    private $name;
    private $create_dt;
    private $inactive;
    
    public function rules(){
        return[
            ['name','required'],
            ['name', 'unique','message'=>'Name already exists!'],
        ];
    }
}
