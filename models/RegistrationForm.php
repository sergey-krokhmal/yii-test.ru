<?php
 
namespace app\models;
 
use Yii;
use yii\base\Model;

class RegistrationForm extends Model
{
 
    public $fio;
	public $inn;
	public $company;
    public $email;
    public $password;
	public $id_person_type;
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['fio', 'trim'],
            ['fio', 'required'],
            ['fio', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такой пользователь уже существует'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			['inn', 'trim'],
			['inn', 'string', 'length' => 12],
			['id_person_type', 'integer'],
			['company', 'trim'],
            ['company', 'required'],
            ['company', 'string', 'min' => 2, 'max' => 255],
        ];
    }
 
    /**
     * Register user.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function register()
    {
 
        if (!$this->validate()) {
            return null;
        }
 
        $user = new User();
        $user->fio = $this->fio;
        $user->email = $this->email;
        $user->inn = $this->inn;
        $user->company = $this->company;
        $user->id_person_type = $this->id_person_type;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
 
}