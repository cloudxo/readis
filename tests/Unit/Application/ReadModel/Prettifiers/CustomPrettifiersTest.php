<?php declare(strict_types=1);

namespace hollodotme\Readis\Tests\Unit\Application\ReadModel\Prettifiers;

use hollodotme\Readis\Application\ReadModel\Prettifiers\CustomPrettifiers;
use hollodotme\Readis\Tests\Unit\Traits\CustomPrettifierMocking;
use PHPUnit\Framework\TestCase;
use function base64_encode;

final class CustomPrettifiersTest extends TestCase
{
	use CustomPrettifierMocking;

	/** @var CustomPrettifiers */
	private $prettifiers;

	protected function setUp()
	{
		$this->prettifiers = new CustomPrettifiers();
	}

	protected function tearDown()
	{
		$this->prettifiers = null;
	}

	/**
	 * @throws \PHPUnit\Framework\ExpectationFailedException
	 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
	 */
	public function testAddPrettifiers() : void
	{
		$this->prettifiers->addPrettifiers(
			$this->getRawPrettifierMock(),
			$this->getCustomBase64Prettifier()
		);

		$this->assertTrue( $this->prettifiers->canPrettify( 'some data' ) );
	}

	/**
	 * @throws \PHPUnit\Framework\ExpectationFailedException
	 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
	 */
	public function testCanPrettifyReturnsFalseIfNoPrettifiersWereAdded() : void
	{
		$this->assertFalse( $this->prettifiers->canPrettify( 'some data' ) );
	}

	/**
	 * @param string $data
	 * @param string $expectedResult
	 *
	 * @throws \PHPUnit\Framework\ExpectationFailedException
	 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
	 *
	 * @dataProvider customPrettifierDataProvider
	 */
	public function testPrettify( string $data, string $expectedResult ) : void
	{
		$this->prettifiers->addPrettifiers(
			$this->getCustomBase64Prettifier(),
			$this->getCustomHtmlEntityPrettifier()
		);

		$this->assertTrue( $this->prettifiers->canPrettify( $data ) );
		$this->assertSame( $expectedResult, $this->prettifiers->prettify( $data ) );
	}

	public function customPrettifierDataProvider() : array
	{
		return [
			[
				'data'           => 'some plain data',
				'expectedResult' => 'some plain data',
			],
			[
				'data'           => 'base64:' . base64_encode( 'some base64 data' ),
				'expectedResult' => 'some base64 data',
			],
			[
				'data'           => 'html:&lt;html&gt;',
				'expectedResult' => '<html>',
			],
		];
	}
}
