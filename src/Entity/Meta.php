<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

final class Meta
{
    private const TYPES = [
        'counterparty' => Agent\Counterparty::class,
        'employee' => Agent\Employee::class,
        'organization' => Agent\Organization::class,

        'discount' => Discount\Discount::class,
        'bonusprogram' => Discount\BonusProgram::class,
        'bonustransaction' => Discount\BonusTransaction::class,

        'customerorder' => Document\CustomerOrder::class,

        'retaildemand' => Document\RetailDemand::class,
        'demandposition' => Document\DemandPosition::class,
        'retailsalesreturn' => Document\RetailSalesReturn::class,
        'salesreturnposition' => Document\SalesReturnPosition::class,
        'retaildrawercashin' => Document\RetailDrawerCashIn::class,
        'retaildrawercashout' => Document\RetailDrawerCashOut::class,
        'retailshift' => Document\RetailShift::class,

        'bundle' => Product\Bundle::class,
        'product' => Product\Product::class,
        'productfolder' => Product\ProductFolder::class,
        'service' => Product\Service::class,

        'store' => Store\Store::class,
        'retailstore' => Store\RetailStore::class,

        'embeddedtemplate' => Template\EmbeddedTemplate::class,
        'customtemplate' => Template\CustomTemplate::class,

        'account' => Account::class,
        'bundlecomponent' => Component::class,
        'cashier' => Cashier::class,
        'consignment' => Consignment::class,
        'contract' => Contract::class,
        'contactperson' => ContactPerson::class,
        'country' => Country::class,
        'currency' => Currency::class,
        'customentity' => CustomEntity::class,
        'expenseitem' => ExpenseItem::class,
        'group' => Group::class,
        'image' => Image::class,
        'note' => Note::class,
        'pricetype' => PriceType::class,
        'project' => Project::class,
        'region' => Region::class,
        'state' => State::class,
        'task' => Task::class,
        'tasknote' => TaskNote::class,
        'uom' => Uom::class,
        'variant' => Variant::class,
        'webhook' => WebHook::class,
    ];

    /**
     * @Type("string")
     * @Generator()
     */
    public $href;

    /**
     * @Type("string")
     * @Generator()
     */
    public $metadataHref;

    /**
     * @Type("string")
     * @Generator()
     */
    public $type;

    /**
     * @Type("string")
     * @Generator()
     */
    public $mediaType;

    /**
     * @Type("string")
     * @Generator()
     */
    public $uuidHref;

    /**
     * @Type("string")
     * @Generator()
     */
    public $downloadHref;

    /**
     * @Type("int")
     * @Generator()
     */
    public $size;

    /**
     * @Type("int")
     * @Generator()
     */
    public $limit;

    /**
     * @Type("int")
     * @Generator()
     */
    public $offset;

    /**
     * @param string $type
     * @return string
     */
    public static function getClassNameByType(string $type): string
    {
        if (!isset(self::TYPES[$type])) {
            throw new \InvalidArgumentException('Meta type unsupported');
        }

        return self::TYPES[$type];
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return static::getClassNameByType($this->type);
    }

    /**
     * id не всегда передаётся в объекты, зато всегда есть в ссылке на объект в мета-данных
     *
     * @return string
     */
    public function getId() : string
    {
        $href = explode('/', $this->href);
        $href = end($href);
        $href = explode('?', $href);
        return reset($href);
    }
}
