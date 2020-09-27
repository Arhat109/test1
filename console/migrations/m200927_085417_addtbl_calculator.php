<?php

use yii\db\Migration;

/**
 * Class m200927_085417_addtbl_calculator
 */
class m200927_085417_addtbl_calculator extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(<<<SQL
-- saving data and results for A+B*C=>R
create table if not exists calculator
(
    idcalc               int auto_increment primary key,
    iiduser              int(11)       not null comment 'fkey::user signed!',
    in_a                 varchar(32)   not null comment '1st data',
    in_b                 varchar(32)   not null comment '2nd data',
    in_c                 varchar(32)   not null comment '3rd data',
    result               varchar(32)   not null comment 'result',
    created_at           int           not null,
    updated_at           int           not null,

    index idxuser (iiduser),
    constraint fk_calculatorUser_iiduser foreign key (iiduser) references user(id)
        on delete cascade
        on update cascade
)
    engine InnoDb charset utf8 collate = utf8_unicode_ci
    comment 'test1 data table';
SQL
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200927_085417_addtbl_calculator cannot be reverted.\n";
        $this->excute('DROP TABLE IF EXISTS calculator;');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200927_085417_addtbl_calculator cannot be reverted.\n";

        return false;
    }
    */
}
