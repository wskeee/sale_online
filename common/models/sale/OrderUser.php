<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%order_user}}".
 *
 * @property string $id
 * @property string $order_id 课程ID
 * @property string $user_id 用户ID
 * @property int $privilege 权限：1只读，2编辑，10所有权
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 *
 * @property Order $order
 */
class OrderUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['order_id', 'user_id'], 'string', 'max' => 32],
            [['privilege'], 'string', 'max' => 2],
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
            'privilege' => Yii::t('app', 'Privilege'),
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
