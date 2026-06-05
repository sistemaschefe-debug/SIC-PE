<?php
/**
 * Pessoas
 * @Table(name="pessoas")
 * @Entity
 */
class Pessoas
{

    /**
     * @Column(name="id_pessoa", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
	 private $idPessoa;
	 
    /**
     * @ManyToOne(targetEntity="Posto")
     * @JoinColumn(name="cod_posto", referencedColumnName="id_posto")
     */
    private $codPosto;
	
	/**
     * @ManyToOne(targetEntity="Arma")
     * @JoinColumn(name="cod_arma", referencedColumnName="id_arma")
     */
    private $codArma;

    /**
     * @Column(name="nome_completo", type="string", length=200, nullable=false)
     */
    private $nomeCompleto;
    
    /**
     * @Column(name="nome_guerra", type="string", length=50, nullable=true)
     */
    private $nomeGuerra;
	
    /**
     * @Column(name="identidade", type="string", length=10, nullable=false)
     */
    private $identidade;

    /**
     * @Column(name="telefone_residencial", type="string", length=30, nullable=false)
     */
    private $telefoneResidencial;
	
    /**
     * @OneToOne(targetEntity="Setor")
     * @JoinColumn(name="cod_setor", referencedColumnName="id_setor")
     */
    private $codSetor;
	
    /**
     * @Column(name="ramal", type="string", length=10, nullable=true)
     */
    private $ramal;
	
    /**
     * @Column(name="habilitacao", type="string", length=30, nullable=false)
     */
    private $habilitacao;

    /**
     * @Column(name="categoria", type="string", length=10, nullable=false)
     */
    private $categoria;
	
    /**
     * @Column(name="endereco", type="string", length=500, nullable=false)
     */
    private $endereco;	
	
    /**
     * @Column(name="validade_habilitacao", type="date", nullable=false)
     */
    private $validadeHabilitacao;
    
 
    
    public function getIdPessoa() {
        return $this->idPessoa;
    }
	
	public function getCodPosto() {
        return $this->codPosto;
    }
    
    public function setCodPosto($codPosto) {
        $this->codPosto = $codPosto;
    }
	
	public function getCodArma() {
        return $this->codArma;
    }
    
    public function setCodArma($codArma) {
        $this->codArma = $codArma;
    }
	
	public function getNomeCompleto() {
        return $this->nomeCompleto;
    }
    
    public function setNomeCompleto($nomeCompleto) {
        $this->nomeCompleto = $nomeCompleto;
    }
	
	public function getNomeGuerra() {
        return $this->nomeGuerra;
    }
    
    public function setNomeGuerra($nomeGuerra) {
        $this->nomeGuerra = $nomeGuerra;
    }	
	
	public function getIdentidade() {
        return $this->identidade;
    }

    public function setIdentidade($identidade) {
        $this->identidade = $identidade;
    }

    public function getTelefoneResidencial() {
        return $this->telefoneResidencial;
    }
    
    public function setTelefoneResidencial($telefoneResidencial) {
        $this->telefoneResidencial = $telefoneResidencial;
    }

    public function getCodSetor() {
        return $this->codSetor;
    }
    
    public function setCodSetor($codSetor) {
        $this->codSetor = $codSetor;
    }

    public function getRamal() {
        return $this->ramal;
    }
    
    public function setRamal($ramal) {
        $this->ramal = $ramal;
    }

    public function getHabilitacao() {
        return $this->habilitacao;
    }
    
    public function setHabilitacao($habilitacao) {
        $this->habilitacao = $habilitacao;
    }
	
	public function getCategoria() {
        return $this->categoria;
    }
    
    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
	
	public function getEndereco() {
        return $this->endereco;
    }
    
    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }	

    public function getValidadeHabilitacao() {
        return $this->validadeHabilitacao;
    }
    
    public function setValidadeHabilitacao($validadeHabilitacao) {
        $this->validadeHabilitacao = new \DateTime($validadeHabilitacao);
    }

}
