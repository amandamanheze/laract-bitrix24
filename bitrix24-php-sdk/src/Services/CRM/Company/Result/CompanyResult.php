<?php


declare(strict_types=1);

namespace Bitrix24\SDK\Services\CRM\Company\Result;

use Bitrix24\SDK\Core\Result\AbstractResult;
use Bitrix24\SDK\Services\CRM\Company\Result\CompanyItemResult;

/**
 * Class CompanyResult
 *
 * @package Bitrix24\SDK\Services\CRM\Company\Result
 */
class CompanyResult extends AbstractResult
{
    public function company(): CompanyItemResult
    {
        return new CompanyItemResult($this->getCoreResponse()->getResponseData()->getResult());
    }
}