<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%goods_spec}}".
 *
 * @property string $id
 * @property string $model_id 商品id
 * @property string $name 规格表
 * @property int $sort_order 排序
 * @property int $is_del 是否已删除：0否 1是
 * @property string $des 描述
 */
class GoodsSpec extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_spec}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_id'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['sort_order', 'is_del'], 'string', 'max' => 1],
            [['des'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'model_id' => Yii::t('app', 'Model ID'),
            'name' => Yii::t('app', 'Name'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'is_del' => Yii::t('app', 'Is Del'),
            'des' => Yii::t('app', 'Des'),
        ];
    }
}
