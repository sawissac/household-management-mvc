<?php

use Core\SessionProvider;

SessionProvider::destroy(['user','app','routes']);

redirect('/login');