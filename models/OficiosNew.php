<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oficios_new".
 *
 * @property string $CodigoDaFicha
 * @property string $PrimeiroNome
 * @property string $Oficio
 * @property string $DataOficio
 * @property string $Processo
 * @property string $VaraProcesso
 * @property string $DataEntrada
 * @property string $DataExpedicao
 * @property string $NossoOficio
 * @property string $observacoes
 * @property int $Prazo
 * @property string $Vencimento
 */
class OficiosNew extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oficios_new';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Oficio', 'DataOficio', 'DataEntrada', 'DataExpedicao', 'NossoOficio', 'Prazo'], 'required'],
            [['DataOficio', 'DataEntrada', 'DataExpedicao', 'Vencimento'], 'safe'],
            [['observacoes'], 'string'],
            [['Prazo'], 'integer'],
            [['PrimeiroNome'], 'string', 'max' => 100],
            [['Oficio', 'Processo', 'VaraProcesso', 'NossoOficio'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CodigoDaFicha' => 'Sequência',
            'PrimeiroNome' => 'Nome',
            'Oficio' => 'Oficio',
            'DataOficio' => 'Data do Oficio',
            'Processo' => 'Processo',
            'VaraProcesso' => 'Vara do Processo',
            'DataEntrada' => 'Data da Entrada',
            'DataExpedicao' => 'Data da Expedicao',
            'NossoOficio' => 'Número Nosso Oficio',
            'observacoes' => 'Observações',
            'Prazo' => 'Prazo',
            'Vencimento' => 'Vencimento',
        ];
    }
    
    public function afterFind()
    {
        parent::afterFind();
        $this->DataOficio = Yii::$app->formatter->asDatetime($this->DataOficio, 'dd/MM/yyyy');
        $this->DataEntrada = Yii::$app->formatter->asDatetime($this->DataEntrada, 'dd/MM/yyyy');
        $this->DataExpedicao = Yii::$app->formatter->asDatetime($this->DataExpedicao, 'dd/MM/yyyy');
        $this->Vencimento = Yii::$app->formatter->asDatetime($this->Vencimento, 'dd/MM/yyyy');
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert))
        {
        $this->DataOficio = Yii::$app->formatter->asDate(str_replace('/','-', $this->DataOficio), 'php:Y-m-d');
        $this->DataEntrada = Yii::$app->formatter->asDate(str_replace('/','-',$this->DataEntrada), 'php:Y-m-d');
        $this->DataExpedicao = Yii::$app->formatter->asDate(str_replace('/','-',$this->DataExpedicao), 'php:Y-m-d');        
        $this->Vencimento = date_format(date_add(date_create(str_replace('/','-',$this->DataEntrada)),
                date_interval_create_from_date_string($this->Prazo .  " days")),'Y-m-d');
        return true;
        } else {
        return false;
        }
    }
}
