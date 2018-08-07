<?php declare(strict_types=1);

namespace hollodotme\Readis\Application\Configs;

use hollodotme\Readis\Application\ReadModel\Prettifiers\CustomPrettifiers;
use hollodotme\Readis\Exceptions\ApplicationConfigNotFound;
use ReflectionClass;
use function class_exists;
use function dirname;
use function file_exists;
use const PHP_URL_PATH;

final class AppConfig
{
	/** @var array */
	private $configData;

	public function __construct( array $data )
	{
		$this->configData = $data;
	}

	/**
	 * @param null|string $configFile
	 *
	 * @throws ApplicationConfigNotFound
	 * @return AppConfig
	 */
	public static function fromConfigFile( ?string $configFile = null ) : self
	{
		$appConfigFile = $configFile ?? dirname( __DIR__, 3 ) . '/config/app.php';

		if ( !file_exists( $appConfigFile ) )
		{
			throw new ApplicationConfigNotFound( 'Could not find application config at ' . $appConfigFile );
		}

		/** @noinspection PhpIncludeInspection */
		return new self( (array)require $appConfigFile );
	}

	public function getBaseUrl() : string
	{
		return rtrim( (string)$this->configData['baseUrl'], '/' );
	}

	public function getBaseUri() : string
	{
		$baseUrl = $this->getBaseUrl();

		$path = parse_url( $baseUrl, PHP_URL_PATH ) ?? '';

		return $path !== false ? $path : $baseUrl;
	}

	/**
	 * @throws \ReflectionException
	 * @return CustomPrettifiers
	 */
	public function getCustomPrettifiers() : CustomPrettifiers
	{
		$customPrettifiers = new CustomPrettifiers();

		foreach ( (array)($this->configData['prettifiers'] ?? []) as $prettifier )
		{
			$className       = (string)$prettifier['class'];
			$constructorArgs = (array)($prettifier['ctorArgs'] ?? []);

			if ( !class_exists( $className ) )
			{
				continue;
			}

			$refClass = new ReflectionClass( $className );

			if ( !$refClass->hasMethod( 'canPrettify' ) || !$refClass->hasMethod( 'prettify' ) )
			{
				continue;
			}

			$customPrettifiers->addPrettifiers( $refClass->newInstanceArgs( $constructorArgs ) );
		}

		return $customPrettifiers;
	}
}
