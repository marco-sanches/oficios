<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax; 
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OficiosNewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ofícios vencendo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oficios-new-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::button('Voltar', ['name'=>'voltar', 'class'=>'btn btn-danger', 'onclick' => "history.go(-1)"]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //'layout' => "{summary}\n{items}\n{pager}",        
        'rowOptions' => function($model){if($model->CodigoDaFicha % 2 != 0) return ['class' => 'info'];},
        'pager' => ['firstPageLabel' => '|<<', 'lastPageLabel' => '>>|', 'maxButtonCount' => '5'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],            
            ['attribute' => 'CodigoDaFicha',
            'label' => 'Sequência',
            //'type' => 'raw',
            //'value' => $data->CodigoDaficha,
            'contentOptions' => ['style' => 'text-align: center;', 'style' => 'width: 70px;']
            ],
            'PrimeiroNome',
            'Oficio',
            ['attribute' => 'Processo',
            'label' => 'Processo',
            //'type' => 'raw',
            //'value' => $data->CodigoDaficha,
            'contentOptions' => ['style' => 'width: 200px;']
            ],
            ['attribute' => 'DataOficio',
            'label' => 'Data do Ofício',
            //'type' => 'raw',
            //'value' => $data->CodigoDaficha,
            'contentOptions' => ['style' => 'text-align: center;', 'style' => 'width: 70px;']
            ],                        
            //'VaraProcesso',
            //'DataEntrada',
            //'DataExpedicao',
            //'NossoOficio',
            //'observacoes:ntext',
            //'Prazo',
            ['attribute' => 'Vencimento',
            'label' => 'Vencimento',
            //'type' => 'raw',
            //'value' => $data->CodigoDaficha,
            'contentOptions' => ['style' => 'text-align: center;', 'style' => 'width: 50px;'],
            ],
            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'width: 68px;']],         
            ],
    ]); ?>        
    <?php Pjax::end(); ?>
</div>
