<?php
    defined('BASEPATH') OR exit('Ação não permitida');

    class Mensalidades extends CI_Controller {


    public function __construct(){
        parent::__construct();

        if(!$this->ion_auth->logged_in()){

                redirect('login');
        }

        //Criando o model mensalidades para fazer join das outras tabelas
  
        $this->load->model('mensalidades_model');

    }

        public function index(){
            


            $data = array(

                'titulo' => 'Mensalidades cadastradas',
                'sub_titulo' => 'Listando as mensalidades cadastradas',
                'icone_view' => 'fas fa-hand-holding-usd',
                
                'styles' => array(

                    'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
                ),

                'scripts' => array(
                    'plugins/Mask/jquery.mask.min.js',
                    'plugins/Mask/custom.js',
                    'plugins/datatables.net/js/jquery.dataTables.min.js',
                    'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                    'plugins/datatables.net/js/parking.js',
                ),
            
                'mensalidades' => $this->mensalidades_model->get_all(),
            );
            
            //echo '<pre>';
            //print_r($data['mensalidades']);
            //exit();

            $this->load->view('layout/header', $data);
            $this->load->view('mensalidades/index');
            $this->load->view('layout/footer');
    
              }

              public function core($mensalidade_id = NULL){
            

                if(!$mensalidade_id){
                    //Cadastrando...

                }else{
                    if(!$this->Core_model->get_by_id('mensalidades', array('mensalidade_id' => $mensalidade_id))){
                        $this->session->set_flashdata('error', 'Mensalidade não encontrada');
                        redirect($this->router->fetch_class());

                    }else{

                        

                        $data = array(
    
                            'titulo' => 'Editando mensalidades',
                            'sub_titulo' => 'Edite a mensalidade cadastrada',
                            'icone_view' => 'fas fa-hand-holding-usd',
                            'texto_modal' => 'OS dados estão corretos? </br></br>Depois de salva só será possível alterar a "Mensalidade"',
                            
                            'styles' => array(
            
                                'plugins/select2/dist/css/select2.min.css',
                                
                            ),
            
                            'scripts' => array(
                                'plugins/Mask/jquery.mask.min.js',
                                'plugins/Mask/custom.js',
                                'plugins/select2/dist/js/select2.min.js',
                                'plugins/select2/dist/js/select2.min.js',
                                'plugins/mensalidades/mensalidades.js',
                            ),

                            'precificacoes' => $this->Core_model->get_all('precificacoes', array('precificacao_ativa' => 1)),
                            'mensalistas' => $this->Core_model->get_all('mensalistas', array('mensalista_ativo' => 1)),
                        
                            'mensalidade' => $this->Core_model->get_by_id('mensalidades', array('mensalidade_id' => $mensalidade_id)),
                        );
                        
                        //echo '<pre>';
                        //print_r($data['mensalidades']);
                        //exit();
            
                        $this->load->view('layout/header', $data);
                        $this->load->view('mensalidades/core');
                        $this->load->view('layout/footer');

                    }
                }

                $data = array(
    
                    'titulo' => 'Editando mensalidades',
                    'sub_titulo' => 'Edite as mensalidades cadastrada',
                    'icone_view' => 'fas fa-hand-holding-usd',
                    
                    'styles' => array(
    
                        'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
                    ),
    
                    'scripts' => array(
    
                        'plugins/datatables.net/js/jquery.dataTables.min.js',
                        'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                        'plugins/datatables.net/js/parking.js',
                    ),
                
                    'mensalidades' => $this->mensalidades_model->get_all(),
                );
                
                //echo '<pre>';
                //print_r($data['mensalidades']);
                //exit();
    
                $this->load->view('layout/header', $data);
                $this->load->view('mensalidades/index');
                $this->load->view('layout/footer');
        
                  }

           }