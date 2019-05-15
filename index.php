<?php
require 'config.php';
require 'vendor/autoload.php'; 
session_start();
	

if (isset($_SESSION["mail"])&&($_SESSION["mail"])=="ok") 
	{
		envoiMail('Surprise','contact@apprendre.com',['html'=>'Si tu reçois ce message je passe au 2']);	
	}
	else
	{
		echo "Rafraichir la page pour votre surprise";
	}




	function envoiMail($objet, $mailto, $msg, $cci = true)
	{
		if(!is_array($mailto)){
			$mailto = [ $mailto ];
		}
	
	
	$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
	->setUsername($mailusername)
	->setPassword($mailpassword);
	
	$mailer = new Swift_Mailer($transport);

	$message = (new Swift_Message($objet))
		->setFrom([$defaultmail]);
	if ($cci){
		$message->setBcc($mailto);
	}else{
		$message->setto($mailto);
	}
}
