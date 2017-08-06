<h1>Edit my Information</h1>
<?php
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save it');
?>