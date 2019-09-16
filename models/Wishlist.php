<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "wishlist".
 *
 * @property int $id
 * @property int $movie_id
 * @property int $user_id
 *
 * @property User $id0
 */
class Wishlist extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wishlist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['movie_id', 'user_id'], 'required'],
            [['movie_id', 'user_id'], 'integer'],
            // [['id'], 'unique'],
            // [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'movie_id' => 'Movie',
            'user_id' => 'User',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    // public function getId0()
    // {
    //     return $this->hasOne(User::className(), ['id' => 'id']);
    // }

    // public function getLabel()
    // {
    //     return $this->name;
    // }

    // public function getUniqueId()
    // {
    //     return $this->id;
    // }

    public function setWishlist($movie, $user)
    {
        $this->movie_id = $movie;
        $this->user_id = $user;
    }

    public function getImageurl()
    {
        return \Yii::$app->request->BaseUrl . '../uploads/movie/' . $this->image;
    }
}
