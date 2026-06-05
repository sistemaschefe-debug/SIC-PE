<?php
/**
 * TiposBrasao
 *
 * @Table(name="tipo_brasao")
 * @Entity
 */
class TiposBrasao
{
    /**
     * @Column(name="id_tipo_brasao", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $idTipoBrasao;

    /**
     * @Column(name="nome_tipo_brasao", type="string", length=100, nullable=false)
     */
    private $nomeTipoBrasao;


    public function getIdTipoBrasao() {
        return $this->idTipoBrasao;
    }

    public function getNomeTipoBrasao() {
        return $this->nomeTipoBrasao;
    }

    public function setNomeTipoBrasao($nomeTipoBrasao) {
        $this->nomeTipoBrasao = $nomeTipoBrasao;
    }

}
