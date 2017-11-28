<?php
class model{
    protected $db;
    protected $MailHost;
    protected $MailPort;
    protected $MailUsername;
    protected $MailPassword;
    protected $MailName;
    protected $MAILCHIMP_API_KEY;
    protected $MAILCHIMP_LIST_ID;
    public function __construct(){
        global $db;
        global $MailHost;
        global $MailPort;
        global $MailUsername;
        global $MailPassword;
        global $MailName;
        global $MAILCHIMP_API_KEY;
        global $MAILCHIMP_LIST_ID;

        $this->db = $db;
        $this->MailHost = $MailHost;
        $this->MailPort = $MailPort;
        $this->MailUsername = $MailUsername;
        $this->MailPassword = $MailPassword;
        $this->MailName = $MailName;
        $this->MAILCHIMP_API_KEY = $MAILCHIMP_API_KEY;
        $this->MAILCHIMP_LIST_ID = $MAILCHIMP_LIST_ID;
    }
}