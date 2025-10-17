<?php

function mixAssets($path) {
    $fullPath = public_path($path);

    if (file_exists($fullPath)) {
        $timestamp = filemtime($fullPath);
        return asset($path) . '?' . $timestamp;
    }

    return asset($path);
}
