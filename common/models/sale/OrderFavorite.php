<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%order_favorite}}".
 *
 * @property string $id
 * @property string $order_id 报价ID
 * @property string $user_id 用户ID
 * @property string $group 分组
 * @property int $is_del 是否已经删除：0否 1是
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 *
 * @property Order $order
 */
class OrderFavorite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_favorite}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'created_at', 'updated_at'], 'integer'],
            [['user_id'], 'string', 'max' => 32],
            [['group'], 'string', 'max' => 50],
            [['is_del'], 'string', 'max' => 1],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
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
            'user_id' => Yii::t('app', 'User ID'),
            'group' => Yii::t('app', 'Group'),
            'is_del' => Yii::t('app', 'Is Del'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
