<?php

namespace app\modules\tours\admin;

/**
 * Tours Admin Module.
 *
 * File has been created with `module/create` command. 
 */
class Module extends \luya\admin\base\Module
{
    public $apis = [
        'api-tours-tour' => 'app\modules\tours\admin\apis\TourController',
        'api-tours-booking' => 'app\modules\tours\admin\apis\BookingController',

    ];

    public function getMenu()
    {
        return (new \luya\admin\components\AdminMenuBuilder($this))
            ->node('Tours', 'card_travel')
            ->group('Group')
            ->itemApi('Tours', 'toursadmin/tour/index', 'beach_access', 'api-tours-tour')
            ->itemApi('Bookings', 'toursadmin/booking/index', 'perm_contact_calendar', 'api-tours-booking');

    }

}