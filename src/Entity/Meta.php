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

        'account' => Account::class,
        'cashier' => Cashier::class,
        'component' => Component::class,
        'contactperson' => ContactPerson::class,
        'currency' => Currency::class,
        'country' => Country::class,
        'group' => Group::class,
        'image' => Image::class,
        'note' => Note::class,
        'pricetype' => PriceType::class,
        'region' => Region::class,
        'state' => State::class,
        'uom' => Uom::class,
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
