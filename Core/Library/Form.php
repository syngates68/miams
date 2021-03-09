<?php
namespace Core\Library;

class Form 
{
    public function check_post_raw_values(Array $var) 
    {
        foreach ($var as $v) 
        {
            if (!isset($_POST[$v]))
                return false;
        }

        return true;
    }

    public function check_post_values(Array $var) 
    {
        foreach ($var as $v) 
        {
            if (!isset($_POST[$v]))
                return false;
        }

        return true;
    }

    public function check_post_values_not_empty(Array $var) 
    {
        foreach ($var as $v) 
        {
            if (!isset($_POST[$v]) || empty($_POST[$v]))
                return false;
        }

        return true;
    }

    public function check_post_raw_values_not_empty(Array $var) 
    {
        foreach ($var as $v) 
        {
            if (!isset($_POST[$v]) || empty($_POST[$v]))
                return false;
        }
        
        return true;
    }
}