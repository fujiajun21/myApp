<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/28
 * Time: 20:57
 */

namespace app\models;


use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
class myDb extends ActiveRecord
{




    //behaviors — 使用行为 在这里的意思为在添加修改之前 对  createTime updateTime fuzhi
    public function behaviors()
    {
        return [
            [
                'class'=>TimestampBehavior::className(),
                'createdAtAttribute'=>'createTime',
                'updatedAtAttribute'=>'updateTime',
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT=>['createTime','updateTime'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updateTime'],
                ]
            ]
        ];
    }

}