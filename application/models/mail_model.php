<?php

class Mail_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function html_mail($fields) {
        
        $message = '<table width="100%">
                        <tr><td>
                            <table width="600" align="center">';
        
        // Add content to mail table
        foreach($fields as $content => $name){
                $message .= '<tr>
                                <td>'.$name.': </td>
                                <td>'.$content.'</td>
                            </tr>';
        }
        
        
       $message .=          '</table>
                        </tr></td>
                    </table>';
       
       return $message;
        
    }

}

?>
