<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%order_action}}".
 *
 * @property string $id
 * @property string $order_id 报价ID
 * @property string $action 动作
 * @property string $title 标题
 * @property string $content 内容
 * @property string $created_by 操作者
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 *
 * @property Order $order
 */
class OrderAction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_action}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'created_at', 'updated_at'], 'integer'],
            [['action', 'title'], 'string', 'max' => 50],
            [['content'], 'string', 'max' => 500],
            [['created_by'], 'string', 'max' => 32],
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
            'action' => Yii::t('app', 'Action'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'created_by' => Yii::t('app', 'Created By'),
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
