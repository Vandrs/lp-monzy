<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CreateUserService;
use App\Exceptions\ValidationException;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $data = [
            'name'     => $this->argument('name'),
            'email'    => $this->argument('email'),
            'password' => $this->argument('password')
        ];
        try {
            $userService = new CreateUserService();
            $user = $userService->create($data);
            $this->info('Usuário criado com sucesso, ID: '.$user->id);
        } catch (ValidationException $exception) {
            $errors = $userService->getValidator()->errors()->all();
            foreach ($errors as $errorText) {
                $this->error($errorText);
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
