<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('app:reset-resident-budget')->daily();
