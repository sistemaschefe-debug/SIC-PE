<?php
/**
 * Arma
 *
 * @Table(name="arma")
 * @Entity
 */
class Arma
{
    /**
     * @Column(name="id_arma", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $idArma;

    /**
     * @Column(name="nome_arma", type="string", length=100, nullable=false)
     */
    private $nomeArma;


    public function getIdArma() {
        return $this->idArma;
    }

    public function getNomeArma() {
        return $this->nomeArma;
    }

    public function setNomeArma($nomeArma) {
        $this->nomeArma = $nomeArma;
    }

}
