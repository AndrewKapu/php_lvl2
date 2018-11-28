<?php
class Article
{    
    protected $id = 30;
    protected $title;
    protected $content;
    private $author;

    const LIFE_TIME = 30;

    public function __construct($id = null, $title = null, $content = null, $author = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
    }

    public function display()
    {
        $this->displayTitle();
        $this->displayContent();
    }

    protected function displayTitle()
    {
        echo "<h1>{$this->title}</h1>";
    }

    private function displayContent()
    {
        echo "<p>{$this->content}</p>";
    }
}

class News extends Article{
    public $date;

    public function __construct($id = null, $title = null, $content = null, $author = null, $date = null)
    {
        parent::__construct($id, $title, $content, $author);
        $this->date = $date;
    }

    public function display()
    {
        $this->displayDate();
        parent::display();
    }

    public function displayDate(){
        echo "<p>{$this->date}</p>";
    }
}

echo "<pre>";
$article = new Article(1, 'Article 1', 'kjjksjslsjfklsjkljksdjkls', "Vasya Pupkin");

//var_dump($article);
$article->display();


$article2 = new News(2, 'Article 2', '324135413535115154', "Petya Vasechkin", date("Y-m-d"));
//var_dump($article2);
$article2->display();

