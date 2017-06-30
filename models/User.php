<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/28
 * Time: 19:19
 */
namespace app\models;


use \Yii;
class User extends  myDb  implements \yii\web\IdentityInterface
{



     public  $rememberMe=true;
     public  $rePassword;

     public static function tableName()
     {
         return "{{%user}}";
     }

    public function rules()
    {
        return [
            ['email' , 'required','message'=>'邮箱不能为空','on'=>['reg','Login']],
            ['email' , 'string', 'length' => [5, 30],'on'=>['reg','Login']],
            ['password' , 'required', 'message'=>'密码不能为空','on'=>['reg','Login']],
            ['password' , 'string' ,'length' => [5, 15],'on'=>['reg','Login']],
            ['rePassword' , 'required', 'message'=>'密码不能为空','on'=>['reg']],
            ['email','email','message'=>'电子邮箱格式不正确', 'on'=>['reg']],
            ['email','unique','message'=>'电子邮箱已经被注册', 'on'=>['reg']],
            ['rePassword','compare','compareAttribute'=>'password','message'=>'两次密码不正确','on'=>['reg']],
        ];
    }

    public function Login()
    {

    }

    public function reg($data)
    {
        $this->scenario='reg';
        if($this->load($data) && $this->validate()){
            $this->loginIp=ip2long($_SERVER["REMOTE_ADDR"]);
            $this->loginTime=date('Y-m-d H:i:s',time());
            $this->password=md5($this->password);
            $mail= Yii::$app->mailer->compose('userReg',['userName'=>$this->email,'userPass'=>$this->password]);
            $mail->setFrom('18121011667@sina.cn');
            $mail->setTo($this->email);
            $mail->setSubject("博客-用户注册");
            if($mail->queue() && (bool)$this->save(false)){
                    return true;
            }

        }
        return false;
    }

    /** 调用YII USER 组件**/
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }


    public static function  findIdentityByAccessToken($token, $type = null){
        return null;
    }

    public  function  getId(){
        return $this->id;
    }
    public   function  getAuthKey(){
        return '';
    }
    public  function validateAuthKey($authKey)
    {
        return true;
    }




}