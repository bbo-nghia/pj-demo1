<?php

Route::prefix('v1')
     ->group(
         function () {
             includeRouteFiles(__DIR__ . '/v1');
         }
     );
