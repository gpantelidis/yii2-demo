<?php

namespace app\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
    private $id;
    private $usergroups_id;
    private $name;
    private $email;
    private $mobile;
    private $create_dt;
    private $inactive;

    public function rules(){
        return[
            [['usergroups_id','name'],'required'],
            ['email', 'email','message'=>"The email isn't correct"],
            ['email', 'unique','message'=>'Email already exists!'],
            ['mobile','required'],
            ['mobile', 'match', 'pattern'=>'/^[6][0-9]{9}$/']
        ];
    }
}
