<?php namespace App\Repositories;

use App\User;
use App\Role;
use App\Helpers\EloquentHelper;
use DB;

class RoleRepo
{
	public function getBy($params = array())
	{
		$query = DB::table('roles');

        $query->select(array(
            'roles.*',
        ));

        $EloquentHelper = new EloquentHelper();

        return $EloquentHelper->allInOne($query, $params);
	}

	public function lists($value,$key)
	{
		return Role::pluck($value,$key)->all();
	}

	public function find($id)
	{
		return Role::find($id);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return DB::table('roles')->insert([
			'name' => $data['name'],
			'display_name' => $data['display_name'],
			'description' => $data['description'],
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function update(array $data,$id)
	{
		$update_data = array(
			'name' => $data['name'],
			'display_name' => $data['display_name'],
			'description' => $data['description'],
		);
		return Role::where('id', '=', $id)->update($update_data);
	}


	public function delete(int $id)
	{
		return Role::destroy($id);
	}

}