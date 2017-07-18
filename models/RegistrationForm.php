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
    public $password_repeat;
	public $person_type;
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $client_when_function = 
            "function (attribute, value) {
                return $('.field-registrationform-person_type input:checked').val() == 2;
            }";
        return [
			['person_type', 'required'],
			['person_type', 'integer'],
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
            ['password_repeat', 'required'],
            ['password_repeat', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password',
                'whenClient' => "
                    function (attribute, value) {
                        return $('.field-registrationform-password input').val() == $('.field-registrationform-password_repeat input').val();
                    }
                "],
			['inn', 'trim'],
			['inn', 'required', 'when' => function($model){
                return $model->person_type == 2;
            }, 'whenClient' => $client_when_function],
			['inn', 'string', 'length' => 12],
			['company', 'trim'],
            ['company', 'required', 'when' => function($model){
                return $model->person_type == 2;
            }, 'whenClient' => $client_when_function],
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
        $user->id_person_type = $this->person_type;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
 
    /**
     * Returns the attribute labels.
     *
     * See Model class for more details
     *  
     * @return array attribute labels (name => label).
     */
    public function attributeLabels()
    {
        return [
            'fio' => 'ФИО',
            'inn' => 'ИНН',
            'person_type' => 'Тип',
            'company' => 'Компания',
            'password' => 'Пароль',
        ];
    }
}