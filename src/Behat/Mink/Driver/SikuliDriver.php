<?php

namespace Behat\Mink\Driver;

use Behat\SikuliClient\Client;

class SikuliDriver extends \Behat\Mink\Driver\CoreDriver {

    const DEFAULT_SECONDS_TO_WAIT = 30;

    private $_browserName;
    private $_sikuliConnection = null;

    /**
     * Initializes Sikuli driver.
     *
     * @param string $browserName browser to start (firefox, safari, ie, etc...)
     * @param Client $client      Sikuli client instance
     */
    public function __construct($browserName, Client $client = null)
    {
        if (null === $client) {
            $client = new Client();
        }

        $this->client = $client;
        $this->_sikuliConnection = $this->client->getConnection();
        $this->_browserName = $browserName;
    }


    /**
     * Sets driver's current session.
     *
     * @param \Behat\Mink\Session $session
     */
    public function setSession(\Behat\Mink\Session $session)
    {
        // TODO: Implement setSession() method.
    }

    /**
     * Starts driver.
     */
    public function start()
    {
        $this->client->start($this->_browserName);
    }

    /**
     * Checks whether driver is started.
     *
     * @return Boolean
     */
    public function isStarted()
    {
        // TODO: Implement isStarted() method.
    }

    /**
     * Stops driver.
     */
    public function stop()
    {
        $this->client->stop();
        // TODO: Implement stop() method.
    }

    /**
     * Resets driver.
     */
    public function reset()
    {
        // TODO: Implement reset() method.
    }

    /**
     * Visit specified URL.
     *
     * @param string $url url of the page
     */
    public function visit($url)
    {
        $this->client->goToURL($url);
        // TODO: Implement visit() method.
    }

    /**
     * Returns current URL address.
     *
     * @return string
     */
    public function getCurrentUrl()
    {
        // TODO: Implement getCurrentUrl() method.
    }

    /**
     * Returns last response content.
     *
     * @return string
     */
    public function getContent()
    {
        // TODO: Implement getContent() method.
    }

    /**
     * Finds elements with specified XPath query.
     *
     * @param string $xpath
     *
     * @return \Behat\Mink\Element\NodeElement[]
     */
    public function find($xpath)
    {
        // TODO: Implement find() method.
    }

    public function setProxy()
    {
        if($this->_sikuliConnection->getOS())
        $this->_sikuliConnection->keyDown('Key.CMD + ,');
        $this->_sikuliConnection->click('/Forge/workspace/bbccom_qa/behat/vendor/behat/sikuli-client/img/mac-os/firefox/preferences/advanced.png');
        $this->_sikuliConnection->click('/Forge/workspace/bbccom_qa/behat/vendor/behat/sikuli-client/img/mac-os/firefox/preferences/advanced/network/settings.png');
        $this->_sikuliConnection->click('/Forge/workspace/bbccom_qa/behat/vendor/behat/sikuli-client/img/mac-os/firefox/preferences/advanced/network/manual-proxy-configuration.png');
        $this->_sikuliConnection->type('10.4.208.251');
        $this->_sikuliConnection->keyDown('Key.TAB');
        $this->_sikuliConnection->type('80');
        $this->_sikuliConnection->keyDown('Key.ENTER');
        $this->_sikuliConnection->keyDown('Key.ESC');
    }

    public function checkExists($image, $secondsToWait = false){
        $secondsToWait = !$secondsToWait ? self::DEFAULT_SECONDS_TO_WAIT : $secondsToWait;
        return ($this->_sikuliConnection->callFunc('exists',array($image,$secondsToWait)) !== "");
    }

    public function shouldAppear($image, $secondsToWait = false){
        $secondsToWait = !$secondsToWait ? self::DEFAULT_SECONDS_TO_WAIT : $secondsToWait;
        return ($this->_sikuliConnection->callFunc('wait',array($image,$secondsToWait)) !== "");
    }

    public function shouldVanish($image, $secondsToWait = false){
        $secondsToWait = !$secondsToWait ? self::DEFAULT_SECONDS_TO_WAIT : $secondsToWait;
        return ($this->_sikuliConnection->callFunc('waitVanish',array($image,$secondsToWait)) !== "");
    }

    public function findOCR($ps, $region=null, $similarity=null){
        $this->_sikuliConnection->find($ps, $region, $similarity);
    }

    /**
     * Returns element's tag name by it's XPath query.
     *
     * @param string $xpath
     *
     * @return string
     */
    public function getTagName($xpath)
    {
        // TODO: Implement getTagName() method.
    }

    /**
     * Returns element's text by it's XPath query.
     *
     * @param string $xpath
     *
     * @return string
     */
    public function getText($xpath)
    {
        // TODO: Implement getText() method.
    }

    /**
     * Returns element's html by it's XPath query.
     *
     * @param string $xpath
     *
     * @return string
     */
    public function getHtml($xpath)
    {
        // TODO: Implement getHtml() method.
    }

    /**
     * Returns element's attribute by it's XPath query.
     *
     * @param string $xpath
     * @param string $name
     *
     * @return mixed
     */
    public function getAttribute($xpath, $name)
    {
        // TODO: Implement getAttribute() method.
    }

    /**
     * Returns element's value by it's XPath query.
     *
     * @param string $xpath
     *
     * @return mixed
     */
    public function getValue($xpath)
    {
        // TODO: Implement getValue() method.
    }

    /**
     * Sets element's value by it's XPath query.
     *
     * @param string $xpath
     * @param string $value
     */
    public function setValue($xpath, $value)
    {
        // TODO: Implement setValue() method.
    }

    /**
     * Checks checkbox by it's XPath query.
     *
     * @param string $xpath
     */
    public function check($xpath)
    {
        // TODO: Implement check() method.
    }

    /**
     * Unchecks checkbox by it's XPath query.
     *
     * @param string $xpath
     */
    public function uncheck($xpath)
    {
        // TODO: Implement uncheck() method.
    }

    /**
     * Checks whether checkbox checked located by it's XPath query.
     *
     * @param string $xpath
     *
     * @return Boolean
     */
    public function isChecked($xpath)
    {
        // TODO: Implement isChecked() method.
    }

    /**
     * Selects option from select field located by it's XPath query.
     *
     * @param string $xpath
     * @param string $value
     * @param Boolean $multiple
     */
    public function selectOption($xpath, $value, $multiple = false)
    {
        // TODO: Implement selectOption() method.
    }

    /**
     * Clicks button or link located by it's XPath query.
     *
     * @param string $xpath
     */
    public function click($region)
    {
        $this->_sikuliConnection->click($region);
    }

    /**
     * Attaches file path to file field located by it's XPath query.
     *
     * @param string $xpath
     * @param string $path
     */
    public function attachFile($xpath, $path)
    {
        // TODO: Implement attachFile() method.
    }
} 