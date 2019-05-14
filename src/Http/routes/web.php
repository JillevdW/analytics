<?php

Route::get('/sessions', 'SessionController@index')->name('web.sessions.index');
Route::get('/sessions/{id}', 'SessionController@show')->name('web.session.show');


Route::get('/events', 'AnalyticsEventController@index')->name('web.events.index');


Route::get('/metrics', 'MetricController@index')->name('web.metrics.index');
Route::get('/metrics/{id}', 'MetricController@show')->name('web.metric.show');