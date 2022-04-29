<?php
    if (session_status() == PHP_SESSION_NONE) // start session if not started already
        {
            session_start();
        }
