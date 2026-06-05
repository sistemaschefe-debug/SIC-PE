<?php
/**
 * VeiculosIdentificados
 *
 * @Table(name="veiculos_identificados")
 * @Entity
 */
class VeiculosIdentificados
{
    /**
     * @Column(name="id_veiculo_identificado", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $idVeiculoIdentificado;
	
	/**
     * @OneToOne(targetEntity="TiposBrasao")
     * @JoinColumn(name="cod_tipo_brasao", referencedColumnName="id_tipo_brasao")
     */
    private $codTipoBrasao;
	
	/**
     * @Column(name="nr_brasao", type="string", nullable=false)
     */
    private $nrBrasao;
	
	/**
     * @OneToOne(targetEntity="Pessoas")
     * @JoinColumn(name="cod_pessoa", referencedColumnName="id_pessoa")
     */
    private $codPessoa;

    /**
     * @Column(name="marca", type="string", length=100, nullable=false)
     */
    private $marca;
	
	/**
     * @Column(name="modelo", type="string", length=50, nullable=false)
     */
    private $modelo;
	
	/**
     * @Column(name="cor", type="string", length=50, nullable=false)
     */
    private $cor;
	
	/**
     * @Column(name="placa", type="string", length=50, nullable=false)
     */
    private $placa;
	
	/**
     * @Column(name="ano_modelo", type="string", length=50, nullable=false)
     */
    private $anoModelo;
	
    /**
     * @Column(name="data_cad_alt", type="datetime", nullable=false)
     */
    private $dataCadAlt;
	
    /**
     * @Column(name="imagem", type="string", length=255, nullable=false)
     */
    private $imagemVeiculo;	
	
	/**
     * @Column(name="observacao", type="string", length=255, nullable=false)
     */
    private $observacao;
	
	
    public function getIdVeiculoIdentificado() {
        return $this->idVeiculoIdentificado;
    }

    public function getCodTipoBrasao() {
        return $this->codTipoBrasao;
    }

    public function setCodTipoBrasao($codTipoBrasao) {
        $this->codTipoBrasao = $codTipoBrasao;
    }
	
	public function getNrBrasao() {
        return $this->nrBrasao;
    }

    public function setNrBrasao($nrBrasao) {
        $this->nrBrasao = $nrBrasao;
    }
	
    public function getCodPessoa() {
        return $this->codPessoa;
    }

    public function setCodPessoa($codPessoa) {
        $this->codPessoa = $codPessoa;
    }
	
	public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }
	
	public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }
	
	public function getCor() {
        return $this->cor;
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }
	
	public function getPlaca() {
        return $this->placa;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }
	
	public function getAnoModelo() {
        return $this->anoModelo;
    }

    public function setAnoModelo($anoModelo) {
        $this->anoModelo = $anoModelo;
    }
	
	public function getDataCadAlt() {
        return $this->dataCadAlt;
    }
    
    public function setDataCadAlt($dataCadAlt) {
        $this->dataCadAlt = new \DateTime($dataCadAlt);
    }
	
	public function getImagemVeiculo() {
        return $this->imagemVeiculo;
    }

    public function setImagemVeiculo($imagemVeiculo) {
        $this->imagemVeiculo = $imagemVeiculo;
    }
	
	public function getObservacao() {
        return $this->observacao;
    }

    public function setObservacao($observacao) {
        $this->observacao = $observacao;
    }

}
