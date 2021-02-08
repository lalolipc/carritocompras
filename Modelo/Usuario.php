<?php namespace Modelo;
class Usuario{

private $ID;
private $nick;
private $pass;


	/**
	 * Class Constructor
	 * @param    $nick   
	 * @param    $pass   
	 */
	public function __construct($nick, $pass)
	{
		$this->nick = $nick;
		$this->pass = $pass;

	}


	
    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     *
     * @return self
     */
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * @param mixed $nick
     *
     * @return self
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     *
     * @return self
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }



} ?>