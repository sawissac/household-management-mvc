<?php

require('../GlobalDeclaration.php');

#  ---- CORE START-----

autoLoadDir(CORE_PATH);

#  ---- CORE END  -----


#  ---- MODEL START-----

autoLoadDir(MODEL_PATH);

#  ---- MODEL END-----

require(MIDDLEWARE_PATH . 'GlobalMiddleware.php');


