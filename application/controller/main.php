<?php

class Main {

    private $files;
    private $template = 'application/view/template/index.tpl';
    private $textsFile = 'content/texts/texts.csv';
    private $entries;
    private $data;

    public function __construct () {
        $this->files = new Files;
        $this->data['texts'] = CSV::basic($this->textsFile);
        $this->data['urls']['home'] = URL_SITE;
        $this->data['urls']['style'] = URL_SITE . '/style.php';
        $this->data['images']['logo'] = URL_SITE . '/' . URL_DESIGN . '/logo.png';
        $this->entries = $this->files->getFilesListOrganized();
        $this->data['title'] = $this->data['texts']['title'];
    }

    public function dispatch () {
        if (isset($_GET['route'])) {    
            $route = String::cleanRoute($_GET['route']);
        }
        if ($route === '') {    // home
            $this->viewPosts();
        } 
        elseif ($route === 'all') { // list all posts
            $this->viewAllPostsList();
        }
        elseif ( is_numeric($route) && $route > 0 ) {   // pagination
            $this->viewPosts($route);
        }
        elseif (isset($this->entries[$route])) {    // single post
            $this->viewPost($this->entries[$route]);
        } 
        else {  // 404
            $this->view404();
        }
    }

    private function viewPosts ($page = 0) {
        $this->data['posts'] = $this->files->getFilesContents($this->entries, $page * POSTS_LIMIT, POSTS_LIMIT);
        $this->data['view'] = 'posts';
        $this->data['urls']['pagination'] = Pagination::getPaginationURLs(count($this->entries), (int) $page, POSTS_LIMIT);
        $this->render();
    }

    private function viewAllPostsList () {
        $this->data['title'] .= SEPARATOR.$this->data['texts']['all-posts'];
        $this->data['posts'] = $this->files->getFilesFirstLine($this->entries);
        $this->data['view'] = 'all';
        $this->render();
    }

    private function viewPost ($post) {
        $this->data['post'] =  $this->files->getFileContent($post);
        $this->data['title'] .= SEPARATOR.$this->data['post']['title'];
        $this->data['view'] = 'post';
        $this->render();
    }

    private function view404 () {
        $this->data['title'] .= SEPARATOR.$this->data['texts']['404'];
        $this->data['view'] = '404';
        $this->render();
    }

    private function render () {
        Renderer::output($this->template, $this->data);
    }   

}

?>