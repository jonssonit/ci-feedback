# Front end feedback message
Codeigniter one time message/feedback library using session flashdata
Usefull to give messages after posting forms etc...

# Install
Put feedback.php in ./application/libraries/feedback.php

# Load in controller
$this->load->library('feedback');
You can also autoload the library in ./application/config/autoload.php

# Add messages
$this->feedback->add( $message, $type );
$message is your message to display
$type is class of the label

# Display message
if( $this->feedback->hasMessages() )
{
    $this->feedback->display();
}
