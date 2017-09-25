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

namespace mrcnpdlk\Grandstream\XMLApp;


use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Psr\SimpleCache\CacheInterface;

class App
{
    /**
     * @var LoggerInterface
     */
    private $oLogger;
    /**
     * @var CacheInterface
     */
    private $oCache;

    public function __construct()
    {
    }

    /**
     * Set Logger handler (PSR-3)
     *
     * @param \Psr\Log\LoggerInterface|null $oLogger
     *
     * @return $this
     */
    public function setLoggerInstance(LoggerInterface $oLogger = null)
    {
        $this->oLogger = $oLogger ?: new NullLogger();

        return $this;
    }

    /**
     * Set Cache handler (PSR-16)
     *
     * @param CacheInterface|null $oCache
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\App
     * @see https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-16-simple-cache.md PSR-16
     */
    public function setCacheInstance(CacheInterface $oCache = null)
    {
        $this->oCache = $oCache;

        return $this;
    }

    /**
     * @return \Psr\Log\LoggerInterface
     */
    public function getLogger()
    {
        return $this->oLogger;
    }
}
