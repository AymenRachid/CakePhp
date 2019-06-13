<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">

            <?php if($auth){ ?>

            <li><a target="_blank" href="https://book.cakephp.org/3.0/">
                           <?php echo $auth['User']['email']; ?>
                           </a>
                           </li>
                           <li>
                             <?php echo $this->Html->link('Logout', ['controller'=>'users', 'action'=>'logout']); ?>
                           </li>
                           <?php } else { ?>
                           <li>
                                                        <?php echo $this->Html->link('Login', ['controller'=>'users', 'action'=>'login']); ?>
                                                        </li>
                                                            <li>
                                                           <?php echo $this->Html->link('signup', ['controller'=>'users', 'action'=>'signup']); ?>
                                                               </li>

                                                        <li>
                                                            <?php echo $this->Html->link('Forgot Password', ['controller'=>'users', 'action'=>'Forgot Password']); ?>
                                                            </li>


                           <?php } ?>

              <!--  <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>

               <?php if ($this->request->session()->read('Auth.User.id')){ ?>
              <li><a target="_blank" href="https://book.cakephp.org/3.0/">
               <?php echo $this->request->session()->read('Auth.User.email'); ?>
               </a>
               </li>

                <?php } ?>
                 -->
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">

        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
