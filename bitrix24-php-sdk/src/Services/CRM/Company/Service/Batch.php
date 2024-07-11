<?php

declare(strict_types=1);

namespace Bitrix24\SDK\Services\CRM\Company\Service;

use Bitrix24\SDK\Core\Exceptions\BaseException;
use Bitrix24\SDK\Core\Result\AddedItemBatchResult;
use Bitrix24\SDK\Core\Result\DeletedItemBatchResult;
use Bitrix24\SDK\Core\Result\UpdatedItemBatchResult;
use Bitrix24\SDK\Services\AbstractBatchService;
use Bitrix24\SDK\Services\CRM\Company\Result\CompanyItemResult;
use Generator;

/**
 * Class Batch
 *
 * @package Bitrix24\SDK\Services\CRM\Company\Service
 */
class Batch extends AbstractBatchService
{
    /**
     * batch list method
     *
     * @param array{
     *                         ID?: string,
     *                         HONORIFIC?: string,
     *                         NAME?: string,
     *                         SECOND_NAME?: string,
     *                         LAST_NAME?: string,
     *                         PHOTO?: string,
     *                         BIRTHDATE?: string,
     *                         TYPE_ID?: string,
     *                         SOURCE_ID?: string,
     *                         SOURCE_DESCRIPTION?: string,
     *                         POST?: string,
     *                         ADDRESS?: string,
     *                         ADDRESS_2?: string,
     *                         ADDRESS_CITY?: string,
     *                         ADDRESS_POSTAL_CODE?: string,
     *                         ADDRESS_REGION?: string,
     *                         ADDRESS_PROVINCE?: string,
     *                         ADDRESS_COUNTRY?: string,
     *                         ADDRESS_COUNTRY_CODE?: string,
     *                         ADDRESS_LOC_ADDR_ID?: string,
     *                         COMMENTS?: string,
     *                         OPENED?: string,
     *                         EXPORT?: string,
     *                         HAS_PHONE?: string,
     *                         HAS_EMAIL?: string,
     *                         HAS_IMOL?: string,
     *                         ASSIGNED_BY_ID?: string,
     *                         CREATED_BY_ID?: string,
     *                         MODIFY_BY_ID?: string,
     *                         DATE_CREATE?: string,
     *                         DATE_MODIFY?: string,
     *                         COMPANY_ID?: string,
     *                         COMPANY_IDS?: string,
     *                         LEAD_ID?: string,
     *                         ORIGINATOR_ID?: string,
     *                         ORIGIN_ID?: string,
     *                         ORIGIN_VERSION?: string,
     *                         FACE_ID?: string,
     *                         UTM_SOURCE?: string,
     *                         UTM_MEDIUM?: string,
     *                         UTM_CAMPAIGN?: string,
     *                         UTM_CONTENT?: string,
     *                         UTM_TERM?: string,
     *                         PHONE?: string,
     *                         EMAIL?: string,
     *                         WEB?: string,
     *                         IM?: string,
     *                         } $order
     *
     * @param array{
     *                         ID?: int,
     *                         HONORIFIC?: string,
     *                         NAME?: string,
     *                         SECOND_NAME?: string,
     *                         LAST_NAME?: string,
     *                         PHOTO?: string,
     *                         BIRTHDATE?: string,
     *                         TYPE_ID?: string,
     *                         SOURCE_ID?: string,
     *                         SOURCE_DESCRIPTION?: string,
     *                         POST?: string,
     *                         ADDRESS?: string,
     *                         ADDRESS_2?: string,
     *                         ADDRESS_CITY?: string,
     *                         ADDRESS_POSTAL_CODE?: string,
     *                         ADDRESS_REGION?: string,
     *                         ADDRESS_PROVINCE?: string,
     *                         ADDRESS_COUNTRY?: string,
     *                         ADDRESS_COUNTRY_CODE?: string,
     *                         ADDRESS_LOC_ADDR_ID?: int,
     *                         COMMENTS?: string,
     *                         OPENED?: string,
     *                         EXPORT?: string,
     *                         HAS_PHONE?: string,
     *                         HAS_EMAIL?: string,
     *                         HAS_IMOL?: string,
     *                         ASSIGNED_BY_ID?: string,
     *                         CREATED_BY_ID?: string,
     *                         MODIFY_BY_ID?: string,
     *                         DATE_CREATE?: string,
     *                         DATE_MODIFY?: string,
     *                         COMPANY_ID?: string,
     *                         COMPANY_IDS?: string,
     *                         LEAD_ID?: string,
     *                         ORIGINATOR_ID?: string,
     *                         ORIGIN_ID?: string,
     *                         ORIGIN_VERSION?: string,
     *                         FACE_ID?: int,
     *                         UTM_SOURCE?: string,
     *                         UTM_MEDIUM?: string,
     *                         UTM_CAMPAIGN?: string,
     *                         UTM_CONTENT?: string,
     *                         UTM_TERM?: string,
     *                         PHONE?: string,
     *                         EMAIL?: string,
     *                         WEB?: string,
     *                         IM?: string,
     *                         } $filter
     * @param array $select = ['ID','HONORIFIC','NAME','SECOND_NAME','LAST_NAME','PHOTO','BIRTHDATE','TYPE_ID','SOURCE_ID','SOURCE_DESCRIPTION','POST','ADDRESS','ADDRESS_2','ADDRESS_CITY','ADDRESS_POSTAL_CODE','ADDRESS_REGION','ADDRESS_PROVINCE','ADDRESS_COUNTRY','ADDRESS_COUNTRY_CODE','ADDRESS_LOC_ADDR_ID','COMMENTS','OPENED','EXPORT','HAS_PHONE','HAS_EMAIL','HAS_IMOL','ASSIGNED_BY_ID','CREATED_BY_ID','MODIFY_BY_ID','DATE_CREATE','DATE_MODIFY','COMPANY_ID','COMPANY_IDS','LEAD_ID','ORIGINATOR_ID','ORIGIN_ID','ORIGIN_VERSION','FACE_ID','UTM_SOURCE','UTM_MEDIUM','UTM_CAMPAIGN','UTM_CONTENT','UTM_TERM','PHONE','EMAIL','WEB','IM']
     * @param int|null $limit
     *
     * @return Generator<int, CompanyItemResult>
     * @throws BaseException
     */
    public function list(array $order, array $filter, array $select, ?int $limit = null): Generator
    {
        $this->log->debug(
            'list',
            [
                'order' => $order,
                'filter' => $filter,
                'select' => $select,
                'limit' => $limit,
            ]
        );
        foreach ($this->batch->getTraversableList('crm.company.list', $order, $filter, $select, $limit) as $key => $value) {
            yield $key => new CompanyItemResult($value);
        }
    }

