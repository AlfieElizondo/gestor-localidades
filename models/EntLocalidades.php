<?php

namespace app\models;

use Yii;
use app\modules\ModUsuarios\models\EntUsuarios;

/**
 * This is the model class for table "ent_localidades".
 *
 * @property string $id_localidad
 * @property string $id_estado
 * @property string $id_usuario
 * @property string $txt_token
 * @property string $txt_nombre
 * @property string $txt_arrendador
 * @property string $txt_beneficiario
 * @property string $txt_calle
 * @property string $txt_colonia
 * @property string $txt_municipio
 * @property string $txt_cp
 * @property string $txt_estatus
 * @property string $txt_antecedentes
 * @property double $num_renta_actual
 * @property double $num_incremento_autorizado
 * @property string $fch_vencimiento_contratro
 * @property string $fch_creacion
 * @property string $fch_asignacion
 * @property string $b_problemas_acceso
 * @property string $b_archivada
 *
 * @property CatEstados $estado
 * @property ModUsuariosEntUsuarios $usuario
 * @property WrkTareas[] $wrkTareas
 */
class EntLocalidades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_localidades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estado', 'id_usuario', 'txt_token', 'txt_nombre', 'txt_arrendador', 'txt_beneficiario'], 'required'],
            [['id_estado', 'id_usuario', 'b_problemas_acceso', 'b_archivada'], 'integer'],
            [['txt_estatus', 'txt_antecedentes'], 'string'],
            [['num_renta_actual', 'num_incremento_autorizado'], 'number'],
            [['fch_vencimiento_contratro', 'fch_creacion', 'fch_asignacion'], 'safe'],
            [['txt_token'], 'string', 'max' => 70],
            [['txt_nombre', 'txt_arrendador', 'txt_beneficiario', 'txt_calle', 'txt_colonia', 'txt_municipio'], 'string', 'max' => 150],
            [['txt_cp'], 'string', 'max' => 5],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => CatEstados::className(), 'targetAttribute' => ['id_estado' => 'id_estado']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => EntUsuarios::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_localidad' => 'Id Localidad',
            'id_estado' => 'Estado',
            'id_usuario' => 'Usuario',
            'txt_token' => 'Txt Token',
            'txt_nombre' => 'Nombre localidad',
            'txt_arrendador' => 'Arrendador',
            'txt_beneficiario' => 'Beneficiario',
            'txt_calle' => 'Calle',
            'txt_colonia' => 'Colonia',
            'txt_municipio' => 'Municipio',
            'txt_cp' => 'Codigo postal',
            'txt_estatus' => 'Estatus',
            'txt_antecedentes' => 'Antecedentes',
            'num_renta_actual' => 'Num Renta Actual',
            'num_incremento_autorizado' => 'Num Incremento Autorizado',
            'fch_vencimiento_contratro' => 'Fecha Vencimiento Contratro',
            'fch_creacion' => 'Fecha Creacion',
            'fch_asignacion' => 'Fecha Asignacion',
            'b_problemas_acceso' => 'Problemas Acceso',
            'b_archivada' => 'Archivada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(CatEstados::className(), ['id_estado' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(ModUsuariosEntUsuarios::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWrkTareas()
    {
        return $this->hasMany(WrkTareas::className(), ['id_localidad' => 'id_localidad']);
    }
}