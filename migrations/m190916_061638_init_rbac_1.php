<?php

use yii\db\Migration;

/**
 * Class m190916_061638_init_rbac_1
 */
class m190916_061638_init_rbac_1 extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        // add "createMovie" permission
        $createMovie = $auth->createPermission('createMovie');
        $createMovie->description = 'Create a Movie';
        $auth->add($createMovie);
        // add "createMovie" permission
        $viewMovie = $auth->createPermission('viewMovie');
        $viewMovie->description = 'View a Movie';
        $auth->add($viewMovie);
        // add "updateMovie" permission
        $updateMovie = $auth->createPermission('updateMovie');
        $updateMovie->description = 'Update Movie';
        $auth->add($updateMovie);
        // add "deleteMovie" permission
        $deleteMovie = $auth->createPermission('deleteMovie');
        $deleteMovie->description = 'Delete Movie';
        $auth->add($deleteMovie);
        // add "createUser" permission
        $createUser = $auth->createPermission('createUser');
        $createUser->description = 'Create a Movie';
        $auth->add($createUser);
        // add "viewUser" permission
        $viewUser = $auth->createPermission('viewUser');
        $viewUser->description = 'View a User';
        $auth->add($viewUser);
        // add "updateUser" permission
        $updateUser = $auth->createPermission('updateUser');
        $updateUser->description = 'Update User';
        $auth->add($updateUser);
        // add "deleteUser" permission
        $deleteUser = $auth->createPermission('deleteUser');
        $deleteUser->description = 'Delete User';
        $auth->add($deleteUser);
        $addWishlist = $auth->createPermission('addWishlist');
        $addWishlist->description = 'add to Wishlist';
        $auth->add($addWishlist);
        $admin = $auth->createRole('admin');
        $user = $auth->createRole('user');
        // add "author" role and give this role the "createPost" permission
        // $author = $auth->createRole('author');
        $auth->add($admin);
        $auth->addChild($admin, $createMovie);
        $auth->addChild($admin, $viewMovie);
        $auth->addChild($admin, $updateMovie);
        $auth->addChild($admin, $deleteMovie);
        $auth->addChild($admin, $createUser);
        $auth->addChild($admin, $viewUser);
        $auth->addChild($admin, $updateUser);
        $auth->addChild($admin, $deleteUser);
        $auth->addChild($admin, $addWishlist);
        $auth->add($user);
        $auth->addChild($user, $addWishlist);
        $auth->assign($user, 17);
        $auth->assign($admin, 18);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190916_031035_init_rbac1 cannot be reverted.\n";
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190916_061638_init_rbac_1 cannot be reverted.\n";

        return false;
    }
    */
}
