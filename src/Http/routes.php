<?php

Route::get('/metrics', 'MetricController@index')->name('metrics.index');
Route::get('/metrics/{id}', 'MetricController@show')->name('metrics.show');

Route::post('/events', 'AnalyticsEventController@store')->name('events.store');
Route::get('/events/between-dates', 'AnalyticsEventController@getBetweenDates')->name('events.getBetweenDates');
Route::get('/events/count-between-dates', 'AnalyticsEventController@countBetweenDates')->name('events.countBetweenDates');

Route::post('/app-session', 'SessionController@store')->name('appSession.store');
Route::get('/app-session/{id}', 'SessionController@show')->name('appSession.show');
