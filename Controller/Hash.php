<?php

echo password_hash($_GET['hash'], PASSWORD_BCRYPT);