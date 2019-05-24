<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $name
 * @property string $protocol
 * @property int $port
 * @property string $port_range
 *
 * @property Servers[] $servers
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['port'], 'integer'],
            [['name'], 'string', 'max' => 32],
            [['protocol'], 'string', 'max' => 20],
            [['port_range'], 'string', 'max' => 11],
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
            'protocol' => 'Protocol',
            'port' => 'Port',
            'port_range' => 'Port Range',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServers()
    {
        return $this->hasMany(Servers::className(), ['services' => 'id']);
    }
}
