<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SfMinute;

/**
 * SfMinuteSearch represents the model behind the search form about `app\models\SfMinute`.
 */
class SfMinuteSearch extends SfMinute
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'shifu_id', 'allocated_minutes'], 'integer'],
            [['work_date'], 'safe'],
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
        $query = SfMinute::find();

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
            'shifu_id' => $this->shifu_id,
            'allocated_minutes' => $this->allocated_minutes,
        ]);

        $query->andFilterWhere(['like', 'work_date', $this->work_date]);

        return $dataProvider;
    }
}
