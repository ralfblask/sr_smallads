<?php
namespace StadtRevue\SrSmallads\Domain\Model\Dto;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Event demand
 *
 * @author Ralf Blask <technik@stadtrevue.de>
 */
class AdsDemand extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Storage page
     *
     * @var string
     */
    protected $storagePage;

    /**
     * Category
     *
     * @var string
     */
    protected $category;

    /**
     * Sets the storage page
     *
     * @param string $storagePage Storagepage
     *
     * @return void
     */
    public function setStoragePage($storagePage)
    {
        $this->storagePage = $storagePage;
    }

    /**
     * Returns the storage page
     *
     * @return string
     */
    public function getStoragePage()
    {
        return $this->storagePage;
    }

    /**
     * Sets the category (seperated by comma)
     *
     * @param string $category Category
     *
     * @return void
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Returns the category (seperated by comma)
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }
}