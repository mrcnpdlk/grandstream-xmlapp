<?php
/**
 * Grandstream-XMLApp
 *
 * Copyright (c) 2017 pudelek.org.pl
 *
 * @license MIT License (MIT)
 *
 * For the full copyright and license information, please view source file
 * that is bundled with this package in the file LICENSE
 *
 * @author  Marcin Pudełek <marcin@pudelek.org.pl>
 */


namespace mrcnpdlk\Grandstream\XMLApp\Helper;


class Color
{

    /**
     * @var string
     */
    private $sColor;

    public function __construct(int $tone = null)
    {
        $this->sColor = $this->toGreyScale($tone);
    }

    /**
     * @param int|null $tone
     *
     * @return string
     */
    private function toGreyScale(int $tone = null)
    {
        if (is_null($tone)) {
            return 'None';
        }
        $tTones = [
            'White',
            'Light6',
            'Light5',
            'Light4',
            'Light3',
            'Light2',
            'Light1',
            'LightGray',
            'Gray',
            'Dark1',
            'Dark2',
            'Dark3',
            'Dark4',
            'Dark5',
            'Dark6',
            'Black',
        ];
        $levels = count($tTones);
        $index  = (int)ceil($levels * $tone / 100) - 1;
        if ($index < 0) {
            $index = 0;
        } elseif ($index >= $levels) {
            $index = $levels - 1;
        }

        return $tTones[$index];
    }

    public function get()
    {
        return $this->sColor;
    }
}