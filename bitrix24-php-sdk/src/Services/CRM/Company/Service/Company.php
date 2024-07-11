<?php

declare(strict_types=1);

namespace Bitrix24\SDK\Services\CRM\Company\Service;

use Bitrix24\SDK\Core\Contracts\CoreInterface;
use Bitrix24\SDK\Core\Exceptions\BaseException;
use Bitrix24\SDK\Core\Exceptions\TransportException;
use Bitrix24\SDK\Core\Result\AddedItemResult;
use Bitrix24\SDK\Core\Result\DeletedItemResult;
use Bitrix24\SDK\Core\Result\FieldsResult;
use Bitrix24\SDK\Core\Result\UpdatedItemResult;
use Bitrix24\SDK\Services\AbstractService;
use Bitrix24\SDK\Services\CRM\Company\Result\CompanyResult;
use Bitrix24\SDK\Services\CRM\Company\Result\CompaniesResult;
use Psr\Log\LoggerInterface;

/**
 * Class Company
 *
 * @package Bitrix24\SDK\Services\CRM\Company\Service
 */
class Company extends AbstractService
{
    public Batch $batch;

    /**
     * Company constructor.
     *
     * @param Batch           $batch
     * @param CoreInterface   $core
     * @param LoggerInterface $log
     */
    public function __construct(Batch $batch, CoreInterface $core, LoggerInterface $log)
    {
        parent::__construct($core, $log);
        $this->batch = $batch;
    }

    /**
     * Creates and adds a new company.
     *
     * @link https://training.bitrix24.com/rest_help/crm/company/crm_company_add.php
     *
     * @param array{
     *   ID?: int,
     *   HONORIFIC?: string,
     *   TITLE?: string,
     *   SOURCE_ID?: string,
     *   ADDRESS?: string,
     *   ADDRESS_2?: string,
     *   ADDRESS_CITY?: string,
     *   ADDRESS_POSTAL_CODE?: string,
     *   ADDRESS_REGION?: string,
     *   ADDRESS_PROVINCE?: string,
     *   ADDRESS_COUNTRY?: string,
     *   ADDRESS_COUNTRY_CODE?: string,
     *   ADDRESS_LOC_ADDR_ID?: int,
     *   COMMENTS?: string,
     *   OPENED?: string,
     *   COMPANY_TYPE?: string,
     *   HAS_PHONE?: string,
     *   HAS_EMAIL?: string,
     *   EMPLOYESS?: string,
     *   ASSIGNED_BY_ID?: string,
     *   CREATED_BY_ID?: string,
     *   MODIFY_BY_ID?: string,
     *   DATE_CREATE?: string,
     *   DATE_MODIFY?: string,
     *   LEAD_ID?: string,
     *   ORIGINATOR_ID?: string,
     *   ORIGIN_ID?: string,
     *   ORIGIN_VERSION?: string,
     *   UTM_SOURCE?: string,
     *   UTM_MEDIUM?: string,
     *   UTM_CAMPAIGN?: string,
     *   UTM_CONTENT?: string,
     *   UTM_TERM?: string,
     *   PHONE?: string,
     *   EMAIL?: string,
     *   WEB?: string,
     *   IM?: string,
     *   } $fields
     *
     * @return AddedItemResult
     * @throws BaseException
     * @throws TransportException
     */
    public function add(array $fields): AddedItemResult
    {
        return new AddedItemResult(
            $this->core->call(
                'crm.company.add',
                [
                    'fields' => $fields,
                ]
            )
        );
    }

    /**
     * Deletes the specified company and all the associated objects.
     *
     * @link https://training.bitrix24.com/rest_help/crm/company/crm_company_delete.php
     *
     * @param int $companyId
     *
     * @return DeletedItemResult
     * @throws BaseException
     * @throws TransportException
     */
    public function delete(int $companyId): DeletedItemResult
    {
        return new DeletedItemResult(
            $this->core->call(
                'crm.company.delete',
                [
                    'id' => $companyId,
                ]
            )
        );
    }

