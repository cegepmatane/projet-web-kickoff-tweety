<?php

class Tweet {

    public static array $filtres = array(
        'tid' => FILTER_VALIDATE_INT,
        'uid' => FILTER_VALIDATE_INT,
        'post' => FILTER_SANITIZE_ENCODED,
        'date' => FILTER_SANITIZE_STRING,
    );

    protected $tid;
    protected $uid;
    protected $post;
    protected $date;

    public function __construct($tableau) {
        $tableau = filter_var_array($tableau, self::$filtres);

        $this->tid = $tableau['tid'];
        $this->uid = $tableau['uid'];
        $this->post = $tableau['post'];
        $this->date = $tableau['date'];
    }

    public function __set($propriete, $valeur) {
        switch ($propriete) {
            case 'tid':
                $this->tid = $valeur;
                break;
            case 'uid':
                $this->uid = $valeur;
                break;
            case 'post':
                $this->post = $valeur;
                break;
            case 'date':
                $this->date = $valeur;
                break;
        }
    }

    public function __get($propriete) {
        $self = get_object_vars($this);
        return $self[$propriete];
    }

}
