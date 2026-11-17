<?php

return [
    '~^builds/(\d+)$~'        => [BuildsController::class, 'show'],
    '~^builds/add$~'          => [BuildsController::class, 'add'],
    '~^builds/(\d+)/edit$~'   => [BuildsController::class, 'edit'],
    '~^builds/(\d+)/delete$~' => [BuildsController::class, 'delete'],
    '~^calculator$~'          => [MainController::class, 'calculator'],
    '~^$~'                    => [MainController::class, 'index'],
];
