<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
	public $fromEmail = 'noreply@taskapp.com';
	public $fromName = 'Task application';
	public $recipients;
	public $userAgent = 'CodeIgniter';
	public $protocol = 'smtp';
	public $mailPath = '/usr/sbin/sendmail';
	
	// 👇 CAMBIA ESTOS VALORES
	public $SMTPHost = 'sandbox.smtp.mailtrap.io';
	public $SMTPUser = 'fc3771f156c9c2';
	public $SMTPPass = 'e3209a4aed76da'; 
	public $SMTPPort = 2525;
	public $SMTPTimeout = 5;
	public $SMTPKeepAlive = false;
	public $SMTPCrypto = 'tls';
	
	public $wordWrap = true;
	public $wrapChars = 76;
	public $mailType = 'html';
	public $charset = 'UTF-8';
	public $validate = false;
	public $priority = 3;
	public $CRLF = "\r\n";
	public $newline = "\r\n";
	public $BCCBatchMode = false;
	public $BCCBatchSize = 200;
	public $DSN = false;

}