    /**
     * Returns the description of company
     *
     * @link https://training.bitrix24.com/rest_help/crm/company/crm_company_fields.php
     *
     * @return FieldsResult
     * @throws BaseException
     * @throws TransportException
     */
    public function fields(): FieldsResult
    {
        return new FieldsResult($this->core->call('crm.company.fields'));
    }

    /**
     * Returns a company by the specified company ID
     *
     * @link https://training.bitrix24.com/rest_help/crm/company/crm_company_get.php
     *
     * @param int $companyId
     *
     * @return CompanyResult
     * @throws BaseException
     * @throws TransportException
     */
    public function get(int $companyId): CompanyResult
    {
        return new CompanyResult(
            $this->core->call(
                'crm.company.get',
                [
                    'id' => $companyId,
                ]
            )
        );
    }

    /**
     * Returns a list of companys selected by the filter specified as the parameter. See the example for the filter notation.
     *
     * @link https://training.bitrix24.com/rest_help/crm/company/crm_company_list.php
     *
     * @param array{
     *   ID?: int,
     *   HONORIFIC?: string,
     *   TITLE?: string,
     *   SOURCE_ID?: string,
     *   ADDRESS?: string,
     *   ADDRESS_2?: string,
     *   ADDRESS_CITY?: string,
     *   ADDRESS_POSTAL_CODE?: string,
     *   ADDRESS_REGION?: string,
     *   ADDRESS_PROVINCE?: string,
     *   ADDRESS_COUNTRY?: string,
     *   ADDRESS_COUNTRY_CODE?: string,
     *   ADDRESS_LOC_ADDR_ID?: int,
     *   COMMENTS?: string,
     *   OPENED?: string,
     *   COMPANY_TYPE?: string,
     *   HAS_PHONE?: string,
     *   HAS_EMAIL?: string,
     *   EMPLOYESS?: string,
     *   ASSIGNED_BY_ID?: string,
     *   CREATED_BY_ID?: string,
     *   MODIFY_BY_ID?: string,
     *   DATE_CREATE?: string,
     *   DATE_MODIFY?: string,
     *   LEAD_ID?: string,
     *   ORIGINATOR_ID?: string,
     *   ORIGIN_ID?: string,
     *   ORIGIN_VERSION?: string,
     *   UTM_SOURCE?: string,
     *   UTM_MEDIUM?: string,
     *   UTM_CAMPAIGN?: string,
     *   UTM_CONTENT?: string,
     *   UTM_TERM?: string,
     *   PHONE?: string,
     *   EMAIL?: string,
     *   WEB?: string,
     *   IM?: string,
     *   } $order
     *
     * @param array{
     *   ID?: int,
     *   HONORIFIC?: string,
     *   TITLE?: string,
     *   SOURCE_ID?: string,
     *   ADDRESS?: string,
     *   ADDRESS_2?: string,
     *   ADDRESS_CITY?: string,
     *   ADDRESS_POSTAL_CODE?: string,
     *   ADDRESS_REGION?: string,
     *   ADDRESS_PROVINCE?: string,
     *   ADDRESS_COUNTRY?: string,
     *   ADDRESS_COUNTRY_CODE?: string,
     *   ADDRESS_LOC_ADDR_ID?: int,
     *   COMMENTS?: string,
     *   OPENED?: string,
     *   COMPANY_TYPE?: string,
     *   HAS_PHONE?: string,
     *   HAS_EMAIL?: string,
     *   EMPLOYESS?: string,
     *   ASSIGNED_BY_ID?: string,
     *   CREATED_BY_ID?: string,
     *   MODIFY_BY_ID?: string,
     *   DATE_CREATE?: string,
     *   DATE_MODIFY?: string,
     *   LEAD_ID?: string,
     *   ORIGINATOR_ID?: string,
     *   ORIGIN_ID?: string,
     *   ORIGIN_VERSION?: string,
     *   UTM_SOURCE?: string,
     *   UTM_MEDIUM?: string,
     *   UTM_CAMPAIGN?: string,
     *   UTM_CONTENT?: string,
     *   UTM_TERM?: string,
     *   PHONE?: string,
     *   EMAIL?: string,
     *   WEB?: string,
     *   IM?: string,
     *   } $filter
     * @param array $select = ['ID','HONORIFIC','TITLE','SOURCE_ID','ADDRESS','ADDRESS_2','ADDRESS_CITY','ADDRESS_POSTAL_CODE','ADDRESS_REGION','ADDRESS_PROVINCE','ADDRESS_COUNTRY','ADDRESS_COUNTRY_CODE','ADDRESS_LOC_ADDR_ID','COMMENTS','OPENED','HAS_PHONE','HAS_EMAIL','EMPLOYESS','ASSIGNED_BY_ID','CREATED_BY_ID','MODIFY_BY_ID','DATE_CREATE','DATE_MODIFY','LEAD_ID','ORIGINATOR_ID','ORIGIN_ID','ORIGIN_VERSION','FACE_ID','UTM_SOURCE','UTM_MEDIUM','UTM_CAMPAIGN','UTM_CONTENT','UTM_TERM','PHONE','EMAIL','WEB','IM']
     * @param int   $start
     *
     * @return CompaniesResult
     * @throws BaseException
     * @throws TransportException
     */
    public function list(array $order, array $filter, array $select, int $start): CompaniesResult
    {
        return new CompaniesResult(
            $this->core->call(
                'crm.company.list',
                [
                    'order'  => $order,
                    'filter' => $filter,
                    'select' => $select,
                    'start'  => $start,
                ]
            )
        );
    }

