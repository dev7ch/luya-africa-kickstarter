<?php

use yii\db\Migration;

/**
 * Class m180205_033537_add_tour_booking_form
 */
class m180205_033537_add_tour_booking_form extends Migration
{
    public function safeUp()
    {
        $this->createTable('tours_bookings', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->text(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'message' => $this->text(),
            'ip' => $this->text(),
            'date' => $this->text(),
            'is_confirmed' => $this->integer()->defaultValue(0),

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
        echo "m180205_033537_add_tour_booking_form cannot be reverted.\n";

        return false;
    }
    */
}
