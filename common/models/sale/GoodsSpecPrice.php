<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%goods_spec_price}}".
 *
 * @property string $id
 * @property string $goods_id 商品ID
 * @property string $goods_cost 成本
 * @property string $goods_price 价格
 * @property string $key 所有规格id：s_s_s
 * @property string $key_name 规格值:s_s_s
 * @property string $store_count 存货量
 * @property string $spec_img 图片
 * @property string $spec_szie 大小规格
 * @property string $spec_des 描述
 * @property int $sort_order 排序
 * @property int $is_del 是否已删除：0否 1是
 */
class GoodsSpecPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_spec_price}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'store_count'], 'integer'],
            [['goods_cost', 'goods_price'], 'number'],
            [['key', 'key_name'], 'string', 'max' => 100],
            [['spec_img', 'spec_szie', 'spec_des'], 'string', 'max' => 255],
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
            'goods_id' => Yii::t('app', 'Goods ID'),
            'goods_cost' => Yii::t('app', 'Goods Cost'),
            'goods_price' => Yii::t('app', 'Goods Price'),
            'key' => Yii::t('app', 'Key'),
            'key_name' => Yii::t('app', 'Key Name'),
            'store_count' => Yii::t('app', 'Store Count'),
            'spec_img' => Yii::t('app', 'Spec Img'),
            'spec_szie' => Yii::t('app', 'Spec Szie'),
            'spec_des' => Yii::t('app', 'Spec Des'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'is_del' => Yii::t('app', 'Is Del'),
        ];
    }
}
