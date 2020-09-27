<?php

use yii\db\Migration;

/**
 * Class m200927_064707_insert_defusers_to_users
 */
class m200927_064707_insert_defusers_to_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // at first step - drop unique key for email address column for testing from at one mail address!
        //$this->execute('ALTER TABLE `user` DROP CONSTRAINT `email`;');

        // Yii2 ->insert may only ONE ROW inserts into table at once!
        // @TODO up all of this methods hierarhy to multiply inserts (get my old version from 2011y!)
        $this->insert('{{%user}}', [
            'username'=>'admin',
            'auth_key'=>'NdlpacZB9CfUPcFFvxHNH3xYl_wKrk_Z',
            'password_hash'=>'$2y$13$rxeZquQsT1pqlTeM/FEKTufM7.X9CA3auJKur8H6X4CibC2SVBU5m',
            'email'=>'gittest109@mail.ru',
            'status'=>'10',
            'created_at'=>1601184603,
            'updated_at'=>1601184619,
            'verification_token'=>'FfSfjhvJd8WeV-ELVie6Qytrx68gmm6M_1601184603',
        ]);

        $this->insert('{{%user}}', [
            'username'=>'test1',
            'auth_key'=>'mdNftyDR9JtIzyJNEGDUlPAOrhjLKEpC',
            'password_hash'=>'$2y$13$9XxvRYt072M1POZvTqLSce5qFs8dMhGiZMYEVQcuaiBDfN8aBIJLK',
            'email'=>'test1@test1.front',
            'status'=>'10',
            'created_at'=>1601184737,
            'updated_at'=>1601184754,
            'verification_token'=>'Ab7Jpdm3-Nh6A9SBtb-7BY_41fPeCEv6_1601184737',
        ]);

        $this->insert('{{%user}}', [
            'username'=>'test2',
            'auth_key'=>'9aoIncPhWYAgZC7hyBlI_KSG2r5NObRK',
            'password_hash'=>'$2y$13$p82ut/xGjRfl67Wh7/yJ.u7HthBLcdryRQcMkc5ehaiygMHtKohKW',
            'email'=>'test2@test1.front',
            'status'=>'10',
            'created_at'=>1601184823,
            'updated_at'=>1601184837,
            'verification_token'=>'Kljq7nX_yecBuZSTgfAhaffsl3vllcT8_1601184823',
        ]);

        $this->insert('{{%user}}', [
            'username'=>'test3',
            'auth_key'=>'6XKcsI6KHkbFhdExmn8_nEolywCat9vr',
            'password_hash'=>'$2y$13$ZIIuhDpCiI0gZ.bgNVyEN.Kcu6jBW4yDHpQCkr0FVGZZDLHmKUU.u',
            'email'=>'arhat109@mail.ru',
            'status'=>'10',
            'created_at'=>1601184917,
            'updated_at'=>1601184929,
            'verification_token'=>'5MviBWSqFoHN_vlSXmsxHD8CGwXcAE6-_1601184917',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200927_064707_insert_defusers_to_users cannot be reverted.\n";
        $this->execute('TRUNCATE TABLE user;');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200927_064707_insert_defusers_to_users cannot be reverted.\n";

        return false;
    }
    */
}
