<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'regist a admin at first';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email            = $this->ask('input the Email what you want');
        $weixin           = $this->ask('input you weixin');
        $phone            = $this->ask('input you phone number');
        $pass             = $this->secret('input your password');
        $data['email']    = $email;
        $data['password'] = bcrypt($pass);
        $data['weixin']   = $weixin;
        $data['phone']    = $phone;
        $data['group_id'] = '1';
        $data['name']     = 'admin';

        if(User::create($data)){
            $this->info('admin init successed');
            return;
        }
            $this->warn('admin init fail, retry please');
    }
}
