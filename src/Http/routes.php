<?php

Route::get('/metrics', 'MetricController@index')->name('metrics.index');
Route::get('/metrics/{id}', 'MetricController@show')->name('metrics.show');

Route::post('/events', 'AnalyticsEventController@store')->name('events.store');
Route::get('/events/between-dates', 'AnalyticsEventController@getBetweenDates')->name('events.getbetweendates');
