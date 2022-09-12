<?php
namespace App\Http\Livewire;

use App\Events\MessageSentEvent;
use App\Models\Message;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatRoom extends Component
{

     public $messages = [];
     public $here = [];

     protected $listeners =[
         
        "echo-presence:demo,here" => 'here',            // Here
        "echo-presence:demo,joining" => 'joining',         // Joining
        "echo-presence:demo,leaving" => 'leaving', 

     ];

     public function mount() {

          $this->messages = Message::
              with('user')
              ->latest()
              ->limit(30)
              ->get()
              ->reverse()
              ->values()
              ->toArray();


     }
    public function render()
    {
        return view('livewire.chat-room');
    }
    public function sendMessage($body){
     
        if(!$body) {
             
            $this->addError('messageBody' , 'Message Body is required.');
            return;
        }
        $message =Auth::user()->$this->messages()->create([
          
                'body' =>$body,
 
        ]);

        $message->load('user');

        broadcast(new MessageSentEvent($message))->toOthers();

        array_push($this->messages , $message);
         
    }
     public function incomingMessage($message){

          $message = Message::with('user')->find($message['id']);

          array_push($this->messages , $message);
         

     }
     public function here($data)
     {
     
         $this->here = $data;

     }
     public function leaving($data)
     { 
         $here =collect($this->here);

         $firstindex = $here->search(function ($authData) use ($data){
           
            return $authData['id'] == $data['id'];
        
         });
       
          $here->splice($firstindex , 1);

          $this->here = $here->toArray();

     }
     public function joining($data){
        
         $this->here[] = $data;

     }

}
