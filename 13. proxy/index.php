<?php
header('Content-type: text/plain');

interface Image
{
    public function display();
}

class RealImage implements Image
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->loadImageFromInternet();
    }

    public function loadImageFromInternet()
    {
        echo "Loading image from internet: $this->filename \n";
    }

    public function display()
    {
        echo "Display image: $this->filename \n";
    }
}

class ProxyImage implements Image
{
    private $realImage;
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function display()
    {
        if($this->realImage == null)
        {
            $this->realImage = new RealImage($this->filename);
        }

        $this->realImage->display();
    }
}


// Client
$proxy1 = new ProxyImage('image1.jpg');
$proxy2 = new ProxyImage('image2.png');

$proxy1->display();
$proxy1->display();
$proxy2->display();