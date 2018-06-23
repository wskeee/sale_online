<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%order_goods_group}}".
 *
 * @property string $id
 * @property string $order_id 报价ID
 * @property string $name 分组名称
 * @property string $price_total 分组总价
 * @property int $is_del 是否已删除
 * @property string $created_at 创建时间
 * @property string $updaed_at 更新时间
 */
class OrderGoodsGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_goods_group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'order_id', 'created_at', 'updaed_at'], 'integer'],
            [['price_total'], 'number'],
            [['name'], 'string', 'max' => 50],
            [['is_del'], 'string', 'max' => 1],
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
            'order_id' => Yii::t('app', 'Order ID'),
            'name' => Yii::t('app', 'Name'),
            'price_total' => Yii::t('app', 'Price Total'),
            'is_del' => Yii::t('app', 'Is Del'),
            'created_at' => Yii::t('app', 'Created At'),
            'updaed_at' => Yii::t('app', 'Updaed At'),
        ];
    }
}
