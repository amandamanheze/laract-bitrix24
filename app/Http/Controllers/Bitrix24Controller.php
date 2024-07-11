<?php

namespace App\Http\Controllers;

use App\Services\Bitrix24Service;

class Bitrix24Controller extends Controller
{
    protected $bitrix24Service;

    public function __construct(Bitrix24Service $bitrix24Service)
    {
        $this->bitrix24Service = $bitrix24Service;
    }

    public function getCurrentUser()
    {
        $currentUser = $this->bitrix24Service;
        return response()->json($currentUser);
    }
}
