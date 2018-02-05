<?php

class Home extends Controller {
    public function index($title = '') {
        $post = $this->model('Post');
        $post->title = "php is the best";
        $this->view('home',['title'=>$post->title]);
    }
    public function register() {
        echo "This is Register Controller !";
    }
}

?>
