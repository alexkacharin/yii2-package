<?php

use yii\db\Migration;

/**
 * Class m240128_084636_create_user_admin
 */
class m240128_084636_create_user_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // create a role named "administrator"
        $administratorRole = $auth->createRole('admin');
        $administratorRole->description = 'Administrator';
        $auth->add($administratorRole);

        // create permission for certain tasks
        $permission = $auth->createPermission('user-management');
        $permission->description = 'User Management';
        $auth->add($permission);

        // let administrators do user management
        $auth->addChild($administratorRole, $auth->getPermission('user-management'));

        // create user "admin" with password "administrator"
        $user = new \Da\User\Model\User([
            'scenario' => 'create', 
            'email' => "email@example.com", 
            'username' => "admin", 
            'password' => "administrator"  // >6 characters!
        ]);
        $user->confirmed_at = time();
        $user->save();

        // assign role to our admin-user
        $auth->assign($administratorRole, $user->id);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        // delete permission
        $auth->remove($auth->getPermission('user-management'));

        // delete admin-user and administrator role
        $administratorRole = $auth->getRole("administrator");
        $user = \Da\User\Model\User::findOne(['username'=>"admin"]);
        $auth->revoke($administratorRole, $user->id);
        $user->delete();
        $auth->remove($administratorRole);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240128_084636_create_user_admin cannot be reverted.\n";

        return false;
    }
    */
}
