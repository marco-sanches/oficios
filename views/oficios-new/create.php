<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OficiosNew */

$this->title = 'Novo Registro';
$this->params['breadcrumbs'][] = ['label' => 'Controle de Ofícios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oficios-new-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
