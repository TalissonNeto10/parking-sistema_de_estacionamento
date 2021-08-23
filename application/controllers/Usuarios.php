    <?php
    defined('BASEPATH') OR exit('Ação não permitida');

    class Usuarios extends CI_Controller {


    public function __construct(){
        parent::__construct();

        if(!$this->ion_auth->logged_in()){

                redirect('login');
        }

    }

        public function index(){

            $data = array(

                'titulo' => 'Usuários Cadastrados',
                'sub_titulo' => 'Listando dos os usuários cadastrados',
                
                'styles' => array(

                    'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
                ),

                'scripts' => array(

                    'plugins/datatables.net/js/jquery.dataTables.min.js',
                    'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                    'plugins/datatables.net/js/parking.js',
                ),
            
                'usuarios' => $this->ion_auth->users()->result(), //pegando todos os usuarios do banco
            );
            
            //echo '<pre>';
            //print_r($data['usuarios']);
            //exit();

            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/index');
            $this->load->view('layout/footer');
        }

        public function core($usuario_id = NULL){

            if(!$usuario_id){

                //Cadastro de novo Usuário 

                $this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[4]|max_length[25]');
                $this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[4]|max_length[30]');
                $this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[4]|max_length[20]|is_unique[users.username]');
                $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[4]|max_length[200]|is_unique[users.email]');
                $this->form_validation->set_rules('password', 'Senha', 'trim|required|min_length[6]');
                $this->form_validation->set_rules('confirmacao', 'Confirmar sua senha', 'trim|required|matches[password]');
 

                if($this->form_validation->run()){

                    /*
                        Array
                        (
                            [first_name] => vitor
                            [last_name] => rosinha
                            [username] => vitor_rosinha
                            [email] => rosinha@gmail.com
                            [password] => 123456
                            [confirmacao] => 123456
                            [perfil] => 2
                            [active] => 0
                        ) */

                        $username = html_escape($this->input->post('username'));
                        $password = html_escape($this->input->post('password'));
                        $email = html_escape($this->input->post('email'));
                        $additional_data = array(
                                    'first_name' => $this->input->post('first_name'),
                                    'last_name'  => $this->input->post('last_name'),
                                    'active'     => $this->input->post('active'),
                                    );
                        $group = array($this->input->post('perfil'));
                    
                            $additional_data = html_escape($additional_data);

                         if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){

                                $this->session->set_flashdata('sucesso', 'Dados data com sucesso!');
                            
                            }else{

                             $this->session->set_flashdata('error', 'Erro ao salvar os dados');

                            }
                    
                                redirect($this->router->fetch_class());

                         }else{



                    //erro de validação

                    $data = array(

                        'titulo' => 'Cadastrar usuário',
                        'sub_titulo' => 'Cadastre um novo usuário',
                        'icone_view' => 'ik ik-user',
                        
                
                    );
                    
                   // echo '<pre>';
                    //print_r($perfil_atual);
                    //exit();
        
                    $this->load->view('layout/header', $data);
                    $this->load->view('usuarios/core');
                    $this->load->view('layout/footer');



            }

        

              

            }else{
                //Editar usuário

                if(!$this->ion_auth->user($usuario_id)->row()){

                    exit('Usuário não existe');

                }else{
                    
                //Editar usuario parte logica

                $perfil_atual = $this->ion_auth->get_users_groups($usuario_id)->row();

               $this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[4]|max_length[25]');
               $this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[4]|max_length[30]');
               $this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[4]|max_length[20]|callback_username_check');
               $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[8]|max_length[200]|callback_username_check');
               $this->form_validation->set_rules('password', 'Senha', 'trim|min_length[6]');
               $this->form_validation->set_rules('confirmacao', 'Confirmar sua senha', 'trim|matches[password]');


                    if($this->form_validation->run()){

                        /**
                          * [first_name] => Admin
                          * [last_name] => istrator
                          * [username] => administrator
                          * [email] => admin@admin.com
                          * [password] => 4
                          * [confirmacao] =>
                          * [active] => 1
                          * [usuario_id] => 1 */

                            $data = elements(

                                array(
                                   'first_name',
                                   'last_name',
                                   'username',
                                   'email',
                                   'password',
                                   'active',   
                                ), $this->input->post()



                            );

                            $password = $this->input->post('password');

                            //não atualizar senha
                            if(!$password){
                                unset($data['password']);
                            }

                            //sanitizar o array

                            $data = html_escape($data);
                             
                            if($this->ion_auth->update($usuario_id, $data)){   

                                $perfil_post = $this->input->post('perfil');

                                if($perfil_atual->id != $perfil_post){

                                    $this->ion_auth->remove_from_group($perfil_atual->id, $usuario_id);
                                    $this->ion_auth->add_to_group($perfil_post, $usuario_id);
                                }



                                $this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');

                            }else{
                                    
                                $this->session->set_flashdata('error', 'Não foi possível atualizar os dados');    
                                }

                                redirect($this->router->fetch_class());   
                            }else{  

                        //erro da validação 
                        $data = array(

                            'titulo' => 'Editar Usuário',
                            'sub_titulo' => 'Edite usuário selecionado',
                            'icone_view' => 'ik ik-user',
                            
                          'usuario' => $this->ion_auth->user($usuario_id)->row(),
                          'perfil_usuario'  => $this->ion_auth->get_users_groups($usuario_id)->row(),
                            //Carregando os dados dos usuarios, criando uma chave para usuario
                        );
                        
                       // echo '<pre>';
                        //print_r($perfil_atual);
                        //exit();
            
                        $this->load->view('layout/header', $data);
                        $this->load->view('usuarios/core');
                        $this->load->view('layout/footer');

                    }
                
                
           


                }

            }

        }

        public function username_check($username){

            $usuario_id = $this->input->post('usuario_id');

            if($this->Core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))){
                $this->form_validation->set_message('username_check', 'Esse usuário já existe');
                return FALSE;
            }else{
                return TRUE;
            }

        }

        public function email_check($email){

            $usuario_id = $this->input->post('usuario_id');

            if($this->Core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))){
                $this->form_validation->set_message('username_check', 'Esse e-mail já foi cadastrado');
                return FALSE;
            }else{
                return TRUE;
            }

        }

        public function del($usuario_id = NULL) {
 
            if(!$usuario_id || !$this->Core_model->get_by_id('users', array('id' => $usuario_id))) {
     
                $this->session->set_flashdata('error', 'Usuário não encontrado');
                redirect($this->router->fetch_class());
            } else {

                //deleta 

                if($this->ion_auth->is_admin($usuario_id)){

                    $this->session->set_flashdata('error', 'Administrador não pode ser excluído');
                    redirect($this->router->fetch_class());

                }

                if($this->ion_auth->delete_user($usuario_id)){

                    $this->session->set_flashdata('sucesso', 'Usuário excluído com sucesso!');

                }else{

                    $this->session->set_flashdata('error', 'Não foi possível excluído esse usuário!');

                }

                redirect($this->router->fetch_class());

            }
    
    }


}