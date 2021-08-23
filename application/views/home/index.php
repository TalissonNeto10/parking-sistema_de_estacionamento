
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
                          <?php if($message = $this->session->flashdata('sucesso')): ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        
                                    <div class="alert bg-success alert-success alert-dismissible fade show" role="alert">
                                            <strong style="with: 60;"><?php echo $message ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="ik ik-x"></i> </button>
                                                
                                        </div>
                                    </div>
                                </div>
                         <?php endif; ?>        
                        </div>
                    </div>

                   
                    <footer class="footer">
                        <div class="w-100 clearfix">
                            <span class="text-center text-sm-left d-md-inline-block">Copyright © <?php echo date('Y') ?> ITCOM. Todos os direitos reservados.&nbsp;&nbsp;&nbsp;
                             | Redes Sociais: <a class="fab fa-instagram text-instagram" 
                             href="https://www.instagram.com/itcomconsultoria/" target="_blank"></a> 
                             <a class="fab fa-facebook-square text-facebook" href="https://www.facebook.com/itcomconsultoria-101254315343529" target="_blank"></a> 
                              <a class="fab fa-whatsapp-square text-green" href=""></a></span>
                            
                            <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Desenvolvido por <a href="https://itcom.net.br/" class="text-dark" target="_blank">ITCOM</a></span>
                        </div>
                    </footer>
                    
                </div>

           