<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('user_login');
	}

	public function register()
	{
		$userData = $this->input->post();

		//Ensures database does not enter duplicate email address
		$check_database = $this->User->checkDatabase($userData);
		if($check_database)
		{
			$this->session->set_flashdata('error', 'Sorry, that email address is already in use. Please use another email address or try signing in.');
			redirect('/');
		}

		//Validates registration fields
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('alias', 'Alias', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
		$this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'trim|required');		
		if($this->form_validation->run())
		{
			$this->User->registerUser($userData);
			$this->session->set_flashdata('success', 'Registration complete. Please sign in!');
			redirect('/');
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('/');
		}		
	}

	public function login()
	{
		$loginData = $this->input->post();

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run())
		{
			$user = $this->User->loginUser($loginData);
			if($user)
			{
				$this->session->set_userdata('logged_in', TRUE);
				$this->session->set_userdata('name', $user['name']);
				$this->session->set_userdata('alias', $user['alias']);
				$this->session->set_userdata('email', $user['email']);
				$this->session->set_userdata('id', $user['id']);
				$this->session->set_flashdata("success", "Login successful!");
				redirect('/profile');
			}
			else
			{
				$this->session->set_flashdata("error", "Invalid email or password.");
				redirect('/');
			}
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('/');
		}
	}

	public function profile()
	{
		$id = $this->session->userdata('id');
		$users = $this->User->getAllUsers($id);
		$pokes = $this->Poke->getAllPokes($id);
		$this->load->view('profile_page', array('users' => $users, 'pokes' => $pokes));
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}

//end of Users controller