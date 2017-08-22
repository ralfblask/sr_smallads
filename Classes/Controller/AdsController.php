<?php
namespace StadtRevue\SrSmallads\Controller;

use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

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
 * AdsController
 */
class AdsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * adsRepository
	 *
	 * @var \StadtRevue\SrSmallads\Domain\Repository\AdsRepository
	 * @inject
	 */
	protected $adsRepository = NULL;

	/**
	 * Creates an event demand object with the given settings
	 *
	 * @param array $settings The settings
	 * @return \StadtRevue\SrSmallads\Domain\Model\Dto\AdsDemand
	 */
	public function createEventDemandObjectFromSettings(array $settings
	) {
		/** @var \StadtRevue\SrSmallads\Domain\Model\Dto\AdsDemand $adsDemand */
		DebuggerUtility::var_dump($settings, 'settings xx');
		$adsDemand = $this->objectManager->get('StadtRevue\\SrSmallads\\Domain\\Model\\Dto\\AdsDemand');
		$adsDemand->setStoragePage($settings['storagePage']);
		$adsDemand->setCategory($settings['category']);
		DebuggerUtility::var_dump($adsDemand, 'adsDemand');
		return $adsDemand;
	}

	/**
	 * action list
	 *
	 * @param array $overwriteDemand OverwriteDemand
	 * @return void
	 */
	public function listAction(array $overwriteDemand = array()
	) {
		$adsDemand = $this->createEventDemandObjectFromSettings($this->settings);
		//DebuggerUtility::var_dump($adsDemand,'adsDemand');
		//$ads = $this->adsRepository->findAll();
		$ads = $this->adsRepository->findDemanded($adsDemand);
		DebuggerUtility::var_dump($ads, 'ads');
		$this->view->assign('ads', $ads);
	}

	/**
	 * action show
	 *
	 * @param \StadtRevue\SrSmallads\Domain\Model\Ads $ads
	 * @return void
	 */
	public function showAction(\StadtRevue\SrSmallads\Domain\Model\Ads $ads) {
		$this->view->assign('ads', $ads);
	}

	/**
	 * action new
	 *
	 * @return void
	 */
	public function newAction() {
		
	}

	/**
	 * action create
	 *
	 * @param \StadtRevue\SrSmallads\Domain\Model\Ads $newAds
	 * @return void
	 */
	public function createAction(\StadtRevue\SrSmallads\Domain\Model\Ads $newAds) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->adsRepository->add($newAds);
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \StadtRevue\SrSmallads\Domain\Model\Ads $ads
	 * @ignorevalidation $ads
	 * @return void
	 */
	public function editAction(\StadtRevue\SrSmallads\Domain\Model\Ads $ads) {
		$this->view->assign('ads', $ads);
	}

	/**
	 * action update
	 *
	 * @param \StadtRevue\SrSmallads\Domain\Model\Ads $ads
	 * @return void
	 */
	public function updateAction(\StadtRevue\SrSmallads\Domain\Model\Ads $ads) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->adsRepository->update($ads);
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \StadtRevue\SrSmallads\Domain\Model\Ads $ads
	 * @return void
	 */
	public function deleteAction(\StadtRevue\SrSmallads\Domain\Model\Ads $ads) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->adsRepository->remove($ads);
		$this->redirect('list');
	}

}