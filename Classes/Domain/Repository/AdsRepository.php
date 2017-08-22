<?php
namespace StadtRevue\SrSmallads\Domain\Repository;

use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use StadtRevue\SrSmallads\Domain\Model\Dto\AdsDemand;
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
 * The repository for Ads
 */
class AdsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * Returns the objects of this repository matching the given demand
	 *
	 * @param \StadtRevue\SrSmallads\Domain\Model\Dto\AdsDemand $adsDemand AdsDemand
	 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface QueryResultInterface
	 */
	public function findDemanded(AdsDemand $adsDemand
	) {
		$constraints = array();
		$query = $this->createQuery();
		$this->setStoragePageConstraint($query, $adsDemand, $constraints);
		$this->setCategoryConstraint($query, $adsDemand, $constraints);
		DebuggerUtility::var_dump($constraints, 'constraints');
		if (count($constraints) > 0) {
			$query->matching($query->logicalAnd($constraints));
		}
		return $query->execute();
	}

	/**
	 * Sets the category constraint to the given constraints array
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\QueryInterface $query Query
	 * @param \StadtRevue\SrSmallads\Domain\Model\Dto\AdsDemand $adsDemand AdsDemand
	 * @param array $constraints Constraints
	 * @return void
	 */
	protected function setCategoryConstraint($query, $adsDemand, $constraints
	) {
		if ($adsDemand->getCategory() != '') {
			$categoryConstraints = array();
			$categories = GeneralUtility::intExplode(',', $adsDemand->getCategory(), true);
			DebuggerUtility::var_dump($categories, '$categories');
			foreach ($categories as $category) {
				$categoryConstraints[] = $query->contains('adscategories', $category);
			}
			if (count($categoryConstraints) > 0) {
				$constraints[] = $query->logicalOr($categoryConstraints);
			}
		}
	}

	/**
	 * Sets the storagePage constraint to the given constraints array
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\QueryInterface $query Query
	 * @param \StadtRevue\SrSmallads\Domain\Model\Dto\AdsDemand $adsDemand AdsDemand
	 * @param array $constraints Constraints
	 * @return void
	 */
	protected function setStoragePageConstraint($query, $adsDemand, $constraints
	) {
		if ($adsDemand->getStoragePage() != '') {
			$pidList = GeneralUtility::intExplode(',', $adsDemand->getStoragePage(), true);
			$constraints[] = $query->in('pid', $pidList);
		}
	}

}