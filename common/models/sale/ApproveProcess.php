<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%approve_process}}".
 *
 * @property string $id
 * @property string $approve_id 所属审批ID
 * @property string $approver_id 审批人ID
 * @property int $approve_time 审批时间
 * @property int $result 是否通过：0否 1是
 * @property string $content 备注
 * @property int $sort_order 排序
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class ApproveProcess extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%approve_process}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'approve_id', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['approver_id'], 'string', 'max' => 32],
            [['approve_time'], 'string', 'max' => 11],
            [['result'], 'string', 'max' => 1],
            [['sort_order'], 'string', 'max' => 4],
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
            'approve_id' => Yii::t('app', 'Approve ID'),
            'approver_id' => Yii::t('app', 'Approver ID'),
            'approve_time' => Yii::t('app', 'Approve Time'),
            'result' => Yii::t('app', 'Result'),
            'content' => Yii::t('app', 'Content'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
