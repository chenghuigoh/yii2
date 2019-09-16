<?php

namespace app\models;

use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\base\Security;

use Yii;

/**
 * This is the model class for table "people".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $phone
 * @property string $email
 * @property string $address
 * @property string $image
 * @property string $auth_key
 */
class People extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $image1;

    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['phone'], 'integer'],
            ['email', 'email'],
            [['username', 'password', 'email', 'address', 'image'], 'string', 'max' => 255],
            [['image1'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Userame',
            'password' => 'Password',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'image' => 'Image',
        ];
    }

    public function upload()
    {
        if ($this->image1) {
            $this->image1->saveAs('../uploads/people/' . $this->image1->baseName . '.' .
                $this->image1->extension);
            $this->image = $this->image1->baseName . '.' . $this->image1->extension;
            $this->image1 = null;
            echo "<script>console.log('true' );</script>";
            return $this;
        } else {
            echo "<script>console.log('false' );</script>";
            return $this;
        }
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
