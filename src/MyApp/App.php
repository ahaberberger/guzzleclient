<?php
namespace MyApp;

use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

class App {

	/* @var $_client Guzzle\Service\Client */
	protected $_client;

	/**
	 * Construct the app
	 */
	function __construct()
	{
		$this->_client = new Client();
		$this->_client->setDescription(
				ServiceDescription::factory('src/Product/services.json')
		);
	}

	/**
	 * Retrieve a list of product resources (simplified) via GET Request
	 * @return \MyApp\Guzzle\Http\Message\Response
	 */
	public function getProductList()
	{
		/* @var $command Guzzle\Service\Command\AbstractCommand */
		$command = $this->_client->getCommand('GetProducts');
		/* @var $response Guzzle\Http\Message\Response */
		$response = $this->_client->execute($command);
		return $response;
	}

	/**
	 * Retieve a single product resource by ID via GET Request
	 * @param integer $_id
	 * @return \MyApp\Guzzle\Http\Message\Response
	 */
	public function getProduct($_id)
	{
		/* @var $command Guzzle\Service\Command\AbstractCommand */
		$command = $this->_client->getCommand('GetProduct', array('id' => $_id));
		/* @var $response Guzzle\Http\Message\Response */
		$response = $this->_client->execute($command);
		return $response;
	}

	/**
	 * Create a product resource via POST Request
	 * @param string $name
	 * @param integer $stock
	 * @param array $prices
	 * @return \MyApp\Guzzle\Http\Message\Response
	 */
	public function createProduct($name, $stock, array $prices = array())
	{
		/* @var $command Guzzle\Service\Command\AbstractCommand */
		$command = $this->_client->getCommand(
				'CreateProduct',
				array('name' => $name, 'stock' => $stock, 'prices' => $prices)
		);
		$command->set("command.headers", array("Content-type" => "application/json"));
		/* @var $response Guzzle\Http\Message\Response */
		$response = $this->_client->execute($command);
		return $response;
	}

	/**
	 * Retrieve a list of price resources (simplified) via GET Request
	 * @return \MyApp\Guzzle\Http\Message\Response
	 */
	public function getPriceList()
	{
		/* @var $command Guzzle\Service\Command\AbstractCommand */
		$command = $this->_client->getCommand('GetPrices');
		/* @var $response Guzzle\Http\Message\Response */
		$response = $this->_client->execute($command);
		return $response;
	}

	/**
	 * Retieve a single price resource by ID via GET Request
	 * @param integer $_id
	 * @return \MyApp\Guzzle\Http\Message\Response
	 */
	public function getPrice($_id)
	{
		/* @var $command Guzzle\Service\Command\AbstractCommand */
		$command = $this->_client->getCommand('GetPrice', array('id' => $_id));
		/* @var $response Guzzle\Http\Message\Response */
		$response = $this->_client->execute($command);
		return $response;
	}

	/**
	 * Create a price resource via POST Request
	 * @param string $name
	 * @param double $amount
	 * @param string $product
	 * @return \MyApp\Guzzle\Http\Message\Response
	 */
	public function createPrice($name, $amount, $product)
	{
		/* @var $command Guzzle\Service\Command\AbstractCommand */
		$command = $this->_client->getCommand(
				'CreatePrice',
				array('name' => $name, 'amount' => $amount, 'product' => $product)
		);
		$command->set("command.headers", array("Content-type" => "application/json"));
		/* @var $response Guzzle\Http\Message\Response */
		$response = $this->_client->execute($command);
		return $response;
	}
}
