<?php
header('Content-type:text/plain');

interface Component {
    function showProperties();
    function totalSize();
}

class File implements Component{
    protected $name;
    protected $size;

    public function __construct($name, $size)
    {
        $this->name = $name;
        $this->size = $size;
    }

    public function showProperties()
    {
        printf('Name: %s, size: %s' . PHP_EOL, $this->name, $this->size);
    }

    public function totalSize()
    {
        return $this->size;
    }
}

class Folder implements Component{
    protected $files = [];

    public function __construct(array $files)
    {
        $this->files = $files;
    }

    public function showProperties()
    {
        foreach($this->files as $file){
            $file->showProperties();
        }
    }

    public function totalSize()
    {
        $total = 0;
        foreach($this->files as $file){
            $total += $file->totalSize();
        }

        return $total;
    }
}


$file1 = new File("file 1", 10);
$file2 = new File("file 2", 20);
$file3 = new File("file 3", 50);

$files = [$file1, $file2, $file3];

$folder = new Folder($files);
$folder->showProperties();
echo $folder->totalSize();


