<?php

use yii\db\Migration;

/**
 * Class m180207_220119_add_theme_table
 */
class m180207_220119_add_theme_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('theme', [
            'id' => $this->primaryKey()->defaultValue(1),
            'logo' => $this->integer(0),
            'site_name' => $this->text(),
            'company_email' => $this->text(),
            'facebook' => $this->text(),
            'youtube' => $this->text(),
            'insta' => $this->text(),
            'is_active' => $this->integer(),

        ]);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('theme');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180207_220119_add_theme_table cannot be reverted.\n";

        return false;
    }
    */
}
