<?php
/**
 * Copyright (c) 2021.
 * Created By
 * @author Mike Hartl
 * @copyright 2021  Mike Hartl All rights reserved
 * @license  The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created 4.03.2021
 * @version 0.0.0
 */

namespace ThorWalez\WaybillCreator\PostScripts\Fields;

use ThorWalez\WaybillCreator\Converters\GermanSpecialCharacterToPostScriptCharacter;

/**
 * Class AbstractAddress
 * @package ThorWalez\WaybillCreator\PostScripts\Fields
 */
abstract class AbstractAddress
{
    const FILED_POSITION_PATTERN = '%d %d moveto (%s) show';

    /** @var string */
    protected $firstName;

    /** @var string */
    protected $secondeName;

    /** @var string */
    protected $street;

    /** @var string */
    protected $houseNumber;

    /** @var string */
    protected $postalCode;

    /** @var string */
    protected $city;

    /** @var string */
    protected $state;

    /** @var string */
    protected $country;

    /** @var string */
    protected $phoneNumber;

    /** @var string */
    protected $contactPerson;

    /**
     * @return string
     */
    abstract public function getName() : string;

    /**
     * @return string
     */
    abstract public function getStreet() : string;

    /**
     * @return string
     */
    abstract public function getPostalCode() : string;

    /**
     * @return string
     */
    abstract public function getCity() : string;

    /**
     * @return string
     */
    abstract public function getState() : string;

    /**
     * @return string
     */
    abstract public function getCountry() : string;

    /**
     * @return string
     */
    abstract public function getPhoneNumber() : string;

    /**
     * @return string
     */
    abstract public function getContactPerson() : string;

    /**
     * @return string
     */
    public function toString() : string
    {
        $converter = new GermanSpecialCharacterToPostScriptCharacter();

        /** @todo converter der Umlaute bauen */
        return $converter->convert($this->getName()) . \PHP_EOL .
            $converter->convert($this->getStreet()) . \PHP_EOL .
            $this->getPostalCode() . \PHP_EOL .
            $converter->convert($this->getCity()) . \PHP_EOL .
            $converter->convert($this->getState()) . \PHP_EOL .
            $converter->convert($this->getCountry()) . \PHP_EOL .
            $this->getPhoneNumber() . \PHP_EOL .
            $converter->convert($this->getContactPerson()) . \PHP_EOL;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->toString();
    }

}