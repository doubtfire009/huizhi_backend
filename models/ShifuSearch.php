<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Shifu;

/**
 * ShifuSearch represents the model behind the search form about `app\models\Shifu`.
 */
class ShifuSearch extends Shifu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'city', 'work_status', 'total_jobs', 'avg_score', 'avg_ontime', 'avg_cloth', 'avg_intro', 'avg_clean', 'date_created'], 'integer'],
            [['mobile', 'name', 'sex', 'idcard', 'birthday', 'zone', 'address', 'skills_all', 'skills',  'join_date', 'leave_date'], 'safe'],
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
        $query = Shifu::find();

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
            'birthday' => $this->birthday,
            'city' => $this->city,
            'work_status' => $this->work_status,
            'total_jobs' => $this->total_jobs,
            'avg_score' => $this->avg_score,
            'avg_ontime' => $this->avg_ontime,
            'avg_cloth' => $this->avg_cloth,
            'avg_intro' => $this->avg_intro,
            'avg_clean' => $this->avg_clean,
            'date_created' => $this->date_created,
            'join_date' => $this->join_date,
            'leave_date' => $this->leave_date,
        ]);

        $query->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'idcard', $this->idcard])
            ->andFilterWhere(['like', 'zone', $this->zone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'skills_all', $this->skills_all])
            ->andFilterWhere(['like', 'skills', $this->skills]);
         

        return $dataProvider;
    }
}
