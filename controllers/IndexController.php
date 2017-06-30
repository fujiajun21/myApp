<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/28
 * Time: 15:18
 */

namespace app\controllers;
use app\controllers\CommonController;

class IndexController  extends CommonController
{

    protected $except=['index'];//不需要验证 index方法
    public function actionIndex()
    {
        $this->layout='layout';


        return $this->render('index');
    }


}