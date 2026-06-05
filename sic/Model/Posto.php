<?php
/**
 * Posto
 *
 * @Table(name="posto")
 * @Entity
 */
class Posto
{
    /**
     * @Column(name="id_posto", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $idPosto;

    /**
     * @Column(name="nome_posto", type="string", length=30, nullable=false)
     */
    private $nomePosto;
    
    
    public function getIdPosto() {
        return $this->idPosto;
    }

    public function getNomePosto() {
        return $this->nomePosto;
    }

    public function setNomePosto($nomePosto) {
        $this->nomePosto = $nomePosto;
    }

}
