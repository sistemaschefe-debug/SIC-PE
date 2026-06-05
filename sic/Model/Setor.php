<?php
/**
 * Setor
 *
 * @Table(name="setor")
 * @Entity
 */
class Setor
{
    /**
     * @Column(name="id_setor", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $idSetor;

    /**
     * @Column(name="nome_setor", type="string", length=100, nullable=false)
     */
    private $nomeSetor;
	
	/**
     * @ManyToOne(targetEntity="Corpo")
     * @JoinColumn(name="cod_corpo", referencedColumnName="id_corpo")
     */
    private $codCorpo;


    public function getIdSetor() {
        return $this->idSetor;
    }

    public function getNomeSetor() {
        return $this->nomeSetor;
    }

    public function setNomeSetor($nomeSetor) {
        $this->nomeSetor = $nomeSetor;
    }
	
	public function getCodCorpo() {
        return $this->codCorpo;
    }

    public function setCodCorpo($codCorpo) {
        $this->codCorpo = $codCorpo;
    }

}
