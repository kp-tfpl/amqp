<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class orderController extends Controller
{
    public function index()
    {
        $connection = new AMQPStreamConnection('127.0.0.1', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->queue_declare('hello', false, false, false, false);
        $msg = new AMQPMessage('Hello World!');
        // $channel->basic_publish($msg, 'my-new-exchange', 'hello');
        $channel->basic_publish($msg, '', 'hello');
        echo "Hello World !";
        $channel->close();
        $connection->close();
    }

    // public function index()  
    // {
    //     $connection = new AMQPStreamConnection('localhost', 5672, 'kp', 'kp', 'kp');
    //     $channel = $connection->channel();
    //     $channel->queue_declare('hello', false, false, false, false);
    //     $msg = new AMQPMessage('Hello World!');
    //     $channel->basic_publish($msg, '', 'hello');
        
    //     echo "[x] Sent 'Hello World!'\n";
    //     $channel->close();
    //     $connection->close();
    // }
    
    // public function index1()  
    // {
    //     $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
    //     $channel = $connection->channel();
    //     $channel->queue_declare('hello', false, false, false, false);
    //     $msg = new AMQPMessage('Hello World!');
    //     $channel->basic_publish($msg, '', 'hello');
        
    //     echo " [x] Sent 'Hello World!'\n";
    //     $channel->close();
    //     $connection->close();
    // }
}
