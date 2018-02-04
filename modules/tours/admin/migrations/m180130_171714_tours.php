<?php

use yii\db\Migration;

/**
 * Class m180130_171714_tours
 */
class m180130_171714_tours extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('tours', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'text' => $this->text(),
            'image' => $this->string(),
            'link' => $this->string(),
            'position_index' => $this->string()->null(),
            'is_published' => $this->integer(),

        ]);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('tours');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180130_171714_tours cannot be reverted.\n";

        return false;
    }
    */
}
