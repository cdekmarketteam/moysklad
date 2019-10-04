<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;

class RetailStore extends AbstractStore
{
    /**
     * @Type("string")
     */
    private $defaultTaxSystem;

    /**
     * @Type("string")
     */
    private $orderTaxSystem;

    /**
     * @Type("string")
     */
    public $priorityOfdSend;

    /**
     * @Type("string")
     */
    public $demandPrefix;

    /**
     * @Type("int")
     */
    public $discountMaxPercent;

    /**
     * @Type("float")
     */
    public $bankPercent;

    /**
     * @Type("bool")
     */
    public $issueOrders;

    /**
     * @Type("bool")
     */
    public $sellReserves;

    /**
     * @Type("bool")
     */
    public $discountEnable;

    /**
     * @Type("bool")
     */
    public $controlShippingStock;

    /**
     * @Type("bool")
     */
    public $onlyInStock;

    /**
     * @Type("bool")
     */
    public $active;

    /**
     * @Type("bool")
     */
    public $controlCashierChoice;

    /**
     * @Type("bool")
     */
    public $authTokenAttached;

    /**
     * @Type("bool")
     */
    public $ofdEnabled;

    /**
     * @Type("bool")
     */
    public $allowCustomPrice;

    /**
     * @Type("bool")
     */
    public $allowSellTobaccoWithoutMRC;

    /**
     * @Type("bool")
     */
    public $allowCreateProducts;

    /**
     * @Type("bool")
     */
    public $createPaymentInOnRetailShiftClosing;

    /**
     * @Type("bool")
     */
    public $createCashInOnRetailShiftClosing;

    /**
     * @Type("bool")
     */
    public $returnFromClosedShiftEnabled;

    /**
     * @Type("bool")
     */
    public $enableReturnsWithNoReason;

    /**
     * @Type("bool")
     */
    public $printAlways;

    /**
     * @Type("bool")
     */
    public $reservePrepaidGoods;

    /**
     * @Type("MoySklad\Entity\PriceType")
     */
    public $priceType;

    /**
     * @Type("MoySklad\Entity\Agent\Organization")
     */
    public $organization;

    /**
     * @Type("MoySklad\Entity\Store\Store")
     */
    public $store;

    /**
     * @Type("MoySklad\Entity\Agent\Organization")
     */
    public $acquire;

    /**
     * @Type("MoySklad\Entity\State")
     */
    public $createOrderWithState;

    /**
     * @Type("MoySklad\Entity\State")
     */
    public $orderToState;

    /**
     * @Type("MoySklad\Entity\Store\Environment")
     */
    public $environment;

    /**
     * @Type("MoySklad\Entity\Store\State")
     */
    public $state;

    /**
     * @Type("MoySklad\Entity\ReceiptTemplate")
     */
    public $receiptTemplate;

    /**
     * @Type("MoySklad\Entity\ListEntity")
     */
    public $cashiers;

    /**
     * @Type("MoySklad\Entity\ListEntity")
     */
    public $productFolders;

    /**
     * @Type("array<MoySklad\Entity\Store\LastOperationName>")
     */
    public $lastOperationNames = [];

    /**
     * @Type("array<MoySklad\Entity\State>")
     */
    public $customerOrderStates = [];

    /**
     * @Type("array<string>")
     */
    public $createAgentsTags = [];

    /**
     * @Type("array<string>")
     */
    public $filterAgentsTags = [];

    /**
     * @return string
     */
    public function getDefaultTaxSystem(): string
    {
        return isset(self::TAX_SYSTEMS[$this->defaultTaxSystem]) ? self::TAX_SYSTEMS[$this->defaultTaxSystem] : '';
    }

    /**
     * @return string
     */
    public function getOrderTaxSystem(): string
    {
        return isset(self::TAX_SYSTEMS[$this->orderTaxSystem]) ? self::TAX_SYSTEMS[$this->orderTaxSystem] : '';
    }
}
