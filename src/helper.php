<?php

function form()
{
    return new (config('document.current_form'));
}