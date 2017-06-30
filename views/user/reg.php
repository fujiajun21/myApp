    <?php use yii\bootstrap\ActiveForm; ?>



    <?php $form= ActiveForm::begin([
        'action'=>'/user/reg',
        'options' =>[
            'class' => 'form-signin',
            'role' => 'form',
            'fieldConfig'=>['template' =>'{error}']
        ],
     ])?>
        <h2 class="form-signin-heading">请注册</h2>
        <label for="inputEmail" class="sr-only">邮箱</label>
            <input type="text" id="inputEmail" class="form-control" name="User[email]" placeholder="邮箱" required autofocus>
        <label for="inputPassword" class="sr-only">密码</label>
            <input type="password" id="inputPassword" class="form-control" name="User[password]" placeholder="请输入密码" required >
        <label class="sr-only">重复密码</label>
            <input type="password" name="User[rePassword]" class="form-control" placeholder="重复输入密码" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
    <?php ActiveForm::end();?>
