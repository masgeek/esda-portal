<?php

namespace app\modules\user\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\user\models\UserProfile;

/**
 * ProfileSearch represents the model behind the search form about `app\modules\user\models\UserProfile`.
 */
class ProfileSearch extends UserProfile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'ACCOUNT_STATUS'], 'integer'],
            [['USER_NAME', 'EMAIL_ADDRESS', 'SURNAME', 'OTHER_NAMES', 'PHONE_NUMBER', 'DATE_REGISTERED', 'DATE_UPDATED'], 'safe'],
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
        $query = UserProfile::find();

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
            'USER_ID' => $this->USER_ID,
            'ACCOUNT_STATUS' => $this->ACCOUNT_STATUS,
            'DATE_REGISTERED' => $this->DATE_REGISTERED,
            'DATE_UPDATED' => $this->DATE_UPDATED,
        ]);

        $query->andFilterWhere(['like', 'USER_NAME', $this->USER_NAME])
            ->andFilterWhere(['like', 'EMAIL_ADDRESS', $this->EMAIL_ADDRESS])
            ->andFilterWhere(['like', 'SURNAME', $this->SURNAME])
            ->andFilterWhere(['like', 'OTHER_NAMES', $this->OTHER_NAMES])
            ->andFilterWhere(['like', 'PHONE_NUMBER', $this->PHONE_NUMBER]);

        return $dataProvider;
    }
}
