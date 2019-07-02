<?php

namespace App\Controllers;

use App\Core\App;

class UsersController
{
	public function index()
	{
		$users = App::get('database')->selectAll('doctor');

		return view('users', compact('users'));
	}

	public function edit()
	{
		$user = App::get('database')->selectById('users', $_GET['id']);

		return view('edituser', compact('user'));
	}

	public function store()
	{
		App::get('database')->insert('doctor', [
			'name' => $_POST["name"] ,
            'surname' => $_POST["surname"],
            'speciality' => $_POST['speciality']
		]);

		return redirect('users');
	}

	public function update()
	{
		App::get('database')->update('users', [
			'name' => $_POST['name']
		], $_POST["id"]);

		return redirect('users');
	}

	public function delete() 
	{
		App::get('database')->delete('users', $_GET[
			'id']);

		return redirect('users');
	}
}