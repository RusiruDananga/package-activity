<?php

use RusiruD\Activity\Http\Controllers\ActivitiesController;

Route::prefix('activity')->group(function() {
    //Route related to activity logs
    Route::get('/fetch/activities', [ActivitiesController::class, 'fetchActivities']);
    Route::get('/fetch/mail-logs', [ActivitiesController::class, 'fetchMailLogs']);
});
