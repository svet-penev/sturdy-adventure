<?php

Route::get('/spa', 'SpaController@index')->where('any', '.*');