<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

 //echo $user->id;
?>
<?php
     if($auth){
      $currentViewDetails = strtolower($Inflector::singularize($this->name));
      if(isset($$currentViewDetails->user_id)){
      $currentViewDetailsId = $$currentViewDetails->user_id;
      }
      $isUserAuthorized = false;
      if($$currentViewDetails->id == $auth['User']['id']){
        $isUserAuthorized = true;
      }
     // echo $isUserAuthorized;

     echo $this->element('sidemenu', ['viewName'=>$Inflector::singularize($this->name),'isUserAuthorized'=>$isUserAuthorized]);
        } ?>


 <div class="users view large-9 medium-8 columns content">

   <!-- <h3><?= h($user->id) ?></h3> -->
   <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
      <!--  <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($user->phone) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= $this->Time->timeagoinwords(h($user->modified)) ?></td>
        </tr>
    </table>


<!--
    	<div class="row">

    		<h2>Profile</h2>


           <div class="col-md-12 ">

    <div class="panel panel-default">
     
       <div class="panel-body">

        <div class="box box-info">

                <div class="box-body">
                         <div class="col-sm-6">

                <div class="col-sm-6">
                <h4 style="color:#00b1b1;"><?= h($user->email) ?></h4></span>
                  <span><p>Aspirant</p></span>
                </div>
                <div class="clearfix"></div>
                <hr style="margin:5px 0 5px 0;">


    <div class="col-sm-5 col-xs-6 tital " >First Name:</div><div class="col-sm-7 col-xs-6 ">Prasad</div>
         <div class="clearfix"></div>
    <div class="bot-border"></div>

    <div class="col-sm-5 col-xs-6 tital " >Last Name:</div><div class="col-sm-7"> Shankar</div>
      <div class="clearfix"></div>
    <div class="bot-border"></div>

    <div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7"> <?= h($user->email) ?></div>

     <div class="clearfix"></div>
    <div class="bot-border"></div>

    <div class="col-sm-5 col-xs-6 tital " >Phone:</div><div class="col-sm-7"><?= h($user->phone) ?></div>

      <div class="clearfix"></div>
    <div class="bot-border"></div>


    <div class="col-sm-5 col-xs-6 tital " >Date Of Joining:</div><div class="col-sm-7"><?= h($user->created) ?></div>

      <div class="clearfix"></div>
    <div class="bot-border"></div>

    <div class="col-sm-5 col-xs-6 tital " >Date Of Birth:</div><div class="col-sm-7">11 Jun 1998</div>

      <div class="clearfix"></div>
    <div class="bot-border"></div>

    <div class="col-sm-5 col-xs-6 tital " >Place Of Birth:</div><div class="col-sm-7">Shirdi</div>

     <div class="clearfix"></div>
    <div class="bot-border"></div>

    <div class="col-sm-5 col-xs-6 tital " >Last modified:</div><div class="col-sm-7"><?= h($user->modified) ?></div>


                <!-- /.box-body -->
              </div>
              <!-- /.box -->

            </div>


        </div>
        </div>
    </div>
        


       </div>

-->




</div>
