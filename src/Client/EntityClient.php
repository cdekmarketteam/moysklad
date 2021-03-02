<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Entity\Meta;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;

class EntityClient
{
    /**
     * @var ApiClient
     */
    private $api;

    public function __construct(ApiClient $api)
    {
        $this->api = $api;
    }

    /**
     * @return AssortmentClient
     */
    public function assortment(): AssortmentClient
    {
        return new AssortmentClient($this->api);
    }

    /**
     * @return BonusProgramClient
     */
    public function bonusprogram(): BonusProgramClient
    {
        return new BonusProgramClient($this->api);
    }

    /**
     * @return BonusTransactionClient
     */
    public function bonustransaction(): BonusTransactionClient
    {
        return new BonusTransactionClient($this->api);
    }

    /**
     * @return BundleClient
     */
    public function bundle(): BundleClient
    {
        return new BundleClient($this->api);
    }

    /**
     * @return CompanySettingsClient
     */
    public function companysettings(): CompanySettingsClient
    {
        return new CompanySettingsClient($this->api);
    }

    /**
     * @return ConsignmentClient
     */
    public function consignment(): ConsignmentClient
    {
        return new ConsignmentClient($this->api);
    }

    /**
     * @return ContractClient
     */
    public function contract(): ContractClient
    {
        return new ContractClient($this->api);
    }

    /**
     * @return CounterpartyClient
     */
    public function counterparty(): CounterpartyClient
    {
        return new CounterpartyClient($this->api);
    }

    /**
     * @return CountryClient
     */
    public function country(): CountryClient
    {
        return new CountryClient($this->api);
    }

    /**
     * @return CurrencyClient
     */
    public function currency(): CurrencyClient
    {
        return new CurrencyClient($this->api);
    }

    /**
     * @return CustomEntityClient
     */
    public function customentity(): CustomEntityClient
    {
        return new CustomEntityClient($this->api);
    }

    /**
     * @return CustomerOrderClient
     */
    public function customerorder(): CustomerOrderClient
    {
        return new CustomerOrderClient($this->api);
    }

    /**
     * @return DiscountClient
     */
    public function discount(): DiscountClient
    {
        return new DiscountClient($this->api);
    }

    /**
     * @return EmployeeClient
     */
    public function employee(): EmployeeClient
    {
        return new EmployeeClient($this->api);
    }

    /**
     * @return ExpenseItemClient
     */
    public function expenseitem(): ExpenseItemClient
    {
        return new ExpenseItemClient($this->api);
    }

    /**
     * @return GroupClient
     */
    public function group(): GroupClient
    {
        return new GroupClient($this->api);
    }

    /**
     * @return OrganizationClient
     */
    public function organization(): OrganizationClient
    {
        return new OrganizationClient($this->api);
    }

    public function pricetype(): PriceTypeClient
    {
        return new PriceTypeClient($this->api);
    }

    /**
     * @return ProductClient
     */
    public function product(): ProductClient
    {
        return new ProductClient($this->api);
    }

    /**
     * @return ProductFolderClient
     */
    public function productfolder(): ProductFolderClient
    {
        return new ProductFolderClient($this->api);
    }

    /**
     * @return ProjectClient
     */
    public function project(): ProjectClient
    {
        return new ProjectClient($this->api);
    }

    /**
     * @return RegionClient
     */
    public function region(): RegionClient
    {
        return new RegionClient($this->api);
    }

    /**
     * @return RetailStoreClient
     */
    public function retailstore(): RetailStoreClient
    {
        return new RetailStoreClient($this->api);
    }

    /**
     * @return ServiceClient
     */
    public function service(): ServiceClient
    {
        return new ServiceClient($this->api);
    }

    /**
     * @return StoreClient
     */
    public function store(): StoreClient
    {
        return new StoreClient($this->api);
    }

    /**
     * @return TaskClient
     */
    public function task(): TaskClient
    {
        return new TaskClient($this->api);
    }

    /**
     * @return UomClient
     */
    public function uom(): UomClient
    {
        return new UomClient($this->api);
    }

    /**
     * @return VariantClient
     */
    public function variant(): VariantClient
    {
        return new VariantClient($this->api);
    }

    /**
     * @return StockClient
     */
    public function stock(): StockClient
    {
        return new StockClient($this->api);
    }

    /**
     * @return StateClient
     */
    public function state(): StateClient
    {
        return new StateClient($this->api);
    }

    /**
     * @return ContextClient
     */
    public function context(): ContextClient
    {
        return new ContextClient($this->api);
    }

    /**
     * @return StatusClient
     */
    public function status() : StatusClient
    {
        return new StatusClient($this->api);
    }

    /**
     * @return RetailDemandClient
     */
    public function retaildemand(): RetailDemandClient
    {
        return new RetailDemandClient($this->api);
    }

    /**
     * @return RetailSalesReturnClient
     */
    public function retailsalesreturn(): RetailSalesReturnClient
    {
        return new RetailSalesReturnClient($this->api);
    }

    /**
     * @return RetailDrawerCashInClient
     */
    public function retaildrawercashin(): RetailDrawerCashInClient
    {
        return new RetailDrawerCashInClient($this->api);
    }

    /**
     * @return RetailDrawerCashOutClient
     */
    public function retaildrawercashout(): RetailDrawerCashOutClient
    {
        return new RetailDrawerCashOutClient($this->api);
    }

    public function getAllClassObjects(string $class): array
    {
        return $this->byClass($class)->getList()->rows;
    }

    public function byClass(string $class): EntityClientBase
    {
        $entity = $this->getEntityByClass($class);
        if (!$this->hasEntity($entity)) {
            throw new \RuntimeException("Undefined '$entity' entity'");
        }

        return $this->$entity();
    }

    public function hasEntity(string $class): bool
    {
        $entity = $this->getEntityByClass($class);
        return method_exists($this, $entity);
    }

    public function getEntityByClass(string $class): string
    {
        $class = explode('\\', $class);
        return array_pop($class);
    }

    /**
     * Получение модели по её мета-данным
     *
     * @param Meta $meta
     * @return object
     * @throws ApiClientException
     */
    public function getByMeta(Meta $meta): object
    {
        return RequestExecutor::path($this->api, $meta->href)->get($meta->getClassName());
    }

    /**
     * @return WebHookClient
     */
    public function webhook() : WebHookClient
    {
        return new WebHookClient($this->api);
    }
}
