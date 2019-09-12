<?php

namespace MoySklad\Entity\Agent;

class Employee extends Agent
{
    /** @var string */
    public $lastName;

    /** @var string */
    public $shortFio;

    /** @var string */
    public $fullName;

    /** @var bool */
    public $archived;

    /** @var string */
    public $uid;

    /** @var string */
    public $email;

    /** @var string */
    public $description;

    /** @var string */
    public $phone;

    /** @var string */
    public $firstName;

    /** @var string */
    public $middleName;

    /** @var string */
    public $inn;

    /** @var string */
    public $position;

    /** @var Image */
    public $image;

    /** @var Cashier */
    public $cashier;

    /**
     * @param array $data
     * @return Employee
     */
    public static function createFromArray(array $data): self
    {
        $entity = new self();
        $entity->lastName = $data['lastName'];
        $entity->shortFio = $data['shortFio'];
        $entity->fullName = $data['fullName'];
        $entity->archived = $data['archived'];
        $entity->uid = $data['uid'];
        $entity->email = $data['email'];
        $entity->description = $data['description'];
        $entity->phone = $data['phone'];
        $entity->firstName = $data['firstName'];
        $entity->middleName = $data['middleName'];
        $entity->inn = $data['inn'];
        $entity->position = $data['position'];
        $entity->image = Image::createFromArray($data['image']);
        $entity->cashier = Cashier::createFromArray($data['cashier']);

        return $entity;
    }
}
