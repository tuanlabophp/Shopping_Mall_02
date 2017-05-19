<?php

if (!function_exists('uniqueString')) {
    function uniqueString($customText = null)
    {
        $customText = str_replace(' ', '-', $customText);
        return $customText . '-' . uniqid();
    }
}
