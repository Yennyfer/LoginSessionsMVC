<?php
require_once('db_abstract_class.php');

class usuarios extends db_abstract_class{
	
	private $idUsuarios;
	private $Nombres;
	private $Apellidos;
	private $Telefono;
    private $User;
    private $Password;
	private $Tipo;
	private $Estado;


    /**
     * Gets the value of idUsuarios.
     *
     * @return mixed
     */
    public function getIdUsuarios()
    {
        return $this->idUsuarios;
    }

    /**
     * Sets the value of idUsuarios.
     *
     * @param mixed $idUsuarios the id usuarios
     *
     * @return self
     */
    private function _setIdUsuarios($idUsuarios)
    {
        $this->idUsuarios = $idUsuarios;

        return $this;
    }

    /**
     * Gets the value of Nombres.
     *
     * @return mixed
     */
    public function getNombres()
    {
        return $this->Nombres;
    }

    /**
     * Sets the value of Nombres.
     *
     * @param mixed $Nombres the nombres
     *
     * @return self
     */
    private function _setNombres($Nombres)
    {
        $this->Nombres = $Nombres;

        return $this;
    }

    /**
     * Gets the value of Apellidos.
     *
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->Apellidos;
    }

    /**
     * Sets the value of Apellidos.
     *
     * @param mixed $Apellidos the apellidos
     *
     * @return self
     */
    private function _setApellidos($Apellidos)
    {
        $this->Apellidos = $Apellidos;

        return $this;
    }

    /**
     * Gets the value of Telefono.
     *
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * Sets the value of Telefono.
     *
     * @param mixed $Telefono the telefono
     *
     * @return self
     */
    private function _setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;

        return $this;
    }

    /**
     * Gets the value of Tipo.
     *
     * @return mixed
     */
    public function getTipo()
    {
        return $this->Tipo;
    }

    /**
     * Sets the value of Tipo.
     *
     * @param mixed $Tipo the tipo
     *
     * @return self
     */
    private function _setTipo($Tipo)
    {
        $this->Tipo = $Tipo;

        return $this;
    }

    /**
     * Gets the value of Estado.
     *
     * @return mixed
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * Sets the value of Estado.
     *
     * @param mixed $Estado the estado
     *
     * @return self
     */
    private function _setEstado($Estado)
    {
        $this->Estado = $Estado;

        return $this;
    }

    /**
     * Gets the value of User.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * Sets the value of User.
     *
     * @param mixed $User the user
     *
     * @return self
     */
    private function _setUser($User)
    {
        $this->User = $User;

        return $this;
    }

    /**
     * Gets the value of Password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Sets the value of Password.
     *
     * @param mixed $Password the password
     *
     * @return self
     */
    private function _setPassword($Password)
    {
        $this->Password = $Password;

        return $this;
    }


    function __destruct() {
        $this->Disconnect();
    }

	public function __construct($user_data=array()){
        parent::__construct();
		if(count($user_data)>1){
			foreach ($user_data as $campo=>$valor){
                $this->$campo = $valor;
			}
		}else {
			$this->Nombres = "";
			$this->Apellidos = "";
			$this->Telefono = "";
            $this->User = "";
            $this->Password = "";
			$this->Tipo = "";
			$this->Estado = "";
		}
    }

    public function insertar(){
        $this->insertRow("INSERT INTO usuarios
            VALUES ('NULL', ?, ?, ?, ?, ?, ?, ?)", array( 
                $this->Nombres,
                $this->Apellidos,
                $this->Telefono,
                $this->User,
                $this->Password,
                $this->Tipo,
                $this->Estado,
            )
        );
		$this->Disconnect();
    }

    public function editar(){
		$arrUser = (array) $this;
		$this->updateRow("UPDATE usuarios SET Nombres = ?, Apellidos = ?, Telefono = ?, User = ?, Password = ?, Tipo = ?, Estado = ? WHERE idUsuarios = ?", array(
            $this->Nombres,
            $this->Apellidos,
            $this->Telefono,
            $this->User,
            $this->Password,
            $this->Tipo,
            $this->Estado,
			$this->idUsuarios,
		));
		$this->Disconnect();
    }

    public function eliminar(){
        
    }

    public static function buscarForId($id){
		if ($id > 0){
			$usr = new usuarios();
			$getrow = $usr->getRow("SELECT * FROM usuarios WHERE idUsuarios =?", array($id));
			$usr->idUsuarios = $getrow['idUsuarios'];
			$usr->Nombres = $getrow['Nombres'];
			$usr->Apellidos = $getrow['Apellidos'];
			$usr->Telefono = $getrow['Telefono'];
            $usr->User = $getrow['User'];
            $usr->Password = $getrow['Password'];
			$usr->Tipo = $getrow['Tipo'];
			$usr->Estado = $getrow['stado'];
			$usr->Disconnect();
			return $usr;
		}else{
			return NULL;
		}
		$this->Disconnect();
    }
	
    public static function getAll(){
		return usuarios::buscar("SELECT * FROM usuarios");
    }
	
	public static function buscar($query){
        $arrUsuarios = array();
        $tmp = new usuarios();
        $getrows = $tmp->getRows($query);
        
        foreach ($getrows as $valor) {
            $usr = new usuarios();
            $usr->idUsuarios = $getrow['idUsuarios'];
            $usr->Nombres = $getrow['Nombres'];
            $usr->Apellidos = $getrow['Apellidos'];
            $usr->Telefono = $getrow['Telefono'];
            $usr->User = $getrow['User'];
            $usr->Password = $getrow['Password'];
            $usr->Tipo = $getrow['Tipo'];
            $usr->Estado = $getrow['stado'];
            array_push($arrUsuarios, $usr);
        }
        $tmp->Disconnect();
        return $arrUsuarios;
    }

    public static function Login($User, $Password){
        $arrUsuarios = array();
        $tmp = new usuarios();
        $getTempUser = $tmp->getRows("SELECT * FROM Usuarios WHERE User = '$User'");
        if(count($getTempUser) >= 1){
            $getrows = $tmp->getRows("SELECT * FROM Usuarios WHERE User = '$User' AND Password = '$Password'");
            if(count($getrows) >= 1){
                foreach ($getrows as $valor) {
                    return $valor;
                }
            }else{
                return "Password Incorrecto";
            }
        }else{
            return "No existe el usuario";
        }

        $tmp->Disconnect();
        return $arrUsuarios;
    }

}

?>