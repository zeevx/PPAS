<?php
class Database
{   
    private $host = "localhost";
    private $db_name = "xm";
    private $username = "root";
    private $password = "";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            header("location: error.php?75844857389034858593345677DatabaseError585849");
            
        }
        return $this->conn;
    }
}
?>
<!--
    End Database configurations
//////////////////////////////////

\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    Start other configuration settings
 -->
<?php
class config {
    public static function get($param) {
        $config = array(
//

//In Case you put script in main directory instead of folder [http://example.com] only.
//use http://12.0.0.1 in case of localhost, Don't use http://localhost
//
                'base_url' => 'http://localhost:8080/pattern', //http://127.0.0.1 in case of localhost 
//
//redirecting to homepage after user login.
//
// If homepage is in script folder ([e.g: home page is ScriptFolder / home.php]) / 'home.php',
// If homepage is in subdirectory ([e.g: ScriptFolder / NewFolder / home.php]) / 'NewFolder/home.php',
// If homepage in parent folder ([e.g: public_html / ScriptFolder]) In [ Pblic_html/home.php ] / '../home.php',
// Note: ../ to go 1 level up | ../../ for two levels | ../../../ for three levels | and so on.
//
//you can also readirect to any other website after user login // e.g:  'redirect_login' => 'https://gmail.com',
//
                'redirect_login' => 'home.php',
//
//redirect to anypage after user logout
                                                // CASE - 1
//If you want to redirect to any other web page in parent folder or inside subfolder of PhpPasswordProtect script folder []
// 1 - For redirecting to web page in parent folder [LIKE: public_html/patternlogin], Use ../ for 1 level up.
//[E.g: if you are redirecting to "public_html/test.php" use '../test.php',]

// 2 - If you want to redirect to web page inside subfolder of script folder. [patternlogin/NewFolder], use / for every folder
// [E.g: if you are redirecting to "NewFolder/test.php" use '/test.php',]    

//////////////////////////////////////////////////////////////////////////////////////
                                                // CASE -2
//For redirecting to any other website after logout
//open application/logout.php in any text editor and replace line 16 with | $user_logout->redirect('http://your own url');
//but if you want to redirect to web page inside or outside the script folder then don't change anyting there
//
                'redirect_logout' => 'script/index.php',
//
// If you don't want to allow password change replace true with false
//
                'change_pass' => true

//
//////////////////////////////////////////////////////////////////////////////////////////
//
        );
        return $config[$param];
    }
}
?>