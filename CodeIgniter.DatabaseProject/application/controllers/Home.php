
<?php session_start()?>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

	public function index()
	{
		if (!isset($_SESSION["Username"] ))
		{
			$_SESSION["Username"]="Unknown" ;
			$_SESSION["UserID"]= "0" ;
			$_SESSION["responsemessage"]= " ";

		}

		$data["pageTitle"] = "Welcome to Cityu-Music";
		$data["pageHeading"] = "Featuring";
		
		$this->load->database();

		$sql_string = 'SELECT * FROM album a JOIN products p ON a.productID = p.productID ORDER BY DateOfPublish DESC limit 9';
		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);
		$data["query_new_album"] = $sql_query;		
		
		$sql_string =  "SELECT * FROM album a JOIN products p ON a.productID = p.productID  WHERE a.AlbumID IN (SELECT AlbumID FROM opinionrecord) OR a.ProductID IN (SELECT productID FROM orderdetail GROUP BY productID)Group BY albumID Limit 15";

		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);	
		$data["query_featuring"] = $sql_query;

		$sql_string = "SELECT COUNT(gl.TrackID) as NumOfTrack, g.GenereID as GenereID ,g.GenereName as GenereName ,g.GenereDescription as GenereDescription "
		             ."FROM genere g JOIN generelist gl ON g.GenereID = "
					 ."gl.GenereID GROUP BY g.GenereName ORDER by NumOfTrack DESC limit 18";

		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);	
		$data["query_catbar"] = $sql_query;


		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];

		
		$this->load->view('header', $data);
		$this->load->view('navigation', $data);
		$this->load->view('index', $data);
		$this->load->view('footer', $data);	
	}	

	
	public function login()
	{
		if ($_SESSION["Username"]=="Unknown" )
		{
			unset($sql_query);
			$data["pageTitle"] = "Login";
			$this->load->database();
			if (!isset($_SESSION["responsemessage"]))
			$_SESSION["responsemessage"] = " ";



			$data["username"] = $_SESSION["Username"];
			$data["userid"]= $_SESSION["UserID"];
			$data["responsemessage"]= $_SESSION["responsemessage"];

			$this->load->view('header', $data);
			$this->load->view('login', $data);
			$this->load->view('footer', $data);	
		}
		else
		{
			header("Location: http://localhost/codeigniter.databaseproject/index.php/home/");
		}

	}
	public function loginaction()
	{
		$data["pageTitle"] = "loginaction";


		unset($sql_query);
		$sql_query = array();
		$this->load->database();
		$username = $_POST['loginusername'];
		$password = $_POST['loginpassword'];
		if (!empty($username) && !empty($password))
		{

			$sql_string = 'SELECT * FROM userinformation WHERE Username = "'
                                                                     	 .$_POST['loginusername']
		                                                             	 .'"and password ="'
		                                                            	 .$_POST['loginpassword']
		                                                            	 .'"';
			//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
			$sql_query = $this->db->query($sql_string);
			$sql_query = $sql_query->result_array();
	
			if (!empty($sql_query) && $sql_query)
			{
				$_SESSION["UserID"] =$sql_query['0']['UserID'];
				$_SESSION["Username"] = $_POST['loginusername'];
				$_SESSION["responsemessage"] = " ";
				header("Location: http://localhost/codeigniter.databaseproject/index.php/home/");


		}
			else
			{
				$_SESSION["responsemessage"] ='username or password not correct !';
				header("Location: http://localhost/codeigniter.databaseproject/index.php/home/login");
			}
		}
		else 
		{
			$_SESSION["responsemessage"] ='Please fill in the field';
				header("Location: http://localhost/codeigniter.databaseproject/index.php/home/login");
		}

	
		
	}
	public function logout()
	{
		session_destroy();
		header("Location:http://localhost/codeigniter.databaseproject/index.php/home" );
	}
	
	public function register()
	{
       if ($_SESSION["Username"]=="Unknown" )
		{
			unset($sql_query);
			$data["pageTitle"] = "register";
			$this->load->database();
			if (!isset($_SESSION["responsemessage"]))
			$_SESSION["responsemessage"] = " ";



			$data["username"] = $_SESSION["Username"];
			$data["userid"]= $_SESSION["UserID"];
			$data["responsemessage"]= $_SESSION["responsemessage"];

			$this->load->view('header', $data);
			$this->load->view('registration', $data);
			$this->load->view('footer', $data);	
		}
		else
		{
			header("Location: http://localhost/codeigniter.databaseproject/index.php/home/");
		}

	}



	public function registeraction()
	{
	
		$data["pageTitle"] = "Register";
		$data["pageHeading"] = "Welcome to XXXXXXXX";

		unset($sql_query);
		$sql_query = array();
		$this->load->database();
		$username= $_POST['username'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
      	$Firstname = $_POST['Firstname'];
       	$Lastname = $_POST['Lastname'];
       	$Gender= $_POST['Gender'];
     	$BirthDay = $_POST['BirthDay'];
        $EmailAddress = $_POST['EmailAddress'];

		if (!empty($username) && !empty($password)&& !empty($password2)&& !empty($Firstname)&& !empty($Lastname)&& !empty($Gender)
		&& !empty($BirthDay) && !empty($EmailAddress))
		{

			
		    $validCheck = True;

       		$sql_string = 'SELECT * FROM userinformation WHERE username = "'
		                                                           		.$username
		                                                           		.'"';

			$sql_query = $this->db->query($sql_string);
			$sql_query = $sql_query->result_array();
			if (!empty($sql_query) > 0)	
        	{
          		$echoString ="Someone already has that username.";
          		$validCheck = False;
        	}
        	if ($password != $password2&& $validCheck != 0)
        	{
        		$echoString ="These passwords do not match";
        		$validCheck = False;
        	}
		
       		 $sql_string = 'SELECT * FROM userinformation WHERE EmailAddress = "'
		                                                                     	 .$EmailAddress
		                                                                      	.'"';
		    $sql_query = $this->db->query($sql_string);
			$sql_query = $sql_query->result_array();
			if (!empty($sql_query) && $validCheck != False)	
         	{
          		$echoString ="Someone already has used that email.";
          		$validCheck = False;
       		}
       		 if ($validCheck == True)
        	{


	
				    $sql_string = 'INSERT INTO userinformation ( Username, Password, FirstName, Gender, BirthDay, EmailAddress, PhoneNumber) '
                        .'VALUES ("'
                        
                        	.$username
                        	.'", "'
                        	.$password
                        	.'","'
                        	.$Firstname
                        	.'","'
                        	.$Lastname
                        	.'","'
                        	.$Gender
                        	.'","'
                        	.$BirthDay
                        	.'","'
                        	.$EmailAddress
                        	.'") ';

             		$sql_query = $this->db->query($sql_string);
					

            		$sql_string = "Select UserID FROM userinformation WHERE username = '".$username."'";
            		             		$sql_query = $this->db->query($sql_string);
					$sql_query = $sql_query->result_array();

					$_SESSION["UserID"] =$sql_query['0']['UserID'];
					$_SESSION["Username"] = $username;
					$_SESSION["responsemessage"] = " ";
					header("Location: http://localhost/codeigniter.databaseproject/index.php/home");
			}
				
			else
			{
					$_SESSION["responsemessage"] =$echoString;
					header("Location: http://localhost/codeigniter.databaseproject/index.php/home/register");
			}
		}
		else 
		{
			$_SESSION["responsemessage"] ='required field missed !';
			header("Location: http://localhost/codeigniter.databaseproject/index.php/home/register");
		}


	}



	public function hotAlbumList()
	{
		
		$data["pageTitle"] = "Hot Album";
		$data["pageHeading"] = "Hot Album";
		
		$this->load->database();

		$sql_string = 'SELECT * FROM album a JOIN products p ON a.productID = p.productID ORDER BY DateOfPublish DESC';
		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);

		$data["query_List"] = $sql_query;	
				$sql_string = "SELECT COUNT(gl.TrackID) as NumOfTrack, g.GenereID as GenereID ,g.GenereName as GenereName ,g.GenereDescription as GenereDescription "
		             ."FROM genere g JOIN generelist gl ON g.GenereID = "
					 ."gl.GenereID GROUP BY g.GenereName ORDER by NumOfTrack DESC limit 18";

		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);	
		$data["query_catbar"] = $sql_query;


		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		

		
		$this->load->view('header', $data);
		$this->load->view('navigation', $data);
		$this->load->view('AlbumList', $data);
		$this->load->view('footer', $data);	
		
	}

	public function AlbumChart()
	{
		
		$data["pageTitle"] = "Popular album";
		$data["pageHeading"] = " Favourite Album Top 10 In This week";
		
		$this->load->database();

		$sql_string = 'SELECT * FROM album a JOIN products p ON a.productID = p.productID WHERE a.productID IN (SELECT productID FROM top10buyrecord)';
		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);

		$data["query_List"] = $sql_query;	
				$sql_string = "SELECT COUNT(gl.TrackID) as NumOfTrack, g.GenereID as GenereID ,g.GenereName as GenereName ,g.GenereDescription as GenereDescription "
		             ."FROM genere g JOIN generelist gl ON g.GenereID = "
					 ."gl.GenereID GROUP BY g.GenereName ORDER by NumOfTrack DESC limit 18";

		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);	
		$data["query_catbar"] = $sql_query;


		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		

		
		$this->load->view('header', $data);
		$this->load->view('navigation', $data);
		$this->load->view('AlbumList', $data);
		$this->load->view('footer', $data);	
		
	}


	public function AlbumDetail()
	{
		$data["pageTitle"] = "News Listing";
		$data["pageHeading"] = "Please select a news below";

		$this->load->database();	
		
		
		
		$sql_string = "SELECT * FROM album a JOIN Products p on a.productID = p.productID"
									. " WHERE a.AlbumID='"
									. $this->uri->segment(3)
									. "' ";
		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);		
		$data["query_AlbumDetail"] = $sql_query;

		$sql_string = "SELECT * FROM track t JOIN Products p ON t.productID = p.productID WHERE AlbumID='"
									. $this->uri->segment(3)
									. "' ";
		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);		
		$data["query_AlbumTrackDetail"] = $sql_query;

		$sql_string = "SELECT * FROM RecordLabel WHERE RecordLabelID='"
									. $this->uri->segment(3)
									. "' ";
		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);		
		$data["query_AlbumRecordLabelDetail"] = $sql_query;


		$sql_string = "SELECT * FROM Singer "
									. " WHERE SingerID in (SELECT singerID FROM AlbumParticiplateList WHERE AlbumID = '"
									. $this->uri->segment(3)
									. "') ";
        $sql_query = $this->db->query($sql_string);		
		$data["query_AlbumSinger"] = $sql_query;



		$sql_string = "SELECT o.OpinionRecordID,o.CommentDetail,o.Rating,o.EstablishedTime, u.username FROM opinionrecord o "
									."JOIN userinformation u ON o.userID =  u.UserID  "
									. " WHERE AlbumID in (SELECT AlbumID FROM AlbumParticiplateList WHERE AlbumID = '"
									. $this->uri->segment(3)
									. "') ";
        $sql_query = $this->db->query($sql_string);		
		$data["query_AlbumComments"] = $sql_query;

		$sql_string = "SELECT Round (AVG(o.Rating),1) as rating FROM opinionrecord o "
									."JOIN userinformation u ON o.userID =  u.UserID "
									. "WHERE AlbumID in (SELECT AlbumID FROM AlbumParticiplateList WHERE AlbumID = '"
									. $this->uri->segment(3)
									. "') ";
        $sql_query = $this->db->query($sql_string);		
		$data["query_AlbumStar"] = $sql_query;


		$sql_string = "SELECT * from Genere WHERE GenereID IN(SELECT GenereID FROM GenereList WHERE "
			          ."TrackID IN (SELECT TrackID FROM Track WHERE AlbumID = '"
			          . $this->uri->segment(3)
			          ."'))";
        $sql_query = $this->db->query($sql_string);		
		$data["query_AlbumGenere"] = $sql_query;



		$data["query_List"] = $sql_query;	
		$sql_string = "SELECT COUNT(gl.TrackID) as NumOfTrack, g.GenereID as GenereID ,g.GenereName as GenereName ,g.GenereDescription as GenereDescription "
		             ."FROM genere g JOIN generelist gl ON g.GenereID = "
					 ."gl.GenereID GROUP BY g.GenereName ORDER by NumOfTrack DESC limit 18";

		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);	
		$data["query_catbar"] = $sql_query;


		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		

		
		$this->load->view('header', $data);
		$this->load->view('navigation', $data);
		$this->load->view('AlbumDetail', $data);
		$this->load->view('footer', $data);	
	}	


	public function ADDComment()
	{

		$data["pageTitle"] = "ADDComment";
		echo "success";


		unset($sql_query);
		$sql_query = array();
		$this->load->database();
		$username = $_SESSION["Username"];
		$userid = $_SESSION["UserID"];
		$comment=$_POST['comment'];
		$rating=$_POST['rating'];
		$AlbumID=$_POST['AlbumID'];

		if ($username != "Unknown" && $userid !=0)
		{
					$this->load->database();	
					$sql_string= "INSERT INTO opinionrecord (userID,CommentDetail,rating,AlbumID ) VALUES('"
		             .$userid
		             ."','"
		             .$comment
		             ."','"
		             .$rating
		             ."','"
		             .$AlbumID
		             ."')";

					$sql_query = $this->db->query($sql_string);		
					$data["query_listing"] = $sql_query;
					header("Location: http://localhost/codeigniter.databaseproject/index.php/home/AlbumDetail/$AlbumID");


			
		}
		else 
		   header("Location: http://localhost/codeigniter.databaseproject/index.php/home/login");
	}

	


	function SingerDetail()
	{
		$data["pageTitle"] = "Singer Detail";
		$data["pageHeading"] = "Please select a news below";

		$this->load->database();	

		$sql_string = "SELECT * from singer WHERE singerID = '"
		                                                   .$this->uri->segment(3)
		                                                   ."'";

        $sql_query = $this->db->query($sql_string);		
		$data["query_SingerDetail"] = $sql_query;

		$sql_string = "SELECT * FROM genere WHERE GenereID IN "
		            ."(SELECT GenereID FROM GenereList WHERE trackID IN "
		            	." (SELECT trackID FROM trackparticiplatelist WHERE singerID = '"
		            		.$this->uri->segment(3)
		            		."'))";

        $sql_query = $this->db->query($sql_string);		
		$data["query_SingerGerena"] = $sql_query;

		$sql_string = "SELECT * FROM Album a JOIN Products p on a.productID = p.productID WHERE AlbumID IN "
		              ."(SELECT AlbumID FROM AlbumParticiplateList WHERE singerID = '"
		              	.$this->uri->segment(3)
		              	."'  )";

        $sql_query = $this->db->query($sql_string);		
		$data["query_SingerAlbum"] = $sql_query;

		$sql_string = "SELECT * FROM RecordLabel WHERE RecordLabelID = "
		              ."(SELECT RecordLabelID FROM Singer WHERE singerID = '"
		              	.$this->uri->segment(3)
		              	."'  )";

        $sql_query = $this->db->query($sql_string);		
		$data["query_SingerRecordLabelDetail"] = $sql_query;

		$sql_string = "SELECT COUNT(AlbumID) as count1, AlbumID FROM AlbumParticiplateList GROUP BY SingerID"
		              . " HAVING singerID = '"
		              	.$this->uri->segment(3)
		              	."'  ";

        $sql_query = $this->db->query($sql_string);		
		$data["query_SingerNumOFAlbum"] = $sql_query;


		$sql_string = "SELECT COUNT(TrackID) as count2, TrackID FROM TrackParticiplateList GROUP BY SingerID"
		              . " HAVING singerID = '"
		              	.$this->uri->segment(3)
		              	."'  ";

        $sql_query = $this->db->query($sql_string);		
		$data["query_SingerNumOFTrack"] = $sql_query;








	$sql_string = "SELECT COUNT(gl.TrackID) as NumOfTrack, g.GenereID as GenereID ,g.GenereName as GenereName ,g.GenereDescription as GenereDescription "
		             ."FROM genere g JOIN generelist gl ON g.GenereID = "
					 ."gl.GenereID GROUP BY g.GenereName ORDER by NumOfTrack DESC limit 18";

		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);	
		$data["query_catbar"] = $sql_query;
		
		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		


		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		

		
		$this->load->view('header', $data);
		$this->load->view('navigation', $data);
		$this->load->view('SingerDetail', $data);
		$this->load->view('footer', $data);	
     } 

     function RecordLabelDetail()
	{
		$data["pageTitle"] = "RecordLabel Detail";
		$data["pageHeading"] = "Please select a news below";

		$this->load->database();	

		$sql_string = "SELECT * from RecordLabel WHERE RecordLabelID = '"
		                                                   .$this->uri->segment(3)
		                                                   ."'";

        $sql_query = $this->db->query($sql_string);		
		$data["query_RecordLabelDetail"] = $sql_query;

		$sql_string = "SELECT * from singer WHERE RecordLabelID = '"
		                                                   .$this->uri->segment(3)
		                                                   ."'";

        $sql_query = $this->db->query($sql_string);		
		$data["query_RecordLabelSinger"] = $sql_query;


	

		$sql_string = "SELECT count(singerID) as NumOFSinger from singer GROUP BY RecordLabelID"
		              . " HAVING RecordLabelID = '"
		              	.$this->uri->segment(3)
		              	."'  ";
		                                         

        $sql_query = $this->db->query($sql_string);		
		$data["query_NumOFSinger"] = $sql_query;






		$sql_string = "SELECT COUNT(gl.TrackID) as NumOfTrack, g.GenereID as GenereID ,g.GenereName as GenereName ,g.GenereDescription as GenereDescription "
		             ."FROM genere g JOIN generelist gl ON g.GenereID = "
					 ."gl.GenereID GROUP BY g.GenereName ORDER by NumOfTrack DESC limit 18";

		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);	
		$data["query_catbar"] = $sql_query;
		
		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		


		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		

		
		$this->load->view('header', $data);
		$this->load->view('navigation', $data);
		$this->load->view('RecordLabelDetail', $data);
		$this->load->view('footer', $data);	
	    
     } 


	public function TrackDetail()
	{
		$data["pageTitle"] = "Track Detail";
		$data["pageHeading"] = "Please select a news below";

		$this->load->database();	
		
		$sql_string = "SELECT * FROM Album WHERE AlbumID = (SELECT albumID FROM Track WHERE trackID = '"
			. $this->uri->segment(3)
			."')";

		$sql_query = $this->db->query($sql_string);		
		$data["query_TrackAlbum"] = $sql_query;


		$sql_string = "SELECT * FROM track t JOIN Products p on t.productID = p.productID"
									. " WHERE t.TrackID='"
									. $this->uri->segment(3)
									. "' ";
		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);		
		$data["query_TrackDetail"] = $sql_query;


		$sql_string = "SELECT * FROM RecordLabel WHERE RecordLabelID=(SELECT RecordLabelID FROM Album WHERE AlbumID =("
			."SELECT AlbumID FROM Track WHERE TrackID =  '"
									. $this->uri->segment(3)
									. "'))";
		$sql_query = $this->db->query($sql_string);		
		$data["query_TrackRecordLabelDetail"] = $sql_query;


		$sql_string = "SELECT * FROM Singer "
									. " WHERE SingerID in (SELECT singerID FROM TrackParticiplateList WHERE TrackID = '"
									. $this->uri->segment(3)
									. "') ";
        $sql_query = $this->db->query($sql_string);		
		$data["query_TrackSinger"] = $sql_query;



		$sql_string = "SELECT * FROM track t JOIN Products p on t.productID = p.productID"
									. " WHERE t.AlbumID= (SELECT AlbumID FROM Track WHERE trackID ='"
									. $this->uri->segment(3)
									. "') ";
		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);		
		$data["query_SameAlbumTrack"] = $sql_query;



		$sql_string = "SELECT * from Genere WHERE GenereID IN(SELECT GenereID FROM GenereList WHERE "
			          ."TrackID = '"
			          . $this->uri->segment(3)
			          ."')";
        $sql_query = $this->db->query($sql_string);		
		$data["query_TrackGenere"] = $sql_query;





		$sql_string = "SELECT COUNT(gl.TrackID) as NumOfTrack, g.GenereID as GenereID ,g.GenereName as GenereName ,g.GenereDescription as GenereDescription "
		             ."FROM genere g JOIN generelist gl ON g.GenereID = "
					 ."gl.GenereID GROUP BY g.GenereName ORDER by NumOfTrack DESC limit 18";

		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);	
		$data["query_catbar"] = $sql_query;
		
		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		


		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		

		
		$this->load->view('header', $data);
		$this->load->view('navigation', $data);
		$this->load->view('TrackDetail', $data);
		$this->load->view('footer', $data);	
	}


	public function GenereCate()
	{
		$data["pageTitle"] = "Genere List";
		$data["pageHeading"] = "All Genere";

		$this->load->database();	
		
		
		
		$sql_string = "SELECT * FROM Genere ORDER BY GenereName";
		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;

		$sql_query = $this->db->query($sql_string);		
		$data["query_GenereCate"] = $sql_query;
		
		$sql_string = "SELECT COUNT(gl.TrackID) as NumOfTrack, g.GenereID as GenereID ,g.GenereName as GenereName ,g.GenereDescription as GenereDescription "
		             ."FROM genere g JOIN generelist gl ON g.GenereID = "
					 ."gl.GenereID GROUP BY g.GenereName ORDER by NumOfTrack DESC limit 18";

		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);	
		$data["query_catbar"] = $sql_query;
		
		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		
		

		
		$this->load->view('header', $data);
		$this->load->view('navigation', $data);
		$this->load->view('GenereList', $data);
		$this->load->view('footer', $data);	
	}


	public function GenereDetail()
	{
		$data["pageTitle"] = "Genere Detail";
		$data["pageHeading"] = "Album in this gerene will show below";


		$this->load->database();




		$sql_string = "SELECT * FROM Genere WHERE GenereID = '"
		              . $this->uri->segment(3)
		              ."'";
		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;

		$sql_query = $this->db->query($sql_string);		
		$data["query_GenereDetail"] = $sql_query;




		$sql_string = "SELECT * FROM Album a JOIN Products p ON a.productID = p.productID WHERE a.AlbumID IN (SELECT AlbumID FROM Track WHERE TrackID IN "
			         ."(SELECT TrackID FROM GenereList WHERE GenereID = '"
			         . $this->uri->segment(3)
			         ."')) ";
		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;

		$sql_query = $this->db->query($sql_string);		
		$data["query_List"] = $sql_query;
		$sql_string = "SELECT COUNT(gl.TrackID) as NumOfTrack, g.GenereID as GenereID ,g.GenereName as GenereName ,g.GenereDescription as GenereDescription "
		             ."FROM genere g JOIN generelist gl ON g.GenereID = "
					 ."gl.GenereID GROUP BY g.GenereName ORDER by NumOfTrack DESC limit 18";

		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);	
		$data["query_catbar"] = $sql_query;
		
		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		

		
		$this->load->view('header', $data);
		$this->load->view('navigation', $data);
		$this->load->view('AlbumList', $data);
		$this->load->view('footer', $data);	
	}

    
    public function ADDproduct()
	{

		$data["pageTitle"] = "ADDProduct";
		$data["pageHeading"] = "Please select a news below";

		if ( $_SESSION["Username"] == "Unknown" && $_SESSION["UserID"] = "0")
		{
			header("Location: login.php" );
		}

		$this->load->database();

		$sql_string = 'SELECT * FROM OrderDetail WHERE productID ="'
		                                                         .$this->uri->segment(2)
		                                                         .'"AND purchaseorderID = ' 
		                                                         .'(SELECT ELECT purchaseorderID FROM purchaseOrder WHERE userID = "'
		                                                         .$_SESSION["UserID"]
		                                                         .'" AND PayBill = False)';
       	$sql_checkproducts = $this->db->query($sql_string);

		 $sql_string = "SELECT productID FROM Album WHERE AlbumID = '"
		               .$this->uri->segment(2)
		               ."'";

		 $sql_query = $this->db->query($sql_string);              
		 $ProductID = $sql_query;              


		 $sql_string = "SELECT purchaseorderID FROM purchaseOrder WHERE userID = '".$_SESSION["UserID"]."' AND PayBill = False";
		 $sql_query = $this->db->query($sql_string);
		 $purchaseOrderID= $sql_query;
		 if (mysql_num_rows($sql_checkusernamequery) ==1)
		 {
		 	$sql_string= "UPDATE OrderDetail SET Quantity = Quantity+1 WHERE productID ='"
		 	                                                                          .$ProductID
		 	                                                                          ."' AND purchaseorderID = '"
		 	                                                                          . $purchaseOrderID
		 	                                                                          ."'";
		 }

		 	else
		 	{
		 		 if (is_null($purchaseOrderID))
		         {
		 	           $sql_string= "INSERT INTO OrderDetail (productID,Quantity) VALUES('"
		               .$ProductID
		               ."',1)";
		             
		         }
		         else
		         {
		 	       $sql_string= "INSERT INTO OrderDetail (purchaseorderID,productID,Quantity) VALUES('"
		                      .$purchaseOrderID
		                      ."','"
		                      .$ProductID
		                      ."',1)";   
		         }
		 	}

		


		

		$sql_query = $this->db->query($sql_string);		
		$data["query_listing"] = $sql_query;

		
		header("Location: AlbumDetail.php" );
		


	}

	public function Paybill()
	{
		$data["pageTitle"] = "ADDProduct";
		$data["pageHeading"] = "Please select a news below";

		if ( $_SESSION["Username"] == "Unknown" && $_SESSION["UserID"] = "0")
		{
			header("Location: login.php" );
		}


		$this->load->database();
		$sql_string= "UPDATE purchaseOrder SET Paybill= True AND FinishTransactionDate = Now()"
		                                                                              ." WHERE purchaseOrderID ='"
		 	                                                                          .$this->uri->segment(2)
		 	                                                                          ."'";
		 	                                                                          		 	                                                                          
		$sql_query = $this->db->query($sql_string);	
		$data["paybill"] = $sql_query;

	}


	public function ShoppingCart()
	{
		$data["pageTitle"] = "ShoppingCart";
		$data["pageHeading"] = "Please select a news below";
		if ( $_SESSION["Username"] == "Unknown" && $_SESSION["UserID"] = "0")
		{
			header("Location: login.php" );
		}

		$this->load->database();	
		
		$sql_string = "SELECT * FROM OrderDetail o JOIN Products p ON o.productID = p.productID Join "
		              ."Album a ON p.ProductID = a.ProductID"
		              ."JOIN Track t ON p.ProductID =t.ProductID WHERE purchaseOrderID IN  "
		              ."(SELECT purchaseOrderID FROM purchaseOrder WHERE userID = '"
		              .$_SESSION["UserID"]
		              ."' AND PayBill = False)";
		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;

		$sql_query = $this->db->query($sql_string);		
		$data["query_ShoppingCart"] = $sql_query;
		

		$sql_string = "SELECT SUM(p.Price*o.Quantity) as total FROM OrderDetail o  "
		              ."JOIN Album a ON o.productID = a.productID JOIN products p ON p.productID = a.productID  "
		              ."JOIN Track t ON p.productID = t.productID  "
		              ."WHERE purchaseOrderID IN (SELECT purchaseOrderID FROM purchaseOrder WHERE userID = '"
		              .$_SESSION["UserID"]
		              ."' AND PayBill = False)";
        $sql_query = $this->db->query($sql_string);		
		$data["query_totalamount"] = $sql_query;


		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		

		
		$this->load->view('header', $data);
		$this->load->view('navigation', $data);
		$this->load->view('AlbumList', $data);
		$this->load->view('footer', $data);	
	}


	function MyInfo()
	{
		$data["pageTitle"] = "My account";
		$data["pageHeading"] = "Please select a news below";

		if ( $_SESSION["Username"] == "Unknown" && $_SESSION["UserID"] = "0")
		{
			header("Location: login.php" );
		}


		$this->load->database();	

		$sql_string = "SELECT * from userinformaion WHERE userID = '"
		                                                           .$_SESSION["UserID"]
		                                                           ."'";

        $sql_query = $this->db->query($sql_string);		
		$data["query_userinfo"] = $sql_query;


		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		

		
		$this->load->view('header', $data);
		$this->load->view('navigation', $data);
		$this->load->view('AlbumList', $data);
		$this->load->view('footer', $data);	
	    
     } 


     function MyPurchaseRecord()
	{

		$data["pageTitle"] = "My purchases";
		$data["pageHeading"] = "Please select a news below";

		if ( $_SESSION["Username"] == "Unknown" && $_SESSION["UserID"] = "0")
		{
			header("Location: login.php" );
		}


		$this->load->database();	

		$sql_string = "SELECT * FROM  purchaseorder p JOIN orderdetail o"
                       ."ON p.PurchaseOrderID=o.PurchaseOrderID"
                       ."JOIN products pr ON o.ProductID = pr.ProductID "
                       ."JOIN album a ON a.ProductID = pr.ProductID"
                       ."JOIN track t ON t.ProductID = pr.ProductID"
                       ."WHERE p.UserID = '"
                       .$_SESSION["UserID"]
                       ."' AND p.PayBill = true"
                       ."ORDER BY p.FinishTransactionDate DESC";



        $sql_query = $this->db->query($sql_string);		
		$data["query_MyPurchaseRecord"] = $sql_query;


		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		

		
		$this->load->view('header', $data);
		$this->load->view('navigation', $data);
		$this->load->view('AlbumList', $data);
		$this->load->view('footer', $data);	
	    
     }


     function Myfavourite()
     {
     	$data["pageTitle"] = "My favourite";
		$data["pageHeading"] = "Please select a news below";
		
		if ( $_SESSION["Username"] == "Unknown" && $_SESSION["UserID"] = "0")
		{
			header("Location: login.php" );
		}
		$this->load->database();	

		$sql_string = "SELECT * FROM singer "
		             ."WHERE singerID IN(SELECT singerID FROM AlbumParticiplateList "
		             ."WHERE AlbumID IN (SELECT AlbumID FROM opinionrecord WHERE Rating  = "
                     ."(SELECT MAX(rating) FROM opinionrecord GROUP BY UserID"
                     ."HAVING UserID = '"
                     .$_SESSION["UserID"]
                     ."') AND UserID = '"
                     .$_SESSION["UserID"]
                     ."') OR AlbumID IN (SELECT AlbumID FROM album WHERE ProductID IN"
                     ."(SELECT ProductID FROM orderdetail WHERE purchaseorderID IN "
                     ."(SELECT purchaseorderID FROM purchaseorder WHERE userID = '"
                     .$_SESSION["UserID"]
                     ."'))) OR singerID IN "
                     ."(SELECT singerID FROM trackparticiplatelist WHERE trackID IN"
                     ."(SELECT trackID FROM track WHERE ProductID IN "
                     ."(SELECT ProductID FROM orderdetail WHERE purchaseorderID IN "
                     ."(SELECT purchaseorderID FROM purchaseorder WHERE userID ='"
                     .$_SESSION["UserID"]
                     ."'))))) Order BY singerName";



        $sql_query = $this->db->query($sql_string);		
		$data["query_MyPurchaseRecord"] = $sql_query;


		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		

		
		$this->load->view('header', $data);
		$this->load->view('navigation', $data);
		$this->load->view('AlbumList', $data);
		$this->load->view('footer', $data);	

     }


	function search()
	{
		$data["pageTitle"] = "search";
		$data["pageHeading"] = "Search Result:";

		$this->load->database();
		$save=$this->uri->segment(3);
		$keyword=str_replace("%20"," ",$save);
		
		

         $sql_string = "SELECT * FROM album a JOIN Products p ON a.productID = p.productID WHERE p.price = '"
         .$keyword
         ."'OR AlbumName = '"
         .$keyword
         ."' OR AlbumName LIKE '%"
         .$keyword
         ."%' OR year(DateOfPublish) ='"
         .$keyword
         ." ' OR RecordLabelID IN(SELECT RecordLabelID FROM RecordLabel WHERE RecordLabalName LIKE '%"
         .$keyword
         ."%') OR AlbumID IN (SELECT AlbumID FROM AlbumParticiplateList "
         ."WHERE SingerID IN (SELECT SingerID FROM Singer WHERE singerName LIKE '%"
         .$keyword
         . "%')) OR AlbumID IN (SELECT AlbumID FROM Track WHERE TrackName LIKE '%"
         .$keyword
         ."%' ) OR AlbumID IN (SELECT AlbumID FROM Track WHERE TrackID IN"
         ."(SELECT TrackID FROM GenereList WHERE GenereID IN "
         ."(SELECT GenereID FROM Genere WHERE GenereName LIKE '%"
         .$keyword
         ."%')))ORDER BY DateOfPublish";
         

		$sql_query = $this->db->query($sql_string);		
		$data["query_List"] = $sql_query;	
				$sql_string = "SELECT COUNT(gl.TrackID) as NumOfTrack, g.GenereID as GenereID ,g.GenereName as GenereName ,g.GenereDescription as GenereDescription "
		             ."FROM genere g JOIN generelist gl ON g.GenereID = "
					 ."gl.GenereID GROUP BY g.GenereName ORDER by NumOfTrack DESC limit 18";

		//echo "<br /><b>SQL COMMAND:</b> " . $sql_string;
		$sql_query = $this->db->query($sql_string);	
		$data["query_catbar"] = $sql_query;
		
		$data["username"] = $_SESSION["Username"];
		$data["userid"]= $_SESSION["UserID"];	
		

		
		$this->load->view('header', $data);
		$this->load->view('navigation', $data);
		$this->load->view('AlbumList', $data);
		$this->load->view('footer', $data);	
		
	}
}


