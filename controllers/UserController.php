<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/28
 * Time: 19:28
 */

namespace app\controllers;
use \Yii;

//use app\controllers\CommonController;
use app\models\User;
use myMailer\mailerqueue\MailerQueue;
class UserController extends  CommonController
{
         protected $except=['*'];//不需要验证 index方法
        //注册
        public function actionReg()
        {
            $m=new MailerQueue;

            $m->process();
            exit;
            $this->layout='layout_user';
            $model=new User;
            if(Yii::$app->request->isPost ) //&& $model->reg()
            {
                if($model->reg(Yii::$app->request->post())){
                    return $this->goBack(Yii::$app->request->referrer);
                }else{
                    if(sizeof($model->getErrors()) > 0){
                        foreach($model->getErrors() as  $error){
                            Yii::$app->session->setFlash('error','抱歉！注册失败'.$error['0']);
                        }
                    }
                    return $this->goBack(Yii::$app->request->referrer);
                }
                //$model->getErrors()
                //Yii::$app->request->referrer
            }
            return $this->render('reg',['model'=>$model]);
        }


        //登录
        public function actionLogin()
        {
            $this->layout='layout_user';
            $model=new User;
            if(Yii::$app->request->isPost)
            {
                return $this->goHome();
            }
            return $this->render('index',['model'=>$model]);

        }


}