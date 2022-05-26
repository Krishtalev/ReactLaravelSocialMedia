<?php

namespace App\Models;

use App\ValidationRules\DialogRules;
use App\Validator\CustomValidator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpcent\Client;


class Dialog extends BaseModel
{
    use hasFactory;
    use DialogRules;

    public array $methods = [
        "createDialog" => ["type" => "POST", "gates" => []],
        "getDialogs" => ["type" => "GET", "gates" => []],
        'getDialogUsers' => ["type" => "GET", "gates" => []],
        'addToDialog' => ["type" => "POST", "gates" => []],
        'addMessage' => ["type" => "POST", "gates" => []],
        'getDialogMessages' => ["type" => "GET", "gates" => []],
    ];

    public static function createDialog(Request $request)
    {
        $userId = Auth::id();
        $dialog = Dialog::create();
        $dialogId = $dialog->id;
        return DialogUser::create(['dialog_id' => $dialogId, "user_id" => $userId]);
    }

    public static function addToDialog(Request $request, $id)
    {
        $validator = new CustomValidator($request->post(), DialogRules::$addToDialogRules, DialogRules::$customMessages);
        $userID = $validator->validated()['user_id'];
        return DialogUser::create(['dialog_id' => $id, "user_id" => $userID]);
    }

    public static function addMessage(Request $request, $id)
    {
        $validator = new CustomValidator($request->post(), DialogRules::$addMessageRules, DialogRules::$customMessages);
        $text = $validator->validated()['text'];
        $userId = Auth::id();
        $data = ['user_id' => $userId, 'message' => 'text', 'dialog_id' => $id];
        $message = Message::create($data);
        $users = Dialog::find([$id])->first()->users()->get();
        $client = new Client("http://centrifugo:8000/api", "api_key");

        foreach ($users as $user) {
            $client->publish("userChannel#{$user->id}", $data);
        }
        return $message;
    }

    public static function getDialogMessages(Request $request, $id)
    {
        $dialog = Dialog::find([$id])->first();
        return $dialog->messages()->get()->toArray();
    }

    public static function getDialogs(Request $request)
    {
        $user = Auth::user();
        return $user->dialogs()->get()->toArray();
    }

    public static function getDialogUsers(Request $request, $id)
    {
        $dialog = Dialog::find([$id])->first();
        return $dialog->users()->get()->toArray();
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, DialogUser::class, "dialog_id", "id", 'id', 'user_id');
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

}
