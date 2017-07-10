<?php namespace App\Repositories;

use App\User;
use App\Role;
use App\Permission;
use App\Helpers\EloquentHelper;
use DB;

class PermissionRepo
{
	public function getBy($params = array())
	{
		$query = DB::table('permissions');

        $query->select(array(
            'permissions.*',
        ));

        $EloquentHelper = new EloquentHelper();

        return $EloquentHelper->allInOne($query, $params);
	}

	public function find($id)
	{
		return Permission::find($id);
	}

	public function addPermissionsToRole($perm_ids,$role_id)
	{
		$row_data = array();

		if(!empty($perm_ids)){
			DB::table('permission_role')
			->where('role_id',$role_id)
			->delete();

			foreach($perm_ids as $key => $val){
				$row_data[]=array(
					'permission_id'=>$val,
					'role_id'=>$role_id,
				);
			}
		}else{
			DB::table('permission_role')
			->where('role_id',$role_id)
			->delete();
		}

		if(!empty($row_data)){
			DB::table('permission_role')->insert($row_data);
		}
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return DB::table('permissions')->insert([
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
		return Permission::where('id', '=', $id)->update($update_data);
	}


	public function delete(int $id)
	{
		return Permission::destroy($id);
	}

}