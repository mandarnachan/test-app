<?php
namespace App\Http\Repository;

use App\Models\User;
use App\Models\Company;
use App\Models\CompUsers;
use App\Http\Repository\UserRepositoryInterface;

class UserRepository extends Repository
{   
    protected $user = null;

    public function getData($minAge, $maxAge)
    {
        $query = CompUsers::join('users', 'company_users.user_id', '=' , 'users.id')
                ->join('companies', 'company_users.comp_id', '=', 'companies.id')
                ->select('users.user_code', 'companies.comp_code', 'users.name as user_name', 'companies.name as comp_name', 'users.age', 'companies.started_at');
        if (!empty($minAge) && !empty($maxAge)) 
        {
            $query->whereBetween('users.age', [$minAge, $maxAge]);                    
        }                
        
        $result = $query->orderby('companies.comp_code', 'ASC')->get()->toArray();
        return $result;
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function createOrUpdateCompany($whrCond, $data)
    {   
        return Company::updateOrCreate($whrCond, $data);
    }

    public function createOrUpdateUser($whrCond, $data)
    {   
        return User::updateOrCreate($whrCond, $data);
    }

    public function createCompUsers($whrCond, $data)
    {   
        return CompUsers::updateOrCreate($data);
    }
    
    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
}
?>