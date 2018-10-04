<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OficiosNew */

$this->title = 'alterar registro ' . $model->CodigoDaFicha;
$this->params['breadcrumbs'][] = ['label' => 'Controle de ofícios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CodigoDaFicha, 'url' => ['view', 'id' => $model->CodigoDaFicha]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="oficios-new-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
