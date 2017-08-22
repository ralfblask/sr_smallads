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
 * Ads
 */
class Ads extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * bodytext
	 *
	 * @var string
	 */
	protected $bodytext = '';

	/**
	 * code
	 *
	 * @var string
	 */
	protected $code = '';

	/**
	 * year
	 *
	 * @var int
	 */
	protected $year = 0;

	/**
	 * month
	 *
	 * @var int
	 */
	protected $month = 0;

	/**
	 * design
	 *
	 * @var string
	 */
	protected $design = '';

	/**
	 * email
	 *
	 * @var string
	 */
	protected $email = '';

	/**
	 * externalNumber
	 *
	 * @var string
	 */
	protected $externalNumber = '';

	/**
	 * adscategories
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\StadtRevue\SrSmallads\Domain\Model\Categories>
	 */
	protected $adscategories = NULL;

	/**
	 * Returns the year
	 *
	 * @return int $year
	 */
	public function getYear() {
		return $this->year;
	}

	/**
	 * Sets the year
	 *
	 * @param int $year
	 * @return void
	 */
	public function setYear($year) {
		$this->year = $year;
	}

	/**
	 * Returns the month
	 *
	 * @return int $month
	 */
	public function getMonth() {
		return $this->month;
	}

	/**
	 * Sets the month
	 *
	 * @param int $month
	 * @return void
	 */
	public function setMonth($month) {
		$this->month = $month;
	}

	/**
	 * Returns the code
	 *
	 * @return string $code
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * Sets the code
	 *
	 * @param string $code
	 * @return void
	 */
	public function setCode($code) {
		$this->code = $code;
	}

	/**
	 * Returns the design
	 *
	 * @return string $design
	 */
	public function getDesign() {
		return $this->design;
	}

	/**
	 * Sets the design
	 *
	 * @param string $design
	 * @return void
	 */
	public function setDesign($design) {
		$this->design = $design;
	}

	/**
	 * Returns the title
	 *
	 * @return string title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the bodytext
	 *
	 * @return string $bodytext
	 */
	public function getBodytext() {
		return $this->bodytext;
	}

	/**
	 * Sets the bodytext
	 *
	 * @param string $bodytext
	 * @return void
	 */
	public function setBodytext($bodytext) {
		$this->bodytext = $bodytext;
	}

	/**
	 * Returns the email
	 *
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Sets the email
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
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
		$this->adscategories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the externalNumber
	 *
	 * @return string $externalNumber
	 */
	public function getExternalNumber() {
		return $this->externalNumber;
	}

	/**
	 * Sets the externalNumber
	 *
	 * @param string $externalNumber
	 * @return void
	 */
	public function setExternalNumber($externalNumber) {
		$this->externalNumber = $externalNumber;
	}

	/**
	 * Adds a Categories
	 *
	 * @param \StadtRevue\SrSmallads\Domain\Model\Categories $adscategory
	 * @return void
	 */
	public function addAdscategory(\StadtRevue\SrSmallads\Domain\Model\Categories $adscategory) {
		$this->adscategories->attach($adscategory);
	}

	/**
	 * Removes a Categories
	 *
	 * @param \StadtRevue\SrSmallads\Domain\Model\Categories $adscategoryToRemove The Categories to be removed
	 * @return void
	 */
	public function removeAdscategory(\StadtRevue\SrSmallads\Domain\Model\Categories $adscategoryToRemove) {
		$this->adscategories->detach($adscategoryToRemove);
	}

	/**
	 * Returns the adscategories
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\StadtRevue\SrSmallads\Domain\Model\Categories> $adscategories
	 */
	public function getAdscategories() {
		return $this->adscategories;
	}

	/**
	 * Sets the adscategories
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\StadtRevue\SrSmallads\Domain\Model\Categories> $adscategories
	 * @return void
	 */
	public function setAdscategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $adscategories) {
		$this->adscategories = $adscategories;
	}

}