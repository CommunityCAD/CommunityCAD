<?php

namespace App\Models\Cad;

class CallStatuses
{
    public const STATUSCODES = [
        'RCVD' => [
            'color' => 'text-green-500',
            'name' => 'Call Open',
        ],
        'HLD' => [
            'color' => 'text-gray-500',
            'name' => 'Call On Hold',
        ],
        'ENRT' => [
            'color' => 'text-yellow-500',
            'name' => 'Units Enroute',
        ],
        'ARRVD' => [
            'color' => 'text-orange-500',
            'name' => 'Units Arrived Onscene',
        ],
        'CLR' => [
            'color' => 'text-gray-500',
            'name' => 'Clear; Needs Report',
        ],
        'CLO' => [
            'color' => 'text-red-500',
            'name' => 'Close; No Report',
        ],
        'CLO-RPT' => [
            'color' => 'text-red-500',
            'name' => 'Report Made',
        ],
        'CLO-SB' => [
            'color' => 'text-red-500',
            'name' => 'Unable To Locate Complaintant',
        ],
        'CLO-SC' => [
            'color' => 'text-red-500',
            'name' => 'Unable To Locate Address',
        ],
        'CLO-SD' => [
            'color' => 'text-red-500',
            'name' => 'Unable To Locate Suspect',
        ],
        'CLO-SL' => [
            'color' => 'text-red-500',
            'name' => 'Verbal Warning',
        ],
        'CLO-SLW' => [
            'color' => 'text-red-500',
            'name' => 'Written Warning',
        ],
        'CLO-SM' => [
            'color' => 'text-red-500',
            'name' => 'Citation Issued',
        ],
        'CLO-SN' => [
            'color' => 'text-red-500',
            'name' => 'Person Arrested',
        ],
        'CLO-SO' => [
            'color' => 'text-red-500',
            'name' => 'Made Contact',
        ],
        'CLO-SR' => [
            'color' => 'text-red-500',
            'name' => 'Other',
        ],
        'CLO-TEST' => [
            'color' => 'text-red-500',
            'name' => 'Test Call Cleared',
        ],
    ];
}
