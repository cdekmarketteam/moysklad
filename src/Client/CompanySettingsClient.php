<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Entity\CompanySettings;
use MoySklad\Entity\PriceType;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;

class CompanySettingsClient extends EntityClientBase
{
    /**
     * CompanySettingsClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/context/companysettings/');
    }

    /**
     * @return CompanySettings
     * @throws ApiClientException
     */
    public function getCompanySettings(): CompanySettings
    {
        /** @var CompanySettings $companySettings */
        $companySettings = RequestExecutor::path($this->getApi(), $this->getPath())->get(CompanySettings::class);

        return $companySettings;
    }

    /**
     * @return PriceType[]
     * @throws ApiClientException
     */
    public function getPriceTypes(): array
    {
        $className = PriceType::class;

        /** @var PriceType[] $priceTypes */
        $priceTypes = RequestExecutor::path($this->getApi(), $this->getPath().'pricetype')->get("array<{$className}>");

        return $priceTypes;
    }

    /**
     * @param PriceType[] $priceTypes
     * @return PriceType[]
     * @throws ApiClientException
     */
    public function massUpdatePriceTypes(array $priceTypes): array
    {
        $className = PriceType::class;

        /** @var PriceType[] $priceTypes */
        $priceTypes = RequestExecutor::path($this->getApi(), $this->getPath().'pricetype')->bodyArray($priceTypes)->post("array<{$className}>");

        return $priceTypes;
    }

    /**
     * @param string $priceTypeId
     * @return PriceType
     * @throws ApiClientException
     */
    public function getPriceType(string $priceTypeId): PriceType
    {
        /** @var PriceType $priceType */
        $priceType = RequestExecutor::path($this->getApi(), $this->getPath().'pricetype/'.$priceTypeId)->get(PriceType::class);

        return $priceType;
    }

    /**
     * @return PriceType
     * @throws ApiClientException
     */
    public function getDefaultPriceType(): PriceType
    {
        /** @var PriceType $priceType */
        $priceType = RequestExecutor::path($this->getApi(), $this->getPath().'pricetype/default')->get(PriceType::class);

        return $priceType;
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return CompanySettings::class;
    }
}
