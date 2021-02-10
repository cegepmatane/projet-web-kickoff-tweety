<?php

class Tweet {

    public static array $filtres = array(
        'tid' => FILTER_VALIDATE_INT,
        'uid' => FILTER_VALIDATE_INT,
        'post' => FILTER_SANITIZE_STRING,
        'date' => FILTER_SANITIZE_STRING,
        'suivi' => FILTER_VALIDATE_BOOLEAN,
    );

    protected $tid;
    protected $uid;
    protected $post;
    protected $date;
    protected $suivi;

    public function __construct($tableau) {
        $tableau = filter_var_array($tableau, self::$filtres);

        $this->tid = $tableau['tid'];
        $this->uid = $tableau['uid'];
        $this->post = $tableau['post'];
        $this->date = $tableau['date'];
        $this->suivi = $tableau['suivi'];
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
            case 'suivi':
                $this->suivi = $valeur;
                break;
        }
    }

    public function __get($propriete) {
        $self = get_object_vars($this);
        return $self[$propriete];
    }

}