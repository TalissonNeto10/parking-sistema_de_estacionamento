
                <?php $this->load->view('layout/navbar'); ?>

<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="" href="">
                <div class="#">
                <img src="" class="" alt="lavalite"> 
                </div>
                <span class="text">Parking</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>
        
        <?php $this->load->view('layout/sidebar'); ?>
       
    </div>

<!----------------titulo-------------------------->
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
                                                <a title="Home" href="<?php echo base_url('/');?>"><i class="ik ik-home"></i></a>
                                            </li>
                                           
                                            <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo;?></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <?php if($message = $this->session->flashdata('sucesso')): ?>

                             <div class="row">
                                    <div class="col-md-12">
                                        
                                    <div class="alert bg-success alert-success alert-dismissible fade show" role="alert">
                                            <strong><?php echo $message ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="ik ik-x"></i> </button>
                                                
                                        </div>
                                    </div>
                                </div>

                            <?php endif; ?>
                        <?php if($message = $this->session->flashdata('error')): ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        
                                    <div class="alert bg-danger alert-danger alert-dismissible fade show" role="alert">
                                            <strong><?php echo $message ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="ik ik-x"></i> </button>
                                                
                                        </div>
                                    </div>
                                </div>

                          <?php endif; ?>


            <!---------------Tabela de Usuários -------------------------->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><a class="btn btn-success float-right" 
                                    href="<?php echo base_url($this->router->fetch_class().'/core/'); ?>"> + Novo</a></div>
                                    <div class="card-body">
                                        <table class=" table data-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Forma de Pagamento:</th>
                                                    <th>Ativo</th>
                                                    <th class="nosort text-center">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                            <?php foreach ($formas as $forma): ?>
                                                <tr>
                                                <td><?php echo $forma->forma_pagamento_id; ?></td>
                                                <td><?php echo $forma->forma_pagamento_nome; ?></td>    
                                                <td><?php echo ($forma->forma_pagamento_ativa == 1 ? 
                                                ' <span class="badge badge-pill badge-info mb-1"><i class="fas fa-lock-open"></i>&nbspSim</span>': 
                                                '<span class="badge badge-pill badge-warning mb-1"><i class="fas fa-lock"></i>&nbspNão</span>'); ?></td>

                                                <td class="text-center">
                                                <a data-toggle="tooltip" data-placement="top" title="Editar <?php echo $this->router->fetch_class();?>" 
                                                href="<?php echo base_url($this->router->fetch_class().'/core/'.$forma->forma_pagamento_id); ?>" class="btn btn-icon btn-primary"><i class="ik ik-edit-2"></i></a>
                                                
                                                <button  type="button" class="btn btn-icon btn-danger" data-toggle="modal" 
                                                 data-target="#forma-<?php echo $forma->forma_pagamento_id; ?>" ><i class="ik ik-trash-2"></i></button>
                                                </td>
                                                
                                                </tr>

                                                <div class="modal fade" id="forma-<?php echo $forma->forma_pagamento_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                               <h5 class="modal-title" id="exampleModalCenterLabel"><i class="fas fa-exclamation-triangle text-danger"></i>&nbsp; Tem certeza?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                    <p >Se deseja excluir o registro, clique em <strong>Sim, excluir</strong></p>
                                      
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <a data-toggle="tooltip" data-placement="top" title="Excluir <?php echo $this->router->fetch_class();?>" 
                                                href="<?php echo base_url($this->router->fetch_class().'/del/'.$forma->forma_pagamento_id); ?>" class="btn btn-danger">Sim, Excluir</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                                            <?php endforeach; ?>     

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

        <!-----------------------FIM da Tabela--------------------------->
        

                    </div>
                </div>
   
        <!---------------------Footer----------------------->
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