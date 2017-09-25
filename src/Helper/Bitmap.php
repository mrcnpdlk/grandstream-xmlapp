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


class Bitmap
{
    /**
     * @var string
     */
    private $sUrl;

    public function __construct(string $url = null)
    {
        $this->sUrl = $url ?? '';
    }

    public function get()
    {
        return $this->sUrl;
    }
}