    /**
     * @param int $companyId
     * @param array{
     *   ID?: int,
     *   HONORIFIC?: string,
     *   TITLE?: string,
     *   SOURCE_ID?: string,
     *   ADDRESS?: string,
     *   ADDRESS_2?: string,
     *   ADDRESS_CITY?: string,
     *   ADDRESS_POSTAL_CODE?: string,
     *   ADDRESS_REGION?: string,
     *   ADDRESS_PROVINCE?: string,
     *   ADDRESS_COUNTRY?: string,
     *   ADDRESS_COUNTRY_CODE?: string,
     *   ADDRESS_LOC_ADDR_ID?: int,
     *   COMMENTS?: string,
     *   OPENED?: string,
     *   COMPANY_TYPE?: string,
     *   HAS_PHONE?: string,
     *   HAS_EMAIL?: string,
     *   EMPLOYESS?: string,
     *   ASSIGNED_BY_ID?: string,
     *   CREATED_BY_ID?: string,
     *   MODIFY_BY_ID?: string,
     *   DATE_CREATE?: string,
     *   DATE_MODIFY?: string,
     *   LEAD_ID?: string,
     *   ORIGINATOR_ID?: string,
     *   ORIGIN_ID?: string,
     *   ORIGIN_VERSION?: string,
     *   UTM_SOURCE?: string,
     *   UTM_MEDIUM?: string,
     *   UTM_CAMPAIGN?: string,
     *   UTM_CONTENT?: string,
     *   UTM_TERM?: string,
     *   PHONE?: string,
     *   EMAIL?: string,
     *   WEB?: string,
     *   IM?: string,
     *   } $fields
     *
     * @param array{
     *   REGISTER_SONET_EVENT?: string
     *   } $params
     *
     * @return UpdatedItemResult
     * @throws BaseException
     * @throws TransportException
     */
    public function update(int $companyId, array $fields, array $params = []): UpdatedItemResult
    {
        return new UpdatedItemResult(
            $this->core->call(
                'crm.company.update',
                [
                    'id'     => $companyId,
                    'fields' => $fields,
                    'params' => $params,
                ]
            )
        );
    }
}