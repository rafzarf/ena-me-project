<?php namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = "worker";
    protected $primaryKey = "id_worker";
    protected $allowedFields = [
        'Username',
        'Password',
        'Name',
        'Role',
    ];

    public function multipleDelete($id) {
        $this->table('$this->table')
        ->whereIn($this->primaryKey, $id)
        ->delete();
    }

    //fungsi search $keyword dari variable GET dari input search.
    public function search($keyword) {
        if($keyword){
            $akundata = $this->table($this->table)
            ->like('Username', $keyword)
            ->orLike('Name', $keyword)
            ->orLike('Role', $keyword);
        } else {
            $akundata = $this;
        }

        return $akundata;
    }

    //auth login
    public function LoginAuth($username, $password){
        $result = $this->table('$this->table')
        ->where('Username', $username)
        ->get()->getResult();
        if(!empty($result) && password_verify($password, $result[0]->Password)){
                return $result;
            } else {
                return false;
            }
    }
}