<?php
/**
 * Notificacoes
 *
 * @Table(name="notificacoes")
 * @Entity
 */
class Notificacoes
{
    /**
     * @Column(name="id_notificacao", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $idNotificacao;
	
	/**
     * @ManyToOne(targetEntity="VeiculosIdentificados")
     * @JoinColumn(name="cod_veiculo", referencedColumnName="id_veiculo_identificado")
     */
    private $codVeiculo;

    /**
     * @Column(name="se_apresentou", type="string", length=1, nullable=false)
     */
    private $seApresentou;
	
    /**
     * @Column(name="local_notificacao", type="string", length=100, nullable=false)
     */
    private $localNotificacao;
	
    /**
     * @Column(name="data_notificacao", type="date", nullable=false)
     */
    private $dataNotificacao;
	
	/**
     * @Column(name="hora_notificacao", type="string", length=5, nullable=false)
     */
    private $horaNotificacao;
	
	/**
     * @Column(name="prazo_comparecimento", type="date", nullable=false)
     */
    private $prazoComparecimento;
	
	/**
     * @OneToOne(targetEntity="Usuarios")
     * @JoinColumn(name="anotador", referencedColumnName="id_usuario")
     */
    private $anotador;
	
    /**
     * @Column(name="motivo_notificacao", type="string", length=255, nullable=false)
     */
    private $motivoNotificacao;
	
    /**
     * @Column(name="imagem", type="string", length=255, nullable=false)
     */
    private $imagemNotificacao;	
	
    /**
     * @Column(name="despacho_cmt_pe", type="text", nullable=false)
     */
    private $despachoCmtPe;
	
    /**
     * @Column(name="finalizado", type="integer", nullable=false)
     */
    private $finalizado;


    public function getIdNotificacao() {
        return $this->idNotificacao;
    }

    public function getCodVeiculo() {
        return $this->codVeiculo;
    }

    public function setCodVeiculo($codVeiculo) {
        $this->codVeiculo = $codVeiculo;
    }
	
	public function getSeApresentou() {
        return $this->seApresentou;
    }

    public function setSeApresentou($seApresentou) {
        $this->seApresentou = $seApresentou;
    }
	
	public function getLocalNotificacao() {
        return $this->localNotificacao;
    }

    public function setLocalNotificacao($localNotificacao) {
        $this->localNotificacao = $localNotificacao;
    }
	
	public function getDataNotificacao() {
        return $this->dataNotificacao;
    }
    
    public function setDataNotificacao($dataNotificacao) {
        $this->dataNotificacao = new \DateTime($dataNotificacao);
    }
	
	public function getHoraNotificacao() {
        return $this->horaNotificacao;
    }
    
    public function setHoraNotificacao($horaNotificacao) {
        $this->horaNotificacao = $horaNotificacao;
    }
	
	public function getPrazoComparecimento() {
        return $this->prazoComparecimento;
    }
    
    public function setPrazoComparecimento($prazoComparecimento) {
        $this->prazoComparecimento = new \DateTime($prazoComparecimento);
    }
	
	public function getAnotador() {
        return $this->anotador;
    }

    public function setAnotador($anotador) {
        $this->anotador = $anotador;
    }
	
	public function getMotivoNotificacao() {
        return $this->motivoNotificacao;
    }

    public function setMotivoNotificacao($motivoNotificacao) {
        $this->motivoNotificacao = $motivoNotificacao;
    }
	
	public function getImagemNotificacao() {
        return $this->imagemNotificacao;
    }

    public function setImagemNotificacao($imagemNotificacao) {
        $this->imagemNotificacao = $imagemNotificacao;
    }
	
	public function getDespachoCmtPe() {
        return $this->despachoCmtPe;
    }

    public function setDespachoCmtPe($despachoCmtPe) {
        $this->despachoCmtPe = $despachoCmtPe;
    }
	
	public function getFinalizado() {
        return $this->finalizado;
    }

    public function setFinalizado($finalizado) {
        $this->finalizado = $finalizado;
    }

}
