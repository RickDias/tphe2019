<?php /* Smarty version Smarty-3.1.19-dev, created on 2019-05-19 16:28:00
         compiled from "theme\default\paginas\sobre.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3937805615ce15b4261b5f7-21783658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '760d09c8d1455ac29a49babda168876c86bba9f6' => 
    array (
      0 => 'theme\\default\\paginas\\sobre.tpl',
      1 => 1558276079,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3937805615ce15b4261b5f7-21783658',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_5ce15b42654362_67945867',
  'variables' => 
  array (
    'usuarios' => 0,
    'usuario' => 0,
    'cont' => 0,
    'tipo' => 0,
    'base_facebook' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ce15b42654362_67945867')) {function content_5ce15b42654362_67945867($_smarty_tpl) {?><!-- About Section -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">About</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">
                    <li>
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                            <!-- <img src="http://graph.facebook.com/100002268762791/picture"> -->
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2009-2011</h4>
                                <h4 class="subheading">Our Humble Beginnings</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="img/about/2.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>March 2011</h4>
                                <h4 class="subheading">An Agency is Born</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="img/about/3.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>December 2012</h4>
                                <h4 class="subheading">Transition to Full Service</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="img/about/4.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>July 2014</h4>
                                <h4 class="subheading">Phase Two Expansion</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>Be Part
                                <br>Of Our
                                <br>Story!</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- Team Section -->
<section id="team" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Conheça nossa equipe</h2>
                <h3 class="section-subheading text-muted">Campus Santo Ângelo</h3>
            </div>
        </div>
        <div class="row">
        <?php $_smarty_tpl->tpl_vars['cont'] = new Smarty_variable(0, null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['usuario'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['usuario']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['usuario']->key => $_smarty_tpl->tpl_vars['usuario']->value) {
$_smarty_tpl->tpl_vars['usuario']->_loop = true;
?>
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="img/users/<?php echo $_smarty_tpl->tpl_vars['usuario']->value->id_usuario;?>
.jpg" class="img-responsive img-circle" style="width:200px" alt="">
                    <h4> <?php echo $_smarty_tpl->tpl_vars['usuario']->value->nome;?>
 </h4>
                    <p class="text-muted">
                      <?php echo $_smarty_tpl->tpl_vars['tipo']->value[$_smarty_tpl->tpl_vars['cont']->value];?>

                    </p>
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <?php if ($_smarty_tpl->tpl_vars['usuario']->value->id_facebook!=0) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_facebook']->value;?>
<?php echo $_smarty_tpl->tpl_vars['usuario']->value->id_facebook;?>
" target="_blank"><i class="fa fa-facebook"></i></a>
                        </li>
                        <?php }?>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['cont']->value++;?>
">
            <?php } ?>

        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div>
    </div>
</section>
<?php }} ?>
