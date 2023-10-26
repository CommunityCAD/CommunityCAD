<?php

namespace App\Models\Cad;

class CallNatures
{
    public const NATURECODES = [
        'ABDUCTIO' => [
            'name' => 'ABDUCTION',
        ],
        'ABUSEABA' => [
            'name' => 'ABUSE ABANDONMENT NEGLECT',
        ],
        'ACCPRT' => [
            'name' => 'ACCIDENT (REPORT ONLY)',
        ],
        'ACCPD' => [
            'name' => 'ACCIDENT PD',
        ],
        'ALARM' => [
            'name' => 'ALARM COMPANY - POLICE',
        ],
        'ANIMAL' => [
            'name' => 'ANIMAL PROBLEM',
        ],
        'ASSLTIP' => [
            'name' => 'ASSAULT IN PROGRESS',
        ],
        'ASSAULT REPORT' => [
            'name' => 'ASSAULT REPORT',
        ],
        'ASSLTSEX' => [
            'name' => 'ASSAULT SEXUAL',
        ],
        'ASSLTIJ' => [
            'name' => 'ASSAULT WITH INJURY (NOT IN PROGRESS)',
        ],
        'ATL' => [
            'name' => 'ATTEMPT TO LOCATE',
        ],
        'BOMBEXP' => [
            'name' => 'BOMB EXPLOSION',
        ],
        'BOMBFND' => [
            'name' => 'BOMB FOUND',
        ],
        'BOMBTHRT' => [
            'name' => 'BOMB THREAT',
        ],
        'BURGLARY' => [
            'name' => 'BURGLARY HOME INVASION',
        ],
        'BURGIP' => [
            'name' => 'BURGLARY IN PROGRESS',
        ],
        'BURG' => [
            'name' => 'BURGLARY REPORT',
        ],
        'CARJACK' => [
            'name' => 'CAR JACKING',
        ],
        'CONTSUBS' => [
            'name' => 'CONTROLLED SUBSTANCE',
        ],
        'DECEASED' => [
            'name' => 'DECEASED PERSON',
        ],
        'DIST' => [
            'name' => 'DISTURBANCE',
        ],
        'DISTDOME' => [
            'name' => 'DISTURBANCE - DOMESTIC',
        ],
        'DISTNOIS' => [
            'name' => 'DISTURBANCE - NOISE',
        ],
        'DISTURBN' => [
            'name' => 'DISTURBANCE NUISANCE',
        ],
        'DISTWEAP' => [
            'name' => 'DISTURBANCE W/WEAPON',
        ],
        'DOMESTIC' => [
            'name' => 'DOMESTIC DISTURBANCE VIOLENCE',
        ],
        'DUI' => [
            'name' => 'DRIVING UNDER THE INFLUENCE (IMPAIRED DRIVING)',
        ],
        'FBRUSH' => [
            'name' => 'GRASS, BRUSH, or OR TIMBER FIRE',
        ],
        'FCOALARM' => [
            'name' => 'CARBON MONOXIDE ALARM',
        ],
        'FCONFINE' => [
            'name' => 'CONFINED SPACE RESCUE',
        ],
        'FEXTRIC' => [
            'name' => 'EXTRICATION',
        ],
        'FHAZMAT' => [
            'name' => 'HAZ-MAT',
        ],
        'FIGHT' => [
            'name' => 'FIGHT',
        ],
        'FIGHTWEA' => [
            'name' => 'FIGHT W/WEAPON',
        ],
        'FNDPERS' => [
            'name' => 'FOUND PERSON',
        ],
        'FNDPROP' => [
            'name' => 'FOUND PROPERTY',
        ],
        'FNONSTR' => [
            'name' => 'NON-STRUCTURE FIRE',
        ],
        'FSTRUCT' => [
            'name' => 'STRUCTURE FIRE',
        ],
        'GUNSHOTS' => [
            'name' => 'GUNSHOTS REPORTED',
        ],
        'HARASSME' => [
            'name' => 'HARASSMENT STALKING THREAT',
        ],
        'HITRUN' => [
            'name' => 'HIT & RUN',
        ],
        'HITRUNIJ' => [
            'name' => 'HIT & RUN WITH INJURY',
        ],
        'HOMICID' => [
            'name' => 'HOMICIDE',
        ],
        'HOSTAGE' => [
            'name' => 'HOSTAGE',
        ],
        'INDECENC' => [
            'name' => 'INDECENCY LEWDNESS',
        ],
        'INDEXP' => [
            'name' => 'INDECENT EXPOSURE',
        ],
        'INTOXDRV' => [
            'name' => 'INTOXICATED DRIVER',
        ],
        'INTOXPER' => [
            'name' => 'INTOXICATED PERSON',
        ],
        'JUVENILE' => [
            'name' => 'JUVENILE TROUBLE',
        ],
        'KIDNAPIP' => [
            'name' => 'KIDNAPPING IN PROGRESS',
        ],
        'KIDNAP' => [
            'name' => 'KIDNAPPING REPORT',
        ],
        'MEDI' => [
            'name' => 'MEDICAL',
        ],
        'MISCELLA' => [
            'name' => 'MISCELLANEOUS',
        ],
        'MISSINGF' => [
            'name' => 'MISSING RUNAWAY FOUND PERSON',
        ],
        'NCORDER' => [
            'name' => 'NO CONTACT ORDER VIOLATION',
        ],
        'OTHER' => [
            'name' => 'OTHER',
        ],
        'OUTSIDEF' => [
            'name' => 'OUTSIDE FIRE',
        ],
        'PICKUP' => [
            'name' => 'PICKUP ITEM/PROPERTY',
        ],
        'PURSUITF' => [
            'name' => 'FOOT PURSUIT',
        ],
        'PURSUITV' => [
            'name' => 'VEHICLE PURSUIT',
        ],
        'RECKLESS' => [
            'name' => 'RECKLESS DRIVER',
        ],
        'RECOVERY' => [
            'name' => 'RECOVERY STOLEN VEHICLE',
        ],
        'ROBBERYC' => [
            'name' => 'ROBBERY CARJACKING',
        ],
        'ROBERYIP' => [
            'name' => 'ROBBERY IN PROGRESS',
        ],
        'ROBBERY' => [
            'name' => 'ROBBERY REPORT',
        ],
        'RUNAWAY' => [
            'name' => 'RUNAWAY',
        ],
        'SHOOTING' => [
            'name' => 'SHOOTING',
        ],
        'SRT' => [
            'name' => 'SRT CALL',
        ],
        'STABBING' => [
            'name' => 'STABBING',
        ],
        'STALLVEH' => [
            'name' => 'STALLED VEHICLE',
        ],
        'SUBJWEAP' => [
            'name' => 'SUBJECT WITH A WEAPON',
        ],
        'SUSPPKGB' => [
            'name' => 'SUSPICIOUS PACKAGE/BOMB THREAT',
        ],
        'SUSPPERS' => [
            'name' => 'SUSPICIOUS PERSON',
        ],
        'SUSPVEH' => [
            'name' => 'SUSPICIOUS VEHICLE',
        ],
        'SUSPICIO' => [
            'name' => 'SUSPICIOUS WANTED PERSON CIRCUMSTANCES VEHICLE',
        ],
        'THEFT' => [
            'name' => 'THEFT',
        ],
        'THEFTFRV' => [
            'name' => 'THEFT FROM VEHICLE',
        ],
        'THEFTIC' => [
            'name' => 'THEFT IN CUSTODY',
        ],
        'THEFTIP' => [
            'name' => 'THEFT IN PROGRESS',
        ],
        'THEFTVEH' => [
            'name' => 'THEFT OF VEHICLE',
        ],
        'TRAFFTOW' => [
            'name' => 'TOW VEHICLE',
        ],
        'TRAFFIC' => [
            'name' => 'TRAFFIC',
        ],
        'TRAFFHAZ' => [
            'name' => 'TRAFFIC HAZARD',
        ],
        'TS' => [
            'name' => 'TRAFFIC STOP',
        ],
        'TRAFFICA' => [
            'name' => 'TRAFFIC TRANSPORTATION ACCIDENT (CRASH)',
        ],
        'TRAFFICV' => [
            'name' => 'TRAFFIC VIOLATION',
        ],
        'TRESPASS' => [
            'name' => 'TRESPASSING UNWANTED',
        ],
        'TRBLUNK' => [
            'name' => 'TROUBLE UNKNOWN',
        ],
        'VEHICLEF' => [
            'name' => 'VEHICLE FIRE',
        ],
        'WATERRES' => [
            'name' => 'WATER RESCUE',
        ],
        'WATERCRA' => [
            'name' => 'WATERCRAFT IN DISTRESS',
        ],
        'WELFCHK' => [
            'name' => 'WELFARE CHECK',
        ],
        'TEST' => [
            'name' => 'TEST CALL',
        ],

    ];
}
