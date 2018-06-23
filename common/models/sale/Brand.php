<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%brand}}".
 *
 * @property string $id
 * @property string $name 全称
 * @property string $en_name 英文名称
 * @property string $short_name 简称
 * @property string $logo logo地址
 * @property int $is_del 是否已除：0否 1是
 * @property string $des ''
 * @property int $sort_order 排序
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 *
 * @property Goods[] $goods
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%brand}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['des'], 'string'],
            [['name', 'en_name'], 'string', 'max' => 50],
            [['short_name'], 'string', 'max' => 20],
            [['logo'], 'string', 'max' => 255],
            [['is_del'], 'string', 'max' => 1],
            [['sort_order'], 'string', 'max' => 2],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'en_name' => Yii::t('app', 'En Name'),
            'short_name' => Yii::t('app', 'Short Name'),
            'logo' => Yii::t('app', 'Logo'),
            'is_del' => Yii::t('app', 'Is Del'),
            'des' => Yii::t('app', 'Des'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Goods::className(), ['brand_id' => 'id']);
    }
}
