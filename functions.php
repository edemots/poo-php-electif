<?php

function chance($percentage)
{
    return rand() % 100 < $percentage;
}
