<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $testSuite;
    private $result;

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
     * @Given I have a suite of tests
     */
    public function iHaveASuiteOfTests()
    {
        $this->testSuite = new TestSuite();
    }

    /**
     * @When I run them
     */
    public function iRunThem()
    {
        $this->result = $this->testSuite->doSomething();
    }

    /**
     * @Then they pass
     */
    public function theyPass()
    {
        if (!isset($this->result)) {
            throw new Exception();
        }
    }
}

class TestSuite {
    public function doSomething() {
        return "Something";
    }
}
