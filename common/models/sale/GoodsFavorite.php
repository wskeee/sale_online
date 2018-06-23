<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%goods_favorite}}".
 *
 * @property string $id
 * @property string $goods_id 商品ID
 * @property string $user_id 用户ID
 * @property string $group 分组
 * @property int $is_del 是否删除：0否 1是
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class GoodsFavorite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_favorite}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'created_at', 'updated_at'], 'integer'],
            [['user_id'], 'string', 'max' => 32],
            [['group'], 'string', 'max' => 50],
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
            'user_id' => Yii::t('app', 'User ID'),
            'group' => Yii::t('app', 'Group'),
            'is_del' => Yii::t('app', 'Is Del'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
