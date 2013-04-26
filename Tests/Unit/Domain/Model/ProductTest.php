<?php

namespace TYPO3\WorkspaceTest\Tests;
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
 * Test case for class \TYPO3\WorkspaceTest\Domain\Model\Product.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Workspace test extension
 *
 * @author Timo Webler <timo.webler@dkd.de>
 */
class ProductTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \TYPO3\WorkspaceTest\Domain\Model\Product
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \TYPO3\WorkspaceTest\Domain\Model\Product();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getPriceReturnsInitialValueForFloat() { 
		$this->assertSame(
			0.0,
			$this->fixture->getPrice()
		);
	}

	/**
	 * @test
	 */
	public function setPriceForFloatSetsPrice() { 
		$this->fixture->setPrice(3.14159265);

		$this->assertSame(
			3.14159265,
			$this->fixture->getPrice()
		);
	}
	
	/**
	 * @test
	 */
	public function getDescriptionsReturnsInitialValueForDescription() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getDescriptions()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionsForObjectStorageContainingDescriptionSetsDescriptions() { 
		$description = new \TYPO3\WorkspaceTest\Domain\Model\Description();
		$objectStorageHoldingExactlyOneDescriptions = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneDescriptions->attach($description);
		$this->fixture->setDescriptions($objectStorageHoldingExactlyOneDescriptions);

		$this->assertSame(
			$objectStorageHoldingExactlyOneDescriptions,
			$this->fixture->getDescriptions()
		);
	}
	
	/**
	 * @test
	 */
	public function addDescriptionToObjectStorageHoldingDescriptions() {
		$description = new \TYPO3\WorkspaceTest\Domain\Model\Description();
		$objectStorageHoldingExactlyOneDescription = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneDescription->attach($description);
		$this->fixture->addDescription($description);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneDescription,
			$this->fixture->getDescriptions()
		);
	}

	/**
	 * @test
	 */
	public function removeDescriptionFromObjectStorageHoldingDescriptions() {
		$description = new \TYPO3\WorkspaceTest\Domain\Model\Description();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($description);
		$localObjectStorage->detach($description);
		$this->fixture->addDescription($description);
		$this->fixture->removeDescription($description);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getDescriptions()
		);
	}
	
	/**
	 * @test
	 */
	public function getMediaReturnsInitialValueForFile() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getMedia()
		);
	}

	/**
	 * @test
	 */
	public function setMediaForObjectStorageContainingFileSetsMedia() { 
		$medium = new \TYPO3\CMS\Extbase\Domain\Model\File();
		$objectStorageHoldingExactlyOneMedia = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneMedia->attach($medium);
		$this->fixture->setMedia($objectStorageHoldingExactlyOneMedia);

		$this->assertSame(
			$objectStorageHoldingExactlyOneMedia,
			$this->fixture->getMedia()
		);
	}
	
	/**
	 * @test
	 */
	public function addMediumToObjectStorageHoldingMedia() {
		$medium = new \TYPO3\CMS\Extbase\Domain\Model\File();
		$objectStorageHoldingExactlyOneMedium = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneMedium->attach($medium);
		$this->fixture->addMedium($medium);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneMedium,
			$this->fixture->getMedia()
		);
	}

	/**
	 * @test
	 */
	public function removeMediumFromObjectStorageHoldingMedia() {
		$medium = new \TYPO3\CMS\Extbase\Domain\Model\File();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($medium);
		$localObjectStorage->detach($medium);
		$this->fixture->addMedium($medium);
		$this->fixture->removeMedium($medium);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getMedia()
		);
	}
	
	/**
	 * @test
	 */
	public function getRelatedProductsReturnsInitialValueForProduct() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getRelatedProducts()
		);
	}

	/**
	 * @test
	 */
	public function setRelatedProductsForObjectStorageContainingProductSetsRelatedProducts() { 
		$relatedProduct = new \TYPO3\WorkspaceTest\Domain\Model\Product();
		$objectStorageHoldingExactlyOneRelatedProducts = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneRelatedProducts->attach($relatedProduct);
		$this->fixture->setRelatedProducts($objectStorageHoldingExactlyOneRelatedProducts);

		$this->assertSame(
			$objectStorageHoldingExactlyOneRelatedProducts,
			$this->fixture->getRelatedProducts()
		);
	}
	
	/**
	 * @test
	 */
	public function addRelatedProductToObjectStorageHoldingRelatedProducts() {
		$relatedProduct = new \TYPO3\WorkspaceTest\Domain\Model\Product();
		$objectStorageHoldingExactlyOneRelatedProduct = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneRelatedProduct->attach($relatedProduct);
		$this->fixture->addRelatedProduct($relatedProduct);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneRelatedProduct,
			$this->fixture->getRelatedProducts()
		);
	}

	/**
	 * @test
	 */
	public function removeRelatedProductFromObjectStorageHoldingRelatedProducts() {
		$relatedProduct = new \TYPO3\WorkspaceTest\Domain\Model\Product();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($relatedProduct);
		$localObjectStorage->detach($relatedProduct);
		$this->fixture->addRelatedProduct($relatedProduct);
		$this->fixture->removeRelatedProduct($relatedProduct);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getRelatedProducts()
		);
	}
	
}
?>