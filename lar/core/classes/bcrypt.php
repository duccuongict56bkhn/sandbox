<?php 
class Bcrypt {
	private $rounds;
	
	public function __construct($rounds = 12) {
		if (CRYPT_BLOWFISH != 1) {
			throw new Exception("Bcrypt is not supportd on this server, ");
		}
		$this->rounds = $rounds;
	}

	/* Gen Salt */
	private function genSalt()
	{
		$string = str_shuffle(mt_rand());
		$salt   = uniqid($string, true);

		return $salt;
	}

	public function genHash($password)
	{
		
		$hash = crypt($password, '$2y' . $this->rounds . '$' . $this->genSalt());

		return $hash;
	}

	public function verify($password, $existingHash) 
	{
		/* Has new password with old hash */
		$hash = crypt($password, $existingHash);

		/* Hashes match? */
		if ($hash = $existingHash) {
			return true;
		} else {
			return false;
		}
	}
}

 ?>