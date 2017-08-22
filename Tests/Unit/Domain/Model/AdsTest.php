<?php

namespace StadtRevue\SrSmallads\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \StadtRevue\SrSmallads\Domain\Model\Ads.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class AdsTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \StadtRevue\SrSmallads\Domain\Model\Ads
	 */
	protected $subject = NULL;

	public function setUp() {
		$this->subject = new \StadtRevue\SrSmallads\Domain\Model\Ads();
	}

	public function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() {
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBodytextReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getBodytext()
		);
	}

	/**
	 * @test
	 */
	public function setBodytextForStringSetsBodytext() {
		$this->subject->setBodytext('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'bodytext',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCodeReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getCode()
		);
	}

	/**
	 * @test
	 */
	public function setCodeForStringSetsCode() {
		$this->subject->setCode('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'code',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getYearReturnsInitialValueForInt() {	}

	/**
	 * @test
	 */
	public function setYearForIntSetsYear() {	}

	/**
	 * @test
	 */
	public function getMonthReturnsInitialValueForInt() {	}

	/**
	 * @test
	 */
	public function setMonthForIntSetsMonth() {	}

	/**
	 * @test
	 */
	public function getDesignReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDesign()
		);
	}

	/**
	 * @test
	 */
	public function setDesignForStringSetsDesign() {
		$this->subject->setDesign('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'design',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail() {
		$this->subject->setEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'email',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getExternalNumberReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getExternalNumber()
		);
	}

	/**
	 * @test
	 */
	public function setExternalNumberForStringSetsExternalNumber() {
		$this->subject->setExternalNumber('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'externalNumber',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAdscategoriesReturnsInitialValueForCategories() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getAdscategories()
		);
	}

	/**
	 * @test
	 */
	public function setAdscategoriesForObjectStorageContainingCategoriesSetsAdscategories() {
		$adscategory = new \StadtRevue\SrSmallads\Domain\Model\Categories();
		$objectStorageHoldingExactlyOneAdscategories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneAdscategories->attach($adscategory);
		$this->subject->setAdscategories($objectStorageHoldingExactlyOneAdscategories);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneAdscategories,
			'adscategories',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addAdscategoryToObjectStorageHoldingAdscategories() {
		$adscategory = new \StadtRevue\SrSmallads\Domain\Model\Categories();
		$adscategoriesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$adscategoriesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($adscategory));
		$this->inject($this->subject, 'adscategories', $adscategoriesObjectStorageMock);

		$this->subject->addAdscategory($adscategory);
	}

	/**
	 * @test
	 */
	public function removeAdscategoryFromObjectStorageHoldingAdscategories() {
		$adscategory = new \StadtRevue\SrSmallads\Domain\Model\Categories();
		$adscategoriesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$adscategoriesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($adscategory));
		$this->inject($this->subject, 'adscategories', $adscategoriesObjectStorageMock);

		$this->subject->removeAdscategory($adscategory);

	}
}
