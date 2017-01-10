<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MinutesRes;

/**
 * MinutesResSearch represents the model behind the search form about `app\models\MinutesRes`.
 */
class MinutesResSearch extends MinutesRes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'line_id', 'minutes_morning', 'minutes_afternoon', 'minutes_night', 'minutes_allday'], 'integer'],
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
        $query = MinutesRes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => '15',
         ],
            'sort' => [
        'defaultOrder' => [
            'id' => SORT_DESC,            
        ]
                ]
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
            'line_id' => $this->line_id,
            'minutes_morning' => $this->minutes_morning,
            'minutes_afternoon' => $this->minutes_afternoon,
            'minutes_night' => $this->minutes_night,
            'minutes_allday' => $this->minutes_allday,
        ]);

        $query->andFilterWhere(['like', 'work_date', $this->work_date]);

        return $dataProvider;
    }
}
