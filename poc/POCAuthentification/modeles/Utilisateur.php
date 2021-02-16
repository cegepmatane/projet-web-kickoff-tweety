<?php

class Utilisateur {

    public static array $filtres = array(
        'uid' => FILTER_VALIDATE_INT,
        'biographie' => FILTER_SANITIZE_STRING,
        'nomutilisateur' => FILTER_SANITIZE_STRING,
        'motdepasse' => FILTER_SANITIZE_STRING,
        'estadmin' => FILTER_VALIDATE_INT,
    );

    protected $uid;
    protected $biographie;
    protected $nomutilisateur;
    protected $motdepasse;
    protected $estadmin;

    public function __construct($tableau) {
        $tableau = filter_var_array($tableau, self::$filtres);

        $this->uid = $tableau['uid'];
        $this->biographie = $tableau['biographie'];
        $this->nomutilisateur = $tableau['nomutilisateur'];
        $this->motdepasse = $tableau['motdepasse'];
        $this->estadmin = $tableau['estadmin'];
    }

    public function __set($propriete, $valeur) {
        switch ($propriete) {
            case 'uid':
                $this->uid = $valeur;
                break;
            case 'biographie':
                $this->biographie = $valeur;
                break;
            case 'nomutilisateur':
                $this->nomutilisateur = $valeur;
                break;
            case 'motdepasse':
                $this->motdepasse = $valeur;
                break;
            case 'estadmin':
                $this->estadmin = $valeur;
                break;
        }
    }

    public function __get($propriete) {
        $self = get_object_vars($this);
        return $self[$propriete];
    }
}
