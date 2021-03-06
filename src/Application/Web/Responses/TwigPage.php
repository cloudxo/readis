<?php declare(strict_types=1);

namespace hollodotme\Readis;

use DateTimeInterface;
use hollodotme\Readis\Exceptions\RuntimeException;
use IntlDateFormatter;
use Twig\TwigFilter;
use Twig_Environment;
use Twig_Error_Loader;
use Twig_Error_Runtime;
use Twig_Error_Syntax;
use Twig_Extension_Debug;
use Twig_Loader_Filesystem;
use function base64_encode;
use function dirname;
use function flush;
use function is_string;

final class TwigPage
{
	/** @var Twig_Environment */
	private $renderer;

	public function __construct()
	{
		$this->renderer = $this->getTwigInstance();
	}

	/**
	 * @param string $template
	 * @param array  $data
	 * @param int    $httpCode
	 *
	 * @throws RuntimeException
	 */
	public function respond( string $template, array $data, int $httpCode = 200 ) : void
	{
		try
		{
			header( 'Content-Type: text/html; charset=utf-8', true, $httpCode );
			header( 'Access-Control-Allow-Origin: *' );
			echo $this->renderer->render( $template, $this->getMergedData( $data ) );
			flush();
		}
		catch ( Twig_Error_Loader | Twig_Error_Runtime | Twig_Error_Syntax $e )
		{
			throw new RuntimeException( $e->getMessage(), $e->getCode(), $e );
		}
	}

	private function getTwigInstance() : Twig_Environment
	{
		$twigLoader      = new Twig_Loader_Filesystem( [dirname( __DIR__ )] );
		$twigEnvironment = new Twig_Environment( $twigLoader );
		$twigEnvironment->addExtension( new Twig_Extension_Debug() );

		$dateFormatter = new IntlDateFormatter(
			'en_GB',
			IntlDateFormatter::MEDIUM,
			IntlDateFormatter::NONE
		);

		$dateTimeFormatter = new IntlDateFormatter(
			'en_GB',
			IntlDateFormatter::MEDIUM,
			IntlDateFormatter::SHORT
		);

		$twigEnvironment->addFilter( $this->getIntlDateFilter( 'formatDate', $dateFormatter ) );
		$twigEnvironment->addFilter( $this->getIntlDateFilter( 'formatDateTime', $dateTimeFormatter ) );
		$twigEnvironment->addFilter( $this->getBase64Encoder( 'base64encode' ) );

		return $twigEnvironment;
	}

	private function getIntlDateFilter( string $name, IntlDateFormatter $formatter ) : TwigFilter
	{
		return new TwigFilter(
			$name,
			function ( $dateValue ) use ( $formatter )
			{
				if ( $dateValue instanceof DateTimeInterface )
				{
					return $formatter->format( $dateValue->getTimestamp() );
				}

				if ( is_string( $dateValue ) )
				{
					return $formatter->format( $dateValue );
				}

				return '';
			}
		);
	}

	private function getBase64Encoder( string $name ) : TwigFilter
	{
		return new TwigFilter(
			$name,
			function ( $value )
			{
				return base64_encode( (string)$value );
			}
		);
	}

	private function getMergedData( array $data ) : array
	{
		return array_merge(
			[
				'appVersion' => '1.1.0',
			],
			$data
		);
	}
}
