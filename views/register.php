<h1>Register</h1>

<?php $form =  \App\Core\Form\Form::begin('', 'post') ?>

    <?php echo $form->field($model, 'firstname') ?>
    <?php echo $form->field($model, 'lastname') ?>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password') ?>
    <?php echo $form->field($model, 'confirmPassword') ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php \App\Core\Form\Form::end() ?>
