<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%goods_category}}".
 *
 * @property string $id
 * @property string $name 分类名称
 * @property string $mobile_name 手机端名称
 * @property int $level 等级：0顶级 1~3
 * @property string $path 继承路径
 * @property string $parent_id 父级id
 * @property string $created_by 创建者
 * @property int $sort_order 排序
 * @property string $image 图标路径
 * @property int $is_show 是否显示
 * @property string $des 描述
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 *
 * @property Goods[] $goods
 */
class GoodsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'mobile_name'], 'string', 'max' => 50],
            [['level', 'is_show'], 'string', 'max' => 1],
            [['path', 'image', 'des'], 'string', 'max' => 255],
            [['created_by'], 'string', 'max' => 32],
            [['sort_order'], 'string', 'max' => 2],
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
            'mobile_name' => Yii::t('app', 'Mobile Name'),
            'level' => Yii::t('app', 'Level'),
            'path' => Yii::t('app', 'Path'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'created_by' => Yii::t('app', 'Created By'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'image' => Yii::t('app', 'Image'),
            'is_show' => Yii::t('app', 'Is Show'),
            'des' => Yii::t('app', 'Des'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Goods::className(), ['category_id' => 'id']);
    }
}
