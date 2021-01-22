<?php

class Tweet {
    private $_tid;
    private $_uid;
    private $_post;
    private $_date;

    public function __construct($tid, $uid, $post, $date) {
        $this->_tid = $tid;
        $this->_uid = $uid;
        $this->_post = $post;
        $this->_date = $date;
    }

    public function getTid() {
        return $this->_tid;
    }

    public function getUid() {
        return $this->_uid;
    }

    public function getPost() {
        return $this->_post;
    }

    public function getDate() {
        return $this->_date;
    }

    public function setTid($tid) {
        $this->_tid = $tid;
    }

    public function setUid($uid) {
        $this->_uid = $uid;
    }

    public function setPost($post) {
        $this->_post = $post;
    }

    public function setDate($date) {
        $this->_date = $date;
    }
}
