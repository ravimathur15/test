<?php 

//asking user the username of the repository
fwrite(STDOUT, "Please enter your username ");
$name = trim(fgets(STDIN));

//asking user the password of the repository
fwrite(STDOUT, "Please enter your password ");
$pwd = trim(fgets(STDIN));

//asking user the name of the repository
fwrite(STDOUT, "Please enter your Repository Url ");
$repo = trim(fgets(STDIN));

//asking user the domain name of the repository
fwrite(STDOUT, "Please enter your Repository Domain Name git for github and bitbucket for bitbucket");
$repo_name = trim(fgets(STDIN));

//asking user the title of the issue
fwrite(STDOUT, "Issue Title ");
$title = trim(fgets(STDIN));

//asking user the description of the issue
fwrite(STDOUT, "Issue Description ");
$desc = trim(fgets(STDIN)); 

// creating the class which will process the input
class Post_To_Repos
 {
	//declaring the variables
   var $name;
   var $pwd;
   var $repo;
   var $repo_name;
   var $title;
   var $desc;

//function to post the data via curl
   function curl_post($repo_name){
	// if conditions depending on which repository to post
	   if($repo_name == 'git'){
		   system('curl -k -u ' . $this->name . ':' . $this->pwd . '   -H "Content-Type: application/json" -d "{\"title\": \"' . $this->title . '\",\"body\":\"' . $this->desc . '\"}" https://api.github.com/repos/'.$this->name.'/'.$this->repo.'/issues');
		   echo "The issue has been posted";
	}
	else if($repo_name == 'bitbucket'){
		system('curl -k -u ' . $this->name . ':' . $this->pwd . ' https://bitbucket.org/api/1.0/repositories/'. $this->name .'/'. $this->repo .'/issues  --data "title='. $this->title .'&content='. $this->desc .'');
		echo "The issue has been posted";
  }
  else{
		echo "Check the Repository domain name you have Entered"; 
  }
   }
 }

//creating object of the class Post_To_Repos

$new_issue = new Post_To_Repos();
$new_issue->name = $name;
$new_issue->pwd = $pwd;
$new_issue->repo_name = $repo_name;
$new_issue->repo = $repo;
$new_issue->title = $title;
$new_issue->desc = $desc;
$new_issue->curl_post($repo_name);

