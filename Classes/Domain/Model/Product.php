<?php
namespace TYPO3\WorkspaceTest\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Timo Webler <timo.webler@dkd.de>, dkd Internet Service GmbH
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
 *
 *
 * @package workspace_test
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Product extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * price
	 *
	 * @var \float
	 * @validate NotEmpty
	 */
	protected $price;

	/**
	 * descriptions
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\WorkspaceTest\Domain\Model\Description>
	 * @lazy
	 */
	protected $descriptions;

	/**
	 * media
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\File>
	 * @lazy
	 */
	protected $media;

	/**
	 * relatedProducts
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\WorkspaceTest\Domain\Model\Product>
	 * @lazy
	 */
	protected $relatedProducts;

	/**
	 * __construct
	 *
	 * @return Product
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->descriptions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		
		$this->media = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		
		$this->relatedProducts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return \string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param \string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the price
	 *
	 * @return \float $price
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * Sets the price
	 *
	 * @param \float $price
	 * @return void
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

	/**
	 * Adds a Description
	 *
	 * @param \TYPO3\WorkspaceTest\Domain\Model\Description $description
	 * @return void
	 */
	public function addDescription(\TYPO3\WorkspaceTest\Domain\Model\Description $description) {
		$this->descriptions->attach($description);
	}

	/**
	 * Removes a Description
	 *
	 * @param \TYPO3\WorkspaceTest\Domain\Model\Description $descriptionToRemove The Description to be removed
	 * @return void
	 */
	public function removeDescription(\TYPO3\WorkspaceTest\Domain\Model\Description $descriptionToRemove) {
		$this->descriptions->detach($descriptionToRemove);
	}

	/**
	 * Returns the descriptions
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\WorkspaceTest\Domain\Model\Description> $descriptions
	 */
	public function getDescriptions() {
		return $this->descriptions;
	}

	/**
	 * Sets the descriptions
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\WorkspaceTest\Domain\Model\Description> $descriptions
	 * @return void
	 */
	public function setDescriptions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $descriptions) {
		$this->descriptions = $descriptions;
	}

	/**
	 * Adds a File
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $medium
	 * @return void
	 */
	public function addMedium(\TYPO3\CMS\Extbase\Domain\Model\FileReference $medium) {
		$this->media->attach($medium);
	}

	/**
	 * Removes a File
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $mediumToRemove The File to be removed
	 * @return void
	 */
	public function removeMedium(\TYPO3\CMS\Extbase\Domain\Model\FileReference $mediumToRemove) {
		$this->media->detach($mediumToRemove);
	}

	/**
	 * Returns the media
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $media
	 */
	public function getMedia() {
		return $this->media;
	}

	/**
	 * Sets the media
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $media
	 * @return void
	 */
	public function setMedia(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $media) {
		$this->media = $media;
	}

	/**
	 * Adds a Product
	 *
	 * @param \TYPO3\WorkspaceTest\Domain\Model\Product $relatedProduct
	 * @return void
	 */
	public function addRelatedProduct(\TYPO3\WorkspaceTest\Domain\Model\Product $relatedProduct) {
		$this->relatedProducts->attach($relatedProduct);
	}

	/**
	 * Removes a Product
	 *
	 * @param \TYPO3\WorkspaceTest\Domain\Model\Product $relatedProductToRemove The Product to be removed
	 * @return void
	 */
	public function removeRelatedProduct(\TYPO3\WorkspaceTest\Domain\Model\Product $relatedProductToRemove) {
		$this->relatedProducts->detach($relatedProductToRemove);
	}

	/**
	 * Returns the relatedProducts
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\WorkspaceTest\Domain\Model\Product> $relatedProducts
	 */
	public function getRelatedProducts() {
		return $this->relatedProducts;
	}

	/**
	 * Sets the relatedProducts
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\WorkspaceTest\Domain\Model\Product> $relatedProducts
	 * @return void
	 */
	public function setRelatedProducts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $relatedProducts) {
		$this->relatedProducts = $relatedProducts;
	}

}
?>