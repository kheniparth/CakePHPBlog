<!-- File: src/Template/Articles/login.ctp -->
 <div class="row" id="logo">
        <h1>Conestoga Pizzeria</h1>
    </div>
	
	<div class="container-fluid">        
		<div class="row" style="margin-left:40%">
            <? echo $this->Form->create('Login'); ?>
            <div id="login" class="col-md-6">
            <?
                echo $this->Form->input('username');
                echo $this->Form->input('password');
                ?>
            </div>
        </div>
        </br>
        <div class="submitButton">
    <!--        <input type="hidden" id="bill" name="Final Bill" value="0"/>-->
            <?php
            echo $this->Form->button(__('Login In'), array('class'=>'order_btn'));
            echo $this->Form->end();
            ?>
            </br>
            <?= $this->Html->link('Home', ['action' => 'index']) ?>

        </div>
        </div>
        </div>
</div>