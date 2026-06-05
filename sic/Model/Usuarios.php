<?php
/**
 * Usuarios
 * @Table(name="usuarios")
 * @Entity
 */
class Usuarios
{

    /**
     * @Column(name="id_usuario", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
	 private $idUsuario;


    /**
     * @Column(name="identidade", type="string", length=10, nullable=false)
     */
    private $identidade;


    /**
     * @Column(name="nivel", type="integer", length=11, nullable=false)
     */
    private $nivel;
	
    /**
     * @Column(name="situacao", type="integer", length=11, nullable=false)
     */
    private $situacao;

    /**
     * @Column(name="nome", type="string", length=200, nullable=false)
     */
    private $nome;

    
    /**
     * @Column(name="nome_guerra", type="string", length=50, nullable=false)
     */
    private $nomeGuerra;

    /**
     * @Column(name="usuario", type="string", length=40, nullable=false)
     */
    private $usuario;
	
	/**
     * @Column(name="senha", type="string", length=50, nullable=false)
     */
    private $senha;

    

    /**
     * @OneToOne(targetEntity="Posto")
     * @JoinColumn(name="cod_posto", referencedColumnName="id_posto")
     */
    private $codPosto;

    
    
    public function getIdUsuario() {
        return $this->idUsuario;
    }
	
	public function getIdentidade() {
        return $this->identidade;
    }

    public function setIdentidade($identidade) {
        $this->identidade = $identidade;
    }
	
	public function getNome() {
        return $this->nome;
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNivel() {
        return $this->nivel;
    }
    
    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function getSituacao() {
        return $this->situacao;
    }
    
    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    public function getNomeGuerra() {
        return $this->nomeGuerra;
    }
    
    public function setNomeGuerra($nomeGuerra) {
        $this->nomeGuerra = $nomeGuerra;
    }

    public function getUsuario() {
        return $this->usuario;
    }
    
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
	
	public function getSenha() {
        return $this->senha;
    }
    
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getCodPosto() {
        return $this->codPosto;
    }
    
    public function setCodPosto($codPosto) {
        $this->codPosto = $codPosto;
    }

}
