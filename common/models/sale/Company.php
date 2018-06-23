<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%company}}".
 *
 * @property string $id
 * @property string $name 名称
 * @property string $short_name 简称
 * @property string $logo logo
 * @property int $status 状态：0停用 1试用 10 正常
 * @property string $des 描述
 * @property string $expire_time 到期时间
 * @property string $invite_code 邀请码
 * @property string $province 省
 * @property string $city 市
 * @property string $district 区
 * @property string $twon 镇
 * @property string $address 详细地址
 * @property string $location 位置
 * @property string $sort_order 排序
 * @property string $created_by 创建人
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 *
 * @property User[] $users
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%company}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['expire_time', 'province', 'city', 'district', 'twon', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['location'], 'string'],
            [['id', 'created_by'], 'string', 'max' => 32],
            [['name', 'logo', 'des', 'address'], 'string', 'max' => 255],
            [['short_name'], 'string', 'max' => 20],
            [['status'], 'string', 'max' => 1],
            [['invite_code'], 'string', 'max' => 6],
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
            'name' => Yii::t('app', 'Name'),
            'short_name' => Yii::t('app', 'Short Name'),
            'logo' => Yii::t('app', 'Logo'),
            'status' => Yii::t('app', 'Status'),
            'des' => Yii::t('app', 'Des'),
            'expire_time' => Yii::t('app', 'Expire Time'),
            'invite_code' => Yii::t('app', 'Invite Code'),
            'province' => Yii::t('app', 'Province'),
            'city' => Yii::t('app', 'City'),
            'district' => Yii::t('app', 'District'),
            'twon' => Yii::t('app', 'Twon'),
            'address' => Yii::t('app', 'Address'),
            'location' => Yii::t('app', 'Location'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['company_id' => 'id']);
    }
}
