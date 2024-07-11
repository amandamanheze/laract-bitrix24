<?php


declare(strict_types=1);

namespace Bitrix24\SDK\Services\CRM\Company\Result;
require "../bitrix24-php-sdk/src/Services/CRM/Company/Result/CompanyItemResult.php";

use Bitrix24\SDK\Core\Exceptions\BaseException;
use Bitrix24\SDK\Core\Result\AbstractResult;
use Bitrix24\SDK\Services\CRM\Company\Result\CompanyItemResult;

/**
 * Class CompaniesResult
 *
 * @package Bitrix24\SDK\Services\CRM\Company\Result
 */
class CompaniesResult extends AbstractResult
{
    /**
     * @return CompanyItemResult[]
     * @throws BaseException
     */
    public function getCompanies(): array
    {
        $res = [];
        foreach ($this->getCoreResponse()->getResponseData()->getResult() as $item) {
            $res[] = new CompanyItemResult($item);
        }

        return $res;
    }
}