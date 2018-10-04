<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\OficiosNew */

$this->title = $model->CodigoDaFicha;
$this->params['breadcrumbs'][] = ['label' => 'Controle de ofícios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oficios-new-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->CodigoDaFicha], ['class' => 'btn btn-primary']) ?>
        <?= Html::button('Voltar', ['name'=>'voltar', 'class'=>'btn btn-warning', 'onclick' => "history.go(-1)"]) ?>        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'CodigoDaFicha',
            'PrimeiroNome',
            'Oficio',
            'DataOficio',
            'Processo',
            'VaraProcesso',
            'DataEntrada',
            'DataExpedicao',
            'NossoOficio',
            'observacoes:ntext',
            'Prazo',
            'Vencimento',		
        ],
    ]) ?>

</div>
