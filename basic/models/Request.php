<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_car
 * @property string $marka
 * @property int $engine_volume
 * @property string $create_date
 * @property string $carcase
 *
 * @property Car $car
 * @property User $user
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_car', 'marka', 'engine_volume', 'create_date', 'carcase'], 'required'],
            [['id_user', 'id_car', 'engine_volume'], 'integer'],
            [['create_date'], 'safe'],
            [['marka', 'carcase'], 'string', 'max' => 255],
            [['id_car'], 'exist', 'skipOnError' => true, 'targetClass' => Car::class, 'targetAttribute' => ['id_car' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_car' => 'Марка машины',
            'marka' => 'Модель машины',
            'engine_volume' => 'Мощность двигателя',
            'create_date' => 'Дата выпуска',
            'carcase' => 'Кузов',
        ];
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::class, ['id' => 'id_car']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
