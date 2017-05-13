<?php


/**
 * Unit test for LoggerAdapter
 */
class LoggerAdapterTest extends \PHPUnit\Framework\TestCase {


    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $mockLogger;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $underTest;

    public function setUp() {
        $this->mockLogger = $this->createMock(Logger::class);
        $this->underTest = new \Letscodehu\Logger\LoggerAdapter($this->mockLogger);
    }

    /**
     * @test
     */
    public function it_should_delegate_info_call() {
        // GIVEN
        $this->mockLogger->expects($this->once())->method("info")->with("test");
        // WHEN
        $this->underTest->info("test");
        // THEN
    }

    /**
     * @test
     */
    public function it_should_delegate_info_with_json_encoded_context() {
        // GIVEN
        $this->mockLogger->expects($this->once())->method("info")->with("test {\"test\":\"test\"}");
        // WHEN
        $this->underTest->info("test", ["test" => "test"]);
        // THEN
    }

    /**
     * @test
     */
    public function it_should_delegate_warn_call() {
        // GIVEN
        $this->mockLogger->expects($this->once())->method("warn")->with("test");
        // WHEN
        $this->underTest->warning("test");
        // THEN
    }

    /**
     * @test
     */
    public function it_should_delegate_emergency_call() {
        // GIVEN
        $this->mockLogger->expects($this->once())->method("fatal")->with("test");
        // WHEN
        $this->underTest->emergency("test");
        // THEN
    }

    /**
     * @test
     */
    public function it_should_delegate_error_call() {
        // GIVEN
        $this->mockLogger->expects($this->once())->method("error")->with("test");
        // WHEN
        $this->underTest->error("test");
        // THEN
    }

    /**
     * @test
     */
    public function it_should_delegate_debug_call() {
        // GIVEN
        $this->mockLogger->expects($this->once())->method("debug")->with("test");
        // WHEN
        $this->underTest->debug("test");
        // THEN
    }

    /**
     * @test
     */
    public function it_should_delegate_notice_call() {
        // GIVEN
        $this->mockLogger->expects($this->once())->method("trace")->with("test");
        // WHEN
        $this->underTest->notice("test");
        // THEN
    }

    /**
     * @test
     */
    public function it_should_delegate_alert_call() {
        // GIVEN
        $this->mockLogger->expects($this->once())->method("fatal")->with("test");
        // WHEN
        $this->underTest->alert("test");
        // THEN
    }

    /**
     * @test
     */
    public function it_should_delegate_critical_call() {
        // GIVEN
        $this->mockLogger->expects($this->once())->method("fatal")->with("test");
        // WHEN
        $this->underTest->critical("test");
        // THEN
    }

}
