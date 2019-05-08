<?php

Route::get('/metrics', 'MetricController@index');
Route::post('/events', 'AnalyticsEventController@store');
