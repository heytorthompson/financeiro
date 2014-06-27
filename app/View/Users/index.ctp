<?php 

?>
<div class="users form">
<h1>Clientes</h1>
<table class="table table-striped table-condensed">
    <thead>
        <tr>
            <th><?php echo $this->Form->checkbox('all', array('name' => 'CheckAll',  'id' => 'CheckAll')); ?></th>
            <th><?php echo $this->Paginator->sort('reference', 'Fatura');?>  </th>
            <th><?php echo $this->Paginator->sort('nome', 'Nome');?>  </th>
            <th><?php echo $this->Paginator->sort('registro', 'CPF/CNPJ');?>  </th>
            <th><?php echo $this->Paginator->sort('email', 'E-Mail');?></th>
            <th><?php echo $this->Paginator->sort('telefone', 'Telefone');?></th>
            <th>Pagamento</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>                       
        <?php $count=0; ?>
        <?php foreach($clientes as $user): ?>                
        <?php $count ++;?>
        <?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
        <?php endif; ?>
            <td><?php echo $this->Form->checkbox('Cliente.reference.'.$user['Cliente']['reference']); ?></td>
            <td><?php echo $this->Html->link( $user['Cliente']['reference']  ,   array('action'=>'edit', $user['Cliente']['reference']),array('escape' => false) );?></td>
            <td style="text-align: center;"><?php echo $user['Cliente']['nome']; ?></td>
            <td style="text-align: center;"><?php echo $user['Cliente']['registro']; ?></td>
            <td style="text-align: center;"><?php echo $user['Cliente']['email']; ?></td>
            <td style="text-align: center;"><?php echo $user['Cliente']['telefone']; ?></td>
            <td >
            <?php echo $this->Html->link(    "PagSeguro",   array('controller'=>'Principal','action'=>'getUrlPagSeguro', $user['Cliente']['reference'] ) ); ?> 
            </td>
            <td>
            <span class="label label-default">Cadastro Realizado</span>
            </td>
            
            <!-- <span class="label label-primary">Primary</span>
            <span class="label label-success">Success</span>
            <span class="label label-info">Info</span>
            <span class="label label-warning">Warning</span>
            <span class="label label-danger">Danger</span> -->
            <?php
                // if( $user['Cliente']['status'] != 0){ 
                //     echo $this->Html->link(    "Delete", array('action'=>'delete', $user['Cliente']['reference']));}else{
                //     echo $this->Html->link(    "Re-Activate", array('action'=>'activate', $user['Cliente']['reference']));
                //     }
            ?>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php unset($user); ?>
    </tbody>
</table>
<div class="pagination pagination-large">
    <ul class="pagination">
            <?php
                echo $this->Paginator->prev(__('Anterior'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Próximo'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
        </ul>
    </div>
<?php //echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
<?php //echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
<?php //echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
</div>                
<?php echo $this->Html->link( "Add A New User.",   array('action'=>'add'),array('escape' => false) ); ?>
<br/>
<?php 
echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
?>