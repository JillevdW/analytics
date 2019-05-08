<?php

Route::get('/metrics', 'MetricController@index');
Route::get('/metrics/{id}', 'MetricController@show');

Route::post('/events', 'AnalyticsEventController@store');
Route::get('/events/count-for-dates', 'AnalyticsEventController@eventCountFor');
