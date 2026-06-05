<?php
/**
 * Corpo
 *
 * @Table(name="corpo")
 * @Entity
 */
class Corpo
{
    /**
     * @Column(name="id_corpo", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $idCorpo;

    /**
     * @Column(name="nome_corpo", type="string", length=100, nullable=false)
     */
    private $nomeCorpo;


    public function getIdCorpo() {
        return $this->idCorpo;
    }

    public function getNomeCorpo() {
        return $this->nomeCorpo;
    }

    public function setNomeCorpo($nomeCorpo) {
        $this->nomeCorpo = $nomeCorpo;
    }

}
