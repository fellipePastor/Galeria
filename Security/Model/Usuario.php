<?php


class Usuario 
{

private $id;
private $email;
private $senha;
private $foto;
private $nome;




    public function __construct($id)
    {
        $this->id = $id;
        $this->con = new PDO(SERVIDOR,USUARIO,SENHA);
    }
    
    







/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId($id)
{
$this->id = $id;

return $this;
}

/**
 * Get the value of email
 */ 
public function getEmail()
{
return $this->email;
}

/**
 * Set the value of email
 *
 * @return  self
 */ 
public function setEmail($email)
{
$this->email = $email;

return $this;
}

/**
 * Get the value of senha
 */ 
public function getSenha()
{
return $this->senha;
}

/**
 * Set the value of senha
 *
 * @return  self
 */ 
public function setSenha($senha)
{
$this->senha = $senha;

return $this;
}

/**
 * Get the value of foto
 */ 
public function getFoto()
{
return $this->foto;
}

/**
 * Set the value of foto
 *
 * @return  self
 */ 
public function setFoto($foto)
{
$this->foto = $foto;

return $this;
}

/**
 * Get the value of nome
 */ 
public function getNome()
{
return $this->nome;
}

/**
 * Set the value of nome
 *
 * @return  self
 */ 
public function setNome($nome)
{
$this->nome = $nome;

return $this;
}
}












?>