<?php
use App\Http\Controllers\BadgesController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Request;

class BadgesControllerTest extends TestCase
{
    protected $badgesController;

    public function setUp(){
        $this->badgesController = new BadgesController;
    }

    public function testCheckIfBadgeNameExists_returns_true(){
        $data = $this->badgesController->checkIfBadgeNameExists('Teaching Conference Grant');
        $this->assertEquals(true, $data);
    }

    public function testCheckIfBadgeNameExists_throws_BadRequestHttpException(){
        $this->setExpectedException(NotFoundHttpException::class);
        $this->badgesController->checkIfBadgeNameExists('A non-existent badge name');
    }

    public function testGetAllBadges_returns_status_code_and_badge_count(){
        $data = $this->badgesController->getAllBadges(new Request());
        $content = json_decode($data->content(), true);
        $this->assertEquals(200,$content['status']);
        $this->assertEquals(11,$content['count']);
        $this->assertEquals(count($content['badges']), $content['count']);
    }

    public function testCheckIfUserExists_returns_true(){
        $data = $this->badgesController->checkIfUserExists('nr_alexandra.monchick@csun.edu');
        $this->assertEquals(true,$data);
    }

    public function testCheckIfUserExists_throws_NotFoundHttpException(){
        $this->setExpectedException(NotFoundHttpException::class);
        $this->badgesController->checkIfUserExists('nr_imaginary.user@csun.edu');
    }

    public function testCheckPersonsBadge_returns_true(){
        $email = 'nr_alexandra.monchick@csun.edu';
        $badgeName = 'Teaching Conference Grant';
        $this->makeAssertionsForCheckPersonsBadge($email, $badgeName, 200, true);
    }

    public function testCheckPersonsBadge_returns_false(){
        $email = 'nr_alexandra.monchick@csun.edu';
        $badgeName = 'Learning-Centered Beck Grant';
        $this->makeAssertionsForCheckPersonsBadge($email, $badgeName, 200, false);
    }

    public function makeAssertionsForCheckPersonsBadge($email,$badgeName,$statusCode,$testBool){
        $data = $this->badgesController->checkPersonsBadge($email, $badgeName);
        $content = json_decode($data->content(), true);
        $this->assertEquals($statusCode, $content['status']);
        $this->assertEquals($testBool, $content['BadgeHolder']);
    }


}