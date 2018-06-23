<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property string $id
 * @property string $company_id 所属公司ID
 * @property string $group_id 所属分组ID
 * @property string $name 报价名称
 * @property string $rebate 折扣0~1
 * @property string $price_total 总价
 * @property string $cost_total 总成本
 * @property string $des 描述
 * @property int $sale_status 状态：1进行中 2已完成 9已作废
 * @property int $approve_status 审批状态：0未通过 1通过
 * @property int $is_template 是否为模板：0否 1是
 * @property string $created_by 创建人
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 *
 * @property OrderAction[] $orderActions
 * @property OrderAttachment[] $orderAttachments
 * @property OrderFavorite[] $orderFavorites
 * @property OrderUser[] $orderUsers
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'group_id', 'created_at', 'updated_at'], 'integer'],
            [['rebate', 'price_total', 'cost_total'], 'number'],
            [['des'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['sale_status', 'approve_status'], 'string', 'max' => 4],
            [['is_template'], 'string', 'max' => 1],
            [['created_by'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'company_id' => Yii::t('app', 'Company ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'name' => Yii::t('app', 'Name'),
            'rebate' => Yii::t('app', 'Rebate'),
            'price_total' => Yii::t('app', 'Price Total'),
            'cost_total' => Yii::t('app', 'Cost Total'),
            'des' => Yii::t('app', 'Des'),
            'sale_status' => Yii::t('app', 'Sale Status'),
            'approve_status' => Yii::t('app', 'Approve Status'),
            'is_template' => Yii::t('app', 'Is Template'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderActions()
    {
        return $this->hasMany(OrderAction::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderAttachments()
    {
        return $this->hasMany(OrderAttachment::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderFavorites()
    {
        return $this->hasMany(OrderFavorite::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderUsers()
    {
        return $this->hasMany(OrderUser::className(), ['order_id' => 'id']);
    }
}
