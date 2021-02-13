<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_request".
 *
 * @property int $id
 * @property string|null $applicant
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $cloused_at
 * @property int|null $cat_request
 * @property string|null $body
 * @property int|null $status
 * @property int|null $quality_mark
 * @property string|null $tel
 * @property string|null $email
 *
 * @property UserRequestCat $catRequest
 */
class UserRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'cloused_at', 'cat_request', 'status', 'quality_mark'], 'integer'],
            [['body'], 'string'],
            [['applicant', 'tel', 'email'], 'string', 'max' => 255],
            [['cat_request'], 'exist', 'skipOnError' => true, 'targetClass' => UserRequestCat::className(), 'targetAttribute' => ['cat_request' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'applicant' => 'Applicant',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'cloused_at' => 'Cloused At',
            'cat_request' => 'Cat Request',
            'body' => 'Body',
            'status' => 'Status',
            'quality_mark' => 'Quality Mark',
            'tel' => 'Tel',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[CatRequest]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatRequest()
    {
        return $this->hasOne(UserRequestCat::className(), ['id' => 'cat_request']);
    }
}
