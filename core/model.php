<?php
class model{
    protected $db;
    protected $MailHost;
    protected $MailPort;
    protected $MailUsername;
    protected $MailPassword;
    protected $MailName;
    public function __construct(){
        global $db;
        global $MailHost;
        global $MailPort;
        global $MailUsername;
        global $MailPassword;
        global $MailName;

        $this->db = $db;
        $this->MailHost = $MailHost;
        $this->MailPort = $MailPort;
        $this->MailUsername = $MailUsername;
        $this->MailPassword = $MailPassword;
        $this->MailName = $MailName;
    }
}