
                        <?php $this->load->view('layout/navbar'); ?>

        <div class="page-wrap">
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a class="header-brand" href="index.html">
                        <div class="logo-img">
                        <img src="src/img/brand-white.svg" class="header-brand-img" alt="lavalite"> 
                        </div>
                        <span class="text">ThemeKit</span>
                    </a>
                    <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                </div>
                
                <?php $this->load->view('layout/sidebar'); ?>
            
            </div>
            <div class="main-content">
                            <div class="container-fluid">
                                <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <i class="<?php echo $icone_view; ?> bg-blue"></i>
                                                <div class="d-inline">
                                                    <h5><?php echo $titulo; ?></h5>
                                                    <span><?php echo $sub_titulo;?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <nav class="breadcrumb-container" aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item">
                                                        <a title="HOME" href="<?php echo base_url('/');?>"><i class="ik ik-home"></i></a>
                                                    </li>
                                                    <li class="breadcrumb-item">

                                                    <a data-toggle="tooltip" data-placement="top" title="Listar <?php echo $this->router->fetch_class();?>" 
                                                    href="<?php echo base_url($this->router->fetch_class());?>">
                                                    Listar &nbsp;<?php echo $this->router->fetch_class();?></a>
                                                    
                                                    </li>
                                                
                                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo;?></li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header"><i class="fas fa-calendar-alt"></i>&nbsp;<?php echo(isset($usuario) ? 'Data da Última Alteração: &nbsp;' .formata_data_banco_com_hora($usuario->data_ultima_alteracao)
                                            : '' ); ?></div>
                                            <div class="card-body">
                                            
                                <!----------------------Form de alteração de cadastro------------------------------>
                                            <form class="forms-sample" name="form_core" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-md-6 mb-20">

                                                    <label >Nome:</label>
                                                    <input type="text" class="form-control" name="first_name"
                                                    value="<?php echo(isset($usuario) ? $usuario->first_name : set_value('first_name'));?>">
                                                        <?php echo form_error('first_name', '<div class="text-danger">', '</div>') ?>                    
                                                 </div>
                                                     <div class="col-md-6 mb-20">

                                                          <label >Sobrenome:</label>
                                                          <input type="text" class="form-control" name="last_name"
                                                          value="<?php echo(isset($usuario) ? $usuario->last_name : set_value('last_name'));?>">
                                                          <?php echo form_error('last_name', '<div class="text-danger">', '</div>') ?>                    

                                                     </div>
                                               
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 mb-20">

                                                    <label >Usuário:</label>
                                                    <input type="text" class="form-control" name="username"
                                                    value="<?php echo(isset($usuario) ? $usuario->username : set_value('username'));?>">
                                                    <?php echo form_error('username', '<div class="text-danger">', '</div>') ?>

                                                 </div>
                                                     <div class="col-md-6 mb-20">

                                                          <label >E-mail (Login):</label>
                                                          <input type="email" class="form-control" name="email"
                                                          value="<?php echo(isset($usuario) ? $usuario->email : set_value('email'));?>">
                                                          <?php echo form_error('email', '<div class="text-danger">', '</div>') ?>
                                                     </div>
                                               
                                                </div>       
                                                <div class="form-group row">
                                                    <div class="col-md-6 mb-20">

                                                    <label >Senha:</label>
                                                    <input type="password" class="form-control" name="password"
                                                    value="">
                                                    <?php echo form_error('password', '<div class="text-danger">', '</div>') ?>
                                                 </div>
                                                     <div class="col-md-6 mb-20">

                                                          <label >Confirme sua Senha:</label>
                                                          <input type="password" class="form-control" name="confirmacao"
                                                           placeholder="Digite novamente sua senha" value="">
                                                           <?php echo form_error('confirmacao', '<div class="text-danger">', '</div>') ?>
                                                     </div>
                                                
                                                </div>  
                                                
                                                <div class="form-group row">
                                                    <div class="col-md-6 mb-20">
                                                      <label >Perfil de Acesso:</label>

                                                        <select class="form-control" name="perfil">
                                                              
                                                        <?php if(isset($usuario)): ?>
                                                            <option value="2" <?php echo ($perfil_usuario->id == 2 ? 'selected' : '')?>>Atendente</option>
                                                            <option value="1" <?php echo ($perfil_usuario->id == 1 ? 'selected': '') ?>>Administrador</option>
                                                          <?php else: ?>

                                                            <option value="2">Atendente</option>
                                                            <option value="1">Administrador</option>

                                                        <?php endif; ?>    
                                                        </select>  

                                                     </div>
                                                    
                                                     <div class="col-md-6 mb-20">
                                                      <label >Ativo:</label>

                                                        <select class="form-control" name="active">
                                                              
                                                          <?php if(isset($usuario)): ?>

                                                            <option value="0" <?php echo ($usuario->active == 0 ? 'selected' : '')?>>Não</option>
                                                            <option value="1" <?php echo ($usuario->active == 1 ? 'selected' : '')?>>Sim</option>
                                                          <?php else: ?>

                                                            <option value="0">Não</option>
                                                            <option value="1">Sim</option>


                                                          <?php endif; ?>
                                                        </select>  

                                                     </div>
                                                </div> 
                                                
                                             <?php if(isset($usuario)): ?>
                                                <div class="form-group row">
                                                    <div class="col-md-12">

                                                    <input type="hidden" class="form-control" name="usuario_id"
                                                    value="<?php echo $usuario->id;?>"></input>
                                                             
                                                 </div>
                                                </div>   
                                            <?php endif; ?>  
                                            
                                                <button type="submit" class="btn btn-success mr-2"> <i class="fas fa-save"></i>Salvar</button>
                                                <button href="<?php echo base_url($this->router->fetch_class()); ?>"class="btn btn-light"><i class="fas fa-arrow-left"></i>Voltar</button>
                                            </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>


        
                            </div>
                        </div>
        
            <footer class="footer">
                <div class="w-100 clearfix">
                    <span class="text-center text-sm-left d-md-inline-block">Copyright © <?php echo date('Y') ?> ITCOM. Todos os direitos reservados.&nbsp;&nbsp;&nbsp;
                    | Redes Sociais: <a class="fab fa-instagram text-instagram" 
                    href="https://www.instagram.com/itcomconsultoria/"></a> 
                    <a class="fab fa-facebook-square text-facebook" href="https://www.facebook.com/itcomconsultoria-101254315343529"></a> 
                    <a class="fab fa-whatsapp-square text-green" href=""></a></span>
                    
                    <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Desenvolvido por <a href="https://itcom.net.br/" class="text-dark" target="_blank">ITCOM</a></span>
                </div>
            </footer>
            
        </div>

