<?php

use Illuminate\Support\Str;

function slugMaker($name)
{
    return Str::slug($name);
}