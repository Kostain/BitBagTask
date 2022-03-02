<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
use App\Entity\Product\Product;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    protected $response;

    protected $product;

    protected $productCode;
    protected $productName;
    protected $productColor;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I am logged in as an administrator
     */
    public function iAmLoggedInAsAnAdministrator()
    {
        $administrator = new GuzzleHttp\Client(['base_uri' => 'http://127.0.0.1:8000', 'verify' => false]);

        $this->response = $administrator->get('/admin/');

        $responseCode = $this->response->getStatusCode();

        if (200 != $responseCode) {
            throw new Exception('Not able to access!');
        }

        return true;
    }

    /**
     * @When I go to the products list
     */
    public function iGoToTheProductsList()
    {
        $administrator = new GuzzleHttp\Client(['base_uri' => 'http://127.0.0.1:8000', 'verify' => false]);

        $this->response = $administrator->get('/admin/products/');

        $responseCode = $this->response->getStatusCode();

        if (200 != $responseCode) {
            throw new Exception('Not able to access! '. $responseCode. ' error');
        }

        return true;
    }

    /**
     * @When I choose simple product from create menu
     */
    public function iChooseSimpleProductFromCreateMenu()
    {
        $administrator = new GuzzleHttp\Client(['base_uri' => 'http://127.0.0.1:8000', 'verify' => false]);

        $this->response = $administrator->get('/admin/products/new/simple/');

        $responseCode = $this->response->getStatusCode();

        if (200 != $responseCode) {
            throw new Exception('Not able to access!');
        }

        return true;
    }

    /**
     * @When I fill :arg1 with :arg2
     */
    public function iFillWith($attribute, $attributeValue)
    {
        switch($attribute) {
            case "Code":
                $this->productCode = $attributeValue;
                break;
            case "Name":
                $this->productName = $attributeValue;
                break;
            case "Color":
                $this->productColor = $attributeValue;
                break;
        }
    }

    /**
     * @When I create that product
     */
    public function iCreateThatProduct()
    {
        $product = new Product();

        $product->setCurrentLocale('en_US');

        $product->setCode($this->productCode);
        $product->setName($this->productName);
        $product->setColor($this->productColor);

        $this->product = $product;
    }

    /**
     * @Then I should be notified that it has been successfully created
     */
    public function iShouldBeNotifiedThatItHasBeenSuccessfullyCreated()
    {
        if (!$this->product) {
            throw new Exception('The product has not been created');
        }

        return true;
    }

}
