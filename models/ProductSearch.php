<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'line_id', 'city_id', 'cat_id', 'date_created', 'status'], 'integer'],
            [['title', 'content', 'logo', 'brand_list', 'sku_list', 'time_list'], 'safe'],
            [['old_price', 'price'], 'number'],
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
        $query = Product::find();

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
            'line_id' => $this->line_id,
            'city_id' => $this->city_id,
            'cat_id' => $this->cat_id,
            'old_price' => $this->old_price,
            'price' => $this->price,
            'date_created' => $this->date_created,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'brand_list', $this->brand_list])
            ->andFilterWhere(['like', 'sku_list', $this->sku_list])
            ->andFilterWhere(['like', 'time_list', $this->time_list]);

        return $dataProvider;
    }
}
