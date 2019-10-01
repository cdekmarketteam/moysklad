<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

final class Meta
{
    private const TYPES = [
        'counterparty' => Agent\Counterparty::class,
        'employee' => Agent\Employee::class,
        'organization' => Agent\Organization::class,

        'bonusprogram' => Discount\BonusProgram::class,

        'bundle' => Product\Bundle::class,
        'product' => Product\Product::class,
        'productfolder' => Product\ProductFolder::class,
        'service' => Product\Service::class,

        'store' => Store\Store::class,
        'retailstore' => Store\RetailStore::class,

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
        'uom' => Uom::class,
        'variant' => Variant::class,
    ];

    /**
     * @Type("string")
     */
    public $href;

    /**
     * @Type("string")
     */
    public $metadataHref;

    /**
     * @Type("string")
     */
    public $type;

    /**
     * @Type("string")
     */
    public $mediaType;

    /**
     * @Type("string")
     */
    public $uuidHref;

    /**
     * @Type("string")
     */
    public $downloadHref;

    /**
     * @Type("int")
     */
    public $size;

    /**
     * @Type("int")
     */
    public $limit;

    /**
     * @Type("int")
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
}
