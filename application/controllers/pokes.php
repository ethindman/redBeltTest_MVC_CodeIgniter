<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pokes extends CI_Controller {

	public function pokeUser()
	{
		$pokeData = $this->input->post();

		//First, confirm if user has been poked by this user before in the database​
		$poke_confirm = $this->Poke->checkPokeStatus($pokeData);  
		if($poke_confirm)
		{
			//If user has already been poked, add to existing poke count
			$result = $this->Poke->addToExistingPoke($pokeData);
			if($result)
			{
				redirect('/profile');
			}
			else
			{
				$this->session->set_flashdata("error", "Something went wrong. Could not add a poke at this time. Please try again later.");
				redirect('/profile');
			}
		}
		else
		{
			//Otherwise, create a new poke index for this user pair
			$result = $this->Poke->addNewPoke($pokeData);
			if($result)
			{
				$this->session->set_flashdata("success", "You poked this user for the first time. Nice one!");
				redirect('/profile');
			}
			else
			{
				$this->session->set_flashdata("error", "Something went wrong. Could not add a poke at this time. Please try again later.");
				redirect('/profile');
			}
		}
	}
}

//end of Pokes Controller