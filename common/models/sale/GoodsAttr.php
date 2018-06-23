<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%goods_attr}}".
 *
 * @property string $id id
 * @property string $goods_id 商品id
 * @property string $attr_id 属性id
 * @property string $value 属性值,用','分隔项
 * @property int $sort_order 排序
 * @property int $is_del 是否删除：0否 1是
 *
 * @property Attribute $attr
 */
class GoodsAttr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_attr}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'attr_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['sort_order', 'is_del'], 'string', 'max' => 1],
            [['attr_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attribute::className(), 'targetAttribute' => ['attr_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'goods_id' => Yii::t('app', 'Goods ID'),
            'attr_id' => Yii::t('app', 'Attr ID'),
            'value' => Yii::t('app', 'Value'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'is_del' => Yii::t('app', 'Is Del'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttr()
    {
        return $this->hasOne(Attribute::className(), ['id' => 'attr_id']);
    }
}
