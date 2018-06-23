<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%goods}}".
 *
 * @property string $id
 * @property string $category_id 商品分类ID
 * @property string $brand_id 品牌ID
 * @property string $type_id 所属类型ID
 * @property string $style_id 风格ID
 * @property string $publisher_id
 * @property string $model_id 模型ID
 * @property string $goods_sn 商品编号
 * @property string $goods_name 商品名称
 * @property string $goods_cost 成本
 * @property string $goods_price 价格
 * @property string $goods_des 简单描述
 * @property string $goods_content 商品描述
 * @property string $cover_img 封面图
 * @property string $click_count 点击数
 * @property string $store_count 库存
 * @property string $comment_count 评论数
 * @property int $is_publish 是否发布：0否 1是
 * @property string $publish_time 发布时间
 * @property int $sort_order 排序
 * @property string $sales_sum 销量
 * @property string $created_by 创建人
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 *
 * @property Brand $brand
 * @property GoodsCategory $category
 * @property Model $model
 * @property Styles $style
 * @property GoodsType $type
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'brand_id', 'type_id', 'style_id', 'model_id', 'click_count', 'store_count', 'comment_count', 'publish_time', 'sales_sum', 'created_at', 'updated_at'], 'integer'],
            [['goods_cost', 'goods_price'], 'number'],
            [['goods_content'], 'string'],
            [['publisher_id', 'created_by'], 'string', 'max' => 32],
            [['goods_sn'], 'string', 'max' => 20],
            [['goods_name'], 'string', 'max' => 100],
            [['goods_des', 'cover_img'], 'string', 'max' => 255],
            [['is_publish'], 'string', 'max' => 1],
            [['sort_order'], 'string', 'max' => 4],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => GoodsCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => Model::className(), 'targetAttribute' => ['model_id' => 'id']],
            [['style_id'], 'exist', 'skipOnError' => true, 'targetClass' => Styles::className(), 'targetAttribute' => ['style_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => GoodsType::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'brand_id' => Yii::t('app', 'Brand ID'),
            'type_id' => Yii::t('app', 'Type ID'),
            'style_id' => Yii::t('app', 'Style ID'),
            'publisher_id' => Yii::t('app', 'Publisher ID'),
            'model_id' => Yii::t('app', 'Model ID'),
            'goods_sn' => Yii::t('app', 'Goods Sn'),
            'goods_name' => Yii::t('app', 'Goods Name'),
            'goods_cost' => Yii::t('app', 'Goods Cost'),
            'goods_price' => Yii::t('app', 'Goods Price'),
            'goods_des' => Yii::t('app', 'Goods Des'),
            'goods_content' => Yii::t('app', 'Goods Content'),
            'cover_img' => Yii::t('app', 'Cover Img'),
            'click_count' => Yii::t('app', 'Click Count'),
            'store_count' => Yii::t('app', 'Store Count'),
            'comment_count' => Yii::t('app', 'Comment Count'),
            'is_publish' => Yii::t('app', 'Is Publish'),
            'publish_time' => Yii::t('app', 'Publish Time'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'sales_sum' => Yii::t('app', 'Sales Sum'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(GoodsCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Model::className(), ['id' => 'model_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStyle()
    {
        return $this->hasOne(Styles::className(), ['id' => 'style_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(GoodsType::className(), ['id' => 'type_id']);
    }
}
