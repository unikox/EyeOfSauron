<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserRequest;

/**
 * UserRequestSearch represents the model behind the search form of `app\models\UserRequest`.
 */
class UserRequestSearch extends UserRequest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'cloused_at', 'cat_request', 'status', 'quality_mark'], 'integer'],
            [['applicant', 'body', 'tel', 'email'], 'safe'],
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
        $query = UserRequest::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'cloused_at' => $this->cloused_at,
            'cat_request' => $this->cat_request,
            'status' => $this->status,
            'quality_mark' => $this->quality_mark,
        ]);

        $query->andFilterWhere(['like', 'applicant', $this->applicant])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
