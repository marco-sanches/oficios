<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OficiosNew;

/**
 * OficiosNewSearch represents the model behind the search form of `app\models\OficiosNew`.
 */
class OficiosNewVencendo extends OficiosNew
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CodigoDaFicha', 'Prazo'], 'integer'],
            [['PrimeiroNome', 'Oficio', 'DataOficio', 'Processo', 'VaraProcesso', 'DataEntrada', 'DataExpedicao', 'NossoOficio', 'observacoes', 'Vencimento'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $hoje = date('Y-m-d', strtotime("today"));
        $semana = date('Y-m-d', strtotime("+7 Days")); 
        
        $query = OficiosNew::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
//            'CodigoDaFicha' => $this->CodigoDaFicha,
//            'DataOficio' => $this->DataOficio,
//            'DataEntrada' => $this->DataEntrada,
//            'DataExpedicao' => $this->DataExpedicao,
//            'Prazo' => $this->Prazo,
            'Vencimento' => $this->Vencimento,
        ]);

//        $query->andFilterWhere(['like', 'PrimeiroNome', $this->PrimeiroNome])
//            ->andFilterWhere(['like', 'Oficio', $this->Oficio])
//            ->andFilterWhere(['like', 'Processo', $this->Processo])
//            ->andFilterWhere(['like', 'VaraProcesso', $this->VaraProcesso])
//            ->andFilterWhere(['like', 'NossoOficio', $this->NossoOficio])
//            ->andFilterWhere(['like', 'observacoes', $this->observacoes])        
          $query->andFilterWhere(['between', 'Vencimento', $hoje, $semana]); 

        return $dataProvider;
    }
}
