<?php

use yii\db\Migration;

/**
 * Class m180213_225602_add_booking_tour_id
 */
class m180213_225602_add_booking_tour_id extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('tours_bookings', 'booked_tour', 'text');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('tours_bookings', 'booked_tour');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180213_225602_add_booking_tour_id cannot be reverted.\n";

        return false;
    }
    */
}
