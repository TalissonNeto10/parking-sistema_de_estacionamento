 <div class="sidebar-content">
                            <div class="nav-container">
                                <nav id="main-menu-navigation" class="navigation-main">
                                    <div class="nav-lavel">Serviços - Menu</div>
                                    <div class="nav-item <?php echo ($this->router->fetch_class()) == 'home' &&  ($this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                                        <a href="<?php echo base_url('/'); ?>"><i class="fas fa-home"></i><span>Home</span></a>
                                    </div>
                                    <div class="nav-item <?php echo ($this->router->fetch_class()) == 'mensalistas' &&  ($this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                                        <a href="<?php echo base_url('mensalistas'); ?>"><i class="fas fa-users"></i><span>Mensalistas</span></a>
                                    </div>
                                

                                    <div class="nav-lavel">Configurações</div>
                                    <div class="nav-item  <?php echo ($this->router->fetch_class()) == 'formas' &&  ($this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                                        <a href="<?php echo base_url('formas'); ?>"><i class="fas fa-credit-card"></i><span>Formas de Pagamento</span></a>
                                    </div>
                                    <div class="nav-item  <?php echo ($this->router->fetch_class()) == 'precificacoes' &&  ($this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                                        <a href="<?php echo base_url('precificacoes'); ?>"><i class="far fa-money-bill-alt"></i><span>Precificações</span></a>
                                    </div>
                                    <div class="nav-item  <?php echo ($this->router->fetch_class()) == 'mensalidades' &&  ($this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                                        <a href="<?php echo base_url('mensalidades'); ?>"><i class="fas fa-hand-holding-usd"></i><span>Mensalidades</span></a>
                                    </div>
                                    <div class="nav-item  <?php echo ($this->router->fetch_class()) == 'usuarios' &&  ($this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                                        <a href="<?php echo base_url('usuarios'); ?>"><i class="ik ik-users"></i><span>Gerenciar usuários</span></a>
                                    </div>
                                    <div class="nav-item  <?php echo ($this->router->fetch_class()) == 'sistema' &&  ($this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                                        <a href="<?php echo base_url('sistema'); ?>"><i class="ik ik-settings"></i><span>Configuração de sistema</span></a>
                                    </div>

                          
                                </nav>
                            </div>
                 </div>