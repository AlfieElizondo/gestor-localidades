<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_estatus".
 *
 * @property string $id_estatus
 * @property string $id_localidad
 * @property string $txt_estatus
 * @property string $fch_creacion
 *
 * @property EntLocalidades $localidad
 */
class EntEstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_estatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_localidad', 'txt_estatus'], 'required'],
            [['id_localidad'], 'integer'],
            [['txt_estatus'], 'string'],
            [['fch_creacion'], 'safe'],
            [['id_localidad'], 'exist', 'skipOnError' => true, 'targetClass' => EntLocalidades::className(), 'targetAttribute' => ['id_localidad' => 'id_localidad']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estatus' => 'Id Estatus',
            'id_localidad' => 'Id Localidad',
            'txt_estatus' => 'Estatus',
            'fch_creacion' => 'Fch Creacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalidad()
    {
        return $this->hasOne(EntLocalidades::className(), ['id_localidad' => 'id_localidad']);
    }
}
