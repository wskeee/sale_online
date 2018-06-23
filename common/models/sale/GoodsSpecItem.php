<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%goods_spec_item}}".
 *
 * @property string $id
 * @property string $spec_id 规格ID
 * @property string $value 规格
 * @property int $sort_order 排序
 * @property int $is_del 是否已删除：0否 1是
 */
class GoodsSpecItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_spec_item}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['spec_id'], 'integer'],
            [['value'], 'string', 'max' => 100],
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
            'spec_id' => Yii::t('app', 'Spec ID'),
            'value' => Yii::t('app', 'Value'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'is_del' => Yii::t('app', 'Is Del'),
        ];
    }
}
