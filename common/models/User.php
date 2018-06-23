<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property string $id
* @property string $company_id 所属客户id
* @property string $group_id 所属分组
* @property string $username 用户名
* @property string $nickname 昵称或者真实名称
* @property string $en_name 英文名
* @property int $type 用户类型：1普通员工
* @property string $password_hash 密码
* @property string $password_reset_token 密码重置口令
* @property int $sex 姓别：0保密 1男 2女
* @property string $phone 电话
* @property string $email 邮箱
* @property string $avatar 头像
* @property int $status 状态：0 停用 10启用
* @property string $des ''
* @property string $auth_key 认证
* @property string $province 省
* @property string $city 城市
* @property string $district 区
* @property string $twon 镇
* @property string $address 详细地址
* @property string $entry_time 入职时间
* @property string $access_token 访问令牌
* @property string $access_token_expire_time 访问令牌到期时间
* @property string $created_at 创建时间
* @property string $updated_at 更新时间
*
* @property Company $company
* @property UserGroup $group
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['id', 'username', 'password_hash'], 'required'],
            [['des'], 'string'],
            [['province', 'city', 'district', 'twon', 'entry_time', 'access_token_expire_time', 'created_at', 'updated_at'], 'integer'],
            [['id', 'company_id', 'group_id', 'auth_key'], 'string', 'max' => 32],
            [['username', 'nickname', 'en_name', 'phone'], 'string', 'max' => 50],
            [['type', 'sex'], 'string', 'max' => 1],
            [['password_hash'], 'string', 'max' => 64],
            [['password_reset_token', 'email', 'avatar', 'address', 'access_token'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 2],
            [['id'], 'unique'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }
    
    public function attributeLabels(){
        return [
            'id' => Yii::t('app', 'ID'),
            'company_id' => Yii::t('app', 'Company ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'username' => Yii::t('app', 'Username'),
            'nickname' => Yii::t('app', 'Nickname'),
            'en_name' => Yii::t('app', 'En Name'),
            'type' => Yii::t('app', 'Type'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'sex' => Yii::t('app', 'Sex'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'avatar' => Yii::t('app', 'Avatar'),
            'status' => Yii::t('app', 'Status'),
            'des' => Yii::t('app', 'Des'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'province' => Yii::t('app', 'Province'),
            'city' => Yii::t('app', 'City'),
            'district' => Yii::t('app', 'District'),
            'twon' => Yii::t('app', 'Twon'),
            'address' => Yii::t('app', 'Address'),
            'entry_time' => Yii::t('app', 'Entry Time'),
            'access_token' => Yii::t('app', 'Access Token'),
            'access_token_expire_time' => Yii::t('app', 'Access Token Expire Time'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    /**
    * 公司
    * @return \yii\db\ActiveQuery
    */
   public function getCompany()
   {
       return $this->hasOne(Company::className(), ['id' => 'company_id']);
   }
   /**
    * 分组
    * @return \yii\db\ActiveQuery
    */
   public function getGroup()
   {
       return $this->hasOne(UserGroup::className(), ['id' => 'group_id']);
   }
}
