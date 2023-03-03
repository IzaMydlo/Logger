<?php
class Video{

    private $type;
    private $duration; //private - visible only to class it belongs
    private $title;   //protected - visible only to class it belongs and any subclasses (extends the basic class)
    private $published = false;
    private $playStatus;

//    public function __construct(string $type, float $duration,string $title = "no Title"){
//        $this->type = $type;
//        $this->duration = $duration;   DO NOT NEED CONSTRUCTOR While filed are set in code
//        $this->title = $title;
//    }

    public function seTtitle( $title)
    {
        $this->title = $title;

    }
    public function getTitle()
    {
        return $this->title;

    }
    public function setPublished(bool $state)
    {
        $this->published = $state;

    }
    private function getPublished()
    {
        return $this->published;

    }
    public function play(): string
    {
        if($this->getPublished()) {
            $this->playStatus = true;
            return"Video is playing" ;
        }
        return "Video Not Yet Available";
    }
    public function pause(): string
    {
        return $this->playStatus ? "Video is paused": "";
    }
    public function __destruct()
    {
        var_dump("Destroying object of class :" .get_class());
    }

}

header('Content-Type:text/plain', true);
//$intro = new Video('mp4', 10.10, "Intro"); Do not need to use constructor. We have getters and setters
$intro = new Video();
$intro->setPublished(true);
$intro->seTtitle("Title Set By Setter");
//$intro->published = true; // works as long as access modifier is set to public for that property
$intro->author = 'Self made'; //Bad Practice to add arbitrary properties
var_dump($intro);
echo $intro->play(), PHP_EOL, $intro->pause(), PHP_EOL, $intro->author, PHP_EOL, $intro->getTitle(), PHP_EOL;
