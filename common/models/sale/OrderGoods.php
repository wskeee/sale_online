<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%order_goods}}".
 *
 * @property string $id
 * @property string $order_id 所属报价ID
 * @property string $goods_id 商品ID
 * @property string $parent_id 父级ID
 * @property string $group_id 所属分组ID
 * @property string $goods_name 商品名称
 * @property string $goods_size 商品规格
 * @property string $goods_num 商品数
 * @property string $goods_price 价格
 * @property string $goods_img 商品图片
 * @property string $cost 成本
 * @property string $rebate 折扣：0~1
 * @property int $level 层级：0顶级 1级
 * @property string $model_custom 自定义型号
 * @property string $spec_key 商品规格
 * @property string $spec_key_name 规格对应的中文名字
 * @property string $accessory_custom 自定义配件
 * @property string $accessory_key 商品配件
 * @property string $accessory_key_name 配件对应的中文名字
 * @property string $des 描述：默认为商品描述，可自定义输入
 * @property int $is_custom 是否为自定义：0否 1是
 */
class OrderGoods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'order_id', 'goods_id', 'parent_id', 'group_id', 'goods_num'], 'integer'],
            [['goods_price', 'cost', 'rebate'], 'number'],
            [['goods_name'], 'string', 'max' => 50],
            [['goods_size', 'model_custom', 'spec_key', 'spec_key_name', 'accessory_custom', 'accessory_key', 'accessory_key_name'], 'string', 'max' => 100],
            [['goods_img', 'des'], 'string', 'max' => 255],
            [['level', 'is_custom'], 'string', 'max' => 1],
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
            'goods_id' => Yii::t('app', 'Goods ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'goods_name' => Yii::t('app', 'Goods Name'),
            'goods_size' => Yii::t('app', 'Goods Size'),
            'goods_num' => Yii::t('app', 'Goods Num'),
            'goods_price' => Yii::t('app', 'Goods Price'),
            'goods_img' => Yii::t('app', 'Goods Img'),
            'cost' => Yii::t('app', 'Cost'),
            'rebate' => Yii::t('app', 'Rebate'),
            'level' => Yii::t('app', 'Level'),
            'model_custom' => Yii::t('app', 'Model Custom'),
            'spec_key' => Yii::t('app', 'Spec Key'),
            'spec_key_name' => Yii::t('app', 'Spec Key Name'),
            'accessory_custom' => Yii::t('app', 'Accessory Custom'),
            'accessory_key' => Yii::t('app', 'Accessory Key'),
            'accessory_key_name' => Yii::t('app', 'Accessory Key Name'),
            'des' => Yii::t('app', 'Des'),
            'is_custom' => Yii::t('app', 'Is Custom'),
        ];
    }
}
