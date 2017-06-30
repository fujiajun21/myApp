<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/28
 * Time: 15:23
 */

namespace app\controllers;
use yii\web\Controller;

class CommonController  extends Controller
{

    protected $actions=['*'];
    protected $except = [];
    protected $UnMustLogin = [];
    protected $mustLogin = [];
    protected $verbs = [];


    public function behaviors()
    {
        return [
            'access'=>[
                'class' => \yii\filters\AccessControl::className(),
                'only'  => $this->actions,//所需要验证的方法 * 为全部
                'except'=> $this->except,
                'rules' =>[
                    [
                        'allow' => false,
                        'actions' => empty($this->UnMustLogin) ? [] : $this->UnMustLogin,
                        'roles' =>['?']
                    ],
                    [
                        'allow' => true,//登录之后有权
                        'actions' =>empty($this->mustLogin) ? [] : $this->mustLogin,
                        'roles' =>['@'] //登录以后
                    ]
                ]
            ]

        ];


    }




}