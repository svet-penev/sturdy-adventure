<?php

Route::get('/{any}', 'SiteController@index')->where('any', '.*');