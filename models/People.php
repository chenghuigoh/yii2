<?php

namespace app\models;

use yii\base\Security;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "people".
 *
 * @property int $id
 * @property string $name
 * @property string $password
 * @property int $phone
 * @property string $email
 * @property string $address
 * @property string $image
 * @property string $auth_key
 */
class People extends \yii\db\ActiveRecord
{

    public $password_field;
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'people';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'password', 'phone', 'email', 'address', 'image'], 'required'],
            [['phone'], 'integer'],
            ['email', 'email'],
            [['name', 'password', 'email', 'address', 'image'], 'string', 'max' => 255],
            [['password_field'], 'string', 'max' => 255],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'password' => 'Password',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'image' => 'Image',
        ];
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Security::generatePasswordHash($password);
        echo "<script>console.log('true' );</script>";
        return $this->save();
    }

    public static function hashPassword($password)
    { // Function to create password hash
        $salt = "movie";
        return sha1($password . $salt);
        // return Security::generatePasswordHash($password);
    }
}
