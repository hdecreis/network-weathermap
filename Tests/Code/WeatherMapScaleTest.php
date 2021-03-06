<?php
// require_once 'PHPUnit/Framework.php';

require_once dirname(__FILE__) . '/../../lib/all.php';

/**
 * Test class for WeatherMapScale.
 * Generated by PHPUnit on 2010-04-06 at 13:31:52.
 */
class WeatherMapScaleTest extends PHPUnit_Framework_TestCase {
    /**
     * @var WeatherMapScale
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->wmap = new Weathermap();
        $this->object = new WeatherMapScale("testscale", $this->wmap);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
    }


    public function testConstruction()
    {
        $this->assertInstanceOf("WeatherMapScale", $this->object);

        $this->assertEquals(0, $this->object->spanCount());
    }

    public function testScaleManagement()
    {
        $this->object->populateDefaultsIfNecessary();
        $this->assertEquals(9, $this->object->spanCount());

        list($min, $max) = $this->object->FindScaleExtent();

        $this->assertEquals(0,$min);
        $this->assertEquals(100,$max);

        list($c, $key, $tag) = $this->object->ColourFromValue(0);
        $this->assertInstanceOf("WMColour", $c);
        $this->assertTrue( $c->equals(new WMColour(192,192,192)));

        list($c, $key, $tag) = $this->object->ColourFromValue(0.1);
        $this->assertInstanceOf("WMColour", $c);
        $this->assertTrue( $c->equals(new WMColour(255,255,255)));

        list($c, $key, $tag) = $this->object->ColourFromValue(2);
        $this->assertInstanceOf("WMColour", $c);
        $this->assertTrue( $c->equals(new WMColour(140,0,255)));

        list($c, $key, $tag) = $this->object->ColourFromValue(200);
        $this->assertInstanceOf("WMColour", $c);
        $this->assertTrue( $c->equals(new WMColour(255,0,0)));

    }

}

