<h1>Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('category', array('type'=>'select', 'div'=>false, 'label'=>false, 'options'=>$category_arr, 'empty'=>'選択してください'));
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Post');
?>

