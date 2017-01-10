<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Assign;

/**
 * AssignSearch represents the model behind the search form about `app\models\Assign`.
 */
class AssignSearch extends Assign
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'schedule_timeinfo', 'order_id', 'shifu_id', 'minutes'], 'integer'],
            [['schedule_date'], 'safe'],
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
        $query = Assign::find();

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
            'schedule_timeinfo' => $this->schedule_timeinfo,
            'order_id' => $this->order_id,
            'shifu_id' => $this->shifu_id,
            'minutes' => $this->minutes,
        ]);

        $query->andFilterWhere(['like', 'schedule_date', $this->schedule_date]);

        return $dataProvider;
    }
}
