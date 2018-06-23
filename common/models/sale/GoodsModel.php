<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%goods_model}}".
 *
 * @property string $id
 * @property string $name 模型名称
 * @property string $des 描述
 * @property int $sort_order 排序
 * @property int $is_del 是否已删除：0否 1是
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 *
 * @property GoodsAttribute[] $goodsAttributes
 */
class GoodsModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_model}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['des'], 'string', 'max' => 255],
            [['sort_order'], 'string', 'max' => 2],
            [['is_del'], 'string', 'max' => 1],
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
            'des' => Yii::t('app', 'Des'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'is_del' => Yii::t('app', 'Is Del'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodsAttributes()
    {
        return $this->hasMany(GoodsAttribute::className(), ['model_id' => 'id']);
    }
}
