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
        'account' => Account::class,
        'address' => Address::class,
        'cashier' => Cashier::class,
        'contactperson' => ContactPerson::class,
        'context' => Context::class,
        'country' => Country::class,
        'note' => Note::class,
        'group' => Group::class,
        'image' => Image::class,
        'pricetype' => PriceType::class,
        'region' => Region::class,
        'productfolder' => Product\ProductFolder::class,
        'state' => State::class,
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
