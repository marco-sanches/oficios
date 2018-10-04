<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OficiosNewSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oficios-new-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'CodigoDaFicha') ?>

    <?= $form->field($model, 'PrimeiroNome') ?>

    <?= $form->field($model, 'Oficio') ?>

    <?= $form->field($model, 'DataOficio') ?>

    <?= $form->field($model, 'Processo') ?>

    <?php // echo $form->field($model, 'VaraProcesso') ?>

    <?php // echo $form->field($model, 'DataEntrada') ?>

    <?php // echo $form->field($model, 'DataExpedicao') ?>

    <?php // echo $form->field($model, 'NossoOficio') ?>

    <?php // echo $form->field($model, 'observacoes') ?>

    <?php // echo $form->field($model, 'Prazo') ?>

    <?php // echo $form->field($model, 'Vencimento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
