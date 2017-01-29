<?php

namespace UnnPortal;

class UnnPortalException extends Exception 
{
    public function getMessage()
    {
      return "Authentication failed: Invalid username or password";
    }
}