    /**
     * Batch adding companies
     *
     * @param array <int, array{
     *                         ID?: int,
     *                         HONORIFIC?: string,
     *                         NAME?: string,
     *                         SECOND_NAME?: string,
     *                         LAST_NAME?: string,
     *                         PHOTO?: string,
     *                         BIRTHDATE?: string,
     *                         TYPE_ID?: string,
     *                         SOURCE_ID?: string,
     *                         SOURCE_DESCRIPTION?: string,
     *                         POST?: string,
     *                         ADDRESS?: string,
     *                         ADDRESS_2?: string,
     *                         ADDRESS_CITY?: string,
     *                         ADDRESS_POSTAL_CODE?: string,
     *                         ADDRESS_REGION?: string,
     *                         ADDRESS_PROVINCE?: string,
     *                         ADDRESS_COUNTRY?: string,
     *                         ADDRESS_COUNTRY_CODE?: string,
     *                         ADDRESS_LOC_ADDR_ID?: int,
     *                         COMMENTS?: string,
     *                         OPENED?: string,
     *                         EXPORT?: string,
     *                         HAS_PHONE?: string,
     *                         HAS_EMAIL?: string,
     *                         HAS_IMOL?: string,
     *                         ASSIGNED_BY_ID?: string,
     *                         CREATED_BY_ID?: string,
     *                         MODIFY_BY_ID?: string,
     *                         DATE_CREATE?: string,
     *                         DATE_MODIFY?: string,
     *                         COMPANY_ID?: string,
     *                         COMPANY_IDS?: string,
     *                         LEAD_ID?: string,
     *                         ORIGINATOR_ID?: string,
     *                         ORIGIN_ID?: string,
     *                         ORIGIN_VERSION?: string,
     *                         FACE_ID?: int,
     *                         UTM_SOURCE?: string,
     *                         UTM_MEDIUM?: string,
     *                         UTM_CAMPAIGN?: string,
     *                         UTM_CONTENT?: string,
     *                         UTM_TERM?: string,
     *                         PHONE?: string,
     *                         EMAIL?: string,
     *                         WEB?: string,
     *                         IM?: string,
     *                         }> $companies
     *
     * @return Generator<int, AddedItemBatchResult>|AddedItemBatchResult[]
     */
    public function add(array $companies): Generator
    {
        $items = [];
        foreach ($companies as $company) {
            $items[] = [
                'fields' => $company,
            ];
        }
        foreach ($this->batch->addEntityItems('crm.company.add', $items) as $key => $item) {
            yield $key => new AddedItemBatchResult($item);
        }
    }

    /**
     * Batch update companies
     *
     * Update elements in array with structure
     * element_id => [  // company id
     *  'fields' => [], // company fields to update
     *  'params' => []
     * ]
     *
     * @param array<int, array> $entityItems
     * @return Generator
     * @throws BaseException
     */
    public function update(array $entityItems): Generator
    {
        foreach ($this->batch->updateEntityItems('crm.company.update', $entityItems) as $key => $item) {
            yield $key => new UpdatedItemBatchResult($item);
        }
    }

    /**
     * Batch delete company items
     *
     * @param int[] $companyId
     *
     * @return \Generator
     * @throws \Bitrix24\SDK\Core\Exceptions\BaseException
     */
    public function delete(array $companyId): Generator
    {
        foreach ($this->batch->deleteEntityItems('crm.company.delete', $companyId) as $key => $item) {
            yield $key => new DeletedItemBatchResult($item);
        }
    }
}