<?php

/**
 * Get an alert message.
 *
 * @param  string $message
 * @param  string $type
 * @return array
 */
function getAlert($message, $type)
{
    $alert['message'] = $message;
    $alert['type'] = $type;

    return $alert;
}
