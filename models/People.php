<?php

namespace app\models;

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
    public $image1;

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
            'name' => 'Name',
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
}
