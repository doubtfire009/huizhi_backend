<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSearch represents the model behind the search form about `app\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order_status', 'customer_id', 'date_created', 'order_city', 'order_zone',  'schedule_timeinfo', 'minutes_need'], 'integer'],
            [['order_no', 'order_addr', 'order_lat', 'order_lng', 'order_geohash', 'pay_way', 'schedule_date', 'final_time', 'final_shifu', 'order_note'], 'safe'],
            [['order_amt',   'payment_need', 'payment_paid'], 'number'],
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
        $query = Order::find();

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
            'order_status' => $this->order_status,
            'customer_id' => $this->customer_id,
            'date_created' => $this->date_created,
            'order_city' => $this->order_city,
            'order_zone' => $this->order_zone,
            'order_amt' => $this->order_amt,
         
            'payment_need' => $this->payment_need,
         
            'payment_paid' => $this->payment_paid,
            'schedule_timeinfo' => $this->schedule_timeinfo,
            'minutes_need' => $this->minutes_need,
        ]);

        $query->andFilterWhere(['like', 'order_no', $this->order_no])
            ->andFilterWhere(['like', 'order_addr', $this->order_addr])
            ->andFilterWhere(['like', 'order_lat', $this->order_lat])
            ->andFilterWhere(['like', 'order_lng', $this->order_lng])
            ->andFilterWhere(['like', 'order_geohash', $this->order_geohash])
  
            ->andFilterWhere(['like', 'schedule_date', $this->schedule_date])
            ->andFilterWhere(['like', 'final_time', $this->final_time])
            ->andFilterWhere(['like', 'final_shifu', $this->final_shifu])
            ->andFilterWhere(['like', 'order_note', $this->order_note]);

        return $dataProvider;
    }
}
