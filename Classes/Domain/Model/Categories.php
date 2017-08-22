<?php
namespace StadtRevue\SrSmallads\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Categories
 */
class Categories extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject {

	/**
	 * category
	 *
	 * @var string
	 */
	protected $category = '';

	/**
	 * originalCategory
	 *
	 * @var string
	 */
	protected $originalCategory = '';

	/**
	 * costless
	 *
	 * @var bool
	 */
	protected $costless = FALSE;

	/**
	 * Returns the category
	 *
	 * @return string $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Sets the category
	 *
	 * @param string $category
	 * @return void
	 */
	public function setCategory($category) {
		$this->category = $category;
	}

	/**
	 * Returns the originalCategory
	 *
	 * @return string $originalCategory
	 */
	public function getOriginalCategory() {
		return $this->originalCategory;
	}

	/**
	 * Sets the originalCategory
	 *
	 * @param string $originalCategory
	 * @return void
	 */
	public function setOriginalCategory($originalCategory) {
		$this->originalCategory = $originalCategory;
	}

	/**
	 * Returns the costless
	 *
	 * @return bool $costless
	 */
	public function getCostless() {
		return $this->costless;
	}

	/**
	 * Sets the costless
	 *
	 * @param bool $costless
	 * @return void
	 */
	public function setCostless($costless) {
		$this->costless = $costless;
	}

	/**
	 * Returns the boolean state of costless
	 *
	 * @return bool
	 */
	public function isCostless() {
		return $this->costless;
	}

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		
	}

}