<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_request_cat".
 *
 * @property int $id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $cat_name
 * @property int|null $parent_id
 *
 * @property UserRequestCat $parent
 * @property UserRequestCat[] $userRequestCats
 */
class UserRequestCat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_request_cat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'parent_id'], 'integer'],
            [['cat_name'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRequestCat::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'cat_name' => 'Cat Name',
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(UserRequestCat::className(), ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[UserRequestCats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserRequestCats()
    {
        return $this->hasMany(UserRequestCat::className(), ['parent_id' => 'id']);
    }
}
