<?php

declare(strict_types=1);

namespace App\Services;
require_once  '../vendor/autoload.php';

use Bitrix24\SDK\Services\ServiceBuilderFactory;
use Monolog\Logger;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Monolog\Processor\IntrospectionProcessor;
use Monolog\Processor\MemoryUsageProcessor;

class Bitrix24Service
{
    protected $service;

    public function __construct()
    {
        $webhookUrl = config('services.bitrix24.webhook_url');

        $log = new Logger('bitrix24-php-sdk');
        $log->pushProcessor(new MemoryUsageProcessor(true, true));
        $log->pushProcessor(new IntrospectionProcessor());

        $b24ServiceFactory = new ServiceBuilderFactory(new EventDispatcher(), $log);
        $this->service = $b24ServiceFactory->initFromWebhook($webhookUrl);
    }

    public function getMainScope()
    {
        return $this->service->getMainScope();
    }

    public function getCRMScope()
    {
        return $this->service->getCRMScope();
    }
}
