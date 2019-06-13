<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>


         <li><?= $this->Html-> link(__('New User'), ['action' => 'add']) ?> </li>
         <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <!-- <li><?php echo $this->name;?> </li>
        <li><?php echo $this->view; ?> </li>
        -->
    <?php

     if($this->view == 'view' AND $isUserAuthorized == true) { ?>
         <li><?= $this->Html->link(__('Edit '.$viewName), ['action' => 'edit', $user->id]) ?> </li>
         <li><?= $this->Form->postLink(__('Delete '.$viewName), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
     <?php } ?>


    </ul>
</nav>
