<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrderLog;

/**
 * OrderLogSearch represents the model behind the search form about `app\models\OrderLog`.
 */
class OrderLogSearch extends OrderLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order_id', 'date_created', 'customer_id', 'shifu_id', 'kefu_id'], 'integer'],
            [['event_cat', 'event', 'event_data'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = OrderLog::find();

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
            'id' => $this->id,
            'order_id' => $this->order_id,
            'date_created' => $this->date_created,
            'customer_id' => $this->customer_id,
            'shifu_id' => $this->shifu_id,
            'kefu_id' => $this->kefu_id,
        ]);

        $query->andFilterWhere(['like', 'event_cat', $this->event_cat])
            ->andFilterWhere(['like', 'event', $this->event])
            ->andFilterWhere(['like', 'event_data', $this->event_data]);

        return $dataProvider;
    }
}
