<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%admin_user}}".
 *
 * @property string $id
 * @property string $username 用户登录名
 * @property string $nickname 昵称
 * @property string $auth_key 验证
 * @property string $password_hash 密码
 * @property string $password_reset_token 密码重置令牌
 * @property int $sex 性别：0保密 1男 2女
 * @property string $email 邮箱地址
 * @property string $avatar 头像
 * @property string $guid 企业微信
 * @property string $phone 电话
 * @property int $status 状态：0停用 10启用
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class AdminUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['id', 'username', 'nickname', 'auth_key', 'guid'], 'string', 'max' => 32],
            [['password_hash'], 'string', 'max' => 64],
            [['password_reset_token', 'email', 'avatar', 'phone'], 'string', 'max' => 255],
            [['sex'], 'string', 'max' => 1],
            [['status'], 'string', 'max' => 2],
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
            'username' => Yii::t('app', 'Username'),
            'nickname' => Yii::t('app', 'Nickname'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'sex' => Yii::t('app', 'Sex'),
            'email' => Yii::t('app', 'Email'),
            'avatar' => Yii::t('app', 'Avatar'),
            'guid' => Yii::t('app', 'Guid'),
            'phone' => Yii::t('app', 'Phone'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
