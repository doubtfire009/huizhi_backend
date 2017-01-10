<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SkuList;

/**
 * SkuListSearch represents the model behind the search form about `app\models\SkuList`.
 */
class SkuListSearch extends SkuList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'base_mins', 'step_mins', 'min_nums','prod_id'], 'integer'],
            [['name'], 'safe'],
//            [['base_price', 'step_price','step_price2','step_price3','step_price4'], 'number'],
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
        $query = SkuList::find();

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
			'prod_id' => $this->prod_id,
            'base_mins' => $this->base_mins,
            'step_mins' => $this->step_mins,
            'base_price' => $this->base_price,
            'step_price' => $this->step_price,
            'min_nums' => $this->min_nums,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
