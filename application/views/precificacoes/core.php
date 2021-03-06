
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
                                            <div class="card-header"><i class="fas fa-calendar-alt"></i>&nbsp;<?php echo(isset($precificacao) ? 'Data da ??ltima Altera????o: &nbsp;' .formata_data_banco_com_hora($precificacao->precificacao_data_alteracao)
                                            : '' ); ?></div>
                                            <div class="card-body">
                                            
                                <!----------------------Form de altera????o de cadastro------------------------------>
                                            <form class="forms-sample" name="form_core" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-md-2 mb-20">

                                                    <label >Categoria:</label>
                                                    <input type="text" class="form-control" name="precificacao_categoria"
                                                    value="<?php echo(isset($precificacao) ? $precificacao->precificacao_categoria : set_value('precificacao_categoria'));?>">
                                                        <?php echo form_error('precificacao_categoria', '<div class="text-danger">', '</div>') ?>                    
                                                 </div>
                                                     <div class="col-md-2 mb-20">

                                                          <label >Valor da hora:</label>
                                                          <input type="text" class="form-control money" name="precificacao_valor_hora"
                                                          value="<?php echo(isset($precificacao) ? $precificacao->precificacao_valor_hora : set_value('precificacao_valor_hora'));?>">
                                                          <?php echo form_error('precificacao_valor_hora', '<div class="text-danger">', '</div>') ?>                    

                                                     </div>
                                                     <div class="col-md-2 mb-20">

                                                        <label >Valor da mensalidade:</label>
                                                        <input type="text" class="form-control money" name="precificacao_valor_mensalidade"
                                                        value="<?php echo(isset($precificacao) ? $precificacao->precificacao_valor_mensalidade : set_value('precificacao_valor_mensalidade'));?>">
                                                        <?php echo form_error('precificacao_valor_mensalidade', '<div class="text-danger">', '</div>') ?>                    

                                                    </div>
                                                    <div class="col-md-2 mb-20">

                                                        <label >N??mero de vagas:</label>
                                                        <input type="number" class="form-control" name="precificacao_numero_vagas"
                                                        value="<?php echo(isset($precificacao) ? $precificacao->precificacao_numero_vagas : set_value('precificacao_numero_vagas'));?>">
                                                        <?php echo form_error('precificacao_numero_vagas', '<div class="text-danger">', '</div>') ?>                    

                                                    </div>
                                                     
                                               
                                                     <div class="col-md-2 mb-20">
                                                      <label >Ativo:</label>

                                                        <select class="form-control" name="precificacao_ativa">
                                                              
                                                          <?php if(isset($precificacao)): ?>

                                                            <option value="0" <?php echo ($precificacao->precificacao_ativa == 0 ? 'selected' : '')?>>N??o</option>
                                                            <option value="1" <?php echo ($precificacao->precificacao_ativa == 1 ? 'selected' : '')?>>Sim</option>
                                                          <?php else: ?>

                                                            <option value="0">N??o</option>
                                                            <option value="1">Sim</option>


                                                          <?php endif; ?>
                                                        </select>  

                                                     </div>
                                                </div>
                                                
                                                    
                        
                                                
                                             <?php if(isset($precificacao)): ?>
                                                <div class="form-group row">
                                                    <div class="col-md-12">

                                                    <input type="hidden" class="form-control" name="precificacao_id"
                                                    value="<?php echo $precificacao->precificacao_id;?>"></input>
                                                             
                                                 </div>
                                                </div>   
                                            <?php endif; ?>  
                                            
                                                <button type="submit" class="btn btn-success mr-2"> <i class="fas fa-save"></i>Salvar</button>
                                                <a href="<?php echo base_url($this->router->fetch_class()); ?>"class="btn btn-light"><i class="fas fa-arrow-left"></i>Voltar</a>
                                            </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>




                    </div>
                </div>

    <footer class="footer">
        <div class="w-100 clearfix">
            <span class="text-center text-sm-left d-md-inline-block">Copyright ?? <?php echo date('Y') ?> ITCOM. Todos os direitos reservados.&nbsp;&nbsp;&nbsp;
            | Redes Sociais: <a class="fab fa-instagram text-instagram" 
            href="https://www.instagram.com/itcomconsultoria/"></a> 
            <a class="fab fa-facebook-square text-facebook" href="https://www.facebook.com/itcomconsultoria-101254315343529"></a> 
            <a class="fab fa-whatsapp-square text-green" href=""></a></span>
            
            <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Desenvolvido por <a href="https://itcom.net.br/" class="text-dark" target="_blank">ITCOM</a></span>
        </div>
    </footer>
    
</div>

