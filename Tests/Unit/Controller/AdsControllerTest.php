<?php
namespace StadtRevue\SrSmallads\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 
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
 * Test case for class StadtRevue\SrSmallads\Controller\AdsController.
 *
 */
class AdsControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \StadtRevue\SrSmallads\Controller\AdsController
	 */
	protected $subject = NULL;

	public function setUp() {
		$this->subject = $this->getMock('StadtRevue\\SrSmallads\\Controller\\AdsController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllAdssFromRepositoryAndAssignsThemToView() {

		$allAdss = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$adsRepository = $this->getMock('StadtRevue\\SrSmallads\\Domain\\Repository\\AdsRepository', array('findAll'), array(), '', FALSE);
		$adsRepository->expects($this->once())->method('findAll')->will($this->returnValue($allAdss));
		$this->inject($this->subject, 'adsRepository', $adsRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('adss', $allAdss);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenAdsToView() {
		$ads = new \StadtRevue\SrSmallads\Domain\Model\Ads();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('ads', $ads);

		$this->subject->showAction($ads);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenAdsToView() {
		$ads = new \StadtRevue\SrSmallads\Domain\Model\Ads();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newAds', $ads);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($ads);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenAdsToAdsRepository() {
		$ads = new \StadtRevue\SrSmallads\Domain\Model\Ads();

		$adsRepository = $this->getMock('StadtRevue\\SrSmallads\\Domain\\Repository\\AdsRepository', array('add'), array(), '', FALSE);
		$adsRepository->expects($this->once())->method('add')->with($ads);
		$this->inject($this->subject, 'adsRepository', $adsRepository);

		$this->subject->createAction($ads);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenAdsToView() {
		$ads = new \StadtRevue\SrSmallads\Domain\Model\Ads();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('ads', $ads);

		$this->subject->editAction($ads);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenAdsInAdsRepository() {
		$ads = new \StadtRevue\SrSmallads\Domain\Model\Ads();

		$adsRepository = $this->getMock('StadtRevue\\SrSmallads\\Domain\\Repository\\AdsRepository', array('update'), array(), '', FALSE);
		$adsRepository->expects($this->once())->method('update')->with($ads);
		$this->inject($this->subject, 'adsRepository', $adsRepository);

		$this->subject->updateAction($ads);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenAdsFromAdsRepository() {
		$ads = new \StadtRevue\SrSmallads\Domain\Model\Ads();

		$adsRepository = $this->getMock('StadtRevue\\SrSmallads\\Domain\\Repository\\AdsRepository', array('remove'), array(), '', FALSE);
		$adsRepository->expects($this->once())->method('remove')->with($ads);
		$this->inject($this->subject, 'adsRepository', $adsRepository);

		$this->subject->deleteAction($ads);
	}
}
