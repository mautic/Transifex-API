<?php
/**
 * BabDev Transifex Package
 *
 * @copyright  Copyright (C) 2012-2015 Michael Babker. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

namespace BabDev\Transifex\Tests;

use BabDev\Transifex\Languageinfo;

/**
 * Test class for \BabDev\Transifex\Languageinfo.
 */
class LanguageinfoTest extends TransifexTestCase
{
	/**
	 * Object being tested.
	 *
	 * @var  Languageinfo
	 */
	private $object;

	/**
	 * {@inheritdoc}
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->object = new Languageinfo($this->options, $this->client);
	}

	/**
	 * @testdox  getLanguage() returns a Response object on a successful API connection
	 *
	 * @covers  \BabDev\Transifex\Languageinfo::getLanguage
	 * @covers  \BabDev\Transifex\TransifexObject::processResponse
	 * @uses    \BabDev\Transifex\Http
	 * @uses    \BabDev\Transifex\TransifexObject
	 */
	public function testGetLanguage()
	{
		$this->prepareSuccessTest('get', '/language/en_GB/');

		$this->assertSame(
			$this->object->getLanguage('en_GB'),
			$this->response
		);
	}

	/**
	 * @testdox  getLanguage() throws an UnexpectedResponseException on a failed API connection
	 *
	 * @expectedException  \Joomla\Http\Exception\UnexpectedResponseException
	 *
	 * @covers  \BabDev\Transifex\Languageinfo::getLanguage
	 * @covers  \BabDev\Transifex\TransifexObject::processResponse
	 * @uses    \BabDev\Transifex\Http
	 * @uses    \BabDev\Transifex\TransifexObject
	 */
	public function testGetLanguageFailure()
	{
		$this->prepareFailureTest('get', '/language/en_GB/');

		$this->object->getLanguage('en_GB');
	}

	/**
	 * @testdox  getLanguages() returns a Response object on a successful API connection
	 *
	 * @covers  \BabDev\Transifex\Languageinfo::getLanguages
	 * @covers  \BabDev\Transifex\TransifexObject::processResponse
	 * @uses    \BabDev\Transifex\Http
	 * @uses    \BabDev\Transifex\TransifexObject
	 */
	public function testGetLanguages()
	{
		$this->prepareSuccessTest('get', '/languages/');

		$this->assertSame(
			$this->object->getLanguages(),
			$this->response
		);
	}

	/**
	 * @testdox  getLanguages() throws an UnexpectedResponseException on a failed API connection
	 *
	 * @expectedException  \Joomla\Http\Exception\UnexpectedResponseException
	 *
	 * @covers  \BabDev\Transifex\Languageinfo::getLanguages
	 * @covers  \BabDev\Transifex\TransifexObject::processResponse
	 * @uses    \BabDev\Transifex\Http
	 * @uses    \BabDev\Transifex\TransifexObject
	 */
	public function testGetLanguagesFailure()
	{
		$this->prepareFailureTest('get', '/languages/');

		$this->object->getLanguages();
	}
}
