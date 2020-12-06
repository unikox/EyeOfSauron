<?php

namespace app\models;

/**
 * This is the model class for table "servers".
 *
 * @property int      $id
 * @property string   $name
 * @property string   $ip
 * @property string   $os
 * @property string   $location
 * @property int      $services
 * @property Services $services0
 */
class Servers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['services'], 'integer'],
            [['name', 'location'], 'string', 'max' => 32],
            [['ip'], 'string', 'max' => 16],
            [['os'], 'string', 'max' => 64],
            [['services'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['services' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'ip' => 'Ip',
            'os' => 'Os',
            'location' => 'Location',
            'services' => 'Services',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices0()
    {
        return $this->hasOne(Services::className(), ['id' => 'services']);
    }
}
