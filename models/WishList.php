<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movie".
 *
 * @property int $id
 * @property string $movie_id
 * @property string $user_id
 */
class WishList extends \yii\db\ActiveRecord
{
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

    public function setWishlist($movie, $user)
    {
        $this->movie_id = $movie;
        $this->user_id = $user;
    }
}
