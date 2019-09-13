<?php

namespace app\models;

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
 */
class People extends \yii\db\ActiveRecord
{
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
            [['name', 'password', 'phone', 'email', 'address','image'], 'required'],
            [['phone'], 'integer'],
            ['email', 'email'],
            [['name', 'password', 'email', 'address', 'image'], 'string', 'max' => 255],
       
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


}
