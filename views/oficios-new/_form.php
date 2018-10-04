<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OficiosNew */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oficios-new-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PrimeiroNome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Oficio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DataOficio')->widget(\yii\widgets\MaskedInput::className(),['mask' => '99/99/9999']) ?>

    <?= $form->field($model, 'Processo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'VaraProcesso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DataEntrada')->widget(\yii\widgets\MaskedInput::className(),['mask' => '99/99/9999']) ?>

    <?= $form->field($model, 'DataExpedicao')->widget(\yii\widgets\MaskedInput::className(),['mask' => '99/99/9999']) ?>

    <?= $form->field($model, 'NossoOficio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observacoes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Prazo')->textInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-success']) ?>
        <?= Html::button('Voltar', ['name'=>'voltar', 'class'=>'btn btn-warning', 'onclick' => "history.go(-1)"]) ?>
        <!-- adicionado o botão voltar para o gridview na mesma página que estava.
    </div>

    <?php ActiveForm::end(); ?>

</div>
